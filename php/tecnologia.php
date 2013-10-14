<!DOCTYPE html>

<html lang="es">

    <head>

        <title>El periódico - Tecnología</title>
        <meta charset="UTF-8"/>

        <meta name ="author" content="Antonio Ángel Guirola Vicente"/>
        <meta name="description" content="Periódico para la práctica evaluable 1 de TW"/>
        <link rel="stylesheet" type="text/css" href="styles/seccionTecnologia.css"/>

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
                <a href="./"><img src="img/logo.png"></a>
            </section>

            <section class="seccionRegistro">
                <?php
                session_start();
                //var_dump($_SESSION);
                if (count($_SESSION) == 0) {
                    echo "
                <form action=\"./login.php\" method=\"POST\">
                    <fieldset>
                        <legend>Entrar/Registrarse</legend>
                        <label for=\"fieldUsername\">Usuario:</label>
                        <input type = \"text\" name=\"fieldUsername\" autofocus/>
                        <label for=\"fieldPassword\">Contraseña:</label>
                        <input type = \"password\" name=\"fieldPassword\"/>
                        <input type = \"submit\" id = \"botonEnviar\" value = \"Aceptar\"/>
                        <br/>
                        <a href=\"formularioRegistro.php\">Registrarse</a>
                    </fieldset>
                </form>
                <br>
                ";
                } else {
                    $keys = array_keys($_SESSION);
                    $usuarioActivo = end($keys);
                    //echo $usuarioActivo;
                    echo "
                    <form action=\"./login.php\" method=\"POST\">
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
                <a href="./nacional.php">Nacional</a>
                <a href="./internacional.php">Internacional</a>
                <a class="seccionActual" href="tecnologia.php">Tecnología</a>
                <a href="./deportes.php">Deportes</a>
            </section>

            <!-- NOTICIA PRINCIPAL DE LA SECCIÓN-->

            <section class="seccionNoticiaPrincipal">
                <a href="./tecnologia/apple-emitira-deuda-20130501.php">
                    <img src="tecnologia/apple-emitira-deuda-20130501/apple-emitira-deuda-20130501.jpg"/>
                    <br/><br/>
                    <h1>Apple emitirá deuda por primera vez en 17 años</h1>
                </a>
            </section>

            <!-- COLUMNA IZQUIERDA -->

            <section class="seccionNoticiasIzq">

                <article class="noticiaIzq">
                    <a href="./tecnologia/primeros-tuits-google-glass-20130501.php">
                        <img src="tecnologia/primeros-tuits-google-glass-20130501/primeros-tuits-google-glass-20130501.jpg">
                        <h2>Aparecen los primeros 'tuits' enviados desde Google Glass</h2>
                    </a>
                </article>

                <article class="noticiaIzq">
                    <a href="./tecnologia/iphone-original-obsoleto-20130501.php">
                        <img src="tecnologia/iphone-original-obsoleto-20130501/iphone-original-obsoleto-20130501.jpg">
                        <h2>El iPhone original será considerado obsoleto y dejará de tener soporte técnico</h2>
                    </a>
                </article>

                <article class="noticiaIzq">
                    <a href="./tecnologia/guante-signos-audio-20130501.php">
                        <img src="tecnologia/guante-signos-audio-20130501/guante-signos-audio-20130501.jpg">
                        <h2>Crean un guante que convierte el lenguaje de signos en audio</h2>
                    </a>
                </article>

            </section>

            <!-- COLUMNA DERECHA -->

            <section class="seccionNoticiasDer">

                <article class="anunciosPeq">
                    <h2>Publicidad</h2>
                    <img src="banners/mini-ninjas-banner.jpg">
                    <img src="banners/amazon-banner.png">
                </article>

            </section>

            <!-- COLUMNA CENTRAL -->

            <section class="seccionNoticiasCent">

                <article class="noticiaCent">
                    <a href="./tecnologia/grafeno-material-llamado-20130501.php">
                        <img src="tecnologia/grafeno-material-llamado-20130501/grafeno-material-llamado-20130501.jpg">
                        <h2>El grafeno, un material llamado a combatir futuras crisis </h2>
                    </a>
                </article>

                <article class="noticiaCent">
                    <a href="./tecnologia/detenido-barcelona-responsable-20130501.php">
                        <img src="tecnologia/detenido-barcelona-responsable-20130501/detenido-barcelona-responsable-20130501.jpg">
                        <h2>Detenido en Barcelona el responsable del mayor ciberataque 'DDOS' de la historia</h2>
                    </a>
                </article>

                <article class="noticiaCent">
                    <a href="./tecnologia/nokia-lanza-smartphone-79-20130501.php">
                        <img src="tecnologia/nokia-lanza-smartphone-79-20130501/nokia-lanza-smartphone-79-20130501.jpg">
                        <h2>Nokia lanza un 'smartphone' de 79 euros: el Asha 210</h2>
                    </a>
                </article>

            </section>

            <!-- PIE DE PÁGINA -->

            <footer>
                <br/>
                <ul>
                    <li>C/Periodista Daniel Saucedo Aranda, s/n · E-18071 GRANADA (Spain) · +34-958242802</li>
                    <li><a href="mailto:elperiodico@etsiit.es">Escríbenos</a></li>
                    <li><a href="./formularioSuscripcion.php">Suscríbete a la edición impresa</a></li>
                    <li><a href="./practicaEvaluableII.pdf">Cómo se hizo</a></li>
                </ul>
            </footer>

        </section>  <!--fin de la sección principal-->

    </body>

</html>