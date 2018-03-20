<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Localidades_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
        date_default_timezone_set("America/Argentina/Buenos_Aires");
    }
    
    public function get_localidad_busqueda_select2($termino)
    {
        $sql= "select localidades.*, provincias.provincia as desc_provincia from localidades INNER JOIN provincias on provincias.id = localidades.id_provincia where localidades.codigo = '".$termino."' or localidades.localidad like '%".$termino."%'";
        $r= $this->db->query($sql);
        $datos = $r->result_array();
        
        $data = Array();
        
        // Make sure we have a result
        if(count($datos) > 0){
           foreach ($datos as $value) {
            $data[] = array('id' => $value['codigo'], 'text' =>$value['localidad']);              
           } 
        } else {
           $data[] = array('id' => '0', 'text' => 'Buscar localidad');
        }

        return $data;
    }


    public function get_localidades()
    {
        $r = $this->db->query("select localidades.*, provincias.provincia as desc_provincia from localidades INNER JOIN provincias on provincias.id = localidades.id_provincia");
        return $r->result_array();
    }

    public function get_localidades_por_provincia($id_provincia)
    {
        $r = $this->db->query("select localidades.*, provincias.provincia as desc_provincia from localidades INNER JOIN provincias on provincias.id = localidades.id_provincia where localidades.id_provincia = ?",array($id_provincia));
        return $r->result_array();
    }
    
    public function get_localidad($id)
    {
        $r = $this->db->query("select localidades.*, provincias.provincia as desc_provincia from localidades INNER JOIN provincias on provincias.id = localidades.id_provincia where localidades.codigo = ?",array($id));
        return $r->row_array();
    }

    public function get_ultima_localidad()
    {
        $r = $this->db->query("select localidades.*, provincias.provincia as desc_provincia from localidades INNER JOIN provincias on provincias.id = localidades.id_provincia order by localidades.codigo desc limit 1");
        return $r->row_array();
    }

    public function agregar_localidad($localidad,$provincia)
    {
        $this->db->trans_start();

        $datos = array("localidad"=>$localidad,"id_provincia"=>$provincia);
        $respuesta = $this->db->insert("localidades",$datos);

        if($respuesta)
        {
            $respuesta= $this->get_ultima_localidad();
        }

        $this->db->trans_complete();

        if($this->db->trans_status() == false)
        {
            $this->db->trans_rollback();
            return false;
        }
        else
        {
            $this->db->trans_commit();
            return $respuesta;
        }
    }

    public function editar_localidad($id,$localidad,$provincia)
    {
        $this->db->trans_start();

        $datos = array("localidad"=>$localidad,"id_provincia"=>$provincia);
        $this->db->where("codigo",$id);
        $respuesta = $this->db->update("localidades",$datos);

        if($respuesta)
        {
            $respuesta= $this->get_localidad($id);
        }

        $this->db->trans_complete();

        if($this->db->trans_status() == false)
        {
            $this->db->trans_rollback();
            return false;
        }
        else
        {
            $this->db->trans_commit();
            return $respuesta;
        }
    }

    public function eliminar_localidades_por_provincia($id_provincia)
    {
        $this->db->where("id_provincia",$id_provincia);
        return $this->db->delete("localidades");
    }

    public function eliminar_localidad($id)
    {
        $this->db->where("codigo",$id);
        return $this->db->delete("localidades");
    }
}
