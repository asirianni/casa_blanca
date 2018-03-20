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
            
            $output["presupuestos"]= $this->Presupuesto_model->get_presupuestos();
            
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

                $nombre_organizacion = $this->input->post("nombre_organizacion");
                $direccion = $this->input->post("direccion");
                $localidad = $this->input->post("localidad");
                $telefono = $this->input->post("telefono");
                $correo = $this->input->post("correo");
                $rector = $this->input->post("rector");
                $referente = $this->input->post("referente");

                $respuesta = $this->Presupuesto_model->agregar_presupuesto($fecha,$fecha_llegada,$establecimiento,$usuario,$docente_a_cargo,$grado,$acompaniantes,$anio,$curso,$ciclo,$perfil,$mujeres,$varones,$total,$descuento_general,$estado,$usuarios_correo );

                echo json_encode($respuesta);
            }
            else
            {
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
                
                $this->load->view("back/modulos/presupuestos/agregar_presupuesto",$output);
            }
        }
    }
    

    public function editar()
    {
        $respuesta = false;

        if($this->input->is_ajax_request() && $this->funciones_generales->dar_permiso_a_modulo(Modulos::PRESUPUESTOS))
        {
            $id = $this->input->post("id");
            $nombre_organizacion = $this->input->post("nombre_organizacion");
            $direccion = $this->input->post("direccion");
            $localidad = $this->input->post("localidad");
            $telefono = $this->input->post("telefono");
            $correo = $this->input->post("correo");
            $rector = $this->input->post("rector");
            $referente = $this->input->post("referente");

            $respuesta = $this->Presupuesto_model->editar_establecimiento($id,$nombre_organizacion,$direccion,$localidad,$telefono,$correo,$rector,$referente);
        }

        echo json_encode($respuesta);
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
                    $this->load->model("Presupuesto_model");
                    
                    $output["presupuesto"]=$presupuesto = $this->Presupuesto_model->get_presupuesto($numero);
                    $output["detalle_presupuesto"]=$this->Presupuesto_model->get_detalle_presupuesto($numero);
                    
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
