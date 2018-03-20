<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Establecimiento_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
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
        $datos = Array(
            "nombre_organizacion" => $nombre_organizacion,
            "direccion" => $direccion,
            "localidad" => $localidad,
            "telefono" => $telefono,
            "correo" => $correo,
            "rector" => $rector,
            "referente" => $referente, 
        );

        return $this->db->insert("establecimiento",$datos);
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

