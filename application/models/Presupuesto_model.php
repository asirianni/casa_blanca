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

    
    public function agregar_presupuesto($fecha,$fecha_llegada,$establecimiento,$usuario,$docente_a_cargo,$grado,$acompaniantes,$anio,$curso,$ciclo,$perfil,$mujeres,$varones,$total,$descuento_general,$estado,$usuarios_correo )
    {
        $datos = Array(
            $fecha => "fecha",
            $fecha_llegada => "fecha_llegada",
            $establecimiento => "establecimiento",
            $usuario => "usuario",
            $docente_a_cargo => "docente_a_cargo",
            $grado => "grado",
            $acompaniantes => "acompaniantes",
            $anio => "anio",
            $curso => "curso",
            $ciclo => "ciclo",
            $perfil => "perfil",
            $mujeres => "mujeres",
            $varones => "varones",
            $total => "total",
            $descuento_general => "descuento_general",
            $estado => "estado",
            $usuarios_correo => "usuarios_correo",
        );

        return $this->db->insert("presupuestos",$datos);
    }

    public function editar_presupuesto($numero,$fecha,$fecha_llegada,$establecimiento,$usuario,$docente_a_cargo,$grado,$acompaniantes,$anio,$curso,$ciclo,$perfil,$mujeres,$varones,$total,$descuento_general,$estado,$usuarios_correo )
    {
        $datos = Array(
            $fecha => "fecha",
            $fecha_llegada => "fecha_llegada",
            $establecimiento => "establecimiento",
            $usuario => "usuario",
            $docente_a_cargo => "docente_a_cargo",
            $grado => "grado",
            $acompaniantes => "acompaniantes",
            $anio => "anio",
            $curso => "curso",
            $ciclo => "ciclo",
            $perfil => "perfil",
            $mujeres => "mujeres",
            $varones => "varones",
            $total => "total",
            $descuento_general => "descuento_general",
            $estado => "estado",
            $usuarios_correo => "usuarios_correo",
        );

        $this->db->where("numero",$id);
        return $this->db->update("presupuestos",$datos);
    }

    public function eliminar_presupuesto($id)
    {
        $this->db->where("numero",$id);
        return $this->db->delete("presupuestos");
    }
    
}

