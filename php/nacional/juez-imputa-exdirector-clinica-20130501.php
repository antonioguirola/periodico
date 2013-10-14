<!DOCTYPE html>

<html lang="es">

    <head>

        <title>El periódico</title>
        <meta charset="UTF-8"/>

        <meta name ="author" content="Antonio Ángel Guirola Vicente"/>
        <meta name="description" content="Periódico para la práctica evaluable 1 de TW"/>
        <link rel="stylesheet" type="text/css" href="noticiaNacional.css"/>

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
                <a class="seccionActual" href="../nacional.php">Nacional</a>
                <a href="../internacional.php">Internacional</a>
                <a href="../tecnologia.php">Tecnología</a>
                <a href="../deportes.php">Deportes</a>
            </section>


            <!-- COLUMNA IZQUIERDA -->

            <section class="seccionNoticiasIzq">

                <article class="cuerpoNoticia"><?php require_once '../funcionesGenerales.php';mostrarNoticiasRelacionadas();?>                      

                    <h1 class="titulo" onmouseover="abrirDialogo();">El juez imputa a un exdirector de la clínica Santa Cristina por el caso de los bebés robados</h1>

                    <img src="juez-imputa-exdirector-clinica-20130501/juez-imputa-exdirector-clinica-20130501.jpg">

                    <h1 class="subtitulo">El juez también ha imputado a dos antiguos jefes de neonatos.</h1>

                    <h1 class="subtitulo">Por su participación en la desaparición de dos gemelas en 1981.</h1>

                    <h1 class="subtitulo">La denunciante es la misma que quiso llevar a la monja Sor María ante el juez.</h1>


                    <p>El titular del juzgado de Instrucción número 50 de Madrid, Esteban Vega, ha citado a declarar el próximo 27 de mayo a tres médicos de la madrileña clínica de Santa Cristina a raíz de la denuncia de una madre por la presunta desaparición de dos gemelas que alumbró en esa maternidad en 1981. </p>

                    <p>En una providencia, el magistrado ha citado a declarar como imputados al exdirector de la clínica Santa Cristina en Madrid, José Zamarriego, y a los exjefes del departamento de neonatología Ignacio Villa y Ceferino de la Calle.</p>

                    <p>El abogado de la acusación particular, Alipio Barbero, ha explicado que tras el archivo de la causa a la religiosa María Gómez Valbuena (Sor María), ya fallecida y que era la primera imputada en el caso, el juez ha aceptado la solicitud de la denunciante, Purificación Betegón, que entendía que había más posibles responsables de los hechos.</p>

                    <p>Tendrá que hablar alguno de ellos porque había dos jefes de neonatos y se tendrá que saber cuál de los dos incumplióHa relatado que su cliente está "impresionada por la lentitud de la justicia, aunque esperanzada porque se van dando pasos para esclarecer los hechos".</p>

                    <p>Purificación Betegón ha confiado en que las nuevas imputaciones "den luz" al caso y finalmente se sepa dónde están sus hijas. "Alguien tendrá que hablar. Tendrá que hablar alguno de ellos porque había dos jefes de neonatos y se tendrá que saber cuál de los dos incumplió", ha incidido.</p>

                    <p>Purificación ha destacado que cuando dio a luz había en el paritorio dos médicos para atender a sus recién nacidas, lo que según ha consultado posteriormente "no es normal".</p>

                    <p>Ha recordado que el día que dio a luz, que coincidió con el golpe de Estado del 23-F, vio en la documentación una frase que decía "Avisar a sor María", que era una persona a la que ella no conocía.</p>

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