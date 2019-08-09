<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<div class="panel editor">
		<div class="panel-header panel-encabezado">
			<h3>Subir Archivos</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-sm-6">
					<input type="file" name="archivos" id="archivos"  class="btn btn-sm" style="width: 100%; padding-left: 0px;">
					<input type="hidden" name="files" id="files">
				</div>
				<div class="col-sm-2">
					<a href="#" class="btn btn-sm btn-success btn-block" id="btnSubir" title="Subir archivo(s)"><i class="fa fa-upload">&nbsp;Archivo(s)</i></a>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-8">
					<table class="table table-hover" id="tblArchivos">
						<thead>
							<tr>
								<th>#</th>
								<th>Nombre</th>
								<th style="width:150px;">Opciones</th>
							</tr>
						</thead>
						<tbody>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</form>