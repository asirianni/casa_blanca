<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Rubro_model extends CI_Model{
    //put your code here
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get_rubro_busqueda_select2($termino)
    {
        $sql= "select rubro.* from rubro where rubro.rubro like '".$termino."%' or rubro.id = '".$termino."'";
        $r= $this->db->query($sql);
        $datos = $r->result_array();
        
        $data = Array();
        
        // Make sure we have a result
        if(count($datos) > 0){
           foreach ($datos as $value) {
            $data[] = array('id' => $value['id'], 'text' =>$value['rubro']);              
           } 
        } else {
           $data[] = array('id' => '0', 'text' => 'Buscar Rubro');
        }

        return $data;
    }

    public function get_subrubro_busqueda_select2($termino,$id_rubro)
    {
        $sql= "select sub_rubro.* from sub_rubro where sub_rubro.id_rubro = $id_rubro and (  sub_rubro.subrubro like '".$termino."%' or sub_rubro.id = '".$termino."')";
        $r= $this->db->query($sql);
        $datos = $r->result_array();
        
        $data = Array();
        
        // Make sure we have a result
        if(count($datos) > 0){
           foreach ($datos as $value) {
            $data[] = array('id' => $value['id'], 'text' =>$value['subrubro']);              
           } 
        } else {
           $data[] = array('id' => '0', 'text' => 'Buscar Sub Rubro');
        }

        return $data;
    }

    public function get_rubro($id)
    {
        $r = $this->db->query("select rubro.* from rubro where id = ?",array($id));
        return $r->row_array();
    }

    public function get_subrubro($id)
    {
        $r = $this->db->query("select sub_rubro.*, rubro.rubro as rubro_rubro from sub_rubro inner JOIN rubro on rubro.id = sub_rubro.id_rubro where sub_rubro.id = ?",array($id));
        return $r->row_array();
    }

    public function get_ultimo_rubro()
    {
        $r = $this->db->query("select rubro.* from rubro order by id desc limit 1");
        return $r->row_array();
    }
    
    public function get_cantidad()
    {
        $r = $this->db->query("select count(id) as cantidad from rubro");
        $r = $r->row_array();
        return $r["cantidad"];
    }

    public function get_rubros()
    {
        $r = $this->db->query("select rubro.* from rubro");
        return $r->result_array();
    }
    
    public function get_rubros_visibles()
    {
        $r = $this->db->query("select rubro.* from rubro where mostrar = 'si'");
        return $r->result_array();
    }
    
     public function get_rubros_visibles_con_subrubros()
    {
        $r = $this->db->query("select rubro.* from rubro where mostrar = 'si' and rubro.id in (select id_rubro from sub_rubro)");
        return $r->result_array();
    }
    
    public function get_subrubros_de_rubro($id_rubro)
    {
        $r = $this->db->query("select sub_rubro.* from sub_rubro where sub_rubro.id_rubro= $id_rubro");
        return $r->result_array();
    }
    
    public function get_subrubros_activos_de_rubro($id_rubro)
    {
        $r = $this->db->query("select sub_rubro.* from sub_rubro where sub_rubro.id_rubro= $id_rubro and sub_rubro.mostrar = 'si'");
        return $r->result_array();
    }

    public function get_ultimo_subrubro()
    {
        $r = $this->db->query("select sub_rubro.*, rubro.rubro as rubro_rubro from sub_rubro inner JOIN rubro on rubro.id = sub_rubro.id_rubro order by sub_rubro.id desc limit 1");

        return $r->row_array();
    }
    
    public function agregar_rubro($rubro,$mostrar,$precio)
    {
        $respuesta =false;

        $this->db->trans_start();

        if($this->db->insert("rubro",Array("rubro"=>$rubro,"mostrar"=>$mostrar,"precio"=>$precio)))
        {  
            $respuesta= $this->get_ultimo_rubro();
        }

        $this->db->trans_complete();

        if($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }

        return $respuesta;
    }
    
    public function agregar_subrubro($rubro,$subrubro,$mostrar)
    {
        $respuesta =false;

        $this->db->trans_start();

        $respuesta= $this->db->insert("sub_rubro",Array("id_rubro"=>$rubro,"subrubro"=>$subrubro,"mostrar"=>$mostrar));

        if($respuesta)
        {  
            $respuesta= $this->get_ultimo_subrubro();
        }

        $this->db->trans_complete();

        if($this->db->trans_status() === FALSE)
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
    
    public function editar_subrubro($id,$subrubro,$mostrar)
    {
        $respuesta =false;

        $this->db->trans_start();
        $this->db->where("id",$id);
        $respuesta= $this->db->update("sub_rubro",Array("subrubro"=>$subrubro,"mostrar"=>$mostrar));

        if($respuesta)
        {  
            $respuesta= $this->get_subrubro($id);
        }

        $this->db->trans_complete();

        if($this->db->trans_status() === FALSE)
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
    
    public function eliminar_subrubro($id)
    {
        $this->db->where("id",$id);
        return $this->db->delete("sub_rubro");
    }
    
    public function editar_rubro($id,$rubro,$mostrar,$precio)
    {
        $respuesta =false;

        $this->db->trans_start();

        $this->db->where("id",$id);
        $respuesta = $this->db->update("rubro",Array("rubro"=>$rubro,"mostrar"=>$mostrar,"precio"=>$precio));

        if($respuesta)
        {  
            $respuesta= $this->get_rubro($id);
        }

        $this->db->trans_complete();

        if($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }

        return $respuesta;
    }
    
    public function eliminar_rubro($id_rubro)
    {
        $this->db->where("id",$id_rubro);
        return $this->db->delete("rubro");
    }
    
}

