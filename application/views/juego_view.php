<form action="juego" method="post">
	<div class="panel info contenedor">
		<div class="panel-header panel-encabezado">
			<h3>Juego de naipes</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-sm-3">
					<label for="nombre">Nombre jugador</label>
					<input type="text" name="nombre" class="form-control input-sm" value="<?php if(array_key_exists("nombre", $_POST)) echo $_POST["nombre"] ?>">
				</div>
				<div class="col-sm-3">
					<input type="submit" name="jugar" value="Jugar" class="btn btn-sm btn-p7 btn-success">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 resultado">
					<div class="contenedor-msj">
						<?php
							if (count($_POST) > 0) {
								if($_POST["nombre"] == "")
									echo '<span><strong>Ingrese un nombre de jugador</strong></span>';
								else {
									$jugador1 = getNaipe('');
									echo '<span>'.$_POST["nombre"].':&nbsp;<i>'.$jugador1['face'].' de '.$jugador1['suit'].'</i></span></br>';
									$jugador2 = getNaipe($jugador1['face']);
									echo '<span>Casa:&nbsp;<i>'.$jugador2['face'].' de '.$jugador2['suit'].'</i></span></br>';
									$cartas = array(
										'As' => 14,
										'Dos' => 2,
										'Tres' => 3,
										'Cuatro' => 4,
										'Cinco' => 5,
										'Seis' => 6,
										'Siete' => 7,
										'Ocho' => 8,
										'Nueve' => 9,
										'Diez' => 10,
										'Jota' => 11,
										'Reina' => 12,
										'Rey' => 13
									);

									echo '<div class="baraja '.$jugador1['face'].'-'.$jugador1['suit'].'"></div>';

									$v1 = $cartas[$jugador1['face']];
									$v2 = $cartas[$jugador2['face']];
									if($v1 == $v2) echo '<h3>Empate.</h3>';
									else if ($v1 < $v2) echo '<h3>Gana: <i>Casa</i></h3>'; 
									else echo '<h3>Gana: <i>'.$_POST["nombre"].'</i></h3>';
								}	
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<?php
	function getNaipe($obtenido){
	 	$suits = array('Picas','Corazones','Diamantes','Tréboles');
	 	$faces = array('As','Dos','Tres','Cuatro','Cinco','Seis','Siete','Ocho','Nueve','Diez','Jota','Reina','Rey');

	 	$deck = array();
		foreach ($suits as $suit) {
		    foreach ($faces as $face) {
		        $deck[] = array ("face"=>$face, "suit"=>$suit);
		    }
		}

		shuffle($deck);
	 	$card = array_shift($deck);
	 	while ($card['face'] == $obtenido) {
	 		$card = array_shift($deck);
	 	}
	 	return $card;
	} 
?>