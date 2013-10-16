<?php

/*
$db_host = $_ENV['OPENSHIFT_DB_HOST'];
$db_user = $_ENV['OPENSHIFT_DB_USERNAME'];
$db_pass = $_ENV['OPENSHIFT_DB_PASSWORD'];
$db_name = $_ENV['OPENSHIFT_APP_NAME'];
$db_port = $_ENV['OPENSHIFT_DB_PORT'];
$db_url	 = $_ENV['OPENSHIFT_DB_URL']
$socket  = $_ENV['OPENSHIFT_MYSQL_DB_SOCKET']

#define("DB_DSN", "mysql://$db_host:$db_port/;dbname=$db_name;unix_socket=$socket");
#define("DB_DSN", "$db_url;dbname=$db_name");
define("DB_DSN", "mysql:dbname=".db_name.";host=".db_host.";port=".db_port);
define("DB_USUARIO", db_user);
define("DB_CONTRASENIA", db_pass);
define("TAMANIO_PAGINA", 5);
define("TABLA_USUARIOS", "usuario");
define("TABLA_NOTICIAS", "noticia");
define("TABLA_COMENTARIOS", "comentario");
*/

	define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST'));
    define('DB_USER',getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
    define('DB_PASS',getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
    define('DB_BASE','gitspot');
    define('DB_PORT',getenv('OPENSHIFT_MYSQL_DB_PORT')); 

    define('DB_DSN' , 'mysql:dbname='.DB_BASE.';host='.DB_HOST.';port='.DB_PORT.'');
    define("DB_USUARIO", DB_USER);
	define("DB_CONTRASENIA", DB_PASS);
	define("TAMANIO_PAGINA", 5);
	define("TABLA_USUARIOS", "usuario");
	define("TABLA_NOTICIAS", "noticia");
	define("TABLA_COMENTARIOS", "comentario");
?>
