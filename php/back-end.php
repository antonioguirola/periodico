<!DOCTYPE html>
<html>

    <head lang="es">
        <meta charset="UTF-8">
        <title>Panel de administración</title>
        <script type="text/javascript" src="js/validacionFormularios.js"></script>
    </head>

    <body>

        <?php
        require_once './BD/configuracionBD.inc';
        require_once './BD/DataObject.class.inc';
        require_once './BD/UltimaNoticia.class.inc';

        //comprobamos si hemos insertado alguna noticia nueva
        if (isset($_POST["campoTitulo"]) && isset($_POST["campoCuerpo"])) {
            UltimaNoticia::insertarUltimaNoticia($_POST["campoTitulo"], $_POST["campoCuerpo"]);
        }

        //o si hemos marcado algunas para eliminar
        if (isset($_POST["noticiaSeleccionada"])) {
            foreach ($_POST["noticiaSeleccionada"] as $not) {
                UltimaNoticia::eliminarUltimaNoticia($not);
            }
        }
        ?>

        <h2>Panel de administración</h2>

        <form action="./back-end.php" method="POST">
            <fieldset>
                <legend>Insertar noticia a la sección de últimas noticias</legend>
                <h4>Título:</h4>
                <input type="text" name="campoTitulo" size="50">
                <h4>Cuerpo de la noticia:</h4>
                <textarea name="campoCuerpo" rows="10" cols="50" onkeypress="limitarCaracteres(this,300);"></textarea>
                <br/>
                <input type = "submit" id = "botonEnviar" value = "Aceptar"/>
                <input type = "reset" id = "botonBorrar" value = "Limpiar formulario"/>
            </fieldset>
        </form>

        <br/>

        <form action="./back-end.php" method="POST">
            <fieldset>
                <legend>Noticias actuales</legend>
                <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID &nbsp;&nbsp;  
                    &nbsp;Título &nbsp;&nbsp; Fecha</h6>
                <?php
                $resultados = UltimaNoticia::obtenerUltimasNoticias(0, 100, "id asc");
                foreach ($resultados[0] as $fila) {
                    $id = $fila->datos["id"];
                    $titulo = $fila->datos["titulo"];
                    $cuerpo = $fila->datos["cuerpo"];
                    $fecha = $fila->datos["fecha"];
                    echo "<input type=\"checkbox\" name=\"noticiaSeleccionada[]\" value=\"$id\"> &nbsp;";
                    echo "$id  &nbsp;&nbsp; $titulo &nbsp;&nbsp; $fecha";
                    echo "<br>";
                }
                ?>
                <br/>
                <input type = "submit" id = "botonEnviar" value = "Borrar seleccionados"/>
            </fieldset>
        </form>

        <form action="index.php">
            <input type = "submit" id = "botonInicio" value = "Volver a la página principal"/>
        </form>
    </body>  

</html>

