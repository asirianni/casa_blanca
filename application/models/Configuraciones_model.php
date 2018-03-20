<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Configuraciones_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get_configuraciones()
    {
        $r = $this->db->query("select configuraciones.* from configuraciones");
        return $r->result_array();
    }

    public function get_titulo_login()
    {
        $r = $this->db->query("select configuraciones.* from configuraciones where id = 3");
        return $r->row_array();
    }

    public function get_link_pie()
    {
        $r = $this->db->query("select configuraciones.* from configuraciones where id = 2");
        return $r->row_array();
    }

    public function get_texto_pie()
    {
        $r = $this->db->query("select configuraciones.* from configuraciones where id = 1");
        return $r->row_array();
    }
    
}

