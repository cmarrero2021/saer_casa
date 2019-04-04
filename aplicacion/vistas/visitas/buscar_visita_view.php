	<form class="form-inline" role="form" action="<?php echo site_url().'regvisitas/buscar_visitor';?>" method="post">
		<div class="form-group">
			<label for="busqueda">INTRODUZCA LA CÉDULA DEL VISITANTE </label>
		</div>
		<div class="form-group">
			<input type="text" class="form-control" name="buscar_visita" placeholder="Cédula del visitante">
		</div>
		<button type="submit" class="btn btn-info" name="submit" >Consultar</button>
	</form>