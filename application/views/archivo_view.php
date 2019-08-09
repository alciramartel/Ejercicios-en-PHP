<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<div class="panel info contenido editor">
		<div class="row">
			<div class="col-sm-8">
				<div class="panel-header panel-encabezado">
					<h3>Crear Archivos</h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-8">
							<label for="nombre">Nombre aarchivo</label>
							<input type="text" name="nombre" class="form-control input-sm" id="nombre">
						</div>
						<div class="col-sm-2">
							<label for="extension">Extensi&oacute;n</label>
							<select name="extension" class="form-control input-sm" name="extension">
								<option value="txt">txt</option>
								<option value="docx">word</option>
								<option value="pdf">pdf</option>
								<option value="xml">xml</option>
							</select>
						</div>
						<div class="col-sm-2">
							<a href="#" class="btn btn-sm btn-p24 btn-success btn-block"><i class="fa fa-save">&nbsp;Guardar</i></a>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<label for="contenido">Contenido</label>
							<textarea class="form-control input-sm" name="contenido" id="contenido" rows="20">						
							</textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="panel-header">
					<h3>Archivos Creados</h3>
				</div>
				<div class="row">
					<div class="col-sm-12" style="overflow-y: auto; height: 500px;">
						<table class="table table-stiped">
							<thead>
								<tr>
									<td>#</td>
									<td>Nombre</td>
									<td>Opciones</td>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>