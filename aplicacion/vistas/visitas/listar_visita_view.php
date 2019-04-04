<?php 
$visita1 = json_encode($visitante[0], JSON_UNESCAPED_UNICODE);
$visita2 = json_decode($visita1);
$cant = count($visitante);
$cedula = $visita2->{"ci_visitante"};
$nombre = $visita2->{"nombre_visitante"};
$telefono = $visita2->{"telefono_visitante"};
$pueblo = $visita2->{"nombre_pueblo"};
$estado = $visita2->{"entidad"};
$procedencia = $visita2->{"procedencia"};
$tipo = $visita2->{"tipo_visitante"};
?>
<div class="row">
	<!-- <div class="col-md-12 col-md-offset-2"> -->
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="col-md-8 bg-primary">
					<div class="row">
						<div class="col-md-3 col-md-offset-1">
							<label><strong>VISITAS</strong></label>
						</div>
						<div class="col-md-8">
							<label><?php echo $this->session->userdata('cant_filas'); ?></label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 col-md-offset-1">
							<label><strong>CEDULA</strong></label>
						</div>
						<div class="col-md-8">
							<label><?php echo $cedula; ?></label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 col-md-offset-1">
							<label><strong>NOMBRE</strong></label>
						</div>
						<div class="col-md-8">
							<label><?php echo $nombre; ?></label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 col-md-offset-1">
							<label><strong>TELEFONO</strong></label>
						</div>
						<div class="col-md-8">
							<label><?php echo $telefono; ?></label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 col-md-offset-1">
							<label><strong>PUEBLO</strong></label>
						</div>
						<div class="col-md-8">
							<label><?php echo $pueblo; ?></label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 col-md-offset-1">
							<label><strong>ESTADO</strong></label>
						</div>
						<div class="col-md-8">
							<label><?php echo $estado; ?></label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 col-md-offset-1">
							<label><strong>PROCEDENCIA</strong></label>
						</div>
						<div class="col-md-8">
							<label><?php echo $procedencia; ?></label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 col-md-offset-1">
							<label><strong>TIPO DE VISITANTE</strong></label>
						</div>
						<div class="col-md-8">
							<label><?php echo $tipo; ?></label>
						</div>
					</div>
				</div> <!-- FINAL DE LA COLUMNA DEL PANEL-->
				<div class="col-md-4">
					<img class=" rounded img-fluid img-responsive center-block img-centrar-vertical pull-right" src="<?php echo base_url().'fotos/visitantes/'.$cedula.'.jpg'; ?>" width="245px" height="250px" class="margen-m-30" style="margin-left:-43% !important;margin-top:0.5% !important;">
				</div>
			</div> <!-- FINAL DEL PANEL-->
			<table class="table table-striped table-bordered table-hover table-responsive">
				<tr>
					<th onClick="ordenar(this);" style="cursor:pointer;">ID</th><th onClick="ordenar(this);" style="cursor:pointer;">FECHA/HORA INGRESO</th><th onClick="ordenar(this);" style="cursor:pointer;">FECHA/HORA SALIDA</th><th onClick="ordenar(this);" style="cursor:pointer;">PASE ASIGNADO</th><th onClick="ordenar(this);" style="cursor:pointer;">SALIÓ</th><th onClick="ordenar(this);" style="cursor:pointer;">MOTIVO VISITA</th><th onClick="ordenar(this);" style="cursor:pointer;">AUTORIZADO POR</th><th onClick="ordenar(this);" style="cursor:pointer;">PISO</th><th onClick="ordenar(this);" style="cursor:pointer;">DESTINO</th><th onClick="ordenar(this);" style="cursor:pointer;">OBSERVACIONES</th>
				</tr>
				<?php
				$n=1;
				foreach($visitante as $dato) {
					if ($dato["salida"] != "SI") {
						$clase =" class='danger'";
					} else {
						$clase = "";
					}
					echo "<tr $clase>";			
					echo "<td>".$dato["id_visita"]."</td>";
					echo "<td>".$dato["fechahora_ingreso"]."</td>";
					echo "<td>".$dato["fecha_hora_salida"]."</td>";
					echo "<td>".$dato["carnet"]."</td>";
					echo "<td>".$dato["salida"]."</td>";
					echo "<td>".$dato["motivo"]."</td>";
					echo "<td>".$dato["autorizado"]."</td>";
					echo "<td>".$dato["piso"]."</td>";
					echo "<td>".$dato["destino"]."</td>";
					echo "<td>".$dato["observaciones"]."</td>";
					$n++;
				} ?>
			</table>
			<?php echo $this->pagination->create_links() ?>
		</div>
	</div>