<?php

require_once './BD/configuracionBD.inc';
require_once './BD/DataObject.class.inc';
require_once './BD/Usuario.class.inc';

if (!isset($_POST)) {
    die();
}

//var_dump($_POST);
//
//recuperamos la sesión por si hubiera
session_start();

if (isset($_POST["cerrarSesion"])) {
    //cerramos la sesión
    $userSaliente = $_POST["cerrarSesion"];
    unset($_SESSION["$userSaliente"]);
    header("Location: ./index.php");
    //echo "intentando borrar la sesión de $userSaliente";
}

if (isset($_POST["fieldUsername"]) && isset($_POST["fieldPassword"])) {
//obtenemos los datos de logeo
    $userRecibido = $_POST["fieldUsername"];
    $passRecibido = $_POST["fieldPassword"];

//comprobamos si existe algún usuario con esos datos:
    $usuario = Usuario::obtenerUsuario($userRecibido);
    if ($usuario != "" && $usuario->datos["password"] == $passRecibido) {
        //si es el administrador el que entra redireccionamos al panel de administración
        if ($userRecibido == "admin") {
            header("Location: ./back-end.php");
        } else if (!isset($_SESSION[$userRecibido])) {
            //creamos la variable de sesión y guardamos el nombre del usuario
            $_SESSION[$userRecibido] = $usuario->datos["nombre"];
            header("Location: ./index.php");
        }
    } else {
        header("Location: ./index.php");
    }
}

//echo "<br>";
////prueba de inserción de usuarios
//Usuario::insertarUsuario("user3", "pass3", "nombre3", "ap3", null, "2013-13-6");
//$resultados = Usuario::obtenerUsuarios(0, 100, "nombreUsuario asc");
//foreach ($resultados[0] as $fila) {
//    $user = $fila->datos["nombreUsuario"];
//    $pass = $fila->datos["password"];
//    echo "$user  $pass";
//    echo "<br>";
//    //var_dump($fila);
//}
?>
