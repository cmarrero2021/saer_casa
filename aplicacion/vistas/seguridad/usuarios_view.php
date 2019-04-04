	<script type="text/javascript">
		$(function() {
			$('#userfile').picEdit({
				formSubmitted: function(ajax){
					$('#message').html(ajax.response);
				}
			});
		});	
		function submit() {
			alert("PEPE");
			$("#subir").submit();
		}		
	</script>
	<container>
		<div class="row">
			<div class="container">
				<table id="item-list" class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>ACCIONES</th>
							<th>ID</th>
							<th>CÉDULA</th>
							<th>NOMBRE</th>
							<th>LOGIN</th>
							<th>GRUPO</th>
							<th>STATUS</th>
							<th>INGRESO</th>
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
			<form method="post" id="usuarios_form" autocomplete="off">  
				<div class="modal-content">  
					<div class="modal-header">  
						<button type="button" class="close" data-dismiss="modal">&times;</button>  
						<h4 class="modal-title"></h4>  
					</div>  
					<div class="modal-body">
						<div class="row"  id="cont-etq-usuario">
							<div class="col-md-3">
								<label>ID</label>  
							</div>
							<div class="col-md-9">
								<span id="id-etq-usuario"></span>
								<input type="hidden" name="id_usuario" id="id_usuario">
							</div>
						</div>
						<div class="row">
							<!-- INICIO DE CEDULA Y NOMBRE -->
							<div class = "col-md-7">
								<div class="row"  style="margin-left:3%;">
									<div class="row"">
										<div class="col-md-12">
											<label>CÉDULA</label>  
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<input type="text" name="cedula" id="cedula" class="form-control" placeholder="Introduzca la cédula del usuario"/>  
										</div>
									</div>
									<div class="row" >
										<div class="col-md-12">
											<label>NOMBRE</label>  
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<input type="text" name="nombre" id="nombre" class="form-control" placeholder="Introduzca el nombre del usuario"/>  
										</div>
									</div>
								</div>
							</div>
							<!--FIN DE NOMBRE Y CEDULA -->
							<!--INICIO DE LA FOTO -->
							<div class="col-md-5">
								<div class="col-md-12 bg bg-primary">
									<div id="message">
									</div>
									<form action="<?php echo base_url(); ?>upload/do_upload" name="subir" id="subir" enctype="multipart/form-data" method="post" accept-charset="utf-8">
										<div class="row">
											<input type="file" name="userfile" id="userfile" size="50" />
											<input type="hidden" id="cedula_visitante" name = "cedula_visitante" value="PEPE">
										</div>
										<img src="<?php echo base_url(); ?>img/upload.png" id="img_upload" class= "img_upload" width="640" height="480"  title="Cargar imagen al servidor" onClick="submit();"/>
									</form>
								</div>
							</div>
							<!-- FIN DE LA FOTO -->	
						</div>
					</div>
					<div class="row" >
						<div class="col-md-12" style="width:95%; margin-left:3%;">
							<label>LOGIN</label>  
						</div>
					</div>
					<div class="row">
						<div class="col-md-12" style="width:95%; margin-left:3%;">
							<input type="text" name="login" id="login" class="form-control" placeholder="Introduzca el login del usuario"/>  
						</div>
					</div>
					<div class="row" >
						<div class="col-md-12" style="width:95%; margin-left:3%;">
							<label>CLAVE</label>  
						</div>
					</div>
					<div class="row">
						<div class="col-md-12" style="width:95%; margin-left:3%;">
							<input type="password" name="clave" id="clave" class="form-control" autocomplete="off"/>  
						</div>
					</div>
					<div class="row" >
						<div class="col-md-12" style="width:95%; margin-left:3%;">
							<label>VERIFICAR CLAVE</label>  
						</div>
					</div>
					<div class="row">
						<div class="col-md-12" style="width:95%; margin-left:3%;">
							<input type="password" name="clave2" id="clave2" class="form-control" autocomplete="off"/>  
						</div>
					</div>
					<div class="row" >
						<div class="col-md-12" style="width:95%; margin-left:3%;">
							<label>GRUPO</label>  
						</div>
					</div>
					<div class="row">
						<div class="col-md-12" style="width:95%; margin-left:3%;">
							<?php echo form_dropdown('grupo', $rol_usuario,'' , array('id' => 'grupo', 'class' => 'form-control col-md-12;' )); ?>
						</div>
					</div>
					<div class="row" >
						<div class="col-md-12" style="width:95%; margin-left:3%;">
							<label>STATUS</label>  
						</div>
					</div>
					<div class="row">
						<div class="col-md-12" id="activo-cambiar" style="width:95%; margin-left:3%;">
							<!-- activo -->
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
							<label><span id="id_usuario_ficha"></span></label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label>CÉDULA</label>
						</div>
						<div class="col-md-8">
							<label><span id="cedula_ficha"></span></label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label>NOMBRE</label>
						</div>
						<div class="col-md-8">
							<label><span id="nombre_ficha"></span></label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label>LOGIN</label>
						</div>
						<div class="col-md-8">
							<label><span id="login_ficha"></span></label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label>GRUPO</label>
						</div>
						<div class="col-md-8">
							<label><span id="grupo_ficha"></span></label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label>STATUS</label>
						</div>
						<div class="col-md-8" id="activo-ficha-cont">
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label>FECHA CREACION</label>
						</div>
						<div class="col-md-8">
							<label><span id="fecha_ficha"></span></label>
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

<div id="buscar" class="modal fade" role="dialog" style="z-index: 1600;">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-body">
				<div class="row">
					<div class="col-md-2 col-md-offset-5">
						<img src = "<?php echo base_url() ?>/img/buscar.gif">
					</div>
				</div>
				<div class = "row">
					<div class="col-md-8 col-md-offset-3">
						<label>BUSCANDO LA DATA DEL USUARIO...</label>
					</div>
				</div>
			</div>      
		</div>
	</div>
</div>

<script type="text/javascript">
	var metodo = "usuarios/get_usuarios";
	var formulario = "#usuario_form";
	var tooltip = "Agregar un usuario nuevo";
	var titulo = "Agregar un nuevo usuario";
	var titulo_editar = "Editar datos del usuario";
	var error_texto = 'Debe indicar el nombre del usuario';
	var titulo_ficha = "Ficha del Usuario";
	var archivo = "usuario_";
	var prefijo = "usuario";
	var controlador = "usuarios";
	var cols = 7;
	var inicol = 1;
	var controles = [];
	controles[0]='#id_usuario_ficha';
	controles[1]='#cedula_ficha';
	controles[2]='#nombre_ficha';
	controles[3]='#login_ficha';
	controles[4]='#grupo_ficha';
	controles[5]='#activo_ficha';
	controles[6]='#fecha_ficha';
	controles[7]='#id_usuario';
	controles[8]='#cedula';
	controles[9]='#nombre';
	controles[10]='#login';
	controles[11]='#grupo';
	controles[12]='#activo';
	controles[13]='#etq_id_usuario';
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/tablas/tabla_usuarios.js"></script>