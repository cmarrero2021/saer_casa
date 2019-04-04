<container>
	<div class="row">
		<div class="container">
			<table id="item-list" class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th>ACCIONES</th>
						<th>ID</th>
						<th>FECHA/HORA</th>
						<th>USUARIO</th>
						<th>IP</th>
						<th>MAC ADDRESS</th>
						<th>ACCION</th>
						<th>TABLA</th>
						<th>SQL</th>
						<th>ESTADO PREVIO</th>
						<th>ESTADO ACTUAL</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
</container>
<div id="vistaModal" class="modal fade" tabindex="-1">  
	<div class="modal-dialog">  
		<div class="modal-content">  
			<div class="modal-header">  
				<button type="button" class="close" data-dismiss="modal">&times;</button>  
				<h4 class="modal-title"></h4>  
			</div>  
			<div class="modal-body">  
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<label>ID</label>
						</div>
						<div class="col-md-8">
							<label><span id="id_auditoria_ficha"></span></label>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<label>FECHA/HORA</label>
						</div>
						<div class="col-md-8">
							<label><span id="fechahora_ficha"></span></label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label>USUARIO</label>
						</div>
						<div class="col-md-8">
							<label><span id="usuario_ficha"></span></label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label>IP</label>
						</div>
						<div class="col-md-8">
							<label><span id="ip_ficha"></span></label>
						</div>
					</div>
					<div id="macaddress">
						<div class="row">
							<div class="col-md-4">
								<label>MAC ADRESS</label>
							</div>
							<div class="col-md-8">
								<label><span id="macaddress_ficha"></span></label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label>ACCION</label>
						</div>
						<div class="col-md-8">
							<label><span id="accion_ficha"></span></label>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-4">
							<label>TABLA</label>
						</div>
						<div class="col-md-8">
							<label><span id="tabla_ficha"></span></label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label>SQL</label>
						</div>
						<div class="col-md-8">
							<label><span id="sql_ficha"></span></label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label>ESTADO PREVIO</label>
						</div>
						<div class="col-md-8">
							<label><span id="estadoprevio_ficha"></span></label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label>ESTADO ACTUAL</label>
						</div>
						<div class="col-md-8">
							<label><span id="estadoactual_ficha"></span></label>
						</div>
					</div>
				</div>
			</div>  
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>  
			</div>  
		</div>  
	</div>  
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>js/tablas/tabla_auditoria.js"></script>