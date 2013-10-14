<!DOCTYPE html>

<html lang="es">

    <head>

        <title>El periódico - Internacional</title>
        <meta charset="UTF-8"/>

        <meta name ="author" content="Antonio Ángel Guirola Vicente"/>
        <meta name="description" content="Periódico para la práctica evaluable 1 de TW"/>
        <link rel="stylesheet" type="text/css" href="styles/seccionInternacional.css"/>

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
                <a class="seccionActual" href="internacional.php">Internacional</a>
                <a href="./tecnologia.php">Tecnología</a>
                <a href="./deportes.php">Deportes</a>
            </section>

            <!-- NOTICIA PRINCIPAL DE LA SECCIÓN-->

            <section class="seccionNoticiaPrincipal">
                <a href="./internacional/estados-unidos-mantiene-politica-20130501.php">
                    <img src="internacional/estados-unidos-mantiene-politica-20130501/estados-unidos-mantiene-politica-20130501.jpg"/>
                    <h1>EE UU mantiene la política de estímulo ante el "moderado" crecimiento económico</h1>
                </a>
            </section>

            <!-- COLUMNA IZQUIERDA -->

            <section class="seccionNoticiasIzq">

                <article class="noticiaIzq">
                    <a href="./internacional/forenses-no-encuentran-posibles-20130501.php">
                        <img src="internacional/forenses-no-encuentran-posibles-20130501/forenses-no-encuentran-posibles-20130501.jpg">
                        <h2>Los forenses no encuentran posibles restos humanos cerca de la 'zona cero'</h2>
                    </a>
                </article>

                <article class="noticiaIzq">
                    <a href="./internacional/margallo-responde-maduro-20130501.php">
                        <img src="internacional/margallo-responde-maduro-20130501/margallo-responde-maduro-20130501.jpg">
                        <h2>Margallo responde a las críticas de Nicolás Maduro apelando al "respeto recíproco"</h2>
                    </a>
                </article>

                <article class="noticiaIzq">
                    <a href="./internacional/morales-expulsa-cooperacion-estadounidense-20130501.php">
                        <img src="internacional/morales-expulsa-cooperacion-estadounidense-20130501/morales-expulsa-cooperacion-estadounidense-20130501.jpg">
                        <h2>Evo Morales expulsa a la cooperación estadounidense por supuesta intromisión </h2>
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
                    <a href="./internacional/eeuu-saca-espania-pirateria-20130501.php">
                        <img src="internacional/eeuu-saca-espania-pirateria-20130501/eeuu-saca-espania-pirateria-20130501.jpg">
                        <h2>EE UU saca a España de la lista de países permisivos con la piratería por segundo año </h2>
                    </a>
                </article>

                <article class="noticiaCent">
                    <a href="./internacional/ninias-afganas-intoxicadas-20130501.php">
                        <img src="internacional/ninias-afganas-intoxicadas-20130501/ninias-afganas-intoxicadas-20130501.jpg">
                        <h2>Unas 70 niñas afganas resultan intoxicadas mientras hacían cola en una escuela de Kabul</h2>
                    </a>
                </article>

                <article class="noticiaCent">
                    <a href="./internacional/papa-dia-trabajo-20130501.php">
                        <img src="internacional/papa-dia-trabajo-20130501/papa-dia-trabajo-20130501.jpg">
                        <h2>El papa, en el Día del Trabajo: "Si no todos tienen la posibilidad de trabajar, la sociedad no es justa" </h2>
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