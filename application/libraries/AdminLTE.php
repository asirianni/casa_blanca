<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH."libraries/adminlte/Header_usuario.php";
require APPPATH."libraries/adminlte/Config.php";
require APPPATH."libraries/adminlte/Menu_Config.php";


class AdminLTE extends Config
{
    public $ci;
    
    private $header;
    private $main_sidebar;
    private $footer;
    
    private $titulo_login= "";
    private $texto_pie = "";
    private $link_pie  = "";

    private $funciones_generales;

    public function __construct() 
    {
        $this->ci = &get_instance();
        $this->ci->load->library("Modulos");

        $this->ci->load->model("Configuraciones_model");
        $this->titulo_login = $this->ci->Configuraciones_model->get_titulo_login();

        $this->link_pie = $this->ci->Configuraciones_model->get_link_pie();
        $this->texto_pie = $this->ci->Configuraciones_model->get_texto_pie();

        $this->ci->load->library("Funciones_generales");
        $this->funciones_generales= new Funciones_generales();
    }
    
    public function getMenu()
    {
        $html= 
                
        "<!-- Left side column. contains the logo and sidebar -->
            <aside class='main-sidebar'>
              <!-- sidebar: style can be found in sidebar.less -->
              <section class='sidebar'>
                <!-- Sidebar user panel -->
                <!--<div class='user-panel'>
                  <div class='pull-left image'>";
                    if($this->permitir_foto_perfil)
                    {
                        $html.="<img src='".base_url()."recursos/images/foto_perfil/".$this->ci->session->userdata("foto_perfil")."' class='img-circle' alt='User Image'>";
                    }
                    else
                    {
                       $html.="<img src='".base_url()."recursos/images/foto_perfil/foto_default.png' class='img-circle' alt='User Image'>"; 
                    }
        $html.="  </div>
                  <div class='pull-left info'>
                    <p>".$this->ci->session->userdata("nombre")." ".$this->ci->session->userdata("apellido")."</p>
                    <a href='#'><i class='fa fa-circle text-success'></i> Online</a>
                  </div>
                </div>-->";
            if($this->permitir_busqueda)
            {
             $html.="<!-- search form -->
                    <form action='".  base_url()."index.php/".$this->controlador_funcion_resultado."' method='get' class='sidebar-form'>
                      <div class='input-group'>
                        <input type='text' name='q' class='form-control' placeholder='Search...'>
                            <span class='input-group-btn'>
                              <button type='submit' name='search' id='search-btn' class='btn btn-flat'><i class='fa fa-search'></i>
                              </button>
                            </span>
                      </div>
                    </form>
                    <!-- /.search form -->";      
            }
                
       $html.=" <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class='sidebar-menu'>
                  <li class='header'>MENU DE NAVEGACION</li>

                  <li><a href='".base_url()."index.php/Escritorio'><i class='fa fa-desktop'></i> <span>ESCRITORIO</span></a></li>";
       
                  
                  // SE AGREGA TAMBIEN LOS MODULOS A LOS QUE TIENE ACCESO
                 
                 $id_tipo_usuario= $this->ci->session->userdata("tipo_usuario");

                if($id_tipo_usuario == 1 || $this->funciones_generales->dar_permiso_a_modulo(Modulos::USUARIOS,$id_tipo_usuario)){

                    $html.="<li class='treeview'>
                        <a href='#'>
                          <i class='fa fa-users'></i> <span>USUARIOS</span>
                          <span class='pull-right-container'>
                            <i class='fa fa-angle-left pull-right'></i>
                          </span>
                        </a>
                        <ul class='treeview-menu'>
                            <li><a href='".base_url()."index.php/Usuarios/abm_usuarios'><i class='fa fa-circle-o'></i>Listado</a></li>
                            <li><a href='".base_url()."index.php/Usuarios/abm_tipos_usuarios'><i class='fa fa-circle-o'></i>Tipos Usuario</a></li>
                        </ul>
                     </li>";
                } 

                if($id_tipo_usuario == 1 || $this->funciones_generales->dar_permiso_a_modulo(Modulos::INSTITUCIONES,$id_tipo_usuario)){

                    $html.="<li class='treeview'>
                        <a href='#'>
                          <i class='fa fa-bank'></i> <span>INSTITUCIONES</span>
                          <span class='pull-right-container'>
                            <i class='fa fa-angle-left pull-right'></i>
                          </span>
                        </a>
                        <ul class='treeview-menu'>
                            <li><a href='".base_url()."index.php/Instituciones/abm_instituciones'><i class='fa fa-circle-o'></i>Listado</a></li>
                        </ul>
                     </li>";
                } 

                if($id_tipo_usuario == 1 || $this->funciones_generales->dar_permiso_a_modulo(Modulos::RUBROS,$id_tipo_usuario)){

                    $html.="<li class='treeview'>
                        <a href='#'>
                          <i class='fa fa-share-alt'></i> <span>RUBROS</span>
                          <span class='pull-right-container'>
                            <i class='fa fa-angle-left pull-right'></i>
                          </span>
                        </a>
                        <ul class='treeview-menu'>
                            <li><a href='".base_url()."index.php/Rubros/abm_rubros'><i class='fa fa-circle-o'></i>Listado</a></li>
                        </ul>
                     </li>";
                }

                if($id_tipo_usuario == 1 || $this->funciones_generales->dar_permiso_a_modulo(Modulos::PRODUCTOS,$id_tipo_usuario)){

                    $html.="<li class='treeview'>
                        <a href='#'>
                          <i class='fa fa-shopping-cart'></i> <span>PRODUCTOS</span>
                          <span class='pull-right-container'>
                            <i class='fa fa-angle-left pull-right'></i>
                          </span>
                        </a>
                        <ul class='treeview-menu'>
                            <li><a href='".base_url()."index.php/Productos/abm_productos'><i class='fa fa-circle-o'></i>Listado</a></li>
                        </ul>
                     </li>";
                } 

                if($id_tipo_usuario == 1 || $this->funciones_generales->dar_permiso_a_modulo(Modulos::PRESUPUESTOS,$id_tipo_usuario)){

                    $html.="<li class='treeview'>
                        <a href='#'>
                          <i class='fa fa-list'></i> <span>PRESUPUESTOS</span>
                          <span class='pull-right-container'>
                            <i class='fa fa-angle-left pull-right'></i>
                          </span>
                        </a>
                        <ul class='treeview-menu'>
                            <li><a href='".base_url()."index.php/Presupuestos/abm_presupuestos'><i class='fa fa-circle-o'></i>Listado</a></li>
                        </ul>
                     </li>";
                } 

                if($id_tipo_usuario == 1 || $this->funciones_generales->dar_permiso_a_modulo(MODULOS::CONFIGURACION,$id_tipo_usuario)){

                    $html.="<li class='treeview'>
                        <a href='#'>
                          <i class='fa fa-gears'></i> <span>CONFIGURACIONES</span>
                          <span class='pull-right-container'>
                            <i class='fa fa-angle-left pull-right'></i>
                          </span>
                        </a>
                        <ul class='treeview-menu'>
                            <li><a href='".base_url()."index.php/Provincia/abm_provincias'><i class='fa fa-circle-o'></i>Provincias/Localidades</a></li>
                            <li><a href='".base_url()."index.php/Datos/abm_datos'><i class='fa fa-circle-o'></i>Datos</a></li>
                        </ul>
                     </li>";
                } 
        
        $html.="</ul>
              </section>
              <!-- /.sidebar -->
            </aside>";
        
        
        return $html;
    }
    
    public function getHeader()
    {
        $html= Header_usuario::getHeader($this->ci->session->userdata("tipo_usuario"),$this->ci->session->userdata("nombre"),$this->ci->session->userdata("apellido"),$this->ci->session->userdata("fecha_registro"),$this->ci->session->userdata("foto_perfil"));      
        return $html;
    }
    
    public function getMenuConfiguracion()
    {
        //$html= Menu_Config::getMenuConfig($this->ci->session->userdata("tipo_usuario"));
        return "";
    }
    
    public function getFooter()
    {
        $html=
        "<footer class='main-footer'>
            <div class='pull-right hidden-xs'>
              <b></b> 
            </div>
            &nbsp;
            <strong>Desarrollo por  <a target='_blank' href='".$this->link_pie["valor"]."'>".$this->texto_pie["valor"]."</a></strong>

         </footer>";
        return $html;
    }
    
    
    public function get_css_datatables()
    {
        $html=
        "<!-- DataTables -->
        <link rel='stylesheet' href='".base_url()."recursos/plugins/datatables/dataTables.bootstrap.css'>
        ";
        return $html;
    }
    
    public function get_css_datetimepicker()
    {
        $html=
        "<!--DATE TIME PICKER-->
        <link rel='stylesheet' type='text/css' href='".base_url()."recursos/plugins/datetimepicker/jquery.datetimepicker.css'/>
        ";
        return $html;
    }
    
    public function get_css_select2()
    {
        $html=
        "<!--Select2-->
        <link rel='stylesheet' type='text/css' href='".base_url()."recursos/plugins/select2/select2.min.css'/>
        ";
        return $html;
    }
    
    public function get_js_datatables()
    {
        $html=
        "<!-- DataTables -->
        <script src='".base_url()."recursos/plugins/datatables/jquery.dataTables.min.js'></script>
        <script src='".base_url()."recursos/plugins/datatables/dataTables.bootstrap.min.js'></script>";
        return $html;
    }
    
    public function get_js_datetimepicker()
    {
        $html=
        "<!-- bootstrap datepicker -->
        <script src='".base_url()."recursos/plugins/datetimepicker/bootstrap-datepicker.js'></script>
        <!-- bootstrap color picker -->
        <script src='".base_url()."recursos/plugins/datetimepicker/bootstrap-colorpicker.min.js'></script>
        <!-- bootstrap time picker -->
        <script src='".base_url()."recursos/plugins/datetimepicker/bootstrap-timepicker.min.js'></script>
        <script src='".base_url()."recursos/plugins/datetimepicker/jquery.datetimepicker.js'></script>  ";
        return $html;
    }
    
    public function get_js_select2()
    {
        $html=
        "<!-- Select2 -->
        <script src='".base_url()."recursos/plugins/select2/select2.full.min.js'></script>";
        return $html;
    }
    
    /*public function getMenuModulos($controller_user,$id_tipo_usuario,$id_usuario)
    {
        $this->ci->load->library("Funciones_generales");
        $funciones_generales =new Funciones_generales();
        
        $html="";

        if($id_tipo_usuario == 1 || $funciones_generales->dar_permiso_a_modulo(Modulos::USUARIOS,$id_tipo_usuario)){

            $html.="<li class='treeview'>
                <a href='#'>
                  <i class='fa fa-users'></i> <span>Usuarios</span>
                  <span class='pull-right-container'>
                    <i class='fa fa-angle-left pull-right'></i>
                  </span>
                </a>
                <ul class='treeview-menu'>
                    <li><a href='".base_url()."index.php/Usuarios/abm_usuarios'><i class='fa fa-circle-o'></i>Listado</a></li>
                    <li><a href='".base_url()."index.php/Usuarios/abm_tipos_usuarios'><i class='fa fa-circle-o'></i>Tipos Usuario</a></li>
                </ul>
             </li>";
        } 

        if($id_tipo_usuario == 1 || $funciones_generales->dar_permiso_a_modulo(Modulos::ANUNCIOS,$id_tipo_usuario)){

            $html.="<li class='treeview'>
                <a href='#'>
                  <i class='fa fa-list'></i> <span>Anuncios</span>
                  <span class='pull-right-container'>
                    <i class='fa fa-angle-left pull-right'></i>
                  </span>
                </a>
                <ul class='treeview-menu'>
                    <li><a href='".base_url()."index.php/Anuncio/abm_anuncios'><i class='fa fa-circle-o'></i>Listado</a></li>
                </ul>
             </li>";
        } 
        
        if($id_tipo_usuario == 1 || $funciones_generales->dar_permiso_a_modulo(MODULOS::CONFIGURACION,$id_tipo_usuario)){

            $html.="<li class='treeview'>
                <a href='#'>
                  <i class='fa fa-gears'></i> <span>Configuracion</span>
                  <span class='pull-right-container'>
                    <i class='fa fa-angle-left pull-right'></i>
                  </span>
                </a>
                <ul class='treeview-menu'>
                    <li><a href='".base_url()."index.php/Rubros/abm_rubros'><i class='fa fa-circle-o'></i>ABM DE RUBROS</a></li>
                    <li><a href='".base_url()."index.php/Provincia/abm_provincias'><i class='fa fa-circle-o'></i>ABM DE PROVINCIAS</a></li>
                </ul>
             </li>";
        } 

        if($id_tipo_usuario == 1 || $funciones_generales->dar_permiso_a_modulo(MODULOS::SUBASTAS,$id_tipo_usuario)){

            $html.="<li class='treeview'>
                <a href='#'>
                  <i class='fa  fa-legal'></i> <span>SUBASTAS</span>
                  <span class='pull-right-container'>
                    <i class='fa fa-angle-left pull-right'></i>
                  </span>
                </a>
                <ul class='treeview-menu'>
                    <li><a href='".base_url()."index.php/Rubros/abm_rubros'><i class='fa fa-circle-o'></i>ABM DE RUBROS</a></li>
                    <li><a href='".base_url()."index.php/Provincia/abm_provincias'><i class='fa fa-circle-o'></i>ABM DE PROVINCIAS</a></li>
                </ul>
             </li>";
        } 

        if($id_tipo_usuario == 1 || $funciones_generales->dar_permiso_a_modulo(MODULOS::MENSAJES,$id_tipo_usuario)){

            $html.="<li class='treeview'>
                <a href='#'>
                  <i class='fa fa-envelope'></i> <span>MENSAJES</span>
                  <span class='pull-right-container'>
                    <i class='fa fa-angle-left pull-right'></i>
                  </span>
                </a>
                <ul class='treeview-menu'>
                    <li><a href='".base_url()."index.php/Rubros/abm_rubros'><i class='fa fa-circle-o'></i>ABM DE RUBROS</a></li>
                    <li><a href='".base_url()."index.php/Provincia/abm_provincias'><i class='fa fa-circle-o'></i>ABM DE PROVINCIAS</a></li>
                </ul>
             </li>";
        } 


        return $html;
    }*/
}
