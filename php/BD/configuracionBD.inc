<?php

$db_host = $_ENV['OPENSHIFT_DB_HOST'];
$db_user = $_ENV['OPENSHIFT_DB_USERNAME'];
$db_pass = $_ENV['OPENSHIFT_DB_PASSWORD'];
$db_name = $_ENV['OPENSHIFT_APP_NAME'];
$db_port = $_ENV['OPENSHIFT_DB_PORT'];
$db_url	 = $_ENV['OPENSHIFT_DB_URL']

#define("DB_DSN", "mysql://$db_host:$db_port/;dbname=$db_name");
define("DB_DSN", "$db_url;dbname=$db_name");
define("DB_USUARIO", "$db_user");
define("DB_CONTRASENIA", "$db_pass");
define("TAMANIO_PAGINA", 5);
define("TABLA_USUARIOS", "usuario");
define("TABLA_NOTICIAS", "noticia");
define("TABLA_COMENTARIOS", "comentario");

?>
