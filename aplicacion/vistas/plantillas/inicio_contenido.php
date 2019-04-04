    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"></i>Sistema de Seguimiento Aeroportuario - BAER</h3>
            <ol class="breadcrumb">
              <?php
              if (null != $this->session->userdata('icono_url')) { 
                $icono = $this->session->userdata('icono_url');
                $titulo = $this->session->userdata('titulo_url');
                ?>
                <?php if($titulo !="Registrar Visitas") { ?>
                  <a href="<?php echo base_url(); ?>regvisitas" class=""><i class="icon-home"></i><span>Inicio&nbsp;&nbsp;</span></a>
                <?php } ?>
                <i class="<?php echo $icono;?>"></i><?php echo $titulo; ?></a>
              <?php } else { ?>
                <li><i class="icon-group"></i>Registrar Visitas</a></li>
              <?php } ?>
            </ol>
          </div>
        </div>
        <container>
          <div class="row">
            <!-- <div class="col-md-8"> -->
              <div class="col-md-12">