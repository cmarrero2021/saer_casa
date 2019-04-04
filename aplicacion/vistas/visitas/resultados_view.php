</div>
<div>
	<script type="text/javascript">
		$(function() {
			$('#userfile').picEdit({
				formSubmitted: function(ajax){
					$('#message').html(ajax.response);
				}
			});
		});	
		function submit() {
			$("#subir").submit();
		}		
	</script>
	<?php
	if (isset($visitante['ci_visitante'])) {
		$cedula = $visitante['ci_visitante'];
		$nombre = $visitante['nombre_visitante'];
		$telefono = "";
		$estado = $visitante['estado'];
		$id_tipo_visitante="";
		$id_procedencia="";
	} else {
		foreach ($visitante as $val) {
			$cedula = $val['ci_visitante'];
			$nombre = $val['nombre_visitante'];
			$telefono = $val['telefono_visitante'];
			$estado = $val['id_entidad'];
			$id_tipo_visitante = $val['id_tipo_visitante'];
			$id_procedencia = $val['id_procedencia'];
		}	
	}
	$ruta1 = $_SERVER['DOCUMENT_ROOT']."/";
	$ruta2 = base_url(); 
	$foto2 = $ruta2."fotos/visitantes/".$cedula.".jpg";
	$foto1 = $ruta1."fotos/visitantes/".$cedula.".jpg";
	?>
</div>
<container>
	<div class="row">
		<?php if (!file_exists($foto1)) { ?>
			<div class="col-md-4 col-md-offset-3">
				<div class="col-md-12 col-md-offset-4 bg bg-primary"  style="text-align:center;">
					<div id="message">
					</div>
					<form action="<?php echo base_url(); ?>upload/do_upload" name="subir" id="subir" enctype="multipart/form-data" method="post" accept-charset="utf-8">
						<div class="row">
							<input type="file" name="userfile" id="userfile" size="100" />
							<input type="hidden" id="cedula_visitante" name = "cedula_visitante" value="<?php echo $cedula; ?>">
						</div>
						<img src="<?php echo base_url(); ?>img/upload.png" id="img-upload" width="640" height="480"  style="width:12%;height:24%;z-index: 10;cursor:pointer;-webkit-filter:invert(1);filter:invert(1);" title="Cargar imagen al servidor" onClick="submit();"/>
					</form>
				</div>
			</div>
		<?php } ?>
		<div class="col-md-7 col-md-offset-3 panel panel-default">
			<?php echo form_open_multipart(site_url().'regvisitas/buscar_cedula'); ?>
			<!-- INICIO DEL PANEL DEL VISTANTE -->
			<div class="row">
				<div class="panel-heading text-center">
					<label><strong>DATOS DEL VISITANTE <?php echo base_url(); ?></strong></label>
				</div>
			</div>
			<!--INICIO DE LOS DATOS DE TEXTO -->
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-2">
						<div class="form-group">
							<label for="cedula" class="obligatorio">CÉDULA </label>
						</div>
					</div>
					<div class="col-md-8">
						<div class="form-group col-md-11">
							<input type="text" class="form-control" name="cedula" id="cedula" placeholder="Cédula del visitante" value="<?php echo $cedula; ?>" readonly>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<div class="form-group">
							<label for="nombre" class="obligatorio">NOMBRE</label>
						</div>
					</div>
					<div class="col-md-8">
						<div class="form-group col-md-11">
							<?php 
							if(strlen($nombre) > 0) {
								$lectura=" readonly ";
							} else {
								$lectura = "";
							}
							?>
							<input type="text" class="form-control" name="nombre" id= "nombre" placeholder="Nombre del visitante" value="<?php echo $nombre; ?>" <?php echo $lectura; ?>>
						</div>					
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<div class="form-group">
							<label for="telefono">TELÉFONO </label>
						</div>
					</div>
					<div class="col-md-8">
						<div class="form-group col-md-11">
							<input type="number" class="form-control" name="telefono" id="telefono" placeholder="Teléfono del visitante" value="<?php echo $telefono; ?>">
						</div>
						<div class="col-sm-1">
							<label class="obligatorio">&nbsp;</label>
						</div>								
					</div>
				</div>
			</div>
			<div class="col-md-11">
				<!-- 20181003-->
				<div class="row">
					<div class="col-md-2">
						<div class="form-group">
							<label for="estados" class="obligatorio">ESTADO</label>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group col-md-9">
							<?php echo form_dropdown('estados', $estados, $estado, array('id' => 'estados', 'class' => 'form-control col-md-12;' )); ?> 
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<div class="form-group">
							<label for="procedencia" class="obligatorio">PROCEDENCIA</label>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group col-md-9">
							<?php echo form_dropdown('procedencia', $procedencia, $id_procedencia, array('id' => 'procedencia', 'class' => 'form-control col-md-12;' )); ?> 
						</div>
						<div class="col-sm-1"  id="btnAgrProc">
							<span class="inv2"><i class="icon-plus btn btn-xs btn-bluegray" title="Agregar Procedencia"></i></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<div class="form-group">
							<label for="tipo_visitante" class="obligatorio">TIPO</label>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group col-md-9">
							<?php echo form_dropdown('tipo_visitante', $tipo_visitante, $id_tipo_visitante, array('id' => 'tipo_visitante', 'class' => 'form-control col-md-12;' )); ?> 
						</div>
						<div class="col-sm-1"  id="btnAgrTipo">						
							<span class="inv2"><i class="icon-plus btn btn-xs btn-bluegray" title="Agregar Tipo de Visitante"></i></span>
						</div>
					</div>
				</div>
			</div>
			<!-- INICIO DE LA TOMA DE LA FOTO -->
			<link href="<?php echo base_url(); ?>css/camara.css" rel="stylesheet">
			<img src="<?php echo $foto2; ?>" width="200px" height="200px" id="foto_visitante" class="margen-m-10">
		</div>
	</div>
	<!-- FIN DEL PANEL DE DATOS DEL VISITANTE -->
	<!-- INICIO DEL PANEL DE DATOS DEL DESTINO -->
	<div class="row" >
		<div class="col-md-7 col-md-offset-3 panel panel-default">
			<div class="panel-heading text-center">
				<label><strong>DATOS DEL DESTINO</strong></label>
			</div>
			<div class="row">
				<div class="col-md-2">
					<div class="form-group">
						<label for="empresa" class="obligatorio">EMPRESA</label>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group col-md-8">
						<?php echo form_dropdown('empresa', $empresa,'' , array('id' => 'empresa', 'class' => 'form-control col-md-12;' )); ?> 
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
					<div class="form-group">
						<label for="destino" class="obligatorio">DESTINO</label>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group col-md-8">
						<?php echo form_dropdown('destino', $destino,'' , array('id' => 'destino','disabled' => 'disabled', 'class' => 'form-control col-md-12;' )); ?> 
					</div>
					<div class="col-sm-1"  id="btnAgrDest">						
						<span class="inv"><i class="icon-plus btn btn-xs btn-bluegray" title="Agregar Destino"></i></span>
					</div>

				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
					<div class="form-group">
						<label for="motivo" class="obligatorio">MOTIVO</label>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group col-md-8">
						<?php echo form_dropdown('motivo', $motivo, '', array('id' => 'motivo', 'class' => 'form-control col-md-12;' )); ?> 
					</div>
					<div class="col-sm-1"  id="btnAgrMot">						
						<span class="inv"><i class="icon-plus btn btn-xs btn-bluegray" title="Agregar Motivo"></i></span>
					</div>
				</div>
			</div>
		</div>
	</div>	
	<!-- FIN DEL PANEL DE DATOS DEL DESTINO -->
	<!-- INICIO DEL PANEL DE DATOS DE LA AUTORIZACIÓN DE INGRESO -->
	<div class="row" >
		<div class="col-md-7 col-md-offset-3 panel panel-default">
			<div class="panel-heading text-center">
				<label><strong>AUTORIZACIÓN DE INGRESO</strong></label>
			</div>
			<!--INICIO DEL AUTOCOMPLETADO DE BUSQUEDA DEL PERSONAL DE LA SEDE CENTRAL -->
			<div>
				<div class="row">
					<div class="col-md-2">
						<div class="form-group">
							<label for="autorizado" class="obligatorio" >AUTORIZA </label>
						</div>
					</div>
					<div class="col-md-10">
						<div class="form-group col-md-9">
							<input type="text" class="form-control" name="autorizado" id="autorizado" placeholder="Servidor público que autoriza el ingreso" autocomplete="off">
							<div id="auto" class="col-md-12 rounded bg-primary border border-dark auto" ></div>
						</div>
						<div class="col-sm-2"  id="btnAgrAutor">	
							<span class="inv"><i class="icon-plus btn btn-xs btn-bluegray" title="Agregar Autorización"></i></span>
						</div>
					</div>
				</div>
				<!--FIN DEL AUTOCOMPLETADO DE BUSQUEDA DEL PERSONAL DE LA SEDE CENTRAL -->
				<!--INICIO DEL TEXTAREA DE OBSERVACIONES -->
				<div>
					<div class="row">
						<div class="col-md-2">
							<div class="form-group">
								<label for="observaciones">OBSERVACIONES </label>
							</div>
						</div>
						<div class="col-md-10">
							<div class="form-group col-md-11">
								<?php $data = array('name' => 'observaciones','id' => 'observaciones','rows' => '5','placeholder' => 'Introduzca aquí sus observaciones','class' => 'form-control');
								echo form_textarea($data);?>
							</div>
							<div class="col-sm-1">
								<label class="obligatorio">&nbsp;</label>
							</div>
						</div>
					</div>
					<div class= "row  text-center">
						<label class="obligatorio">LOS CAMPOS CON TÍTULOS EN ROJO Y NEGRILLAS SON OBLIGATORIOS</label>
					</div>
				</div>
				<!--FIN DEL TEXTAREA DE OBSERVACIONES-->
			</div>
		</div>
	</div>
</form>
<!-- INICIO DE LOS MODALES PARA AGREGAR -->
<!--AAGREGAR PROCEDENCIA-->
<div id="agrProcedencia" class="modal fade" tabindex="-1" >  
	<div class="modal-dialog">  
		<form method="post" id="procedencia_form" name="procedencia_form">  
			<div class="modal-content">  
				<div class="modal-header">  
					<button type="button" class="close" data-dismiss="modal">&times;</button>  
					<h4 class="modal-title">AGREGAR PROCEDENCIA DE LA VISITA</h4>  
				</div>  
				<div class="modal-body"> 		 
					<label>PROCEDENCIA</label>  
					<input type="text" name="txProcedencia" id="txProcedencia" class="form-control"/>
					<!-- <input type="text" name="procedencia" id="procedencia" class="form-control"/> -->
					<br />  
				</div>  
				<div class="modal-footer">
					<input type="hidden" name="id_procedencia" id="id_procedencia" /> 
					<button type="button" name="btnGuardar" id="btnGuardar" onClick="guardar('agrProcedencia','procedencia','txProcedencia_form','txProcedencia');" class="btn btn-success"> Guardar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>  
				</div>  
			</div>  
		</form>  
	</div>  
</div>
<!--AAGREGAR PROCEDENCIA-->
<!--AAGREGAR MOTIVO-->
<div id="agrMotivo" class="modal fade" tabindex="-1" >  
	<div class="modal-dialog">  
		<form method="post" id="motivo_form">  
			<div class="modal-content">  
				<div class="modal-header">  
					<button type="button" class="close" data-dismiss="modal">&times;</button>  
					<h4 class="modal-title">AGREGAR MOTIVO DE LA VISITA</h4>  
				</div>  
				<div class="modal-body">  
					<div class="row" >
						<div class="col-md-12">
							<label>MOTIVO</label>  
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<input type="text" name="txMotivo" id="txMotivo" class="form-control"/>  
						</div>
					</div> 
				</div>  
				<div class="modal-footer">
					<input type="hidden" name="id_motivo" id="id_motivo" value="0"/>  
					<button type="button" name="btnGuardar" id="btnGuardar" onClick="guardar('agrMotivo','motivo','motivo_form','txMotivo');" class="btn btn-success"> Guardar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>  
				</div>  
			</div>  
		</form>  
	</div>  
</div>
<!--AAGREGAR MOTIVO-->
<!--AAGREGAR TIPO-->
<div id="agrTipo" class="modal fade" tabindex="-1" >  
	<div class="modal-dialog">  
		<form method="post" id="tipovisitante_form">  
			<div class="modal-content">  
				<div class="modal-header">  
					<button type="button" class="close" data-dismiss="modal">&times;</button>  
					<h4 class="modal-title">AGREGAR TIPO DE VISITA</h4>
				</div>  
				<div class="modal-body">  

					<div class="row" >
						<div class="col-md-12">
							<label>TIPO</label>  
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<input type="text" name="txTipovisitante" id="txTipovisitante" class="form-control"/>  
						</div>
					</div> 
				</div>  
				<div class="modal-footer">
					<input type="hidden" name="id_tipovisitante" id="id_tipovisitante" value="0"/>  
					<button type="button" name="btnGuardar" id="btnGuardar" onClick="guardar('agrTipo','tipovisitante','tipovisitante_form','txTipovisitante');" class="btn btn-success"> Guardar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>  
				</div>  
			</div>  
		</form>  
	</div>  
</div>
<!--AAGREGAR TIPO-->
<!--AAGREGAR DESTINO-->
<div id="agrDestino" class="modal fade" tabindex="-1" >  
	<div class="modal-dialog">  
		<form method="post" id="destino_form">  
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
								<input type="hidden" name="id_destino" id="id_destino"/>
								<label><span id="etq_id_destino"></span></label>

							</div>
							<div class="col-sm-1">
								<label class="obligatorio">&nbsp;</label>
							</div>							
						</div>
					</div>

					<div class="row"> 
						<div class="col-md-2">
							<label>EMPRESA</label>
						</div>
						<div class="col-md-9 pull-right" style="margin-right:6% !important;" >
							<div class="form-group col-md-11">
								<?php echo form_dropdown('empresa1', $empresa,'' , array('id' => 'empresa1', 'class' => 'form-control col-md-12;' )); ?>
							</div>
							<div class="col-sm-1">
								<label class="obligatorio">&nbsp;*</label>
							</div>	
						</div>
					</div> 

					<div class="row"> 
						<div class="col-md-2">
							<label>DESTINO</label>
						</div>
						<div class="col-md-9 pull-right" style="margin-right:6% !important;" >
							<input type="text" name="destino1" id="destino1" class="form-control" placeholder="Introduzca el nombre del destino a crear"/>  
						</div>
					</div> 

					<div class="row"> 
						<div class="col-md-2">
							<label>ABREVIATURA</label>
						</div>
						<div class="col-md-9 pull-right" style="margin-right:6% !important;" >
							<input type="text" name="abrev" id="abrev" class="form-control" placeholder="Introduzca la abreviatura del destino"/>  
						</div>
					</div> 
				</div>  
				<div class="modal-footer">
					<button type="button" name="btnGuardar" id="btnGuardar" onClick="accion_guardar='add';guardar1();" class="btn btn-success"> Guardar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>  
				</div>  
			</div>  
		</form>  
	</div> 
</div>
<!--AAGREGAR DESTINO--> 
<!--AAGREGAR TRABAJADOR--> 
<div id="agrTrabajador" class="modal fade" tabindex="-1">  
	<div class="modal-dialog">  
		<form method="post" id="trabajador_form">  
			<div class="modal-content">  
				<div class="modal-header">  
					<button type="button" class="close" data-dismiss="modal">&times;</button>  
					<h4 class="modal-title"></h4>  
				</div>  
				<div class="modal-body">
					<div class="row"> 
						<div class="col-md-2">
							<label>EMPRESA</label>
						</div>
						<div class="col-md-9 pull-right" style="margin-right:6% !important;" >
							<div class="form-group col-md-11">
								<?php echo form_dropdown('empresa2', $empresa,'' , array('id' => 'empresa2', 'class' => 'form-control col-md-12;' )); ?>
							</div>
							<div class="col-sm-1">
								<label class="obligatorio">&nbsp;*</label>
							</div>	
						</div>
					</div> 					
					<div class="row" id="id_registro">  
						<div class=" col-md-2">
							<label>ID</label>  
						</div>
						<div class="col-md-10">
							<div class="form-group col-md-11">
								<input type="hidden" name="id_trabajador" id="id_trabajador"/>
								<label><span id="etq_id_trabajador"></span></label>

							</div>
							<div class="col-sm-1">
								<label class="obligatorio">&nbsp;</label>
							</div>							
						</div>
					</div>
					<div class="row"> 
						<div class="col-md-2">
							<label>CEDULA</label>
						</div>
						<div class="col-md-7 col-md-offset-1 pull-left" style="margin-left:15px !important;" >
							<input type="text" name="ci_trabajador2" id="ci_trabajador2" class="form-control" placeholder="Introduzca la cédula del trabajador"/>  
						</div>
						<div class="com-md-1">
							<button type="button" name="btnCne" id="btnCne" class="btn btn-info btn-XS" data-toggle="modal" data-target="#buscar" onClick="buscar_cne()">Buscar</button>							
						</div>							
					</div> 
					<div class="row"> 
						<div class="col-md-2">
							<label>NOMBRE</label>
						</div>
						<div class="col-md-9 pull-right" style="margin-right:6% !important;" >
							<input type="text" name="nombre_trabajador2" id="nombre_trabajador2" class="form-control" placeholder="Introduzca el nombre del trabajador"/>  
						</div>
					</div> 
					<div class="row"> 
						<div class="col-md-2">
							<label>STATUS</label>
						</div>
						<div class="col-md-3 col-md-offset-3">
							<!-- <div class="col-md-9 pull-right" style="margin-right:6% !important;" > -->
								<input type="checkbox" id="status" name = "status" checked data-toggle="toggle" data-on="ACTIVO" data-off="INACTIVO" data-onstyle="success" data-offstyle="danger" data-width="100%">						
							</div>
						</div> 
					</div>  
					<div class="modal-footer">
						<button type="button" name="btnGuardar" id="btnGuardar" onClick="guardar2();" class="btn btn-success"> Guardar</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>  
					</div>  
				</div>  
			</form>  
		</div> 
	</div>
	<!--AAGREGAR TRABAJADOR--> 
	<!--MODAL CNE -->
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
							<label>BUSCANDO LA DATA DEL TRABAJADOR...</label>
						</div>
					</div>
					

				</div>      
			</div>
		</div>
	</div>
	<!--MODAL CNE -->
	<!-- INICIO DE LOS MODALES PARA AGREGAR -->
	<!-- INICIO DEL FORM DEL SUBMIT -->
	<div class="row">
		<div class="col-md-7 col-md-offset-3">
			<form class="form-inline" role="form" action="<?php echo site_url().'regvisitas/mostrar_visita';?>" method="post" name="mostrar" id="mostrar">
				<div class="form-group">
					<div>
						<div class="row">
							<div class="col-md-12  col-md-offset-7">
								<button type="submit" class="form-control btn blue-grey blue-grey-text" name="submit" id="submit">Registrar Visita</button>
							</div>
							<div>
								<input type="hidden" name="ocedula" id="ocedula">
								<input type="hidden" name="onombre" id="onombre">
								<input type="hidden" name="otelefono" id="otelefono">
								<input type="hidden" name="oestados" id="oestados">
								<input type="hidden" name="oprocedencia" id="oprocedencia">
								<input type="hidden" name="otipo_visitante" id="otipo_visitante">
								<input type="hidden" name="omotivo" id="omotivo">
								<input type="hidden" name="opiso" id="opiso">
								<input type="hidden" name="oempresa" id="empresa">
								<input type="hidden" name="odestino" id="odestino">
								<input type="hidden" name="oautorizado" id="oautorizado">
								<input type="hidden" name="oobservaciones" id="oobservaciones">
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<!-- </form> -->
	<!-- FIN DEL FORM DEL SUBMIT -->
	<script src="<?php echo base_url(); ?>js/script.js"></script>
	<script type="text/javascript">
		$("#tipo_visitante").prop("disabled","disabled");
		$("#empresa").prop("disabled","disabled");
		$("#destino").prop("disabled","disabled");
		$("#motivo").prop("disabled","disabled");
		$("#autorizado").prop("disabled","disabled");
		$("#procedencia").on("change",function() {
			if ($(this).val()) {
				$("#tipo_visitante").removeAttr("disabled");
			} else {
				$("#tipo_visitante").prop("disabled","disabled");
			}
		});
		$("#tipo_visitante").on("change",function() {
			if ($(this).val()) {
				$("#empresa").removeAttr("disabled");
			} else {
				$("#empresa").prop("disabled","disabled");
			}
		});
		$("#empresa").on("change",function() {
			if ($(this).val()) {
				$("#destino").removeAttr("disabled");
			} else {
				$("#destino").prop("disabled","disabled");
			}
		});
		$("#destino").on("change",function() {
			if ($(this).val()) {
				$("#motivo").removeAttr("disabled");
			} else {
				$("#motivo").prop("disabled","disabled");
			}
		});
		$("#motivo").on("change",function() {
			if ($(this).val()) {
				$("#autorizado").removeAttr("disabled");
			} else {
				$("#autorizado").prop("disabled","disabled");
			}
		});
		var foto = 0;
		$("#btnAgrProc").on("click",function() {
			$("#procedencia_form")[0].reset();
			$("#agrProcedencia").modal('show');
		});
		$("#btnAgrTipo").on("click",function() {
			$("#tipovisitante_form")[0].reset();
			$("#agrTipo").modal('show');
			$("#agrTipo").modal('show');
		});
		$("#btnAgrMot").on("click",function() {
			$("#agrMotivo").modal('show');
			$("#motivo_form")[0].reset();
		});
		$("#btnAgrDest").on("click",function() {
			$("#agrDestino").modal('show');
			$("#destino1").val("");
			$("#abrev").val("");
			emp = $("#empresa").prop('selectedIndex');
			$("#empresa1").val(emp);
		});

		$("#btnAgrAutor").on("click",function() {
			accion_guardar = 'add';
			$("#trabajador_form")[0].reset();
			$("#agrTrabajador").modal('show');
			emp = $("#empresa").prop('selectedIndex');
			$("#empresa2").val(emp);
		});
		function guardar(frmModal,controlador,formulario,control){
			url=base_url+controlador+'/ajax_agregar';
			controles = $("#"+formulario).serialize();
			var campo_text =control+"="+$('#'+control).val();
			var valor = $('#'+control).val();
			data = campo_text;
			if (campo_text =="") {
				swal(
					'¡ERROR EN LA OPERACIÓN 11',
					error_texto,
					'error'
					);
			} else {
				$.ajax({
					url: url,
					type: 'POST',
					dataType: 'text',				
					data:data,
				})
				.done(function(data) {
					dat1 = data.split('\n');
					dat2 = dat1[0].replace('{"id":{"id":"','');
					dat = dat2.replace('"}}','');
					$('#item-list').dataTable().api().ajax.reload();
					if (controlador != "tipovisitante") {
						$('#'+controlador).append('<option value="'+dat+'" selected="selected">'+valor+'</option>');
						$('#'+controlador+' option[value='+dat+']').attr("selected",true);
						console.log("opcion controlador: "+controlador);
					} else {
						$('#tipo_visitante').append('<option value="'+dat+'" selected="selected">'+valor+'</option>');
						$('#tipo_visitante'+' option[value='+dat+']').attr("selected",true);
						console.log("tipo_visitante");
					}
					swal(
						'¡OPERACIÓN EXITOSA!',
						'El registro ha sido guardado',
						'success'
						);
					$("#"+frmModal).modal('hide');
					$("#"+formularia)[0].reset();
				})
				.fail(function() {
					$('#item-list').dataTable().api().ajax.reload();
					swal(
						'¡ERROR EN LA OPERACIÓN! -2',
						'El registro no se ha podido procesar',
						'error'
						);
					$("#"+frmModal).modal('hide');
					$("#"+formularia)[0].reset();
				})
				.always(function() {
				});
			}
		}
		$("#foto_visitante").on('load',function() {
			foto = 1;
		});
		function mostrar_modal() {
			var ancho = Math.trunc($(".ico-picedit-camera").width());
			var alto = Math.trunc($(".ico-picedit-camera").height());
			$("#img-upload").width(Math.trunc(75));
			$("#img-upload").height(Math.trunc(75));				
			$('#tomarFoto').modal('show');
		}
		$("#mostrar").submit(function( event ) {
			var cedula =$("#cedula").val();
			var nombre =$("#nombre").val();
			var telefono =$("#telefono").val();
			var pueblos =$("#pueblos").val();
			var estados =$("#estados").val();
			var procedencia =$("#procedencia").val();
			var tipo_visitante =$("#tipo_visitante").val();
			var motivo =$("#motivo").val();
			var piso =$("#piso").val();
			var empresa =$("#empresa").val();
			var destino =$("#destino").val();
			var autorizado =$("#autorizado").val();
			var observaciones =$("#observaciones").val();		
			$("#ocedula").val(cedula);
			$("#onombre").val(nombre);
			$("#otelefono").val(telefono);
			$("#opueblos").val(pueblos);
			$("#oestados").val(estados);
			$("#oprocedencia").val(procedencia);
			$("#otipo_visitante").val(tipo_visitante);
			$("#omotivo").val(motivo);
			$("#opiso").val(piso);
			$("#oempresa").val(empresa);
			$("#odestino").val(destino);
			$("#oautorizado").val(autorizado);
			$("#oobservaciones").val(observaciones);
			if (cedula =="" || nombre == "" || estados == "" || procedencia == "" || tipo_visitante == "" || motivo == "" || empresa == "" || destino == "" || autorizado == "") {
				swal("DEBE COMPLETAR TODOS LOS CAMPOS OBLIGATORIOS","","error");
				event.preventDefault();
			}
			foto = 1;
			if (foto == 0) {
				swal("DEBE TOMAR LA FOTO DEL VISITANTE PARA PODER CONTINUAR","","error");
				event.preventDefault();
			}
		});
		$(document).ready(function() {
			$("#observaciones").on('keyup', function() {
				var observaciones = $(this).val().toUpperCase();
				$(this).val(observaciones.toUpperCase());
			})
		});
		$(document).on('keyup', "input[type=text]", function () {
			$(this).val(function (_, val) {
				return val.toUpperCase();
			});
		});
		$(document).ready(function() {
			$("#btnAgrAutor").hide();
			$("#autorizado").on('keyup',function() {
				var autoriza = $(this).val().toUpperCase();
				if (autoriza.length>0) {
					$("#auto").slideDown();
					$("#auto").slideDown("slow");
					$(this).val(autoriza.toUpperCase());
					var empresa= $("#empresa option:selected").val();
					$.ajax({
						url: "<?php echo base_url(); ?>regvisitas/getAutorizado",
						type: 'POST',
						data: 'autoriza ='+autoriza+'&empresa = '+empresa,
						success:function(data) {
							var actual = $("#auto").html();
							var comple = data.split(",");
							var index = 0;
							var val = "";
							var personas="";
							comple.forEach(function(valor,indice,array) {
								index = ((((valor.substr(0,valor.indexOf(":"))).replace('"','')).replace('"','')).replace('{','')).replace('}','');
								val = ((((valor.substr(valor.indexOf(":"),valor.length-valor.indexOf(":"))).replace(":","")).replace("}","")).replace('"','')).replace('"','');
								var salto = "";
								var auto = "auto";
								cont = "<div id='"+val+"' class='resaltado' onClick='seleccionarAjax("+'"'+val+'"'+");'>"+val+"</div>";
								personas = personas+salto+cont;
							})
							$("#auto").html(personas);
						},
						error: function(data) {
							alert(data.responseText);
						}
					});				
				} else {
					$("#auto").slideUp();
					$("#auto").slideUp("slow");
					$("#auto").empty();
				}
			})
		});
		$(document).ready(function() {
			$("#destino").prop('disabled','disabled');
			$("#btnAgrDest").hide(100);
			$("#btnAgrMot").hide(100);
			$("#btnAgrAutor").hide(100);
			var tiempo = 250;
			$("#empresa").on('change', function() {
				$("#destino").prop('disabled','disabled');
				$("#btnAgrDest").hide(100);
				$("#btnAgrMot").hide(100);
				if ($("#btnAgrAutor").is(":visible")) {
					$("#btnAgrAutor").hide(100);	
				}
				var id_empresa = $(this).val();
				if(id_empresa) {
					$("#destino").prop('disabled',true);
					$("#btnAgrDest").hide(tiempo);
					$("#btnAgrMot").hide(tiempo);
					$("#btnAgrAutor").hide(tiempo);					
					if (id_empresa == 0 ) {
						$("#destino").prop('disabled',true);
						$("#btnAgrDest").hide(tiempo);
						$("#btnAgrMot").hide(tiempo);
						$("#btnAgrAutor").hide(tiempo);
					} else if (id_empresa == 1) {
						$("#destino").prop('disabled',false);
						$("#btnAgrDest").show(tiempo);
						$("#btnAgrMot").show(tiempo);
						$("#btnAgrAutor").hide(tiempo);
					} else {
						$("#destino").prop('disabled',false);
						$("#btnAgrDest").show(tiempo);
						$("#btnAgrMot").show(tiempo);						
						$("#btnAgrAutor").show(tiempo);
					}
					$.ajax({
						url: "<?php echo base_url(); ?>regvisitas/getDestino",
						type: 'POST',
						data: 'id_empresa ='+id_empresa,
						success:function(data) {
							var sep = data.split(",");
							$("#destino").empty();
							sep.forEach(function(valor,indice,array) {
								var index = ((((valor.substr(0,valor.indexOf(":"))).replace('"','')).replace('"','')).replace('{','')).replace('}','');
								var val = ((((valor.substr(valor.indexOf(":"),valor.length-valor.indexOf(":"))).replace(":","")).replace("}","")).replace('"','')).replace('"','');
								var opcion = '<option value = '+index+'>'+val+'</option>'
								if (opcion != '<option value = ></option>') {
									var opc = new Option(val,index);
									$(opc).html(val);
									$("#destino").append(opc);
								}
							});
						},
						error: function(data) {
							alert(data.responseText);
						}
					});
				} else {
					$('destino').html('<otion value = "">Seleccione primero la empresa>');
				}
			});
		});
	</script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/tablas/tabla_destino.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/tablas/tabla_trabajador.js"></script>