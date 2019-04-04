<container>
	<div class="bs-example">
		<div class="panel-group" id="accordion">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#embarques">Embarques</a>
					</h4>
				</div>
				<div id="embarques" class="panel-collapse collapse">
					<div class="panel-body">
						<div class="row">
							<div class="container">
								<table id="tbl_embarques" class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th>ACCIONES</th>
											<th>ID</th>
											<th>TIPO</th>
											<th>IATA</th>
											<th>OACI</th>
											<th>AEROPUERTO</th>
											<th>DENOMINACIÓN</th>
											<th>ESTADO</th>
											<th>ADMINISTRADO</th>
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
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#desembarques">Desembarques</a>
					</h4>
				</div>
				<div id="desembarques" class="panel-collapse collapse">
					<div class="panel-body">
						<div class="row">
							<div class="container">
								<table id="tbl_desembarques" class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th>ACCIONES</th>
											<th>ID</th>
											<th>ESTADO</th>
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
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#despegues">Despeques</a>
					</h4>
				</div>
				<div id="despegues" class="panel-collapse collapse">
					<div class="panel-body">
						<div class="row">
							<div class="container">
								<table id="tbl_despegues" class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th>ACCIONES</th>
											<th>ID</th>
											<th>TIPO</th>
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
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#aterrizajes">Aterrizajes</a>
					</h4>
				</div>
				<div id="aterrizajes" class="panel-collapse collapse">
					<div class="panel-body">
						<p>SIN NADA QUE MOSTRAR</p>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#demoras">Demoras</a>
					</h4>
				</div>
				<div id="demoras" class="panel-collapse collapse">
					<div class="panel-body">
						<p>TAMPOCO HAY NADA</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</container>
<script type="text/javascript">
	var metodo = "destino/get_destino";
	var formulario = "destino_form";
	var tooltip = "Agregar un destino nuevo";
	var titulo = "Agreagr un nuevo destino";	
	var archivo = "destinos_";
	var cols = 2;
	var inicol = 1;
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/tablas/tabla_mov.js"></script>