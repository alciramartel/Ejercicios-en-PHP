<form action="matriz" method="post">
	<div class="panel info contenedor">
		<div class="panel-header panel-encabezado">
			<div class="row">
				<div class="col-sm-6">
					<h3>Matriz 3x3</h3>
				</div>
				<div class="col-sm-6">
					<h3>Matriz transpuesta</h3>
				</div>
			</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-sm-6">
					<div class="row">
						<div class="col-sm-4">
							<label for=""></label>
							<input type="number" name="a1" <?php if(array_key_exists("a1", $_POST)) echo 'value="'.$_POST["a1"].'"'; ?> class="form-control input-sm">
						</div>
						<div class="col-sm-4">
							<label for=""></label>
							<input type="number" name="a2" <?php if(array_key_exists("a2", $_POST)) echo 'value="'.$_POST["a2"].'"'; ?> class="form-control input-sm">
						</div>
						<div class="col-sm-4">
							<label for=""></label>
							<input type="number" name="a3" <?php if(array_key_exists("a3", $_POST)) echo 'value="'.$_POST["a3"].'"'; ?> class="form-control input-sm">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<label for=""></label>
							<input type="number" name="b1" <?php if(array_key_exists("b1", $_POST)) echo 'value="'.$_POST["b1"].'"'; ?> class="form-control input-sm">
						</div>
						<div class="col-sm-4">
							<label for=""></label>
							<input type="number" name="b2" <?php if(array_key_exists("b2", $_POST)) echo 'value="'.$_POST["b2"].'"'; ?> class="form-control input-sm">
						</div>
						<div class="col-sm-4">
							<label for=""></label>
							<input type="number" name="b3" <?php if(array_key_exists("b3", $_POST)) echo 'value="'.$_POST["b3"].'"'; ?> class="form-control input-sm">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<label for=""></label>
							<input type="number" name="c1" <?php if(array_key_exists("c1", $_POST)) echo 'value="'.$_POST["c1"].'"'; ?> class="form-control input-sm">
						</div>
						<div class="col-sm-4">
							<label for=""></label>
							<input type="number" name="c2" <?php if(array_key_exists("c2", $_POST)) echo 'value="'.$_POST["c2"].'"'; ?> class="form-control input-sm">
						</div>
						<div class="col-sm-4">
							<label for=""></label>
							<input type="number" name="c3" <?php if(array_key_exists("c3", $_POST)) echo 'value="'.$_POST["c3"].'"'; ?> class="form-control input-sm">
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<?php
							if(count($_POST) > 0){
								$a1 = $_POST["a1"];
								$a2 = $_POST["a2"];
								$a3 = $_POST["a3"];
								$b1 = $_POST["b1"];
								$b2 = $_POST["b2"];
								$b3 = $_POST["b3"];
								$c1 = $_POST["c1"];
								$c2 = $_POST["c2"];
								$c3 = $_POST["c3"];	

								$dato = array(array($a1, $b1, $c1),array($a2, $b2, $c2), array($a3, $b3, $c3));
								foreach ($dato as $key => $value) {
									echo '<div class="row">';
									foreach ($value as $i => $item) {
										echo '<div class="col-sm-4"><label for=""></label><input type="number" value="'. $item .'" readonly="readonly" class="form-control input-sm"/></div>';
									}
									echo '</div>';
								}
							}
						?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-2">
					<input type="submit" value="Procesar" class="btn btn-sm btn-p7 btn-success" />
				</div> 	
			</div>
			<div class="row">
				<div class="col-sm-12 resultado">
					<div class="contenedor-msj">
						<?php
							if(count($_POST) > 0){
								$total = ($a1 * $b2 * $c3) + ($b1 * $c2 * $a3) + ($c1 * $a2 * $b3);
			 					$total = $total + (($a3 * $b2 * $c1) * -1) + (($b3 * $c2 * $a1) * -1) + (($c3 * $a2 * $b1	) *-1);	
								echo '<p><i>Determinante:&nbsp;</i>'. $total .'</p><p>';
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>