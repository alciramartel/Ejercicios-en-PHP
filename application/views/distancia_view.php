<form action="distancia" method="post">
	<div class="panel info contenedor">
		<div class="panel-header panel-encabezado">
			<h3>Distancia recorrido</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-sm-3">
					<label for="velocidad">Velocidad</label>
					<div class="input-group">
						<input type="number" name="velocidad" <?php if(array_key_exists("velocidad", $_POST)) echo 'value="'.$_POST["velocidad"].'"'; ?> class="form-control input-sm"/>
						<span class="input-group-addon">m/s</span>
					</div>
				</div>
				<div class="col-sm-3">
					<label for="tiempo">Tiempo</label>
					<div class="input-group">
						<input type="number" name="tiempo" <?php if(array_key_exists("tiempo", $_POST)) echo 'value="'.$_POST["tiempo"].'"'; ?> class="form-control input-sm"/>
						<span class="input-group-addon">seg.</span>
					</div>
				</div>
				<div class="col-sm-3">
					<input type="submit" name="calcular" value="Calcular" class="btn btn-sm btn-p7 btn-success">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 resultado">
					<div class="contenedor-msj">
						<?php 
							if(count($_POST) > 0){
								echo '<span>Distancia:&nbsp;<i>'. $_POST["tiempo"] * $_POST["velocidad"] .'&nbsp;metros</i></span>';
							}
						?>
					</div>
				</div>
			</div>	
		</div>
	</div>
</form>