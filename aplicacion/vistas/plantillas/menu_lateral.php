<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!--sidebar start-->
<aside>
	<div id="sidebar" class="nav-collapse no-imprimir">
		<!-- sidebar menu start-->
		<ul class="sidebar-menu">
			<li>
				<a class="" href="chart-chartjs.html">
					<i class="icon_clipboard"></i>
					<span>Dasboard</span>
				</a>
			</li>
			<li class="sub-menu">
				<a href="javascript:;" class="">
					<i class="icon_group"></i>
					<!-- <i class="icon_house_alt"></i> -->
					<span>Reportar</span>
					<span class="menu-arrow arrow_carrot-right"></span>
				</a>
				<ul class="sub">
					<li><a href="<?php echo base_url(); ?>movilizacion" class=""><i class="icon_group"></i><span>Movilización</span></a></li>
					<li><a href="<?php echo base_url(); ?>regvisitas/salir" class=""><i class="icon_lock-open"></i><span>Operaciones</span></a></li>
					<li><a href="<?php echo base_url(); ?>regvisitas/buscar_visita/n" class=""><i class="icon-binoculars"></i><span>Bomberil</span></a></li>
					<li><a href="<?php echo base_url(); ?>activos" class=""><i class="icon-office"></i><span>Recaudación</span></a></li>
					<li><a href="<?php echo base_url(); ?>activos" class=""><i class="icon-office"></i><span>AVSEC</span></a></li>

				</ul>
			</li>
			<li class="sub-menu">
				<a href="javascript:;" class="">
					<i class="icon_tools"></i>
					<span>Auxiliares</span>
					<span class="menu-arrow arrow_carrot-right"></span>
				</a>
				<ul class="sub">
					<li><a class="" href="<?php echo base_url(); ?>tipos">Tipos de Aeropuertos</a></li>
					<li><a class="" href="<?php echo base_url(); ?>estados">Estados</a></li>
					<li><a class="" href="<?php echo base_url(); ?>aeropuertos">Aeropuertos</a></li>
				</ul>
			</li>
			<li class="sub-menu">
				<a href="javascript:;" class="">
					<i class="icon_close_alt2"></i>
					<span>Reportes</span>
					<span class="menu-arrow arrow_carrot-right"></span>
				</a>
				<ul class="sub">
					<li><a class="" href="<?php echo base_url(); ?>graficos">Visitas</a></li>
					<li><a class="" href="<?php echo base_url(); ?>basic_table.html">Carnets</a></li>
					<li><a class="" href="<?php echo base_url(); ?>basic_table.html">Visitantes</a></li>
				</ul>
			</li>
			<li class="sub-menu">
				<a href="javascript:;" class="">
					<i class="icon_piechart"></i>
					<span>Estadísticas</span>
					<span class="menu-arrow arrow_carrot-right"></span>
				</a>
				<ul class="sub">
					<li><a class="" href="<?php echo base_url(); ?>graficos">Visitas</a></li>
					<li><a class="" href="<?php echo base_url(); ?>basic_table.html">Carnets</a></li>
					<li><a class="" href="<?php echo base_url(); ?>basic_table.html">Visitantes</a></li>
				</ul>
			</li>
			<li class="sub-menu">
				<a href="javascript:;" class="">
					<i class="icon_documents_alt"></i>
					<span>Administracion</span>
					<span class="menu-arrow arrow_carrot-right"></span>
				</a>
				<ul class="sub">
					<li><a class="" href="<?php echo base_url(); ?>ingreso">Ingresos</a></li>
					<li><a class="" href="<?php echo base_url(); ?>auditoria">Auditoría</a></li>
					<li><a class="" href="<?php echo base_url(); ?>usuarios"><span>Usuarios</span></a></li>
					<li><a class="" href="<?php echo base_url(); ?>permisos"><span>Permisos</span></a></li>
					<li><a class="" href="<?php echo base_url(); ?>grupos">Grupos</a></li>
					<li><a class="" href="404.html">Asignar permisos</a></li>
					<li><a class="" href="404.html">Asignar usuarios</a></li>
				</ul>
			</li>					
			<!-- <?php if ($this->session->userdata('rol_usuario')==1) { ?> -->

			<!-- <?php } ?> -->
		</ul>
		<!-- sidebar menu end-->
	</div>
</aside>
	<!--sidebar end-->