</div>
<div>
	<container>
		<div class="row">
			<div class="col-md-10 col-md-offset-1 panel panel-default">
				<div class="row">
					<div class="col-md-2 pull-right" >
						<div class="row">
							<img src="<?php echo base_url().'fotos/visitantes/'.$cedula.'.jpg'; ?>" width="245px" height="250px" class="margen-m-30" style="margin-left:-43% !important;margin-top:0.5% !important;">
						</div>
					</div>					
					<div class="col-md-9  bg-primary">
						<div class="row">
							<div class="col-md-8">
								<label>PASE ASIGNADO: &nbsp;&nbsp;</label><?php echo isset($carnet) ? $carnet:$id_carnet; ?><br/>
							</div>
						</div>
						<?php if (isset($salir)) { ?>
							<div class="row">
								<div class="col-md-8">
									<label>FECHA/HORA DE INGRESO: &nbsp;&nbsp;</label><?php echo $fechahora_ingreso; ?><br/>
								</div>
							</div>
						<?php } ?>
						<div class="row">
							<div class="col-md-8">
								<label>CÉDULA: &nbsp;&nbsp;</label><?php echo $cedula; ?><br/>
							</div>
						</div>

						<div class="row">
							<div class="col-md-8">
								<label>NOMBRE: &nbsp;&nbsp;</label><?php echo $nombre; ?><br/>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<label>TELÉFONO:&nbsp;&nbsp;</label><?php echo ($telefono !=0) ? $telefono : ""; ?><br/>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<label>ESTADOS: &nbsp;&nbsp;</label><?php echo $estados; ?><br/>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<label>PROCEDENCIA: &nbsp;&nbsp;</label><?php echo $procedencia; ?><br/>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<label>TIPO DE VISITANTE: &nbsp;&nbsp;</label><?php echo $tipo_visitante; ?><br/>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<label>MOTIVO: &nbsp;&nbsp;</label><?php echo $motivo; ?><br/>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<label>DESTINO: &nbsp;&nbsp;</label><?php echo $destino; ?><br/>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<label>AUTORIZADO: &nbsp;&nbsp;</label><?php echo $autorizado; ?><br/>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<label>OBSERVACIONES: &nbsp;&nbsp;</label><?php echo $observaciones; ?><br/>
							</div>
						</div>						
					</div>
				</div>
				<div class="row">
					<div class="col-md-10 col-md-offset-3 ">
						<?php
						if (isset($salir)) {
							$textoBtn="REGISTRAR LA SALIDA DEL VISITANTE";
						} else {
							$textoBtn="REGRESAR AL REGISTRO DE VISITAS";
						}
						?>
						<button type="button" class="btn btn-info" name="accion_visita" id="accion_visita" ><?php echo $textoBtn; ?></button>
					</div>
				</div>
			</div>
		</div>
	</container>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#accion_visita").on("click",function() {
				var salir = <?php $sal = isset($salir) ? 1:0;  echo $sal; ?>;
				if  (salir == 1) {
					var cedula = <?php echo $cedula; ?>;
					var ruta = "<?php echo base_url();?>regvisitas/marcar_salida/<?php echo $cedula;?>";
				} else {
					var ruta = "<?php echo base_url(); ?>regvisitas/";
				}
				window.location.href =ruta;
			});
		});
	</script>
