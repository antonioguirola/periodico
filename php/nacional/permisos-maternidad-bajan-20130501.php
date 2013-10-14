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

                    <h1 class="titulo" onmouseover="abrirDialogo();">Los permisos de maternidad bajan un 3,02% y los de paternidad un 5,35%</h1>

                    <img src="permisos-maternidad-bajan-20130501/permisos-maternidad-bajan-20130501.jpg">

                    <h1 class="subtitulo">En el primer trimestre del año se tramitaron 75.342 permisos por maternidad y se situaron 62.320 permisos por paternidad.</h1>

                    <h1 class="subtitulo">El gasto en prestaciones por maternidad y paternidad por parte de la Seguridad Social superó en los tres primeros meses de 2013 los 440,5 millones de euros.</h1>


                    <p>Los permisos por maternidad tramitados por el Instituto Nacional de la Seguridad Socia (INSS) descendieron en el primer trimestre del año un 3,02% respecto al año anterior, hasta los 75.342, mientras que los permisos de paternidad cayeron un 5,35% y se situaron en 62.320.</p>

                    <p>Según datos publicados este martes por el Ministerio de Empleo y Seguridad Social, el gasto en prestaciones por maternidad y paternidad superó en los tres primeros meses de 2013 los 440,5 millones de euros.</p>

                    <p>De los subsidios por maternidad, la mayor parte (74.137) fueron disfrutados por la madre y 1.205 por el padre.</p>

                    <p>En el primer trimestre de 2013 se tramitaron 7.174 excedencias para el cuidado de hijos Los subsidios por maternidad están dotados con una cuantía equivalente al total del salario y son abonados por la Seguridad Social durante las 16 semanas de la licencia, que puede ser cedida parcialmente al padre, siendo compatible con el permiso de paternidad.</p>

                    <p>Por comunidades, el mayor aumento de permisos de maternidad se produjo en Islas Baleares (5,03%), Madrid (1,56%) y Galicia (0,43%), mientras que donde más cayeron fue en la Comunidad Valenciana (7,14%), Asturias (6,66%), Castilla-La Mancha (6,39%) y Cataluña (6,15%). En las ciudades autónomas de Melilla y Ceuta aumentaron el 10,58% y el 6,49%, respectivamente.</p>

                    <p>El número de padres que accedió al permiso de maternidad cayó un 6,15% respecto al año 2012.</p>

                    <p>Respecto a los permisos por paternidad, la mayoría se concentraron en Cataluña (11.728), seguida de Madrid (10.257), Andalucía (9.961), Comunidad Valenciana (5.793) y País Vasco (3.670).</p>

                    <p>La cuantía del permiso de paternidad también corresponde al cien por cien del salario y se abona por un período de 15 días, siendo un subsidio independiente y compatible con el disfrute compartido del permiso por maternidad, cuando es cedido por la madre.</p>

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