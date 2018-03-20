<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Localidades extends MY_controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model("Localidades_model");
	}

	public function abm_localidades($id_provincia = null)
	{
		if($this->funciones_generales->dar_permiso_a_modulo(Modulos::CONFIGURACION))
        {
        	$output["css"]=$this->adminlte->get_css_datatables();
            $output["css"].=$this->adminlte->get_css_select2();
            $output["js"]=$this->adminlte->get_js_datatables();
            $output["js"].=$this->adminlte->get_js_select2();
            $output["menu"]=$this->adminlte->getMenu();
            $output["header"]=$this->adminlte->getHeader();
            $output["menu_configuracion"]=$this->adminlte->getMenuConfiguracion();
            $output["footer"]=$this->adminlte->getFooter();
                

            $output["localidades"]= null;
            $output["id_provincia"]=$id_provincia;

            if($id_provincia != null)
            {
            	 $output["localidades"]= $this->Localidades_model->get_localidades_por_provincia($id_provincia);
            }
            else
            {
				$output["localidades"]= $this->Localidades_model->get_localidades();
            }
            
            $this->load->view("back/modulos/configuracion/abm_localidades",$output);
        }
	}

	public function agregar_localidad()
	{
		if($this->funciones_generales->dar_permiso_a_modulo(Modulos::CONFIGURACION) 
			&& $this->input->is_ajax_request())
        {
        	$respuesta = array("respuesta"=>false);

        	$localidad_agregar = trim($this->input->post("localidad_agregar"));
        	$provincia_agregar = $this->input->post("provincia_agregar");

        	if(is_numeric($provincia_agregar) && $localidad_agregar != "")
        	{
        		$row = $this->Localidades_model->agregar_localidad($localidad_agregar,$provincia_agregar);
        		if($row)
        		{
        			$respuesta["respuesta"]=true;
        			$respuesta["row"]= $row;
        		}
        	}
        	
        	echo json_encode($respuesta);
        }
	}

	public function editar_localidad()
	{
		if($this->funciones_generales->dar_permiso_a_modulo(Modulos::CONFIGURACION) 
			&& $this->input->is_ajax_request())
        {
        	$respuesta = array("respuesta"=>false);

        	$id = trim($this->input->post("id_editar"));
        	$localidad_editar = trim($this->input->post("localidad_editar"));
        	$provincia_editar = $this->input->post("provincia_editar");

        	if(is_numeric($provincia_editar) && $localidad_editar != "" && is_numeric($id))
        	{
        		$row = $this->Localidades_model->editar_localidad($id,$localidad_editar,$provincia_editar);
        		if($row)
        		{
        			$respuesta["respuesta"]=true;
        			$respuesta["row"]= $row;
        		}
        	}
        	
        	echo json_encode($respuesta);
        }
	}

	public function eliminar_localidad()
	{
		if($this->funciones_generales->dar_permiso_a_modulo(Modulos::CONFIGURACION) 
			&& $this->input->is_ajax_request())
        {
        	$respuesta = array("respuesta"=>false);

        	$id = trim($this->input->post("id_eliminar"));
        	

        	if(is_numeric($id))
        	{
        		$respuesta["respuesta"]= $this->Localidades_model->eliminar_localidad($id);
        	}
        	
        	echo json_encode($respuesta);
        }
	}
	public function get_localidad_busqueda_select2()
	{
		if($this->funciones_generales->dar_permiso_a_modulo(Modulos::CONFIGURACION) 
			&& $this->input->is_ajax_request())
        {

        	$respuesta = $this->Localidades_model->get_localidad_busqueda_select2($this->input->post("q"));
			
			echo json_encode($respuesta);
		}
	}

	public function get_localidad()
	{
		if($this->funciones_generales->dar_permiso_a_modulo(Modulos::CONFIGURACION) 
			&& $this->input->is_ajax_request())
        {

        	$id = $this->input->post("id");
        	$respuesta = array("respuesta"=>false);

        	if(is_numeric($id))
        	{
        		$row = $this->Localidades_model->get_localidad($id);
			
				if($row)
				{
					$respuesta["respuesta"]=true;
					$respuesta["row"]=$row;
				}
        	}
        	
			echo json_encode($respuesta);
		}
	}
}				