<container>
	<div class="row">
		<div class="container">
			<table id="item-list" class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th>ACCIONES</th>
						<th>ID</th>
						<th>TABLA</th>
						<th>CREAR</th>
						<th>LEER</th>
						<th>ACTUALIZAR</th>
						<th>ELIMINAR</th>
						<th>IMPORTAR</th>
						<th>IMPRIMIR</th>
						<th>EXPORTAR</th>
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
		<form method="post" id="permiso_form">  
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
							<label><span id="etq_id_permiso"></span></label>
							<input type="hidden" name="id_permiso" id="id_permiso" />  
						</div>
					</div>
					<div class="row" >
						<div class="col-md-12">
							<label>permiso</label>  
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<input type="text" name="permiso" id="permiso" class="form-contpermiso" placeholder="Introduzca el nombre del permiso a crear"/>  
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
							<label><span id="id_permiso_ficha"></span></label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label>permiso</label>
						</div>
						<div class="col-md-8">
							<label><span id="permiso_ficha"></span></label>
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
	var metodo = "permisos/get_permisos";
	var formulario = "#permiso_form";
	var tooltip = "Agregar un permiso nuevo";
	var titulo = "Agregar un nuevo permiso";
	var titulo_editar = "Editar datos del permiso";
	var error_texto = 'Debe indicar el nombre del permiso';
	var titulo_ficha = "Ficha del permiso";
	var archivo = "permisoes_";
	var prefijo = "permiso";
	var contpermisoador = "permisos";
	var cols = 2;
	var inicol = 1;
	var contpermisoes = [];
	contpermisoes[0]='#id_permiso_ficha';
	contpermisoes[1]='#permiso_ficha';
	contpermisoes[2]='#id_permiso';
	contpermisoes[3]='#permiso';
	contpermisoes[4]='#etq_id_permiso';
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/tablas/tabla_permisos.js"></script>