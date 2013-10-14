<!DOCTYPE html>

<html lang="es">

    <head>

        <title>El periódico - Nacional</title>
        <meta charset="UTF-8"/>

        <meta name ="author" content="Antonio Ángel Guirola Vicente"/>
        <meta name="description" content="Periódico para la práctica evaluable 1 de TW"/>
        <link rel="stylesheet" type="text/css" href="styles/seccionNacional.css"/>

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
                <a class="seccionActual"href="nacional.php">Nacional</a>
                <a href="./internacional.php">Internacional</a>
                <a href="./tecnologia.php">Tecnología</a>
                <a href="./deportes.php">Deportes</a>
            </section>

            <!-- NOTICIA PRINCIPAL DE LA SECCIÓN-->

            <section class="seccionNoticiaPrincipal">
                <a href="./nacional/protesta-1-mayo-20130501.php">
                    <img src="nacional/protesta-1-mayo-20130501/protesta-1-mayo-20130501.jpg"/>
                    <h1>Cientos de miles de españoles toman las calles el 1º de Mayo para protestar por el desempleo</h1>
                </a>
            </section>

            <!-- COLUMNA IZQUIERDA -->

            <section class="seccionNoticiasIzq">

                <article class="noticiaIzq">
                    <a href="./nacional/plan-reformas-millones-20130501.php">
                        <img src="nacional/plan-reformas-millones-20130501/plan-reformas-millones-20130501.jpg">
                        <h2>El Plan de Reformas prevé recortar 1.108 millones en dependencia y 700 en Sanidad </h2>
                    </a>
                </article>

                <article class="noticiaIzq">
                    <a href="./nacional/manifestacion-movimientos-alternativos-barcelona-20130501.php">
                        <img src="nacional/manifestacion-movimientos-alternativos-barcelona-20130501/manifestacion-movimientos-alternativos-barcelona-20130501.jpg">
                        <h2>Manifestación de movimientos alternativos con mucha tensión en las calles de Barcelona </h2>
                    </a>
                </article>

                <article class="noticiaIzq">
                    <a href="./nacional/mayo-lluvias-cuatro-provincias-20130501.php">
                        <img src="nacional/mayo-lluvias-cuatro-provincias-20130501/mayo-lluvias-cuatro-provincias-20130501.jpg">
                        <h2>Mayo comienza con lluvias y cuatro provincias en alerta a causa de la nieve y las olas </h2>
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
                    <a href="./nacional/rey-reaparece-fuera-zarzuela-20130501.php">
                        <img src="nacional/rey-reaparece-fuera-zarzuela-20130501/rey-reaparece-fuera-zarzuela-20130501.jpg">
                        <h2>El Rey reaparece fuera de la Zarzuela para asistir al partido del Real Madrid y el Dortmund </h2>
                    </a>
                </article>

                <article class="noticiaCent">
                    <a href="./nacional/permisos-maternidad-bajan-20130501.php">
                        <img src="nacional/permisos-maternidad-bajan-20130501/permisos-maternidad-bajan-20130501.jpg">
                        <h2>Los permisos de maternidad bajan un 3,02% y los de paternidad un 5,35% </h2>
                    </a>
                </article>

                <article class="noticiaCent">
                    <a href="./nacional/juez-imputa-exdirector-clinica-20130501.php">
                        <img src="nacional/juez-imputa-exdirector-clinica-20130501/juez-imputa-exdirector-clinica-20130501.jpg">
                        <h2>El juez imputa a un exdirector de la clínica Santa Cristina por el caso de los bebés robados </h2>
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