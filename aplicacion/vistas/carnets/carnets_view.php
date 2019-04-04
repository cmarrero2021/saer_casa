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
<div id="userModal" class="modal fade" tabindex="-1">  
	<div class="modal-dialog">  
		<form method="post" id="carnet_form">  
			<div class="modal-content">  
				<div class="modal-header">  
					<button type="button" class="close" data-dismiss="modal">&times;</button>  
					<h4 class="modal-title"></h4>  
				</div>  
				<div class="modal-body">
					<div class="row" id="id_registro">  
						<div class=" col-md-2">
							<label>ID</label>  
						</div>
						<div class="col-md-10">
							<div class="form-group col-md-11">
								<input type="hidden" name="id_carnet" id="id_carnet"/>
								<label><span id="etq_id_carnet"></span></label>

							</div>
						</div>
					</div>
					<div class="row" id="fila_carnet"> 
						<div class="col-md-2">
							<label>CARNET</label>
						</div>
						<div class="col-md-9 pull-right" style="margin-right:6% !important;" >
							<input type="text" name="carnet" id="carnet" class="form-control" placeholder="Introduzca el nombre del carnet a crear"/>  
						</div>
					</div> 

					<div class="row">  
						<div class=" col-md-2">
							<label>STATUS</label>  
						</div>
						<div class="col-md-10">
							<div class="form-group col-md-12">
								<?php echo form_dropdown('status', $status_carnet,'' , array('id' => 'status', 'class' => 'form-control col-md-12;' )); ?>
							</div>
						</div>
					</div>
				</div>  
				<div class="modal-footer">
					
					<button type="button" name="btnGuardar" id="btnGuardar" onClick="guardar();" class="btn btn-success"> Guardar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>  
				</div>  
			</div>  
		</form>  
	</div>  
</div>

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
							<label><span id="id_carnet_ficha"></span></label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label>CARNET</label>
						</div>
						<div class="col-md-8">
							<label><span id="carnet_ficha"></span></label>
						</div>
					</div>					<div class="row">
						<div class="col-md-4">
							<label>STATUS</label>
						</div>
						<div class="col-md-8">
							<label><span id="status_carnet_ficha">ESTATUS</span></label>
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
	var metodo = "carnets/get_carnets";
	var formulario = "carnet_form";
	var tooltip = "Agregar un carnet nuevo";
	var titulo = "Agreagr un nuevo carnet";	
	var archivo = "carnets_";
	var prefijo = "carnets";
	var controlador = "carnets";
	var cols = 2;
	var inicol = 1;
	var controles = [];
	controles[0]='#id_carnet_ficha';
	controles[1]='#carnet_ficha';
	controles[2]='#id_carnet';
	controles[3]='#carnet';	


/*	var metodo = "motivo/get_motivo";
	var formulario = "motivo_form";
	var tooltip = "Agregar un motivo nuevo";
	var titulo = "Agreagr un nuevo motivo";	
	var archivo = "motivo_";
	var prefijo = "motivo";
	var controlador = "motivo";
	var cols = 2;
	var inicol = 1;
	var controles = [];
	controles[0]='#id_motivo_ficha';
	controles[1]='#motivo_ficha';
	controles[2]='#id_motivo';
	controles[3]='#motivo';	*/



</script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/tablas/tabla_carnets.js"></script>