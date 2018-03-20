<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Instituciones extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("Establecimiento_model");
    }

    public function abm_instituciones()
    {
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::INSTITUCIONES))
        {
            $output["css"]=$this->adminlte->get_css_datatables();
            $output["css"].=$this->adminlte->get_css_select2();
            $output["js"]=$this->adminlte->get_js_datatables();
            $output["js"].=$this->adminlte->get_js_select2();
            $output["menu"]=$this->adminlte->getMenu();
            $output["header"]=$this->adminlte->getHeader();
            $output["menu_configuracion"]=$this->adminlte->getMenuConfiguracion();
            $output["footer"]=$this->adminlte->getFooter();
            
            $output["instituciones"]= $this->Establecimiento_model->get_establecimientos();
            
            $this->load->view("back/modulos/instituciones/abm_instituciones",$output);
        }
        else
        {
            redirect($this->funciones_generales->redireccionar_usuario());
        }
    }

    public function get_institucion()
    {
        $respuesta = false;

        if($this->input->is_ajax_request() && $this->funciones_generales->dar_permiso_a_modulo(Modulos::INSTITUCIONES))
        {
            $respuesta = $this->Establecimiento_model->get_establecimiento($this->input->post("id"));
        }

        echo json_encode($respuesta);
    }

    public function agregar()
    {
        $respuesta = false;

        if($this->input->is_ajax_request() && $this->funciones_generales->dar_permiso_a_modulo(Modulos::INSTITUCIONES))
        {
            $nombre_organizacion = $this->input->post("nombre_organizacion");
            $direccion = $this->input->post("direccion");
            $localidad = $this->input->post("localidad");
            $telefono = $this->input->post("telefono");
            $correo = $this->input->post("correo");
            $rector = $this->input->post("rector");
            $referente = $this->input->post("referente");

            $respuesta = $this->Establecimiento_model->agregar_establecimiento($nombre_organizacion,$direccion,$localidad,$telefono,$correo,$rector,$referente);
        }

        echo json_encode($respuesta);
    }
    

    public function editar()
    {
        $respuesta = false;

        if($this->input->is_ajax_request() && $this->funciones_generales->dar_permiso_a_modulo(Modulos::INSTITUCIONES))
        {
            $id = $this->input->post("id");
            $nombre_organizacion = $this->input->post("nombre_organizacion");
            $direccion = $this->input->post("direccion");
            $localidad = $this->input->post("localidad");
            $telefono = $this->input->post("telefono");
            $correo = $this->input->post("correo");
            $rector = $this->input->post("rector");
            $referente = $this->input->post("referente");

            $respuesta = $this->Establecimiento_model->editar_establecimiento($id,$nombre_organizacion,$direccion,$localidad,$telefono,$correo,$rector,$referente);
        }

        echo json_encode($respuesta);
    }

    public function eliminar()
    {
        $respuesta = false;

        if($this->input->is_ajax_request() && $this->funciones_generales->dar_permiso_a_modulo(Modulos::INSTITUCIONES))
        {
            $id = $this->input->post("id");
            $respuesta = $this->Establecimiento_model->eliminar_establecimiento($id);
        }

        echo json_encode($respuesta);
    }
} 
