<!DOCTYPE html>

<html lang="es">

    <head>

        <title>El periódico</title>
        <meta charset="UTF-8"/>

        <meta name ="author" content="Antonio Ángel Guirola Vicente"/>
        <meta name="description" content="Periódico para la práctica evaluable 1 de TW"/>
        <link rel="stylesheet" type="text/css" href="noticiaDeportes.css"/>

    </head>

    <body>

        <!-- BANNERS PUBLICITARIOS -->

        <section id="bannerIzq" class="bannerLateral">
            <img  src="banners/Banner-Vertical_144x24.jpg"/>
        </section>

        <section id="bannerDer" class="bannerLateral">
            <img  src="banners/Banner-Vertical_144x24.jpg"/>
        </section>

        <section class="bannerCent">
            <img src="banners/banner-central.jpg"/>
        </section>


        <!-- SECCION PRINCIPAL -->

        <section class="seccionPrincipal">

            <!-- NOMBRE Y MENÚ -->

            <section class="seccionNombrePeriodico">
                <a href="../"><img src="../img/logo.png"></a>
            </section>

            <section class="seccionRegistro">
                <?php
                session_start();
                //var_dump($_SESSION);
                if (count($_SESSION) == 0) {
                    echo "
                <form action=\"../login.php\" method=\"POST\">
                    <fieldset>
                        <legend>Entrar/Registrarse</legend>
                        <label for=\"fieldUsername\">Usuario:</label>
                        <input type = \"text\" name=\"fieldUsername\" autofocus/>
                        <label for=\"fieldPassword\">Contraseña:</label>
                        <input type = \"password\" name=\"fieldPassword\"/>
                        <input type = \"submit\" id = \"botonEnviar\" value = \"Aceptar\"/>
                        <br/>
                        <a href=\"../formularioRegistro.php\">Registrarse</a>
                    </fieldset>
                </form>
                <br>
                ";
                } else {
                    $keys = array_keys($_SESSION);
                    $usuarioActivo = end($keys);
                    //echo $usuarioActivo;
                    echo "
                    <form action=\"../login.php\" method=\"POST\">
                    <fieldset>
                        <strong>Bienvenido, $_SESSION[$usuarioActivo]</strong>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input hidden type = \"text\" name=\"cerrarSesion\" value=\"$usuarioActivo\"/>
                        <input type = \"submit\" id = \"botonCerrarSesion\" value = \"Cerrar sesión\"/>
                    </fieldset>
                    </form>
                    ";
                }
                ?>

                <br/>
            </section>

            <section class="seccionSecciones">
                <a href="../nacional.php">Nacional</a>
                <a href="../internacional.php">Internacional</a>
                <a href="../tecnologia.php">Tecnología</a>
                <a class="seccionActual" href="../deportes.php">Deportes</a>
            </section>


            <!-- COLUMNA IZQUIERDA -->

            <section class="seccionNoticiasIzq">

                <article class="cuerpoNoticia"><?php require_once '../funcionesGenerales.php';mostrarNoticiasRelacionadas();?>                      

                    <h1 class="titulo" onmouseover="abrirDialogo();">Tito Vilanova: "No hay lesión de Messi, pero no se siente bien"</h1>

                    <img src="no-hay-lesion-messi-20130501/no-hay-lesion-messi-20130501.jpg">

                    <h1 class="subtitulo">El entrenador del Barça reconoce que el argentino no estaba al 100%.</h1>

                    <h1 class="subtitulo">Si el resultado hubiera sido otro, Leo Messi sí hubiera salido al campo.</h1>

                    <h1 class="subtitulo">Vilanova felicitó al Bayern por el partido que hicieron en el Camp Nou.</h1>


                    <p>El entrenador del FC Barcelona, Tito Vilanova, ha comentado tras perder en el Camp Nou contra el FC Bayern Múnich (0-3) en la vuelta de la semifinal de Liga de Campeones, con 7-0 en el global para los bávaros, que han dado la cara y competido hasta el final pero que "no" han podido hacerlo, ante un club bávaro a quien ha felicitado por el nivel mostrado aunque ha matizado que, estando su equipo al cien por cien, habría sido distinto.</p>

                    <p>"Felicito al Bayern por llegar a la final, por el nivel en semifinales, y gracias a la afición que con resultado en contra nos ha animado hasta el final. Siempre hemos dado la cara hasta el final, se lo he pedido antes y en el descanso. Con un gol tan rápido en la segunda parte, que pesa mucho, ves lo que ha pasado y todo va en contra. El Bayern ha llegado en un nivel físico muy bueno, nosotros por bajas y poco entrenamiento, en este nivel, la diferencia es demasiado grande. Hemos competido hasta el final pero no hemos podido", manifestó en rueda de prensa.</p>

                    <p>Además, comentó que autocrítica la hacen siempre y donde más a nivel interno, por lo que ha tomado nota de todo. "Es normal que te cuesta, ¿a quién no? Cuenta que hemos llegado a semifinales, no ha sido la que todos esperábamos pero hay bastante motivos para ello. No es lo que queríamos, pero habiendo llegado nosotros al cien por cien habríamos competido de otra manera", aseguró.</p>

                    <p>"Nos hicieron 4 goles allí, no quiero repetir cómo, y ha pesado mucho. Hay que mejorar para llegar al nivel del Bayern. Todos los años reforzamos la plantilla. Hay que recuperar los que tenemos que son muy buenos y que se llegue a finales de temporada con todo. La plantilla sigue siendo muy buena con una base joven", comentó, negando que se tenga que hacer un cambio grande en ella.</p>

                    <p>En cuanto a Messi, explicó que una mala sensación les hizo pactar que no jugara si es que no había opciones reales de remontada. "Messi notó una sensación extraña al final del partido en San Mamés. No hay lesión, pero no se siente cómodo ni bien, la sensación es que con alguna acción explosiva se podía romper, y tenía la sensación de que así no ayudaría al equipo, estar en el banquillo era por si había ocasión de remontar", argumentó. continúa una temporada más, algunos titulares "tendrían que marcharse".</p>

                    <p>Noticia extraída de <a href="http://www.20minutos.es">20 minutos</a></p>

                </article> <!-- FIN DEL CUERPO DE LA NOTICIA -->


                <article class="opinionesLectores">
                    <h4>Comentarios</h4>
                    <?php
                    require_once '../BD/configuracionBD.inc';
                    require_once '../BD/DataObject.class.inc';
                    require_once '../BD/Comentario.class.inc';
                    
                    $rutaCompleta = $_SERVER['PHP_SELF'];
                    $array = explode("/", $rutaCompleta);
                    $atajo = end($array);
                    //echo $atajo."<br/>";
                    
                    //insertamos un nuevo comentario si es necesario
                    if (isset($_POST["campoComentario"])) {
                        $keys = array_keys($_SESSION);
                        $usuarioActivo = end($keys);
                        Comentario::insertarComentario($usuarioActivo, $atajo, $_POST["campoComentario"]);
                    }

                    //Se muestran los comentarios ya escritos
                    $coms=Comentario::obtenerComentariosNoticia(0, 20, "fecha desc", $atajo);
                    foreach ($coms[0] as $fila) {
                        $user = $fila->datos["usuario"];
                        $cuerpo = $fila->datos["cuerpo_comentario"];
                        $fecha = $fila->datos["fecha"];
                        echo "Escrito por <strong>$user</strong> :";
                        echo "<br/><br/>";
                        echo $cuerpo . "<br/><br/>";
                        echo "<em>$fecha</em><br/>";
                        echo "----------------------------------------------------------------------------------------------------------<br/><br/>";
                    }

                    //si se trata de un usuario registrado se le permite escribir comentarios
                    if (count($_SESSION) != 0) {
                        echo "
                           <form action=\"$rutaCompleta\" method=\"POST\">
                    <fieldset>
                        <legend>Escribir comentario</legend>
                        <textarea name=\"campoComentario\" rows=\"10\" cols=\"50\"></textarea>
                        <br/>
                        <input type = \"submit\" id = \"botonEnviar\" value = \"Enviar comentario\"/>
                        <br/>
                    </fieldset>
                </form>   <br/><br/>                     
                        ";
                    }
                    ?>
                </article>

            </section>

            <!-- COLUMNA DERECHA -->

            <section class="seccionNoticiasDer">

                <article id="noticiasRelacionadas">
                    <h2>noticias relacionadas </h2>
                </article>

                <article class="anunciosPeq">
                    <h2>Publicidad</h2>
                    <img src="banners/mini-ninjas-banner.jpg">
                    <img src="banners/amazon-banner.png">
                </article>

            </section>


            <!-- PIE DE PÁGINA -->

            <footer>
                <br/>
                <ul>
                    <li>C/Periodista Daniel Saucedo Aranda, s/n · E-18071 GRANADA (Spain) · +34-958242802</li>
                    <li><a href="mailto:elperiodico@etsiit.es">Escríbenos</a></li>
                    <li><a href="../formularioSuscripcion.php">Suscríbete a la edición impresa</a></li>
                    <li><a href="../practicaEvaluableII.pdf">Cómo se hizo</a></li>
                </ul>
            </footer>

        </section>  <!--fin de la sección principal-->

    </body>

</html>