<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Presupuestos extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("Presupuesto_model");
    }

    public function abm_presupuestos()
    {
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::PRESUPUESTOS))
        {
            $this->load->model("Establecimiento_model");

            $output["css"]=$this->adminlte->get_css_datatables();
            $output["css"].=$this->adminlte->get_css_select2();
            $output["css"].=$this->adminlte->get_css_datetimepicker();
            $output["js"]=$this->adminlte->get_js_datatables();
            $output["js"].=$this->adminlte->get_js_select2();
            $output["js"].=$this->adminlte->get_js_datetimepicker();
            $output["menu"]=$this->adminlte->getMenu();
            $output["header"]=$this->adminlte->getHeader();
            $output["menu_configuracion"]=$this->adminlte->getMenuConfiguracion();
            $output["footer"]=$this->adminlte->getFooter();
            
            $desde = date("Y-m")."-01";
            $hasta = date("Y-m")."-".date("d",(mktime(0,0,0,date("m")+1,1,date("Y"))-1));
            $institucion = 0;

            if($this->input->post("desde") || $this->input->post("hasta") || $this->input->post("institucion"))
            {
                $desde = $this->input->post("desde");
                $hasta = $this->input->post("hasta");
                $institucion = $this->input->post("institucion");
            }

            $output["presupuestos"]= $this->Presupuesto_model->get_presupuestos_with_filters($desde,$hasta,$institucion);
            $output["desde"]=$desde;
            $output["hasta"]=$hasta;
            $output["institucion"]=$this->Establecimiento_model->get_establecimiento($institucion);

            $this->load->view("back/modulos/presupuestos/abm_presupuestos",$output);
        }
        else
        {
            redirect($this->funciones_generales->redireccionar_usuario());
        }
    }

    public function get_presupuesto()
    {
        $respuesta = false;

        if($this->input->is_ajax_request() && $this->funciones_generales->dar_permiso_a_modulo(Modulos::PRESUPUESTOS))
        {
            $respuesta = $this->Presupuesto_model->get_presupuesto($this->input->post("id"));
        }

        echo json_encode($respuesta);
    }

    public function agregar()
    {
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::PRESUPUESTOS))
        {
            if($this->input->is_ajax_request() && $this->input->post())
            {
                $respuesta = false;

                $fecha = $this->input->post("fecha");
                $establecimiento = $this->input->post("establecimiento");
                $fecha_llegada = $this->input->post("fecha_llegada");
                $direccion = $this->input->post("direccion");
                $localidad = $this->input->post("localidad");
                $docente_a_cargo = $this->input->post("docente_a_cargo");
                $grado = $this->input->post("grado");
                $acompaniantes = $this->input->post("acompaniante");
                $anio = $this->input->post("anio");
                $mujeres = $this->input->post("mujeres");
                $varones = $this->input->post("varones");
                $perfil = $this->input->post("perfil");
                $detalle = $this->input->post("detalle");
                $curso = $this->input->post("curso");
                $ciclo = $this->input->post("ciclo");
                $descuento_general = $this->input->post("descuento_general");
                $estado = $this->input->post("estado");
                $direccion = $this->input->post("direccion");
                $localidad = $this->input->post("localidad");

                $usuario = $this->session->userdata("id");
               
                
                $respuesta = $this->Presupuesto_model->agregar_presupuesto($fecha,$fecha_llegada,$establecimiento,$usuario,$docente_a_cargo,$grado,$acompaniantes,$anio,$curso,$ciclo,$perfil,$mujeres,$varones,$descuento_general,$estado,$detalle,$direccion,$localidad);

                echo json_encode($respuesta);
            }
            else
            {
                $this->load->model("Producto_model");
                $this->load->model("Rubro_model");
                $this->load->model("Configuracion_empresa_model");

                $output["css"]=$this->adminlte->get_css_datatables();
                $output["css"].=$this->adminlte->get_css_select2();
                $output["css"].=$this->adminlte->get_css_datetimepicker();
                $output["js"]=$this->adminlte->get_js_datatables();
                $output["js"].=$this->adminlte->get_js_select2();
                $output["js"].=$this->adminlte->get_js_datetimepicker();
                $output["menu"]=$this->adminlte->getMenu();
                $output["header"]=$this->adminlte->getHeader();
                $output["menu_configuracion"]=$this->adminlte->getMenuConfiguracion();
                $output["footer"]=$this->adminlte->getFooter();
                
                $output["numero_proximo"]= $this->Presupuesto_model->get_proximo_numero();

                $output["productos"]= $this->Producto_model->get_productos_visibles();
                $output["rubros"]= $this->Rubro_model->get_rubros_visibles();
                $output["logo"]=$this->Configuracion_empresa_model->get_configuracion(3);
                
                $this->load->view("back/modulos/presupuestos/agregar_presupuesto",$output);
            }
        }
    }
    

    public function editar($numero_presupuesto = null)
    {
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::PRESUPUESTOS))
        {
             if($this->input->is_ajax_request() && $this->input->post())
            {
                $respuesta = false;

                $numero_presupuesto = $this->input->post("numero_presupuesto");
                $fecha = $this->input->post("fecha");
                $establecimiento = $this->input->post("establecimiento");
                $fecha_llegada = $this->input->post("fecha_llegada");
                $direccion = $this->input->post("direccion");
                $localidad = $this->input->post("localidad");
                $docente_a_cargo = $this->input->post("docente_a_cargo");
                $grado = $this->input->post("grado");
                $acompaniantes = $this->input->post("acompaniante");
                $anio = $this->input->post("anio");
                $mujeres = $this->input->post("mujeres");
                $varones = $this->input->post("varones");
                $perfil = $this->input->post("perfil");
                $detalle = $this->input->post("detalle");
                $curso = $this->input->post("curso");
                $ciclo = $this->input->post("ciclo");
                $descuento_general = $this->input->post("descuento_general");
                $estado = $this->input->post("estado");
                $direccion = $this->input->post("direccion");
                $localidad = $this->input->post("localidad");

                $usuario = $this->session->userdata("id");
               
                
                $respuesta = $this->Presupuesto_model->editar_presupuesto($numero_presupuesto,$fecha,$fecha_llegada,$establecimiento,$usuario,$docente_a_cargo,$grado,$acompaniantes,$anio,$curso,$ciclo,$perfil,$mujeres,$varones,$descuento_general,$estado,$detalle,$direccion,$localidad);

                echo json_encode($respuesta);
            }
            else
            {
                $presupuesto_row = $this->Presupuesto_model->get_presupuesto($numero_presupuesto);

                if($presupuesto_row)
                {
                    $this->load->model("Producto_model");
                    $this->load->model("Rubro_model");
                    $this->load->model("Configuracion_empresa_model");
                    $this->load->model("Establecimiento_model");
                    $this->load->model("Localidades_model");
                    
                    $output["css"]=$this->adminlte->get_css_datatables();
                    $output["css"].=$this->adminlte->get_css_select2();
                    $output["css"].=$this->adminlte->get_css_datetimepicker();
                    $output["js"]=$this->adminlte->get_js_datatables();
                    $output["js"].=$this->adminlte->get_js_select2();
                    $output["js"].=$this->adminlte->get_js_datetimepicker();
                    $output["menu"]=$this->adminlte->getMenu();
                    $output["header"]=$this->adminlte->getHeader();
                    $output["menu_configuracion"]=$this->adminlte->getMenuConfiguracion();
                    $output["footer"]=$this->adminlte->getFooter();
                    
                    $output["numero_proximo"]= $this->Presupuesto_model->get_proximo_numero();

                    $output["productos"]= $this->Producto_model->get_productos_visibles();
                    $output["rubros"]= $this->Rubro_model->get_rubros_visibles();
                    $output["logo"]=$this->Configuracion_empresa_model->get_configuracion(3);
                    

                    $output["presupuesto"]= $this->Presupuesto_model->get_presupuesto($numero_presupuesto);
                    $output["detalle_presupuesto"]=$this->Presupuesto_model->get_detalle_presupuesto($numero_presupuesto);
                    $output["institucion"]=$this->Establecimiento_model->get_establecimiento($output["presupuesto"]["establecimiento"]);
                    $output["localidad"]= $this->Localidades_model->get_localidad($output["presupuesto"]["localidad"]);

                    $this->load->view("back/modulos/presupuestos/editar_presupuesto",$output);
                }
                else
                {
                    redirect("Login");
                }
            }
        }
    }

    public function eliminar()
    {
        $respuesta = false;

        if($this->input->is_ajax_request() && $this->funciones_generales->dar_permiso_a_modulo(Modulos::PRESUPUESTOS))
        {
            $id = $this->input->post("id");
            $respuesta = $this->Presupuesto_model->eliminar_presupuesto($id);
        }

        echo json_encode($respuesta);
    }

    public function generar_pdf($numero = null)
    {
        if($numero != null)
        {
            if($this->funciones_generales->dar_permiso_a_modulo(Modulos::PRESUPUESTOS))
            {
                $presupuesto = $this->Presupuesto_model->get_presupuesto($numero);

                if($presupuesto)
                {
                    $this->load->model("Configuracion_empresa_model");
                    
                    $output["presupuesto"]=$presupuesto = $this->Presupuesto_model->get_presupuesto($numero);
                    $output["detalle_presupuesto"]=$this->Presupuesto_model->get_detalle_presupuesto($numero);
                    $output["logo"]=$this->Configuracion_empresa_model->get_configuracion(3);
                    //var_dump($output["detalle_presupuesto"]);

                    $this->load->library('mydompdf');
                    $html=$this->load->view("back/modulos/presupuestos/pdf_presupuesto",$output,true);

                        
                    $pdf = new Mydompdf('P', 'mm', 'A4', true, 'UTF-8', false);
                    $pdf->SetCreator(PDF_CREATOR);
                    $pdf->SetAuthor('Marketing Bs As');
                    $pdf->SetTitle('Presupuesto N° '.$presupuesto["numero"]);
                    $pdf->SetSubject('Presupuestos');
                    $pdf->SetKeywords('');
                    $pdf->setFooterData($tc = array(0, 64, 0), $lc = array(0, 64, 128));
                    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
                    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
                    $pdf->SetPrintHeader(false);
                    $pdf->SetPrintFooter(false);
                    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
                    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
                    $pdf->setFontSubsetting(true);
                    $pdf->SetFont('freemono', '', 14, '', true);
                    $pdf->AddPage();
                    
                    $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 0, $fill = 0, $reseth = true, $align = '', $autopadding = true);
             
                    $nombre_archivo = utf8_decode("presupuesto.pdf");
                    $pdf->Output($nombre_archivo, 'I');
                }
            }
        }
    }
} 
