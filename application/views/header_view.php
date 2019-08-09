
<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
	<link href="<?php echo base_url(); ?>assets/css/estilo.css" rel="stylesheet">	
</head>
<body>
	<div class="container-fluid">
		<!--Menú de cabecera-->
		<div class="row">
			<div class="col-md-12 menu-header">
				<span class="menu-suario">Usuario:&nbsp;<i><?php echo $this->session->userdata('usuario')->Matricula; ?></i></span>
				<img src="<?php echo base_url().$this->session->userdata('usuario')->imgPerfil; ?>" class="pull-right img-perfil"/>
			</div>
		</div>
		<div class="row menuprincipal">
			<nav class="navbar-default">
				<div class="navbar-header">
			      <a class="navbar-brand inicio" href="index" title="Inicio"><i class="fa fa-home fa-2x"></i></a>
			    </div>
			    <ul class="nav navbar-nav">
			     	<li id="matriz"><a href="matriz">Matriz</a></li>
					<li id="calculadora"><a href="calculadora">Calculadora</a></li>
					<li id="distancia"><a href="distancia">Distancia</a></li>
					<li id="calendario"><a href="calendario">Calendario</a></li>
					<li id="rfc"><a href="rfc">RFC</a></li>
					<li id="juego"><a href="juego">Juego</a></li>
					<li id="imc"><a href="imc">IMC</a></li>
					<li id="archivo"><a href="archivo">Crear Archivo</a></li>
					<li id="cropimage"><a href="cropimage">Recortar Imagen</a></li>
					<li id="uploadfile"><a href="uploadfile">Subir Archivos</a></li>
					<li><a href="login/logout_ci">Salir</a></li>
			    </ul>
			</nav>
		</div>
		<!--Menú Principal-->
		<!--<div class="row">
			<div class="col-md-12 menuprincipal">
				<ul class="menu mh">
					<li><a href="#">Matriz</a></li>
					<li><a href="#">Calculadora</a></li>
					<li><a href="#">Distancia</a></li>
					<li><a href="#">Calendario</a></li>
					<li><a href="rfc">RFC</a></li>
					<li><a href="#">Juego</a></li>
					<li><a href="#">Calendario</a></li>
					<li><a href="login/logout_ci">Salir</a></li>
				</ul>		
			<</div>-->
		</div>