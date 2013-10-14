<!DOCTYPE html>

<html lang="es">

    <head>

        <title>El periódico</title>
        <meta charset="UTF-8"/>

        <meta name ="author" content="Antonio Ángel Guirola Vicente"/>
        <meta name="description" content="Periódico para la práctica evaluable 1 de TW"/>
        <link rel="stylesheet" type="text/css" href="noticiaInternacional.css"/>

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
                <a class="seccionActual" href="../internacional.php">Internacional</a>
                <a href="../tecnologia.php">Tecnología</a>
                <a href="../deportes.php">Deportes</a>
            </section>


            <!-- COLUMNA IZQUIERDA -->

            <section class="seccionNoticiasIzq">

                <article class="cuerpoNoticia"><?php require_once '../funcionesGenerales.php';mostrarNoticiasRelacionadas();?>                      

                    <h1 class="titulo" onmouseover="abrirDialogo();">Unas 70 niñas afganas resultan intoxicadas mientras hacían cola en una escuela de Kabul</h1>

                    <img src="ninias-afganas-intoxicadas-20130501/ninias-afganas-intoxicadas-20130501.jpg">

                    <h1 class="subtitulo">Las chicas, de entre 12 y 18 años de edad, estaban haciendo cola en la puerta para entrar a sus respectivas aulas y de repente comenzaron a marearse.</h1>

                    <h1 class="subtitulo">"Estamos investigando lo ocurrido. No está claro por qué han perdido la consciencia", afirma el Gobierno afgano.</h1>

                    <h1 class="subtitulo">Según medios afganos, las niñas respiraron supuestamente una sustancia química que fue rociada en la zona con un espray.</h1>


                    <p>Al menos 70 niñas de una escuela han perdido este míercoles la consciencia a causa de un aparente envenenamiento en Kabul, en el último de una serie de misteriosos casos en Afganistán cuya autoría algunos han atribuido a la insurgencia talibán, aunque esta la rechaza. </p>

                    <p>El incidente ocurrió a primera hora de la mañana local en el centro educativo femenino Sultán Razia de la capital del país asiático, según explicó el portavoz del Ministerio afgano de Educación, Amanulá Aimán. Las chicas, de entre 12 y 18 años de edad, estaban haciendo cola en la puerta de la escuela para entrar a sus respectivas aulas y de repente comenzaron a marearse.</p>

                    <p>"Más de 70 niñas han sido envenenadas. Estamos investigando lo ocurrido. No está claro por qué han perdido la consciencia", dijo Aimán. Según medios afganos, las niñas respiraron supuestamente una sustancia química que fue rociada en la zona con un espray. La fuente consultada agregó que las menores fueron trasladadas a hospitales cercanos y algunas de ellas han recibido ya el alta médica, mientras que muchas otras continúan en mal estado y tienen vómitos.</p>

                    <p>Los casos de intoxicaciones en escuelas femeninas son bastante frecuentes en Afganistán y generalmente están rodeados de cierto misterio. En julio del año pasado, al menos cien estudiantes quedaron inconscientes en un incidente parecido en las afueras de Kabul.</p>

                    <p>Muchos analistas responsabilizan de estos envenenamientos a los talibanes, pero portavoces de los rebeldes han negado su implicación en estos sucesos. Los insurgentes, no obstante, se oponen a la educación de las niñas y adolescentes y la prohibieron de hecho durante su régimen fundamentalista islámico en el país (1996-2001).</p>

                    <p>Desde la caída de los talibanes a raíz de la invasión estadounidense la comunidad internacional ha puesto mucho énfasis en impulsar la educación femenina en Afganistán.</p>

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