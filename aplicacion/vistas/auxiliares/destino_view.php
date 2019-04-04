<container>
	<div class="row">
		<div class="container">
			<table id="item-list" class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th>ACCIONES</th>
						<th>EMPRESA</th>
						<th>ID</th>
						<th>DESTINO</th>
						<th>ABREIATURA</th>
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
								<?php echo form_dropdown('empresa', $empresa,'' , array('id' => 'empresa', 'class' => 'form-control col-md-12;' )); ?>
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
							<input type="text" name="destino" id="destino" class="form-control" placeholder="Introduzca el nombre del destino a crear"/>  
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
							<label><span id="id_destino_ficha"></span></label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label>EMPRESA</label>
						</div>
						<div class="col-md-8">
							<label><span id="empresa_ficha"></span></label>
						</div>
					</div>					
					<div class="row">
						<div class="col-md-4">
							<label>DESTINO</label>
						</div>
						<div class="col-md-8">
							<label><span id="destino_ficha"></span></label>
						</div>
					</div>					
					<div class="row">
						<div class="col-md-4">
							<label>ABREVIATTURA</label>
						</div>
						<div class="col-md-8">
							<label><span id="abreviatura_ficha"></span></label>
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
<script type="text/javascript" src="<?php echo base_url(); ?>js/tablas/tabla_destino.js"></script>