<?php 

namespace core;

session_start();

date_default_timezone_set('America/Lima');
header('Content-Type: text/html; charset=utf-8');

#Constantes de conexión
define('DB_HOST','127.0.0.1');
define('DB_USER','root');
define('DB_PASS','America2');
define('DB_NAME','IAMGOLD');
define('DB_PORT', 3307);
define('DB_SOCKET', 'mysqli.default_socket');

#Constantes aplicación
define('HTML_DIR', 'html/');
define('APP_TITLE', 'IAMGOLD PERU S.A.');
define('APP_COPY','Copyright &copy; ' . date('Y',time()) .  ' ' . APP_TITLE . '  All rights reserved.');
define('APP_URL', 'http://10.0.14.27/');

#Estructura
require('models/class.Conexion.php');




?>