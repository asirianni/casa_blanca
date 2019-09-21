<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Marcas_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get_marcas()
    {
        $r = $this->db->query("Select * from marcas");
        return $r->result_array();
    }

    
}