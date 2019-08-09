<form action="calculadora" method="post">
	<div class="panel info contenedor">
		<div class="panel-header panel-encabezado">
			<h3>Conversor de unidades</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-sm-3">
					<label for="unidad">Unidad:</label>
					<select name="unidad" class="form-control input-sm">
						<option value="1" <?php if(array_key_exists("unidad", $_POST) && $_POST["unidad"] == "1") echo 'selected="selected"'; ?>>Binario</option>
						<option value="2" <?php if(array_key_exists("unidad", $_POST) && $_POST["unidad"] == "2") echo 'selected="selected"'; ?>>Decimal</option>
						<option value="3" <?php if(array_key_exists("unidad", $_POST) && $_POST["unidad"] == "3") echo 'selected="selected"'; ?>>Hexadecimal</option>
					</select>
				</div>
				<div class="col-sm-3">
					<label for="valor">Valor a coonvertir</label>
					<input type="text" name="valor" value="<?php if(array_key_exists("valor", $_POST)) echo $_POST["valor"]?>"  class="form-control input-sm"/>
				</div>
				<div class="col-sm-3">
					<input type="submit" name="calular" value="Convertir" class="btn btn-success btn-p7 btn-sm">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 resultado">
					<div class="col-sm-12 contenedor-msj">
						<?php 
							if (count($_POST) > 0) {
								$unidad = $_POST["unidad"];
								$valor = $_POST["valor"];
								switch ($unidad) {
									case '1':
										$dec = bindec($valor);
										$hex = dechex($dec);
										
										echo '<div class="col-sm-12"><label for="decimal">Decimal:</label><input type="text" value="'. $dec .'" readonly="readonly" class="form-control input-sm" /></div>';
										echo '<div class="col-sm-12"><label for="hexadecimal">Hexadecimal:</label><input type="text" value="'. $hex .'" readonly="readonly"  class="form-control input-sm"/></div>';
										break;
									case '2':
										$bin = decbin($valor);
										$hex = dechex($valor);
										
										echo '<div class="col-sm-12"><label for="binario">Binario:</label><input type="text" value="'. $bin .'" readonly="readonly" class="form-control input-sm"/></div>';
											echo '<div class="col-sm-12"><label for="hexadecimal">Hexadecimal:</label><input type="text" value="'. $hex .'" readonly="readonly" class="form-control input-sm"/></div>';
										break;
									case '3':
										$dec = hexdec($valor);
										$bin = decbin($dec);
										
										echo '<div class="col-sm-12"><label for="binario">Binario:</label><input type="text" value="'. $bin .'" readonly="readonly" class="form-control input-sm"/></div>';
										echo '<div class="col-sm-12"><label for="decimal">Decimal:</label><input type="text" value="'. $dec .'" readonly="readonly" class="form-control input-sm"/></div>';
										break;
								}
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
	