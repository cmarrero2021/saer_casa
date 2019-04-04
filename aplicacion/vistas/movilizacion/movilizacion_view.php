<container>
	<div class="row">
		<div class="container" style="overflow-x:scroll;">
			<table id="item-list" class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th>ACCIONES</th>
						<th>ID</th>
						<th>FECHA</th>
						<th>AEROPUERTO</th>
						<th>EMBARQUES NAC. GEN.</th>
						<th>EMBARQUES NAC. COM.</th>
						<th>EMBARQUES INT. GEN.</th>
						<th>EMBARQUES INT. COM.</th>
						<th>DESEMBARQUES NAC. GEN.</th>
						<th>DESEMBARQUES NAC. COM.</th>
						<th>DESEMBARQUES INT. GEN.</th>
						<th>DESEMBARQUES INT. COM.</th>
						<th>DESPEGUES NAC. GEN.</th>
						<th>DESPEGUES NAC. COM.</th>
						<th>DESPEGUES INT. GEN.</th>
						<th>DESPEGUES INT. COM.</th>
						<th>ATERRIZAJES NAC. GEN.</th>
						<th>ATERRIZAJES NAC. COM.</th>
						<th>ATERRIZAJES INT. GEN.</th>
						<th>ATERRIZAJES INT. COM.</th>
						<th>DEMORAS EMBARQUES NAC. GEN.</th>
						<th>OBS. DEMORAS EMBARQUES NAC. GEN.</th>
						<th>DEMORAS EMBARQUES NAC. COM.</th>
						<th>OBS. DEMORAS EMBARQUES NAC. COM</th>
						<th>DEMORAS EMBARQUES INT. GEN.</th>
						<th>OBS. DEMORAS EMBARQUES INT. GEN.</th>
						<th>DEMORAS EMBARQUES INT. COM.</th>
						<th>OBS. DEMORAS EMBARQUES INT. COM</th>
						<th>DEMORAS DESEMBARQUES NAC. GEN.</th>
						<th>OBS. DEMORAS DESEMBARQUES NAC. GEN.</th>
						<th>DEMORAS DESEMBARQUES NAC. COM.</th>
						<th>OBS. DEMORAS DESEMBARQUES NAC. COM</th>
						<th>DEMORAS DESEMBARQUES INT. GEN.</th>
						<th>OBS. DEMORAS DESEMBARQUES INT. GEN.</th>
						<th>DEMORAS DESEMBARQUES INT. COM.</th>
						<th>OBS. DEMORAS DESEMBARQUES INT. COM</th>
						<th>DEMORAS DESPEGUES NAC. GEN.</th>
						<th>OBS. DEMORAS DESPEGUES NAC. GEN.</th>
						<th>DEMORAS DESPEGUES NAC. COM.</th>
						<th>OBS. DEMORAS DESPEGUES NAC. COM</th>
						<th>DEMORAS DESPEGUES INT. GEN.</th>
						<th>OBS. DEMORAS DESPEGUES INT. GEN.</th>
						<th>DEMORAS DESPEGUES INT. COM.</th>
						<th>OBS. DEMORAS DESPEGUES INT. COM</th>
						<th>DEMORAS ATERRIZAJES NAC. GEN.</th>
						<th>OBS. DEMORAS ATERRIZAJES NAC. GEN.</th>
						<th>DEMORAS ATERRIZAJES NAC. COM.</th>
						<th>OBS. DEMORAS ATERRIZAJES NAC. COM</th>
						<th>DEMORAS ATERRIZAJES INT. GEN.</th>
						<th>OBS. DEMORAS ATERRIZAJES INT. GEN.</th>
						<th>DEMORAS ATERRIZAJES INT. COM.</th>
						<th>OBS. DEMORAS ATERRIZAJES INT. COM</th>







						<th>fecha_creacion</th>
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
		<form method="post" id="tipo_form">  
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
								<input type="hidden" name="id_tipo" id="id_tipo"/>
								<label><span id="etq_id_tipo"></span></label>
							</div>
						</div>
					</div>
					<div class="row"> 
						<div class="col-md-3">
							<label>TIPO</label>
						</div>
						<div class="col-md-8 pull-right" style="margin-right:6% !important;" >
							<input type="text" name="tipo" id="tipo" class="form-control" placeholder="Introduzca el nombre del tipo de aeropuerto a crear"/>  
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
							<label><span id="id_tipo_ficha"></span></label>
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
<script type="text/javascript" src="<?php echo base_url(); ?>js/tablas/tabla_movilizacion.js"></script>