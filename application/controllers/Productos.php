<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("Producto_model");
    }

    public function abm_productos()
    {
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::PRODUCTOS))
        {
            $output["css"]=$this->adminlte->get_css_datatables();
            $output["css"].=$this->adminlte->get_css_select2();
            $output["js"]=$this->adminlte->get_js_datatables();
            $output["js"].=$this->adminlte->get_js_select2();
            $output["menu"]=$this->adminlte->getMenu();
            $output["header"]=$this->adminlte->getHeader();
            $output["menu_configuracion"]=$this->adminlte->getMenuConfiguracion();
            $output["footer"]=$this->adminlte->getFooter();
            
            $output["productos"]= $this->Producto_model->get_productos();
            
            $this->load->view("back/modulos/productos/abm_productos",$output);
        }
        else
        {
            redirect($this->funciones_generales->redireccionar_usuario());
        }
    }

    public function get_producto()
    {
        $respuesta = false;

        if($this->input->is_ajax_request() && $this->funciones_generales->dar_permiso_a_modulo(Modulos::PRODUCTOS))
        {
            $respuesta = $this->Producto_model->get_producto($this->input->post("id"));
        }

        echo json_encode($respuesta);
    }

    public function agregar()
    {
        $respuesta = false;

        if($this->input->is_ajax_request() && $this->funciones_generales->dar_permiso_a_modulo(Modulos::PRODUCTOS))
        {
            $descripcion = $this->input->post("descripcion");
            $rubro = $this->input->post("rubro");
            $precio = $this->input->post("precio");
            $mostrar = $this->input->post("mostrar");

            $respuesta = $this->Producto_model->agregar_producto($descripcion,$rubro,$precio,$mostrar);
        }

        echo json_encode($respuesta);
    }
    

    public function editar()
    {
        $respuesta = false;

        if($this->input->is_ajax_request() && $this->funciones_generales->dar_permiso_a_modulo(Modulos::PRODUCTOS))
        {
            $id = $this->input->post("id");
            $descripcion = $this->input->post("descripcion");
            $rubro = $this->input->post("rubro");
            $precio = $this->input->post("precio");
            $mostrar = $this->input->post("mostrar");

            $respuesta = $this->Producto_model->editar_producto($id,$descripcion,$rubro,$precio,$mostrar);
        }

        echo json_encode($respuesta);
    }

    public function eliminar()
    {
        $respuesta = false;

        if($this->input->is_ajax_request() && $this->funciones_generales->dar_permiso_a_modulo(Modulos::PRODUCTOS))
        {
            $id = $this->input->post("id");
            $respuesta = $this->Producto_model->eliminar_producto($id);
        }

        echo json_encode($respuesta);
    }

    public function exportar_productos_excel()
    {
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::PRODUCTOS))
        {
            header('Content-Encoding: UTF-8');
            header("Content-type: application/vnd.ms-excel; charset=UTF-8; name='excel'");
            header("Content-Disposition: filename=Lista-de-Productos.xls");
            header("Pragma: no-cache");
            header("Expires: 0");
            
            $productos= $this->Producto_model->get_productos();
            
            $html=
            "
            <table>
                <thead>
                  <tr >
                    <th>Descripcion</th>
                    <th>Rubro</th>
                    <th>Precio</th>
                    <th>Mostrar</th>
                  </tr>
                </thead>
                <tbody> ";
                  foreach ($productos as $value)
                  { 
             $html.= "<tr>
                        <td>".utf8_decode($value["descripcion"])."</td>
                        <td>".utf8_decode($value["rubro_rubro"])."</td>
                        <td>".utf8_decode($value["precio"])."</td>
                        <td>".utf8_decode($value["mostrar"])."</td>
                    </tr>";
                }
       $html.= "</tbody>
        </table>";
            
            echo $html;
        }
    }
} 
