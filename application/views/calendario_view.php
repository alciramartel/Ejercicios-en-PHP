<?php 
	$dias = array(
		array("dia"=> "Lunes", "valor" => 1),
		array("dia"=> "Martes", "valor" => 2),
		array("dia"=> "Miércoles", "valor" => 3),
		array("dia"=> "Jueves", "valor" => 4),
		array("dia"=> "Viernes", "valor" => 5),
		array("dia"=> "Sábado", "valor" => 6),
		array("dia"=> "Domingo", "valor" => 0)
	);

	$meses = array(
		array("mes" => "Enero", "valor" => 01),
		array("mes" => "Febrero", "valor" => 02),
		array("mes" => "Marzo", "valor" => 03),
		array("mes" => "Abril", "valor" => 04),
		array("mes" => "Mayo", "valor" => 05),
		array("mes" => "Junio", "valor" => 06),
		array("mes" => "Julio", "valor" => 07),
		array("mes" => "Agosto", "valor" => 08),
		array("mes" => "Septiembre", "valor" => 09),
		array("mes" => "Octubre", "valor" => 10),
		array("mes" => "Noviembre", "valor" => 11),
		array("mes" => "Diciembre", "valor" => 12)
	);
	$actual = date('Y');
	date_default_timezone_set('UTC');
	date_default_timezone_set("America/Mexico_City");
	setlocale(LC_TIME, 'spanish');
?>
<form action="calendario" method="post">
	<div class="panel info contenedor">
		<div class="panel-header panel-encabezado">
			<h3>Conversor de unidades</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-sm-3">
					<label for="dia">D&iacute;a</label>
					<select name="dia" class="form-control input-sm">
						<?php 
							foreach ($dias as $key => $value) {
								echo '<option value="'.$value["valor"].'" '.((array_key_exists("dia", $_POST) && $_POST["dia"] == $value["valor"])? "selected":'').'>'.$value["dia"].'</option>';
							}
						?>
					</select>
				</div>
				<div class="col-sm-3">
					<label for="mes">Mes</label>
					<select name="mes" class="form-control input-sm">
						<?php 
							foreach ($meses as $key => $value) {
								echo '<option value="'.$value["valor"].'" '.((array_key_exists("mes", $_POST) && $_POST["mes"] == $value["valor"])? "selected":'').'>'.$value["mes"].'</option>';
							}
						?>
					</select>
				</div>
				<div class="col-sm-3">
					<label for="anio">An&ntilde;o</label>
					<select name="anio" class="form-control input-sm">
						<?php 
							if(array_key_exists("anio", $_POST)) $actual = $_POST["anio"];
							for ($i = ($actual - 30); $i < ($actual + 5); $i++) { 
								echo '<option value="'.$i.'" '.(($i == $actual)? 'selected':'').'>'.$i.'</option>';
							}
						?>
					</select>
				</div>
				<div class="col-sm-3">
					<input type="submit" name="ver" value="Procesar" class="btn btn-success btn-sm btn-p7">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 resultado">
					<div class="contenedor-msj">
						<ul>
							<?php
								if (count($_POST) > 0) {
									$dia = $_POST["dia"];
									$mes = $_POST["mes"];
									$anio = $_POST["anio"];
									
									$query_date = $anio.'-'.$mes.'-01';
									// First day of the month.
									$dIni = date_create(date('Y-m-01', strtotime($query_date)));
									$dFin = date_create(date('Y-m-t', strtotime($query_date)));
									// Last day of the month.
									while($dIni <= $dFin){
										$sfecha = date_format($dIni,"Y-m-d");
										$fecha = strtotime($sfecha);
										if(date('w', $fecha) == $dia) echo '<li>'.utf8_encode(strftime("%d de %B %Y", $fecha)).'</li>';
										$dIni = date_create(date('Y-m-d', strtotime($sfecha. ' + 1 days')));
									}
								}
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
	