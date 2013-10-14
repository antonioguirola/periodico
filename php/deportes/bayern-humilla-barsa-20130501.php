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

                    <h1 class="titulo" onmouseover="abrirDialogo();">El Bayern humilla al Barça</h1>

                    <img src="bayern-humilla-barsa-20130501/bayern-humilla-barsa-20130501.jpg">

                    <h1 class="subtitulo">Durísima derrota de un Barcelona en el que no jugó Leo Messi (0-3).</h1>

                    <h1 class="subtitulo">Los alemanes confirmaron su superioridad con una goleada en el Camp Nou.</h1>

                    <h1 class="subtitulo">El 7-0 en el total de la eliminatoria deja clara la diferencia que hubo.</h1>


                    <p>No hubo milagro. Ni cerca. Ni jamás se creyó en él. La suplencia de Messi, confirmada a pocos minutos del comienzo, acabó con la escasa fe que había en el Barça de lograr la remontada ante el Bayern. El partido confirmó lo que todos temían y el poderoso equipo alemán no solo dejó a los culés fuera de la final de la Champions, sino que les humilló exhibiendo una superioridad insultante (0-3). </p>

                    <p>El inicio de partido de los alemanes fue arrollador. Presión asfixiante muy arriba, robos de balón continuos y dos flechas en las bandas (Ribery y Robben) que fueron una pesadilla. Solo el excelso partido de Piqué, imperial, evitó que llegara algún gol que finiquitara antes la eliminatoria.</p>

                    <p>En los últimos 20 minutos de partido, el Barça tuvo una tímida reacción y un pequeño arreón de juego le llevó a visitar el área del Bayern. Xavi tuvo la más clara, y dos disparos de Adriano y Pedro hicieron que al menos se viera a Neuer.</p>

                    <p>Pero este equipo sin Messi es otro equipo. Ni verticalidad arriba, ni sensación de peligro ni nada que se le pareciera. Xavi distribuyó pero sin pases mortales, Iniesta estuvo sobremarcado y ni Villa ni Pedro inquietaron en ningún momento al equipo bávaro.</p>

                    <p>Tras el descanso, el Bayern sacó el rodillo y decidió matar definitivamente la eliminatoria. Más punzante en las contras, en una de ellas Robben hizo de Robben. La jugada que llevamos viéndole años por la banda derecha acabó con el zurdazo del holandés y la sentencia definitiva.</p>

                    <p>Con el tanto de los alemanes y aún 35 minutos por jugarse, lo peligroso era que el Barça se viniera abajo. Y se vino. Los alemanes olieron la sangre, aprovecharon que los culés bajaron los brazos y se lanzaron al cuello azulgrana sin ningún tipo de piedad. Piqué no tuvo suerte e hizo un autogol y después Muller remató de cabeza con poderío. Lo peor de todo, la ausencia de orgullo culé.</p>

                    <p>El 7-0 final deja clara la diferencia entre ambos equipos. El cambio de ciclo está servido.</p>

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
                    $coms = Comentario::obtenerComentariosNoticia(0, 20, "fecha desc", $atajo);
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