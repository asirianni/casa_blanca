<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Header_usuario
{
    private static $texto_header= "<img src='recursos/'>";
    private static $permitir_foto_perfil= true;
    
    public static function getHeader($tipo_usuario,$nombre,$apellido,$fecha_registro,$foto_perfil)
    {
        Header_usuario::$texto_header = "ADMIN";
        $html = "";
        
        switch($tipo_usuario)
        {
            case 1: $html= Header_usuario::getHeaderDefault($nombre,$apellido,$fecha_registro,$foto_perfil);
                break;
            default:
              $html= Header_usuario::getHeaderDefault($nombre,$apellido,$fecha_registro,$foto_perfil);
              break;

        }
        
        return $html;
    }
    
    public static function getHeaderAdministrador($nombre,$apellido,$fecha_registro,$foto_perfil)
    {
        $html=
        "
          <header class='main-header'>
            <!-- Logo -->
            <a href='".base_url()."index.php/Administrador/index' class='logo'>
              <!-- mini logo for sidebar mini 50x50 pixels -->
              <span class='logo-mini'>ADM</span>
              <!-- logo for regular state and mobile devices -->
              <span class='logo-lg'>".Header_usuario::$texto_header."</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class='navbar navbar-static-top'>
              <!-- Sidebar toggle button-->
              <a href='#' class='sidebar-toggle' data-toggle='offcanvas' role='button'>
                <span class='sr-only'>Toggle navigation</span>
              </a>

              <div class='navbar-custom-menu'>
                <ul class='nav navbar-nav'>
                  <!-- 
                  <li class='dropdown messages-menu'>
                    <a href='#' class='dropdown-toggle' data-toggle='dropdown'>
                      <i class='fa fa-envelope-o'></i>
                      <span class='label label-success'>4</span>
                    </a>
                    <ul class='dropdown-menu'>
                      <li class='header'>You have 4 messages</li>
                      <li>
                        <ul class='menu'>
                          <li>
                            <a href='#'>
                              <div class='pull-left'>
                                <img src='dist/img/user2-160x160.jpg' class='img-circle' alt='User Image'>
                              </div>
                              <h4>
                                Support Team
                                <small><i class='fa fa-clock-o'></i> 5 mins</small>
                              </h4>
                              <p>Why not buy a new awesome theme?</p>
                            </a>
                          </li>
                        </ul>
                      </li>
                      <li class='footer'><a href='#'>See All Messages</a></li>
                    </ul>
                  </li>-->
                  
                  <li class='dropdown notifications-menu'>
                    <a href='".base_url()."index.php/Administrador/abm_home_ofertas'>
                      <i class='fa fa-thumbs-o-up'></i>
                      OFERTAS HOME
                    </a>
                    
                  </li>
                  <!-- User Account: style can be found in dropdown.less -->
                  <li class='dropdown user user-menu'>
                    <a href='#' class='dropdown-toggle' data-toggle='dropdown'>";
                    if(Header_usuario::$permitir_foto_perfil){
                        $html.=" <img src='".base_url()."recursos/images/foto_perfil/".$foto_perfil."' class='user-image' alt='User Image'>";
                    }
                    else
                    {
                        $html.=" <img src='".base_url()."recursos/images/foto_perfil/foto_default.png' class='user-image' alt='User Image'>";
                    }

                $html.="<span class='hidden-xs'>".$nombre." ".$apellido."</span>
                    </a>
                    <ul class='dropdown-menu'>
                      <!-- User image -->
                      <li class='user-header'>";
                    if(Header_usuario::$permitir_foto_perfil){
                        $html.=" <img src='".base_url()."recursos/images/foto_perfil/".$foto_perfil."' class='img-circle' alt='User Image'>";
                    }
                    else
                    {
                        $html.=" <img src='".base_url()."recursos/images/foto_perfil/foto_default.png' class='img-circle' alt='User Image'>";
                    }
                      $html.=" <p>
                          ".$nombre." ".$apellido." - Administrador
                          <small>Registrado desde: ".$fecha_registro."</small>
                        </p>
                      </li>
                      <!-- Menu Body -->
                      <!--
                      <li class='user-body'>
                        <div class='row'>
                          <div class='col-xs-4 text-center'>
                            <a href='#'>Followers</a>
                          </div>
                          <div class='col-xs-4 text-center'>
                            <a href='#'>Sales</a>
                          </div>
                          <div class='col-xs-4 text-center'>
                            <a href='#'>Friends</a>
                          </div>
                        </div>
                      </li>-->
                      <!-- Menu Footer-->
                      <li class='user-footer'>
                        <div class='pull-left'>
                          <a href='".base_url()."index.php/Usuarios/mi_perfil' class='btn btn-default btn-flat'>Perfil</a>
                        </div>
                        <div class='pull-right'>
                          <a href='".base_url()."index.php/Login' class='btn btn-default btn-flat'>Cerrar Sesion</a>
                        </div>
                      </li>
                      
                    </ul>
                    
                  </li>
                  <li>
                        <a href='".base_url()."index.php/Administrador/abm_configuracion' ><i class='fa fa-gears'></i></a>
                    </li>
                  <!-- Control Sidebar Toggle Button 
                  <li>
                    <a href='#' data-toggle='control-sidebar'><i class='fa fa-gears'></i></a>
                  </li>-->
                </ul>
              </div>
            </nav>
          </header>  
        ";
    
        return $html;
    }

    public static function getHeaderDefault($nombre,$apellido,$fecha_registro,$foto_perfil)
    {
        $html=
        "
          <header class='main-header'>
            <!-- Logo -->
            <a href='".base_url()."index.php/Vendedor/index' class='logo'>
              <!-- mini logo for sidebar mini 50x50 pixels -->
              <span class='logo-mini'>ADM</span>
              <!-- logo for regular state and mobile devices -->
              <span class='logo-lg'>".Header_usuario::$texto_header."</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class='navbar navbar-static-top'>
              <!-- Sidebar toggle button-->
              <a href='#' class='sidebar-toggle' data-toggle='offcanvas' role='button'>
                <span class='sr-only'>Toggle navigation</span>
              </a>

              <div class='navbar-custom-menu'>
                <ul class='nav navbar-nav'>
                  <!-- 
                  <li class='dropdown messages-menu'>
                    <a href='#' class='dropdown-toggle' data-toggle='dropdown'>
                      <i class='fa fa-envelope-o'></i>
                      <span class='label label-success'>4</span>
                    </a>
                    <ul class='dropdown-menu'>
                      <li class='header'>You have 4 messages</li>
                      <li>
                        <ul class='menu'>
                          <li>
                            <a href='#'>
                              <div class='pull-left'>
                                <img src='dist/img/user2-160x160.jpg' class='img-circle' alt='User Image'>
                              </div>
                              <h4>
                                Support Team
                                <small><i class='fa fa-clock-o'></i> 5 mins</small>
                              </h4>
                              <p>Why not buy a new awesome theme?</p>
                            </a>
                          </li>
                        </ul>
                      </li>
                      <li class='footer'><a href='#'>See All Messages</a></li>
                    </ul>
                  </li>-->
                  <!--
                  <li class='dropdown notifications-menu'>
                    <a href='#' class='dropdown-toggle' data-toggle='dropdown'>
                      <i class='fa fa-bell-o'></i>
                      <span class='label label-danger'>10</span>
                    </a>
                    <ul class='dropdown-menu'>
                      <li class='header'>You have 10 notifications</li>
                      <li>
                        <ul class='menu'>
                          <li>
                            <a href='#'>
                              <i class='fa fa-users text-aqua'></i> 5 new members joined today
                            </a>
                          </li>
                        </ul>
                      </li>
                      <li class='footer'><a href='#'>View all</a></li>
                    </ul>
                  </li>
                  <li class='dropdown tasks-menu'>
                    <a href='#' class='dropdown-toggle' data-toggle='dropdown'>
                      <i class='fa fa-flag-o'></i>
                      <span class='label label-danger'>9</span>
                    </a>
                    <ul class='dropdown-menu'>
                      <li class='header'>You have 9 tasks</li>
                      <li>
                        <ul class='menu'>
                            <a href='#'>
                              <h3>
                                Design some buttons
                                <small class='pull-right'>20%</small>
                              </h3>
                              <div class='progress xs'>
                                <div class='progress-bar progress-bar-aqua' style='width: 20%' role='progressbar' aria-valuenow='20' aria-valuemin='0' aria-valuemax='100'>
                                  <span class='sr-only'>20% Complete</span>
                                </div>
                              </div>
                            </a>
                          </li>
                        </ul>
                      </li>
                      <li class='footer'>
                        <a href='#'>View all tasks</a>
                      </li>
                    </ul>
                  </li>-->
                  <!-- User Account: style can be found in dropdown.less -->
                  <li class='dropdown user user-menu'>
                    <a href='#' class='dropdown-toggle' data-toggle='dropdown'>";
                    if(Header_usuario::$permitir_foto_perfil){
                        $html.=" <img src='".base_url()."recursos/images/foto_perfil/".$foto_perfil."' class='user-image' alt='User Image'>";
                    }
                    else
                    {
                        $html.=" <img src='".base_url()."recursos/images/foto_perfil/foto_default.png' class='user-image' alt='User Image'>";
                    }

                $html.="<span class='hidden-xs'>".$nombre." ".$apellido."</span>
                    </a>
                    <ul class='dropdown-menu'>
                      <!-- User image -->
                      <li class='user-header'>";
                    if(Header_usuario::$permitir_foto_perfil){
                        $html.=" <img src='".base_url()."recursos/images/foto_perfil/".$foto_perfil."' class='img-circle' alt='User Image'>";
                    }
                    else
                    {
                        $html.=" <img src='".base_url()."recursos/images/foto_perfil/foto_default.png' class='img-circle' alt='User Image'>";
                    }
                      $html.=" <p>
                          ".$nombre." ".$apellido." - Vendedor
                          <small>Registrado desde: ".$fecha_registro."</small>
                        </p>
                      </li>
                      <!-- Menu Body -->
                      <!--
                      <li class='user-body'>
                        <div class='row'>
                          <div class='col-xs-4 text-center'>
                            <a href='#'>Followers</a>
                          </div>
                          <div class='col-xs-4 text-center'>
                            <a href='#'>Sales</a>
                          </div>
                          <div class='col-xs-4 text-center'>
                            <a href='#'>Friends</a>
                          </div>
                        </div>
                      </li>-->
                      <!-- Menu Footer-->
                      <li class='user-footer'>
                        <div class='pull-left'>
                          <a href='".base_url()."index.php/Usuarios/mi_perfil' class='btn btn-default btn-flat'>Perfil</a>
                        </div>
                        <div class='pull-right'>
                          <a href='".base_url()."index.php/Login' class='btn btn-default btn-flat'>Cerrar Sesion</a>
                        </div>
                      </li>
                    </ul>
                  </li>
                  <!-- Control Sidebar Toggle Button 
                  <li>
                    <a href='#' data-toggle='control-sidebar'><i class='fa fa-gears'></i></a>
                  </li>-->
                </ul>
              </div>
            </nav>
          </header>  
        ";
    
        return $html;
    }
}

