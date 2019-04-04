<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><span id="titulo-modal">Agregar nuevo carnet</span></h4>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<?php $var = "<script> document.write(ed) </script>"; ?>
							<label><strong>CARNET <?php echo $var; ?> </strong></label>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-primary">Crear</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<container>
	<div class="row">
		<div class="container">
			<table id="item-list" class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th>ACCIONES</th>
						<th>ID</th>
						<th>CARNET</th>
						<th>STATUS</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
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
<script type="text/javascript" src="<?php echo base_url(); ?>js/tablas/tabla.js"></script>