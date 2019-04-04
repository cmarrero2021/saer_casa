</div>
<div>
	<container>
		<div class="row">
			<div class="col-md-10 col-md-offset-1 panel panel-default bg bg-primary" style="font-weight: bold;font-size:large;text-align: justify;">
				<div class="row">
					<div class="row">
						<div class="col-md-12">
							<section style="padding:1%;">LA CEDULA <?php echo $cedula; ?> YA TIENE UNA VISITA ABIERTA SIN QUE SE HAYA REGISTRADO SU SALIDA. EN CASO DE QUE SE HAYA RETIRADO DE LA INSTITUCIÓN Y NO SE HAYA REGISTRADO SU SALIDA, HAGALO AHORA; SI SE TRATÓ DE UN ERROR DE ESCRITURA, REGRESE E INGRESE LA CÉDULA DE NUEVO.</section>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<a href="<?php echo base_url(); ?>regvisitas/" style="color:#64ffda;">REGRESAR A REGISTRAR LA VISITA</a>
						</div>
						<div class="col-md-6">
							<a class= " pull-right text-warning" href="<?php echo base_url(); ?>regvisitas/marcar_salida/<?php echo $cedula; ?>" style="color: #ffab40;">LIBERAR VISITA DE <?php echo $cedula; ?></a>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</container>
