<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Anuncio extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("Anuncios_model");
    }
    
    public function index()
    {
        $this->abm_provincias();
    }
    
    public function abm_anuncios()
    {
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::CONFIGURACION))
        {
            
            $output["css"]=$this->adminlte->get_css_select2();
            $output["css"].=$this->adminlte->get_css_datetimepicker();
            $output["css"].=$this->adminlte->get_css_datatables();
            $output["js"]=$this->adminlte->get_js_select2();
            $output["js"].=$this->adminlte->get_js_datetimepicker();
            $output["js"].=$this->adminlte->get_js_datatables();
            $output["menu"]=$this->adminlte->getMenu();
            $output["header"]=$this->adminlte->getHeader();
            $output["menu_configuracion"]=$this->adminlte->getMenuConfiguracion();
            $output["footer"]=$this->adminlte->getFooter();
                
            $output["listado"]= $this->Anuncios_model->get_anuncios_con_relaciones();
            $output["estados_anuncio"]= $this->Anuncios_model->get_estados_anuncio();
            $output["tipos_anuncio"]= $this->Anuncios_model->get_tipos_anuncio();
            
            $this->load->view("back/modulos/anuncios/abm_anuncios",$output);
        }
    }

    public function agregar_anuncio()
    {
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::CONFIGURACION) 
            && $this->input->is_ajax_request())
        {
            $respuesta = array("respuesta"=>false);

            $id_usuario = $this->session->userdata("id");
            
            $fecha_creacion = $this->input->post("fecha_creacion");
            $fecha_creacion= DateTime::createFromFormat("d-m-Y H:i:s",$fecha_creacion);
            $fecha_creacion= $fecha_creacion->format("Y-m-d H:i:s");
            
            $visitas = $this->input->post("visitas");
            $titulo = $this->input->post("titulo");
            $descripcion = $this->input->post("descripcion");
            $precio = $this->input->post("precio");
            $sub_rubro = $this->input->post("sub_rubro");
            $rubro = $this->input->post("rubro");
            $estado_anuncio = $this->input->post("estado_anuncio");
            $tipo_anuncio = $this->input->post("tipo_anuncio");

            $row = $this->Anuncios_model->agregar_anuncio($id_usuario , $fecha_creacion , $visitas , $titulo , $descripcion , $precio , $sub_rubro , $rubro , $estado_anuncio , $tipo_anuncio);

            if($row)
            {
                $respuesta["respuesta"]= true;

                $fecha_creacion = $row["fecha_creacion"];
                $fecha_creacion= DateTime::createFromFormat("Y-m-d H:i:s",$fecha_creacion);
                $fecha_creacion= $fecha_creacion->format("d-m-Y H:i:s");

                $respuesta["row"]=$row;
            }

            echo json_encode($respuesta);
        }
    }
    
    public function editar_anuncio()
    {
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::CONFIGURACION) 
            && $this->input->is_ajax_request())
        {
            $respuesta = array("respuesta"=>false);

            $id = $this->input->post("id");
            
            $fecha_creacion = $this->input->post("fecha_creacion");
            $fecha_creacion= DateTime::createFromFormat("d-m-Y H:i:s",$fecha_creacion);
            $fecha_creacion= $fecha_creacion->format("Y-m-d H:i:s");

            $visitas = $this->input->post("visitas");
            $titulo = $this->input->post("titulo");
            $descripcion = $this->input->post("descripcion");
            $precio = $this->input->post("precio");
            $sub_rubro = $this->input->post("sub_rubro");
            $rubro = $this->input->post("rubro");
            $estado_anuncio = $this->input->post("estado_anuncio");
            $tipo_anuncio = $this->input->post("tipo_anuncio");

            $row  = $this->Anuncios_model->editar_anuncio($id , $fecha_creacion , $visitas , $titulo , $descripcion , $precio , $sub_rubro , $rubro , $estado_anuncio , $tipo_anuncio);

            if($row)
            {
                $respuesta["respuesta"]= true;

                $fecha_creacion = $row["fecha_creacion"];
                $fecha_creacion= DateTime::createFromFormat("Y-m-d H:i:s",$fecha_creacion);
                $fecha_creacion= $fecha_creacion->format("d-m-Y H:i:s");

                $respuesta["row"]=$row;
            }

            echo json_encode($respuesta);
        }
    }

    public function eliminar_anuncio()
    {
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::CONFIGURACION) 
            && $this->input->is_ajax_request())
        {

            $respuesta = array("respuesta"=>false);

            $id = $this->input->post("id_eliminar");
            $respuesta["respuesta"] = $this->Anuncios_model->eliminar_anuncio($id);
            echo json_encode($respuesta);
        }
    }

    public function get_anuncio()
    {
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::CONFIGURACION) 
            && $this->input->is_ajax_request())
        {

            $id = $this->input->post("id");
            $respuesta = array("respuesta"=>false);

            if(is_numeric($id))
            {
                $row = $this->Anuncios_model->get_anuncio($id);
            
                if($row)
                {
                    $fecha = $row["fecha_creacion"];

                    $fecha = DateTime::createFromFormat("Y-m-d H:i:s",$fecha);
                    $fecha = $fecha->format("d-m-Y H:i:s");
                    $row["fecha_creacion"]= $fecha;

                    $respuesta["respuesta"]=true;
                    $respuesta["row"]=$row;
                }
            }
            
            echo json_encode($respuesta);
        }
    }
}

