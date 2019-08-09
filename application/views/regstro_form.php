<div class="panel contenido">
	<div class="panel-header panel-encabezado">
		<div class="col-sm-6">
			<h3>Registro</h3>
		</div>
		<div class="col-sm-6" style="padding-right: 0px;">
			<img src="<?php echo base_url(); ?>assets/uploads/perfiles/profil.png" class="avatar pull-right" id="avatar">
		</div>	
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-sm-6">
				<label for="matricula">Matrícula</label>
				<input type="text" name="matricula" class="form-control input-sm" id="matricula" />
			</div>
			<div class="col-sm-6">
				<input type="file" name="perfil" id="perfil" class="btn btn-sm  btn-default pull-right btn-avatar btn-block"  accept=".gif,.jpg,.jpeg,.png">
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre" class="form-control input-sm" />
			</div>
			<div class="col-sm-6">
				<label for="apellido">Apellido(s)</label>
				<input type="text" name="apellido" id="apellido" class="form-control input-sm" />
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<label for="pasword">Contraseña</label>
				<input type="password" name="password" class="form-control input-sm" id="password" />
			</div>
			<div class="col-sm-6">
				<label for="confirmpassword">Cofirmar Contraseña</label>
				<input type="password" name="confirmpassword" class="form-control input-sm" id="cnfmpwd" />
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<label for="correo">Corcreo</label>
				<input type="email" name="correo" class="form-control input-sm" id="correo" />
			</div>
			<div class="col-sm-6">
				<label for="confirmarcorreo">Confirmar Correo</label>
				<input type="email" name="confirmarcorreo" class="form-control input-sm" id="cnfmcorreo" />
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<label for="website">Sitio Web</label>
				<input type="text" name="website" class="form-control input-sm" id="website" />
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<label for="descripcion">Descripción</label>
				<textarea name="descripcion" id="descripcion" class="form-control"></textarea>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-2 btn-avatar">
				<a href="index" style="color: #C0C0C0;">Regresar</a>
			</div>
			<div class="col-sm-2 pull-right">
				<a href="#" class="btn btn-sm btn-success btn-block boton" id="btnPerfil"><i class="fa fa-save"></i>&nbsp;Guardar</a>
			</div>
		</div>
	</div>
</div>