<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Establecimiento_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }

    public function get_institucion_busqueda_select2($termino)
    {
        $sql= "SELECT establecimiento.*,localidades.localidad as localidades_localidad FROM establecimiento INNER JOIN localidades on localidades.codigo = establecimiento.localidad where establecimiento.id = '".$termino."' or establecimiento.nombre_organizacion like '%".$termino."%'";

        $r= $this->db->query($sql);
        $datos = $r->result_array();
        
        $data = Array();
        
        // Make sure we have a result
        if(count($datos) > 0){
           foreach ($datos as $value) {
            $data[] = array('id' => $value['id'], 'text' =>$value['nombre_organizacion']);              
           } 
        } else {
           $data[] = array('id' => '0', 'text' => 'Buscar institucion');
        }

        return $data;
    }

    public function get_ultimo_establecimiento()
    {
        $r = $this->db->query("SELECT establecimiento.*,localidades.localidad as localidades_localidad FROM establecimiento INNER JOIN localidades on localidades.codigo = establecimiento.localidad where establecimiento.id = (select max(establecimiento.id) from establecimiento)");
        return $r->row_array();
    }

    public function get_establecimientos()
    {
        $r = $this->db->query("SELECT establecimiento.*,localidades.localidad as localidades_localidad FROM establecimiento INNER JOIN localidades on localidades.codigo = establecimiento.localidad");
        return $r->result_array();
    }

    public function get_establecimiento($id)
    {
        $r = $this->db->query("SELECT establecimiento.*,localidades.localidad as localidades_localidad FROM establecimiento INNER JOIN localidades on localidades.codigo = establecimiento.localidad where establecimiento.id = ?",array($id));
        return $r->row_array();
    }

    public function agregar_establecimiento($nombre_organizacion,$direccion,$localidad,$telefono,$correo,$rector,$referente )
    {
        $this->db->trans_begin();

        $datos = Array(
            "nombre_organizacion" => $nombre_organizacion,
            "direccion" => $direccion,
            "localidad" => $localidad,
            "telefono" => $telefono,
            "correo" => $correo,
            "rector" => $rector,
            "referente" => $referente, 
        );

        $agregado = $this->db->insert("establecimiento",$datos);

        if($agregado)
        {
            $agregado = $this->get_ultimo_establecimiento();
        }

        if($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            return false;
        }
        else
        {
            $this->db->trans_commit();
            return $agregado;
        }
    }

    public function editar_establecimiento($id,$nombre_organizacion,$direccion,$localidad,$telefono,$correo,$rector,$referente )
    {
        $datos = Array(
            "nombre_organizacion" => $nombre_organizacion,
            "direccion" => $direccion,
            "localidad" => $localidad,
            "telefono" => $telefono,
            "correo" => $correo,
            "rector" => $rector,
            "referente" => $referente, 
        );

        $this->db->where("id",$id);
        return $this->db->update("establecimiento",$datos);
    }

    public function eliminar_establecimiento($id)
    {
        $this->db->where("id",$id);
        return $this->db->delete("establecimiento");
    }
    
}

