<container>
	<div class="row">
		<div class="container">
			<table id="item-list" class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th>ACCIONES</th>
						<th>ID</th>
						<th>rol</th>
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
		<form method="post" id="rol_form">  
			<div class="modal-content">  
				<div class="modal-header">  
					<button type="button" class="close" data-dismiss="modal">&times;</button>  
					<h4 class="modal-title"></h4>  
				</div>  
				<div class="modal-body">
					<div class="row" id="id_registro">
						<div class="col-md-3">
							<label>ID</label>
						</div>
						<div class="col-md-9">
							<label><span id="etq_id_rol"></span></label>
							<input type="hidden" name="id_rol" id="id_rol" />  
						</div>
					</div>
					<div class="row" >
						<div class="col-md-12">
							<label>ROL</label>  
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<input type="text" name="rol" id="rol" class="form-control" placeholder="Introduzca el nombre del rol a crear"/>  
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
							<label><span id="id_rol_ficha"></span></label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label>ROL</label>
						</div>
						<div class="col-md-8">
							<label><span id="rol_ficha"></span></label>
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
	var metodo = "grupos/get_grupos";
	var formulario = "#rol_form";
	var tooltip = "Agregar un rol nuevo";
	var titulo = "Agregar un nuevo rol";
	var titulo_editar = "Editar datos del rol";
	var error_texto = 'Debe indicar el nombre del rol';
	var titulo_ficha = "Ficha del rol";
	var archivo = "roles_";
	var prefijo = "rol";
	var controlador = "grupos";
	var cols = 2;
	var inicol = 1;
	var controles = [];
	controles[0]='#id_rol_ficha';
	controles[1]='#rol_ficha';
	controles[2]='#id_rol';
	controles[3]='#rol';
	controles[4]='#etq_id_rol';
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/tablas/tabla.js"></script>