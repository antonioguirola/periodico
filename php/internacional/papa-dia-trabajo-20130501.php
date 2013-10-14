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

                    <h1 class="titulo" onmouseover="abrirDialogo();">El papa, en el Día del Trabajo: "Si no todos tienen la posibilidad de trabajar, la sociedad no es justa"</h1>

                    <img src="papa-dia-trabajo-20130501/papa-dia-trabajo-20130501.jpg">

                    <h1 class="subtitulo">Francisco ha denunciado "la concepción economicista de la sociedad que busca el beneficio egoísta mas allá de los parámetros de la justicia social".</h1>

                    <h1 class="subtitulo">Unas 60.000 personas, se concentraron para escuchar la catequesis del papa en su audiencia de los miércoles.</h1>

                    <h1 class="subtitulo">El papa habló del trabajo y de las numerosas situaciones en el mundo en que tanta gente trabaja en "condiciones de esclavitud".</h1>


                    <p>El papa Francisco ha denunciado este miércoles "la concepción economicista de la sociedad que busca el beneficio egoísta mas allá de los parámetros de la justicia social" y cuya consecuencia son los numerosos parados, en el día del trabajo que se celebra el primero de mayo. </p>

                    <p>Francisco paseó a bordo de un jeep blanco por los corredores creados en la plaza de San Pedro, donde unas 60.000 personas, se concentraron para escuchar la catequesis del papa en su audiencia de los miércoles y verlo de cerca, en un recorrido que ya se ha convertido en una tradición.</p>

                    <p>La dignidad nos la da el trabajo y un trabajo dignoLos vivas, aplausos al pontífice fueron constantes, mientras, bajo un sol radiante, Francisco bendecía a los asistentes, besaba a los bebés que le portaban y acariciaba a los ancianos y enfermos, a la par que banderas de todos los países eran agitadas, entre las que destacaban las blanquiazules argentinas.</p>

                    <p>El papa habló del trabajo y de las numerosas situaciones en el mundo en que tanta gente trabaja en "condiciones de esclavitud", además de la trata de seres humanos englobadas en trabajos de esclavitud. "La dignidad no es la que da el poder, el dinero, la cultura, no. La dignidad nos la da el trabajo y un trabajo digno", porque hay tantos "sistemas sociales, políticos y económicos que han hecho que ese trabajo signifique aprovecharse de la persona", aseveró.</p>

                    <p>El trabajo nos hace semejantes a Dios que ha trabajado, trabaja y actúa siempreJorge Mario Bergoglio sostuvo que cuando la sociedad está organizada de forma "que no todos tienen la posibilidad de trabajar, esa sociedad no es justa". Dijo a los responsables de la cosa pública que hagan todo el esfuerzo para dar un nuevo impulso a la ocupación, de preocuparse por la dignidad de las personas. "Pido a todos que en la medida de sus responsabilidades se esfuercen por crear puesto de trabajo y creen esperanzas en los trabajadores".</p>

                    <p>Francisco hizo referencia a la "dificultad" que en varios países encuentra el mundo del trabajo y de la empresa. "Pienso en cuántos están parados, muchas veces a causa de una concepción economicista de la sociedad que busca el beneficio egoísta mas allá de los parámetros de la justicia social", dijo y añadió "os invito a la solidaridad y por tanto, a no perder la esperanza".</p>

                    <p>Para el papa, el trabajo es parte del proyecto de amor de Dios, "estamos llamados a cultivar y cuidar de todos los bienes de la creación y de esta manera participamos en la obra de la creación", aseveró. El trabajo es fundamental para la dignidad de la personas, nos unge de dignidad -sostuvo- "nos hace semejantes a Dios que ha trabajado, trabaja y actúa siempre".</p>

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