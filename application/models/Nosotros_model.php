<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Nosotros_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get_nosotros()
    {
        $r = $this->db->query("Select * from nosotros where id=1");
        return $r->row_array();
    }

    
}