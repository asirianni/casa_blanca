<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Rubros extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("Rubro_model");
    }
    
    public function index()
    {
        $this->abm_rubros();
    }
    
    public function abm_rubros()
    {
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::CONFIGURACION))
        {
            
            $output["css"]=$this->adminlte->get_css_datatables();
            $output["css"].=$this->adminlte->get_css_datetimepicker();
            $output["js"]=$this->adminlte->get_js_datatables();
            $output["js"].=$this->adminlte->get_js_datetimepicker();
            $output["menu"]=$this->adminlte->getMenu();
            $output["header"]=$this->adminlte->getHeader();
            $output["menu_configuracion"]=$this->adminlte->getMenuConfiguracion();
            $output["footer"]=$this->adminlte->getFooter();
                
            $output["rubros"]= $this->Rubro_model->get_rubros();
            
            $this->load->view("back/modulos/configuracion/abm_rubros",$output);
        }
    }
    
    public function administrar_subrubros($id_rubro = null)
    {
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::CONFIGURACION))
        {
            if($id_rubro != null)
            {
                $rubro = $this->Rubro_model->get_rubro($id_rubro);
                
                if($rubro)
                {
                    $output["css"]=$this->adminlte->get_css_datatables();
                    $output["css"].=$this->adminlte->get_css_datetimepicker();
                    $output["js"]=$this->adminlte->get_js_datatables();
                    $output["js"].=$this->adminlte->get_js_datetimepicker();
                    $output["menu"]=$this->adminlte->getMenu();
                    $output["header"]=$this->adminlte->getHeader();
                    $output["menu_configuracion"]=$this->adminlte->getMenuConfiguracion();
                    $output["footer"]=$this->adminlte->getFooter();

                    $output["rubro"]=$rubro;
                    $output["subrubros"]= $this->Rubro_model->get_subrubros_de_rubro($id_rubro);

                    $this->load->view("back/modulos/configuracion/administrar_subrubros",$output);
                }
                else {
                    redirect("Rubros");
                }
            }
            else {
                redirect("Rubros");
            }
        }
    }

    public function agregar_rubro()
    {
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::CONFIGURACION))
        {
            if($this->input->post())
            {
                $respuesta = array("respuesta"=>false);

                $rubro = trim($this->input->post("rubro_agregar"));
                $mostrar = $this->input->post("mostrar_agregar");
                
                $row = $this->Rubro_model->agregar_rubro($rubro,$mostrar);

                if($row)
                {
                    $respuesta["respuesta"]= true;
                    $respuesta["row"]= $row;
                }
                
                echo json_encode($respuesta);
            }
        }
    }
    
    public function editar_rubro()
    {
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::CONFIGURACION))
        {
            if($this->input->post())
            {
                $respuesta = array("respuesta"=>false);

                $id = $this->input->post("id_editar");
                $rubro = $this->input->post("rubro_editar");
                $mostrar = $this->input->post("mostrar_editar");
                
                $row = $this->Rubro_model->editar_rubro($id,$rubro,$mostrar);

                if($row)
                {
                    $respuesta["respuesta"]= true;
                    $respuesta["row"]= $row;
                }
                
                echo json_encode($respuesta);
            }
        }
    }

    public function agregar_subrubro()
    {
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::CONFIGURACION))
        {
            if($this->input->post())
            {
                $respuesta = array("respuesta"=>false);

                $rubro= $this->input->post("id_rubro_agregar");
                $subrubro = $this->input->post("subrubro_agregar");
                $mostrar = $this->input->post("mostrar_agregar");
                
                $row = $this->Rubro_model->agregar_subrubro($rubro,$subrubro,$mostrar);

                if($row)
                {
                    $respuesta["respuesta"]= true;
                    $respuesta["row"]= $row;
                }
                
                echo json_encode($respuesta);
            }
        }
    }
    
    public function editar_subrubro()
    {
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::CONFIGURACION))
        {
            if($this->input->post())
            {
                $respuesta = array("respuesta"=>false);

                $id= $this->input->post("id_editar");
                $rubro= $this->input->post("id_rubro_editar");
                $subrubro = $this->input->post("subrubro_editar");
                $mostrar = $this->input->post("mostrar_editar");
                
                $row = $this->Rubro_model->editar_subrubro($id,$subrubro,$mostrar);

                if($row)
                {
                    $respuesta["respuesta"]= true;
                    $respuesta["row"]= $row;
                }
                
                echo json_encode($respuesta);
            }
        }
    }
    
    public function eliminar_subrubro()
    {
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::CONFIGURACION))
        {
            if($this->input->post())
            {
                $respuesta = array("respuesta"=>false);

                $id= $this->input->post("id_eliminar");
                $rubro= $this->input->post("id_rubro_eliminar");
                
                $respuesta["respuesta"]= $this->Rubro_model->eliminar_subrubro($id);
                
                echo json_encode($respuesta);
            }
        }
    }
    

    public function eliminar_rubro()
    {
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::CONFIGURACION) 
            && $this->input->is_ajax_request())
        {
            $respuesta = array("respuesta"=>false);

            $id = $this->input->post("id_eliminar");
            
            if(is_numeric($id))
            {
                $respuesta["respuesta"]= $this->Rubro_model->eliminar_rubro($id);;
            }
            
            echo json_encode($respuesta);
        }
    }

    public function get_rubro()
    {
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::CONFIGURACION) 
            && $this->input->is_ajax_request())
        {

            $id = $this->input->post("id");
            $respuesta = array("respuesta"=>false);

            if(is_numeric($id))
            {
                $row = $this->Rubro_model->get_rubro($id);
            
                if($row)
                {
                    $respuesta["respuesta"]=true;
                    $respuesta["row"]=$row;
                }
            }
            
            echo json_encode($respuesta);
        }
    }

    public function get_subrubro()
    {
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::CONFIGURACION) 
            && $this->input->is_ajax_request())
        {

            $id = $this->input->post("id");
            $respuesta = array("respuesta"=>false);

            if(is_numeric($id))
            {
                $row = $this->Rubro_model->get_subrubro($id);
            
                if($row)
                {
                    $respuesta["respuesta"]=true;
                    $respuesta["row"]=$row;
                }
            }
            
            echo json_encode($respuesta);
        }
    }

    public function get_rubro_busqueda_select2()
    {
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::CONFIGURACION) 
            && $this->input->is_ajax_request())
        {

            $respuesta = $this->Rubro_model->get_rubro_busqueda_select2($this->input->post("q"));
            
            echo json_encode($respuesta);
        }
    }

    public function get_subrubro_busqueda_select2()
    {
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::CONFIGURACION) 
            && $this->input->is_ajax_request())
        {

            $respuesta = $this->Rubro_model->get_subrubro_busqueda_select2($this->input->post("q"),$this->input->post("id_rubro"));
            
            echo json_encode($respuesta);
        }
    }
}

