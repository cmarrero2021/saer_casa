<container>
	<div class="row">
		<div class="container">
			<table id="item-list" class="table table-bordered table-striped table-hover">
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
</container>
<div id="userModal" class="modal fade" tabindex="-1">  
	<div class="modal-dialog">  
		<form method="post" id="aeropuerto_form">  
			<div class="modal-content">  
				<div class="modal-header">  
					<button type="button" class="close" data-dismiss="modal">&times;</button>  
					<h4 class="modal-title"></h4>  
				</div>  
				<div class="modal-body">
					<div class="row" id="id_registro">  
						<div class=" col-md-3">
							<label>ID</label>  
						</div>
						<div class="col-md-9">
							<div class="form-group col-md-11">
								<input type="hidden" name="id_aeropuerto" id="id_aeropuerto"/>
								<label><span id="etq_id_aeropuerto"></span></label>
							</div>
						</div>
					</div>
					<div class="row"> 
						<div class="col-md-3">
							<label>TIPO</label>
						</div>
						<div class="col-md-8 " style="margin-right:6% !important;" >
							<div class="form-group col-md-12">
								<?php echo form_dropdown('tipo', $tipo,'' , array('id' => 'tipo', 'class' => 'form-control col-md-12;' )); ?>
							</div>
						</div>
					</div> 
					<div class="row"> 
						<div class="col-md-3">
							<label>IATA</label>
						</div>
						<div class="col-md-8 pull-right" style="margin-right:6% !important;" >
							<input type="text" name="iata" id="iata" class="form-control" placeholder="Introduzca el código IATA del aeropuerto a crear"/>  
						</div>
					</div> 
					<div class="row"> 
						<div class="col-md-3">
							<label>OACI</label>
						</div>
						<div class="col-md-8 pull-right" style="margin-right:6% !important;" >
							<input type="text" name="oaci" id="oaci" class="form-control" placeholder="Introduzca la código OACI del aeropuerto a crear"/>  
						</div>
					</div> 
					<div class="row"> 
						<div class="col-md-3">
							<label>AEROPUERTO</label>
						</div>
						<div class="col-md-8 pull-right" style="margin-right:6% !important;" >
							<input type="text" name="aeropuerto" id="aeropuerto" class="form-control" placeholder="Introduzca el nombre del aeropuerto a crear"/>  
						</div>
					</div> 
					<div class="row"> 
						<div class="col-md-3">
							<label>DENOMINACIÓN</label>
						</div>
						<div class="col-md-8 pull-right" style="margin-right:6% !important;" >
							<input type="text" name="denominacion" id="denominacion" class="form-control" placeholder="Introduzca la denominación del aeropuerto a crear"/>  
						</div>
					</div> 
					<div class="row"> 
						<div class="col-md-3">
							<label>ESTADO</label>
						</div>
						<div class="col-md-8" style="margin-right:6% !important;" >
							<div class="form-group col-md-12">
								<?php echo form_dropdown('estado', $estado,'' , array('id' => 'estado', 'class' => 'form-control col-md-12;' )); ?>
							</div>

						</div>
					</div> 
					<div class="row"> 
						<div class="col-md-3">
							<label>ADMINISTRADO</label>
						</div>
						<div class="col-md-8 pull-right" style="margin-right:6% !important;" >
							<input type="text" name="administrado" id="administrado" class="form-control" placeholder="Introduzca si el aeropuerto a crear es administrado"/>  
						</div>
					</div> 
				</div>  
				<div class="modal-footer">
					<button type="button" name="btnGuardar" id="btnGuardar" onClick="guardar1();" class="btn btn-success"> Guardar</button>
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
							<label><span id="id_aeropuerto_ficha"></span></label>
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
							<label>IATA</label>
						</div>
						<div class="col-md-8">
							<label><span id="iata_ficha"></span></label>
						</div>
					</div>					
					<div class="row">
						<div class="col-md-4">
							<label>OACI</label>
						</div>
						<div class="col-md-8">
							<label><span id="oaci_ficha"></span></label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label>AEROPUERTO</label>
						</div>
						<div class="col-md-8">
							<label><span id="aeropuerto_ficha"></span></label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label>DENOMINACIÓN</label>
						</div>
						<div class="col-md-8">
							<label><span id="denominacion_ficha"></span></label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label>ESTADO</label>
						</div>
						<div class="col-md-8">
							<label><span id="estado_ficha"></span></label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label>ADMINISTRADO</label>
						</div>
						<div class="col-md-8">
							<label><span id="administrado_ficha"></span></label>
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
<script type="text/javascript" src="<?php echo base_url(); ?>js/tablas/tabla_aeropuertos.js"></script>