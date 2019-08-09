<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

ERROR - 2016-08-02 17:03:02 --> Severity: Notice  --> Undefined index: categoria C:\xampp\htdocs\casasantoslugo\moduloweb\application\controllers\indicador_usuario.php 58
ERROR - 2016-08-02 17:33:57 --> Severity: Notice  --> Undefined variable: UsuarioAlta C:\xampp\htdocs\casasantoslugo\moduloweb\application\views\nuevoservicio_view.php 268
ERROR - 2016-08-02 17:33:57 --> Severity: Notice  --> Undefined variable: UsuarioAlta C:\xampp\htdocs\casasantoslugo\moduloweb\application\views\nuevoservicio_view.php 269
ERROR - 2016-08-02 17:33:57 --> Severity: Notice  --> Undefined variable: UsuarioAl C:\xampp\htdocs\casasantoslugo\moduloweb\application\views\nuevoservicio_view.php 269
ERROR - 2016-08-02 17:44:37 --> Severity: Notice  --> Undefined variable: UsuarioAlta C:\xampp\htdocs\casasantoslugo\moduloweb\application\views\nuevoservicio_view.php 268
ERROR - 2016-08-02 17:44:37 --> Severity: Notice  --> Undefined variable: UsuarioAlta C:\xampp\htdocs\casasantoslugo\moduloweb\application\views\nuevoservicio_view.php 269
ERROR - 2016-08-02 17:44:37 --> Severity: Notice  --> Undefined variable: UsuarioAl C:\xampp\htdocs\casasantoslugo\moduloweb\application\views\nuevoservicio_view.php 269
ERROR - 2016-08-02 18:44:52 --> Query error: [Microsoft][SQL Server Native Client 10.0][SQL Server]
	SELECT 
		ID, 
		REPLACE(Descripcion, '"', '\"') Descripcion, 
		Periodo, 
		CategoriaIndicador, 
		REPLACE(Glosario, '"', '\"') Glosario,
		CASE WHEN Estado = 'AC' THEN 'ACTIVO'
		     WHEN Estado = 'BQ' THEN 'BLOQUEADO'
			 WHEN Estado = 'BJ' THEN 'BAJA' END Estado
	FROM 
		TicEnfIndicador 
	WHERE  Estado = 'AC'  ORDER BY FechaAlta DESC 
ERROR - 2016-08-02 18:44:54 --> Query error: [Microsoft][SQL Server Native Client 10.0][SQL Server]
	SELECT 
		ID, 
		REPLACE(Descripcion, '"', '\"') Descripcion, 
		Periodo, 
		CategoriaIndicador, 
		REPLACE(Glosario, '"', '\"') Glosario,
		CASE WHEN Estado = 'AC' THEN 'ACTIVO'
		     WHEN Estado = 'BQ' THEN 'BLOQUEADO'
			 WHEN Estado = 'BJ' THEN 'BAJA' END Estado
	FROM 
		TicEnfIndicador 
	WHERE  Estado = 'BQ'  ORDER BY FechaAlta DESC 
ERROR - 2016-08-02 19:49:35 --> Severity: Warning  --> Missing argument 7 for indicador_model::update_indicador(), called in C:\xampp\htdocs\casasantoslugo\moduloweb\application\controllers\indicadores.php on line 57 and defined C:\xampp\htdocs\casasantoslugo\moduloweb\application\models\indicador_model.php 22
ERROR - 2016-08-02 19:49:35 --> Severity: Notice  --> Undefined variable: Estatus C:\xampp\htdocs\casasantoslugo\moduloweb\application\models\indicador_model.php 33
ERROR - 2016-08-02 19:52:36 --> Severity: Warning  --> Missing argument 7 for indicador_model::update_indicador(), called in C:\xampp\htdocs\casasantoslugo\moduloweb\application\controllers\indicadores.php on line 57 and defined C:\xampp\htdocs\casasantoslugo\moduloweb\application\models\indicador_model.php 22
ERROR - 2016-08-02 19:52:36 --> Severity: Notice  --> Undefined variable: Estado C:\xampp\htdocs\casasantoslugo\moduloweb\application\models\indicador_model.php 33
