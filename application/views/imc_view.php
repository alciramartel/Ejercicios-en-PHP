<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<div class="panel info contenedor">
		<div class="panel-header panel-encabezado">
			<h3>Índice de masa corporal</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-sm-3">
					<label for="altura">Altura</label>
					<input type="text" name="altura" class="form-control input-sm">
				</div>
				<div class="col-sm-3">
					<label for="peso">Peso</label>
					<input type="number" name="peso" class="form-control input-sm">
				</div>
				<div class="col-sm-3">
					<input type="submit" name="calcular" value="Calcular" class="btn btn-sm btn-p7 btn-success">
				</div>
			</div>
			<div class="row">
				<div class="resultado">
					<div class="contenedor-msj">
						<?php
							if(count($_POST) > 0){
								$altura = $_POST["altura"];
								$peso = $_POST["peso"];
								$imc = $peso/pow($altura, 2);
								echo '<span>IMC: <i>'.round($imc, 2).'</i></span>&nbsp;<span>Clasificaci&oacute;n:&nbsp;'.getClasificacion($imc).'</span>';
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<?php
 	function getClasificacion($imc){
		$tipo = "";
		if($imc > 40) $tipo = "Obesidad tipo III";
		else if($imc <= 40 && $imc >= 35) $tipo = "Obesidad tipo II";
		else if($imc < 35 && $imc >= 30) $tipo = "Obseidad tipo I";
		else if($imc < 30 && $imc >= 25) $tipo = "Sobrepeso";
		else if($imc < 25 && $imc >= 18.50) $tipo = "Normal";
		else if($imc < 18.50 && $imc >= 17) $tipo = "Delgadez aceptable";
		else if($imc < 17 && $imc >= 16) $tipo = "Delgadez moderada";
		else $tipo = "Delgadez severa";
		return  $tipo;
	}
?>