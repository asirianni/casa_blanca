<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
        public function __construct(){
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('session');
            $this->load->library('grocery_CRUD');
            $this->load->model("Configuracion_empresa_model");
            $this->load->model("Slider_textos_model");
            $this->load->model("Marcas_model");
            $this->load->model("Producto_model");
            $this->load->model("Nosotros_model");

        }
    
	public function index()
	{
            $salida["title"]="Districart";
            $salida["home"]=true;
            $salida["nosotros"]=false;
            $salida["productos"]=false;
            $salida["marcas"]=false;
            $salida["contacto"]=false;
            $salida["slider_textos"]=true;
            $salida["slider"]=$this->Slider_textos_model->get_slider();
            $salida["marcas_cargadas"]=$this->Marcas_model->get_marcas();
            $salida= $this->configuraciones($salida);
            $this->load->view('header_home', $salida);
            $this->load->view('marcas', $salida);
            $this->load->view('footer');
	}
        public function nosotros()
	{
            $salida["title"]="Districart";
            $salida["home"]=false;
            $salida["nosotros"]=true;
            $salida["productos"]=false;
            $salida["marcas"]=false;
            $salida["contacto"]=false;
            $salida["slider_textos"]=false;
            $nosotros=$this->Nosotros_model->get_nosotros();
            $salida["titulo_nosotros"]=$nosotros["titulo"];
            $salida["leyenda"]=$nosotros["leyenda"];
            $salida["texto"]=$nosotros["texto"];
            $salida= $this->configuraciones($salida);
            $this->load->view('header_home', $salida);
            $this->load->view('nosotros', $salida);
            $this->load->view('footer');
	}
        public function productos()
	{
            $salida["title"]="Districart";
            $salida["home"]=false;
            $salida["nosotros"]=false;
            $salida["productos"]=true;
            $salida["marcas"]=false;
            $salida["contacto"]=false;
            $salida["slider_textos"]=false;
            $salida= $this->configuraciones($salida);
            $salida["productos"]=$this->Producto_model->get_productos();
            $this->load->view('header_home', $salida);
            $this->load->view('productos', $salida);
            $this->load->view('footer');
	}
        public function marcas()
	{
            $salida["title"]="Districart";
            $salida["home"]=false;
            $salida["nosotros"]=false;
            $salida["productos"]=false;
            $salida["marcas"]=true;
            $salida["contacto"]=false;
            $salida["slider_textos"]=false;
            $salida= $this->configuraciones($salida);
            $salida["marcas_cargadas"]=$this->Marcas_model->get_marcas();
            $this->load->view('header_home', $salida);
            $this->load->view('marcas', $salida);
            $this->load->view('footer');
	}
        public function contacto()
	{
            $salida["title"]="Districart";
            $salida["home"]=false;
            $salida["nosotros"]=false;
            $salida["productos"]=false;
            $salida["marcas"]=false;
            $salida["contacto"]=true;
            $salida["slider_textos"]=false;
            $salida= $this->configuraciones($salida);
            $this->load->view('header_home', $salida);
            $this->load->view('contacto', $salida);
            $this->load->view('footer');
	}
        
        public function adm_textos()
	{
            try{
                    $crud = new grocery_CRUD();

                    $crud->set_theme('datatables');
                    $crud->set_table('slider_textos');
                    
                    $output = $crud->render();
                    $this->session->set_userdata('title', 'Textos Slider Home');
                    $this->_example_output($output);

            }catch(Exception $e){
                    show_error($e->getMessage().' --- '.$e->getTraceAsString());
            }
	}
        
        public function adm_nosotros()
	{
            try{
                    $crud = new grocery_CRUD();

                    $crud->set_theme('datatables');
                    $crud->set_table('nosotros');
                    $crud->unset_delete();
                    $crud->unset_add();
                    $crud->required_fields('titulo','leyenda','texto');
                    $output = $crud->render();
                    $this->session->set_userdata('title', 'Nosotros');
                    $this->_example_output($output);

            }catch(Exception $e){
                    show_error($e->getMessage().' --- '.$e->getTraceAsString());
            }
	}
        
        
        
        public function adm_productos()
	{
            try{
                    $crud = new grocery_CRUD();

                    $crud->set_theme('datatables');
                    $crud->set_table('productos');
                    $crud->required_fields('imagen');
                    $crud->set_field_upload('imagen','recursos/images/productos');
                    $output = $crud->render();
                    $this->session->set_userdata('title', 'Productos Destacados');
                    $this->_example_output($output);

            }catch(Exception $e){
                    show_error($e->getMessage().' --- '.$e->getTraceAsString());
            }
	}
        
        public function adm_marcas()
	{
            try{
                    $crud = new grocery_CRUD();

                    $crud->set_theme('datatables');
                    $crud->set_table('marcas');
                    $crud->required_fields('imagen');
                    $crud->set_field_upload('imagen','recursos/images/marcas');
                    $output = $crud->render();
                    $this->session->set_userdata('title', 'Marcas');
                    $this->_example_output($output);

            }catch(Exception $e){
                    show_error($e->getMessage().' --- '.$e->getTraceAsString());
            }
	}
        
        public function adm_configuraciones()
	{
            try{
                    $crud = new grocery_CRUD();
                    $crud->unset_delete();
                    $crud->unset_add();
                    $crud->unset_edit_fields('configuracion');
                    
                    $crud->set_theme('datatables');
                    $crud->set_table('configuraciones');
                    $output = $crud->render();
                    $this->session->set_userdata('title', 'Configuraciones');
                    $this->_example_output($output);

            }catch(Exception $e){
                    show_error($e->getMessage().' --- '.$e->getTraceAsString());
            }
	}
        
        public function _example_output($output = null)
	{
            $this->load->view('example.php',(array)$output);
	}
        
        private function configuraciones($datos){
            //datos buenos aires
            $datos["bad"]= $this->Configuracion_empresa_model->get_configuracion(1);
            $datos["bat"]= $this->Configuracion_empresa_model->get_configuracion(2);
            $datos["bac"]= $this->Configuracion_empresa_model->get_configuracion(3);
            //datos cordoba
            $datos["cd"]= $this->Configuracion_empresa_model->get_configuracion(4);
            $datos["ct"]= $this->Configuracion_empresa_model->get_configuracion(5);
            $datos["cc"]= $this->Configuracion_empresa_model->get_configuracion(6);
            //redes sociales
            $datos["tw"]= $this->Configuracion_empresa_model->get_configuracion(7);
            $datos["fac"]= $this->Configuracion_empresa_model->get_configuracion(8);
            $datos["gmas"]= $this->Configuracion_empresa_model->get_configuracion(9);
            $datos["lk"]= $this->Configuracion_empresa_model->get_configuracion(10);
            
            return $datos;
            
        }
}
