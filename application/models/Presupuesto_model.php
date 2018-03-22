<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Presupuesto_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }

    public function get_proximo_numero()
    {
        $r = $this->db->query("SELECT max(presupuestos.numero) as cantidad FROM presupuestos");
        $r =$r->row_array();
        return ((int) $r["cantidad"]) + 1;
    }

    public function get_presupuestos_with_filters($desde,$hasta,$institucion)
    {
        $sql="SELECT presupuestos.*, usuarios.correo as usuarios_correo,establecimiento.nombre_organizacion as establecimiento_nombre_organizacion FROM presupuestos INNER JOIN usuarios on usuarios.id = presupuestos.usuario INNER JOIN establecimiento on establecimiento.id = presupuestos.establecimiento where presupuestos.fecha between '".$desde."' and '".$hasta."'";

        if($institucion != 0)
        {
            $sql.=" and presupuestos.establecimiento = $institucion";
        }

        $r = $this->db->query($sql);
        return $r->result_array();
    }

    public function get_cantidad_pendientes()
    {
         $r = $this->db->query("SELECT count(numero) as cantidad FROM presupuestos where estado ='pendiente'");
        $r =  $r->row_array();
        return $r["cantidad"];
    }

    public function get_presupuestos()
    {
        $r = $this->db->query("SELECT presupuestos.*, usuarios.correo as usuarios_correo,establecimiento.nombre_organizacion as establecimiento_nombre_organizacion FROM presupuestos INNER JOIN usuarios on usuarios.id = presupuestos.usuario INNER JOIN establecimiento on establecimiento.id = presupuestos.establecimiento");
        return $r->result_array();
    }

    public function get_presupuesto($id)
    {
        $r = $this->db->query("SELECT presupuestos.*, usuarios.correo as usuarios_correo,establecimiento.nombre_organizacion as establecimiento_nombre_organizacion FROM presupuestos INNER JOIN usuarios on usuarios.id = presupuestos.usuario INNER JOIN establecimiento on establecimiento.id = presupuestos.establecimiento  where presupuestos.numero = ?",array($id));
        return $r->row_array();
    }

    public function get_detalle_presupuesto($numero)
    {
        //  obtengo todos los productos de ese detalle
        $r = $this->db->query("SELECT presupuesto_detalle.*,productos.descripcion as productos_descripcion FROM presupuesto_detalle INNER JOIN productos on productos.id = presupuesto_detalle.codigo_item where presupuesto_detalle.num_presupuesto = ? and presupuesto_detalle.codigo_es_rubro = 0",array($numero));
        $productos = $r->result_array();

        //  obtengo todos los rubros de ese detalle
        $r = $this->db->query("SELECT presupuesto_detalle.*,rubro.rubro as rubro_rubro FROM presupuesto_detalle INNER JOIN rubro on rubro.id = presupuesto_detalle.codigo_item where presupuesto_detalle.codigo_es_rubro = 1 and presupuesto_detalle.num_presupuesto = ?",array($numero));
        $rubros = $r->result_array();

         //  no_rubros_no_productos
        $r = $this->db->query("SELECT presupuesto_detalle.* FROM presupuesto_detalle  where presupuesto_detalle.codigo_es_rubro = 0 and codigo_item = 0 and presupuesto_detalle.num_presupuesto = ?",array($numero));
        $no_rubros_no_productos = $r->result_array();

        return array("productos"=>$productos,"rubros"=>$rubros,"no_rubros_no_productos"=>$no_rubros_no_productos);
    }

    
    public function agregar_presupuesto($fecha,$fecha_llegada,$establecimiento,$usuario,$docente_a_cargo,$grado,$acompaniantes,$anio,$curso,$ciclo,$perfil,$mujeres,$varones,$descuento_general,$estado,$detalle,$direccion,$localidad)
    {
        $this->db->trans_begin();

        $respuesta = array("respuesta"=>false,"numero_presupuesto"=>0);

        $total_pedido = 0.0;
        $numero_presupuesto=$this->get_proximo_numero();

        // OBTENIENDO TOTAL
        for($i=0; $i < count($detalle);$i++)
        {
            $row_detalle= $detalle[$i];
            
            
            $cantidad= $row_detalle["cantidad"];

            $precio = $row_detalle["precio"];

            $descuento = $row_detalle["descuento"];

            $total_row = ($cantidad * $precio) - (($cantidad * $precio) * $descuento / 100);

            $detalle[$i]["total"]= $total_row;
            $total_pedido+= $total_row;
            
        }

        $total_pedido = $total_pedido - (($total_pedido * $descuento_general) / 100);

        $datos = Array(
            "fecha" => $fecha,
            "fecha_llegada" => $fecha_llegada,
            "establecimiento" => $establecimiento,
            "direccion" => $direccion,
            "localidad" => $localidad,
            "usuario" => $usuario,
            "docente_a_cargo" => $docente_a_cargo,
            "grado" => $grado,
            "acompaniantes" => $acompaniantes,
            "anio" => $anio,
            "curso" => $curso,
            "ciclo" => $ciclo,
            "perfil" => $perfil,
            "mujeres" => $mujeres,
            "varones" => $varones,
            "descuento_general" => $descuento_general,
            "estado" => $estado,
            "total"=>$total_pedido
        );

        $insert = $this->db->insert("presupuestos",$datos);


        if($insert)
        {
            for($i=0; $i < count($detalle);$i++)
            {
                $row_detalle= $detalle[$i];

                $data_detalle= array(
                    "num_presupuesto"=>$numero_presupuesto,
                    "codigo_es_rubro"=> $row_detalle["codigo_es_rubro"],
                    "codigo_item"=> $row_detalle["codigo_item"],
                    "descripcion"=> $row_detalle["descripcion"],
                    "cantidad"=> $row_detalle["cantidad"],
                    "precio"=> $row_detalle["precio"],
                    "descuento"=> $row_detalle["descuento"],
                    "total"=>$row_detalle["total"],
                );

                $this->db->insert("presupuesto_detalle",$data_detalle);
            }
        }


        if($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $respuesta["respuesta"]=false;
        }
        else
        {
            $this->db->trans_commit();
            $respuesta["respuesta"]=true;
            $respuesta["numero_presupuesto"]=$numero_presupuesto;
        }

        return $respuesta;
    }

    public function editar_presupuesto($numero_presupuesto,$fecha,$fecha_llegada,$establecimiento,$usuario,$docente_a_cargo,$grado,$acompaniantes,$anio,$curso,$ciclo,$perfil,$mujeres,$varones,$descuento_general,$estado,$detalle,$direccion,$localidad)
    {
        $this->db->trans_begin();

        $respuesta = array("respuesta"=>false,"numero_presupuesto"=>$numero_presupuesto);

        $total_pedido = 0.0;

        // OBTENIENDO TOTAL
        for($i=0; $i < count($detalle);$i++)
        {
            $row_detalle= $detalle[$i];
            
            
            $cantidad= $row_detalle["cantidad"];

            $precio = $row_detalle["precio"];

            $descuento = $row_detalle["descuento"];

            $total_row = ($cantidad * $precio) - (($cantidad * $precio) * $descuento / 100);

            $detalle[$i]["total"]= $total_row;
            $total_pedido+= $total_row;
            
        }

        $total_pedido = $total_pedido - (($total_pedido * $descuento_general) / 100);

        $datos = Array(
            "fecha" => $fecha,
            "fecha_llegada" => $fecha_llegada,
            "establecimiento" => $establecimiento,
            "direccion" => $direccion,
            "localidad" => $localidad,
            "usuario" => $usuario,
            "docente_a_cargo" => $docente_a_cargo,
            "grado" => $grado,
            "acompaniantes" => $acompaniantes,
            "anio" => $anio,
            "curso" => $curso,
            "ciclo" => $ciclo,
            "perfil" => $perfil,
            "mujeres" => $mujeres,
            "varones" => $varones,
            "descuento_general" => $descuento_general,
            "estado" => $estado,
            "total"=>$total_pedido
        );

        $this->db->where("numero",$numero_presupuesto);
        $insert = $this->db->update("presupuestos",$datos);


        if($insert)
        {
            $this->db->where("num_presupuesto",$numero_presupuesto);
            $this->db->delete("presupuesto_detalle");

            for($i=0; $i < count($detalle);$i++)
            {
                $row_detalle= $detalle[$i];

                $data_detalle= array(
                    "num_presupuesto"=>$numero_presupuesto,
                    "codigo_es_rubro"=> $row_detalle["codigo_es_rubro"],
                    "codigo_item"=> $row_detalle["codigo_item"],
                    "descripcion"=> $row_detalle["descripcion"],
                    "cantidad"=> $row_detalle["cantidad"],
                    "precio"=> $row_detalle["precio"],
                    "descuento"=> $row_detalle["descuento"],
                    "total"=>$row_detalle["total"],
                );

                $this->db->insert("presupuesto_detalle",$data_detalle);
            }
        }


        if($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $respuesta["respuesta"]=false;
        }
        else
        {
            $this->db->trans_commit();
            $respuesta["respuesta"]=true;
            $respuesta["numero_presupuesto"]=$numero_presupuesto;
        }

        return $respuesta;
    }

    public function eliminar_presupuesto($id)
    {
        $this->db->where("numero",$id);
        return $this->db->delete("presupuestos");
    }
    
}

