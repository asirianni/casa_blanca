<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Producto_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }

    public function get_cantidad()
    {
        $r = $this->db->query("select count(id) as cantidad from productos");
        $r = $r->row_array();
        return $r["cantidad"];
    }

    public function get_productos()
    {
        $r = $this->db->query("select productos.*,rubro.rubro as rubro_rubro from productos LEFT JOIN rubro on rubro.id = productos.rubro ");
        return $r->result_array();
    }

    public function get_productos_visibles()
    {
        $r = $this->db->query("select productos.*,rubro.rubro as rubro_rubro from productos LEFT JOIN rubro on rubro.id = productos.rubro where productos.mostrar = 'si'");
        return $r->result_array();
    }

    public function get_producto($id)
    {
        $r = $this->db->query("select productos.*,rubro.rubro as rubro_rubro from productos LEFT JOIN rubro on rubro.id = productos.rubro where productos.id = ?",array($id));
        return $r->row_array();
    }

    public function agregar_producto($descripcion,$rubro,$precio,$mostrar)
    {
        $datos = Array(
            "descripcion"=>$descripcion,
            "rubro" => $rubro,
            "precio" =>$precio,
            "mostrar"=>$mostrar,
        );

        return $this->db->insert("productos",$datos);
    }

    public function editar_producto($id,$descripcion,$rubro,$precio,$mostrar)
    {
        $datos = Array(
            "descripcion"=>$descripcion,
            "rubro" => $rubro,
            "precio" =>$precio,
            "mostrar"=>$mostrar,
        );

        $this->db->where("id",$id);
        return $this->db->update("productos",$datos);
    }

    public function eliminar_producto($id)
    {
        $this->db->where("id",$id);
        return $this->db->delete("productos");
    }
    
}

