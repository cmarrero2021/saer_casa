<container>
	<div class="row">
		<div class="container">
			<table id="item-list" class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th>ACCIONES</th>
						<th>ID</th>
						<th>AEROPUERTO</th>
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
							<label><span id="id_estado_ficha"></span></label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label>TIPO</label>
						</div>
						<div class="col-md-8">
							<label><span id="tipo_ficha"></span></label>
						</div>
					</div>					
					<div class="row">
						<div class="col-md-4">
							<label>ESTADOS</label>
						</div>
						<div class="col-md-8">
							<label><span id="estado_ficha"></span></label>
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
<script type="text/javascript">
	var metodo = "destino/get_destino";
	var formulario = "destino_form";
	var tooltip = "Agregar un destino nuevo";
	var titulo = "Agreagr un nuevo destino";	
	var archivo = "destinos_";
	var cols = 2;
	var inicol = 1;
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/tablas/tabla_estadoss.js"></script>