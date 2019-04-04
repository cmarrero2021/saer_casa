<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<header>
  <!-- <header class="header dark-bg margen-s-18 posicion-y-encabezado" style="max-height: 11% !important;min-height: 11% !important;"> -->
    <header class="header dark-bg margen-s-18" style="max-height: 11% !important;min-height: 11% !important;">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Ocultar/Mostrar menú lateral" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>
      <a href="index.html" class="logo">sistema<span class="lite1">seguimiento</span><span class="lite2">aeroportuario</span></a>
      <div class="nav search-row" id="top_menu">
      </div>
      <div class="top-nav notification-row">
        <ul class="nav pull-right top-menu">
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <span class="profile-ava">
                <img alt="" height = "50" width="50" src="<?php echo base_url(); ?>fotos/usuarios/<?php echo $this->session->userdata('cedula'); ?>.jpg">
              </span>
              <span class="username"><?php echo $this->session->userdata('nombre'); ?></span>
              <span class="username"><?php 
              switch ($this->session->userdata('rol_usuario')) {
                case 1:
                echo " - ADMINISTRADOR";
                break;
                case 2:
                echo " - SUPERVISOR";
                break;
                case 3:
                echo " - USUARIO";
                break;
              }
              ?></span>
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li>
                <a href="<?php echo base_url(); ?>login/salir"><i class="icon-switch"></i> Salir</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </header>
  </header>
