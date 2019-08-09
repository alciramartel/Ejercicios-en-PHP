<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<div class="panel info contenedor">
		<div class="panel-header" style="padding: 0px 15px;">
			<div class="row">
				<div class="col-sm-4">
					<h3>Recortar Imagen</h3>		
				</div>
			</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-sm-3">
					<input type="file" name="file" id="file" class="btn btn-sm"  accept=".gif,.jpg,.jpeg,.png" style="width: 100%; padding-left: 0px;">
				</div>
				<div class="col-sm-3">
					<a href="#" class="btn btn-sm btn-success" id="subir" title="Subir imagen"><i class="fa fa-upload">&nbsp;Imagen</i></a>
					<a href="#" class="btn btn-sm btn-success" id="guardar" title="guardar recorte"><i class="fa fa-save">&nbsp;Recorte</i></a>
				</div>
				<div class="col-sm-4">
					<table class="table table-striped" id="recortes">
						<thead>
							<tr>
								<th>#</th>
								<th>Nombre</th>
								<th>Opciones</th>
							</tr>
						</thead>
						<tbody>
							
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div align="center">
					<img src="" id="imagen" style="float: left; margin-right: 10px;">
					<div class="resultado-img">
						<img src="" id="rimagen" style="position: relative; display: none;">
					</div>
				</div>
				<!--<div class="col-sm-5">
					<div class="contenedor-img">
						<img src="" id="imagen">
					</div>
				</div>
				<div class="col-sm-3">
					<div class="resultado-img">
						<img src="" id="rimagen">
					</div>
				</div>-->
			</div>
			<div class="row">
				<div class="col-sm-12">
					<input type="hidden" name="x1" value="" id="x1" />
					<input type="hidden" name="y1" value="" id="y1" />
					<input type="hidden" name="x2" value="" id="x2" />
					<input type="hidden" name="y2" value="" id="y2" />
					<input type="hidden" name="w" value="" id="w" />
					<input type="hidden" name="h" value="" id="h" />
				</div>
			</div>
		</div>
	</div>
</form>