<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/estilo.css">
</head>
<body>
	<div class="container">
		<form action="registro/guardar" method="post">
			<?php include('regstro_form.php'); ?>	
		</form>
	</div>
	<script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/modales.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/registro.js" type="text/javascript"></script>
</body>
</html>