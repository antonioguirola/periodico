<!DOCTYPE html>

<html lang="es">

    <head>

        <title>El periódico - Deportes</title>
        <meta charset="UTF-8"/>

        <meta name ="author" content="Antonio Ángel Guirola Vicente"/>
        <meta name="description" content="Periódico para la práctica evaluable 1 de TW"/>
        <link rel="stylesheet" type="text/css" href="styles/seccionDeportes.css"/>

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
                <a href="./tecnologia.php">Tecnología</a>
                <a class="seccionActual" href="deportes.php">Deportes</a>
            </section>

            <!-- NOTICIA PRINCIPAL DE LA SECCIÓN-->

            <section class="seccionNoticiaPrincipal">
                <a href="./deportes/bayern-humilla-barsa-20130501.php">
                    <img src="deportes/bayern-humilla-barsa-20130501/bayern-humilla-barsa-20130501.jpg"/>
                    <br/>
                    <h1>El Bayern humilla al Barça</h1>
                </a>
            </section>

            <!-- COLUMNA IZQUIERDA -->

            <section class="seccionNoticiasIzq">

                <article class="noticiaIzq">
                    <a href="./deportes/prensa-britanica-vuelta-mourinho-20130501.php">
                        <img src="deportes/prensa-britanica-vuelta-mourinho-20130501/prensa-britanica-vuelta-mourinho-20130501.jpg">
                        <h2>La prensa británica da por hecho la vuelta de Mourinho al Chelsea</h2>
                    </a>
                </article>

                <article class="noticiaIzq">
                    <a href="./deportes/sergio-ramos-palabras-agradecimiento-20130501.php">
                        <img src="deportes/sergio-ramos-palabras-agradecimiento-20130501/sergio-ramos-palabras-agradecimiento-20130501.jpg">
                        <h2>Sergio Ramos: "Solo tengo palabras de agradecimiento para una afición incansable"</h2>
                    </a>
                </article>

                <article class="noticiaIzq">
                    <a href="./deportes/criticas-reino-unido-puerto-20130501.php">
                        <img src="deportes/criticas-reino-unido-puerto-20130501/criticas-reino-unido-puerto-20130501.jpg">
                        <h2>Críticas en Reino Unido por la sentencia de la Operación Puerto</h2>
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
                    <a href="./deportes/no-hay-lesion-messi-20130501.php">
                        <img src="deportes/no-hay-lesion-messi-20130501/no-hay-lesion-messi-20130501.jpg">
                        <h2>Tito Vilanova: "No hay lesión de Messi, pero no se siente bien"</h2>
                    </a>
                </article>

                <article class="noticiaCent">
                    <a href="./deportes/normalmente-jerez-pista-mejor-20130501.php">
                        <img src="deportes/normalmente-jerez-pista-mejor-20130501/normalmente-jerez-pista-mejor-20130501.jpg">
                        <h2>Jorge Lorenzo: "Normalmente el circuito de Jerez es una pista mejor para Yamaha"</h2>
                    </a>
                </article>

                <article class="noticiaCent">
                    <a href="./deportes/fernando-alonso-pasion-aficionados-20130501.php">
                        <img src="deportes/fernando-alonso-pasion-aficionados-20130501/fernando-alonso-pasion-aficionados-20130501.jpg">
                        <h2>Fernando Alonso: "La pasión de los aficionados es una motivación extra"</h2>
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