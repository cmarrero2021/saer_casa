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
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="col-md-8 bg-primary">
				<div class="row">
					<div class="col-md-3 col-md-offset-1">
						<label><strong>CEDULA</strong></label>
					</div>
					<div class="col-md-8">
						<label><span id="ced"><?php echo $cedula; ?></span></label>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 col-md-offset-1">
						<label><strong>NOMBRE</strong></label>
					</div>
					<div class="col-md-8">
						<label><span  id="nom"><?php echo $nombre; ?></span></label>
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
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="container-fluid">
						<div class="col-lg-11 offet-md-1">
							<table id="item-list" class="table table-bordered table-striped table-hover table-responsive">
								<thead>
									<tr>
										<th>ID</th>
										<th>INGRESO</th>
										<th>SALIDA</th>
										<th>PASE</th>
										<th>SALIÓ</th>
										<th>MOTIVO</th>
										<th>AUTORIZADO</th>
										<th>PISO</th>
										<th>DESTINO</th>
										<th>OBSERVACIONES</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="<?php echo base_url(); ?>js/tablas/tabla_listar_visitante.js"></script>