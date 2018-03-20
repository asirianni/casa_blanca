<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Provincia_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    public function get_provincia_busqueda_select2($termino)
    {
        $sql= "select * from provincias where provincia like '".$termino."%' or id = '".$termino."'";
        $r= $this->db->query($sql);
        $datos = $r->result_array();
        
        $data = Array();
        
        if(count($datos) > 0){
           foreach ($datos as $value) {
            $data[] = array('id' => $value['id'], 'text' =>$value['provincia']);              
           } 
        } else {
           $data[] = array('id' => '0', 'text' => 'Buscar provincia');
        }

        return $data;
    }

    public function get_provincias()
    {
    	$r = $this->db->query("select * from provincias");
    	return $r->result_array();
    }

    public function get_provincia($id)
    {
    	$r = $this->db->query("select * from provincias where id = ?",array($id));
    	return $r->row_array();
    }

    public function get_ultima_provincia()
    {
      $r = $this->db->query("select * from provincias order by id desc limit 1");
      return $r->row_array();
    }

    public function agregar($provincia)
   	{
      $this->db->trans_start();

      $datos = array("provincia"=>$provincia);
      $respuesta = $this->db->insert("provincias",$datos);

      if($respuesta)
      {
          $respuesta= $this->get_ultima_provincia();
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

   	public function editar($id,$provincia)
   	{
   		$this->db->trans_start();

      $this->db->where("id",$id);
      $respuesta = $this->db->update("provincias",array("provincia"=>$provincia));

      if($respuesta)
      {
          $respuesta= $this->get_provincia($id);
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

   	public function eliminar($id)
   	{
   		$this->db->trans_start();
   		$this->load->model("Localidades_model");
   		$this->db->where("id",$id);
   		$this->db->delete("provincias");
   		$this->Localidades_model->eliminar_localidades_por_provincia($id);
   		$this->db->trans_complete();

   		if($this->db->trans_status() == false)
   		{
   			$this->db->trans_rollback();
   			return false;
   		}
   		else
   		{
   			$this->db->trans_commit();
   			return true;
   		}
   	}
}