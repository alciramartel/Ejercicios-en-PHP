<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

ERROR - 2016-03-23 09:38:20 --> Severity: Notice  --> Undefined index: Estatus C:\xampp\htdocs\SantosLugo\ModuloWeb\application\controllers\indicadores.php 76
ERROR - 2016-03-23 09:40:46 --> Severity: Notice  --> Undefined index: Estatus C:\xampp\htdocs\SantosLugo\ModuloWeb\application\controllers\indicadores.php 76
ERROR - 2016-03-23 09:42:30 --> Severity: Notice  --> Undefined index: Estatus C:\xampp\htdocs\SantosLugo\ModuloWeb\application\controllers\indicadores.php 76
ERROR - 2016-03-23 09:49:11 --> 404 Page Not Found --> Modulo
ERROR - 2016-03-23 09:49:20 --> 404 Page Not Found --> Modulo
ERROR - 2016-03-23 09:52:32 --> 404 Page Not Found --> Modulo
ERROR - 2016-03-23 10:30:47 --> Query error: [Microsoft][ODBC Driver 11 for SQL Server][SQL Server] 
			SELECT 
				Indicador ID, 
				(Select Descripcion FROM TicEnfIndicador where ID = Indicador) Descripcion,
				Valor
			FROM TicUsuarioIndicador WHERE LTRIM(RTRIM(Usuario)) = 'ACOMPRAS' AND Estatus <> 'BAJA'
ERROR - 2016-03-23 10:30:51 --> Query error: [Microsoft][ODBC Driver 11 for SQL Server][SQL Server] 
			SELECT 
				Indicador ID, 
				(Select Descripcion FROM TicEnfIndicador where ID = Indicador) Descripcion,
				Valor
			FROM TicUsuarioIndicador WHERE LTRIM(RTRIM(Usuario)) = 'ASISTEMAS' AND Estatus <> 'BAJA'
ERROR - 2016-03-23 13:37:15 --> Severity: Notice  --> Undefined index: Periodo C:\xampp\htdocs\SantosLugo\ModuloWeb\application\controllers\indicador_usuario.php 83
ERROR - 2016-03-23 17:18:20 --> Severity: Notice  --> Undefined index: Usuario C:\xampp\htdocs\SantosLugo\ModuloWeb\application\controllers\reportes.php 45
