<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_textos_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get_slider()
    {
        $r = $this->db->query("Select * from slider_textos");
        return $r->result_array();
    }

    
}

