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

                    <h1 class="titulo" onmouseover="abrirDialogo();">Cientos de miles de españoles toman las calles el 1º de Mayo para protestar por el desempleo</h1>

                    <img src="protesta-1-mayo-20130501/protesta-1-mayo-20130501.jpg">

                    <h1 class="subtitulo">Cientos de miles de españoles toman las calles el 1º de Mayo para protestar por el desempleo</h1>

                    <h1 class="subtitulo">Los organizadores cifran en 160.000 los manifestantes en Barcelona, 94.000 en la Comunidad Valenciana, 40.000 en Zaragoza, 12.000 en Córdoba...</h1>

                    <h1 class="subtitulo">Exigen a Rajoy que reconozca el fracaso y el error de su gestión y le han acusado de ser irresponsable y de estar paralizado.</h1>


                    <p>La manifestación del Primero de Mayo en la Plaza de Neptuno de Madrid se ha celebrado este miércoles a las 12.00 horas con los secretarios generales de CC OO, Ignacio Fernández Toxo, y de UGT, Cándido Méndez, a la cabeza de la marcha y sujetando una pancarta con el lema No tienen límite. Lucha por tus derechos . Según los propios sindicatos, ha reunido a más de 40.000 personas.</p>

                    <p>Se han podido leer pancartas como"NO a los dictados de la troika" o "Esta autoridad arruina" Los manifestantes se han congregado para reclamar al Gobierno una nueva política económica, centrada en el crecimiento y el empleo y decir 'no' a la austeridad y los recortes. Con un cielo nublado y una lluvia muy leve los manifestantes han denunciado que se sienten traicionados por los políticos.</p>

                    <p>Toxo y Méndez, han criticado con dureza la gestión del Gobierno y le han pedido que cambie las prioridades de sus políticas y sitúe el empleo en primer lugar. Al concluir la marcha, Toxo ha advertido de que los sindicatos no pararán hasta que se consiga revertir los efectos de la reforma laboral.</p>

                    <p>Asimismo ha criticado la falta de voluntad política del presidente del Gobierno, Mariano Rajoy y le han invitado a "que de un paso adelante" ya que si quiere seguir liderando el país debe "convocar de forma urgente a la sociedad". Por su parte Méndez ha criticado al Gobierno que siga culpando del desempleo al Ejecutivo anterior y a las fuerzas sindicales y, en este sentido, ha exigido que reconozca el fracaso y el error de su gestión y le ha acusado de ser irresponsable y de estar paralizado.</p>

                    <p>A la manifestación también han acudido el secretario de organización del PSOE Óscar López y otros miembros de la dirección socialista como el secretario general del PSM, Tomás Gómez, el portavoz municipal, Jaime Lissavetzky y la portavoz en la Asamblea, Maru Menéndez.</p>

                    <p>Uno de los ausentes es el coordinador general de IU, Cayo Lara, quien se ha desplazado a Murcia para apoyar desde allí los actos convocados por los sindicatos. En un clima de tranquilidad se han podido leer pancartas como "NO a los dictados de la troika" o "Esta autoridad arruina y mata".</p>

                    <p>Esta fue la manifestación central de las más de 80 convocadas en todo el país para conmemorar el Día Internacional del Trabajo, y también la mayor de las cuatro previstas este miércoles en la capital, donde USO, CNT y CGT convocaron concentraciones y movilizaciones en distintos recorridos.</p>

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