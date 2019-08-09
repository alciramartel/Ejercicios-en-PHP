
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/login.css"> 
</head>
<body>
	<div class="container-fluid contenedor">
		<div class="formulario">
			<div class="login">
				<?php echo form_open('login/validarusuario'); ?>
					<div class="row titulo">
						<div class="col-md-12">
							<h3>Inicio de Sesi&oacute;n</h3>
						</div>
					</div>
					<div class="row contenido">
						<div class="col-sm-12">
							<label for="matricula">Matricula</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								<input type="text" class="form-control input-sm" name="matricula" id="matricula" <?php if(array_key_exists('matricula', $_POST)) echo 'value="'.$_POST['matricula'].'"'; ?>/>
							</div>
						</div>
						<div class="col-sm-12">
							<label for="password">Contrase&ntilde;a</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								<input type="password" name="password" class="form-control input-sm" id="password"  <?php if(array_key_exists('password', $_POST)) echo 'value="'.$_POST['password'].'"'; ?>/>
							</div>
						</div>
						<div class="col-sm-3 col-btn">
							<input type="submit" class="btn btn-sm btn-primary btn-block" name="login" value="Login" id="btnLogin" class="btn-default">
						</div>
					</div>	
					<div class="msg-err" role="alert" >
						<?php echo validation_errors(); ?>
					</div>	
					<div class="row registro">
						<a href="registro"><i>Registrarse</i></a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>