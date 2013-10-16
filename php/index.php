<!DOCTYPE html>

<html lang="es">

    <head>

        <title>El periódico</title>
        <meta charset="UTF-8"/>

        <meta name ="author" content="Antonio Ángel Guirola Vicente"/>
        <meta name="description" content="Periódico para la práctica evaluable 1 de TW"/>
        <link rel="stylesheet" type="text/css" href="styles/portada.css"/>

    </head>

    <body>

        <section id="bannerIzq" class="bannerLateral">
            <img  src="banners/Banner-Vertical_144x24.jpg"/>
        </section>

        <section id="bannerDer" class="bannerLateral">
            <img  src="banners/Banner-Vertical_144x24.jpg"/>
        </section>

        <section class="bannerCent">
            <img src="banners/banner-central.jpg"/>
        </section>


        <section class="seccionPrincipal">

            <section class="seccionNombrePeriodico">
                <a href="./index.php"><img src="img/logo.png"></a>
            </section>

            <section class="seccionRegistro">
                <?php

                ini_set('display_errors', true);
                error_reporting(E_ALL);

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
                <a href="./deportes.php">Deportes</a>
            </section>

            <section class="seccionNoticiasIzq">

                <article class="noticiaIzq">
                    <a href="./nacional/plan-reformas-millones-20130501.php">
                        <img src="nacional/plan-reformas-millones-20130501/plan-reformas-millones-20130501.jpg">
                        <h2>El Plan de Reformas prevé recortar 1.108 millones en dependencia y 700 en Sanidad </h2>
                    </a>
                </article>

                <article class="noticiaIzq">
                    <a href="./nacional/mayo-lluvias-cuatro-provincias-20130501.php">
                        <img src="nacional/mayo-lluvias-cuatro-provincias-20130501/mayo-lluvias-cuatro-provincias-20130501.jpg">
                        <h2>Mayo comienza con lluvias y cuatro provincias en alerta a causa de la nieve y las olas </h2>
                    </a>
                </article>

                <article class="noticiaIzq">
                    <a href="./deportes/bayern-humilla-barsa-20130501.php">
                        <img src="deportes/bayern-humilla-barsa-20130501/bayern-humilla-barsa-20130501.jpg"/>
                        <br/>
                        <h1>El Bayern humilla al Barça</h1>
                    </a>
                </article>

            </section>

            <section class="seccionNoticiasDer">

                <article id="ultimasNoticiasPortada">
                    <h4>Últimos titulares </h4>
                    <?php
                    require_once './BD/configuracionBD.inc';
                    require_once './BD/DataObject.class.inc';
                    require_once './BD/UltimaNoticia.class.inc';

                    $resultados = UltimaNoticia::obtenerUltimasNoticias(0, 100, "id desc");
                    foreach ($resultados[0] as $fila) {
                        $id = $fila->datos["id"];
                        $titulo = $fila->datos["titulo"];
                        $cuerpo = $fila->datos["cuerpo"];
                        $fecha = $fila->datos["fecha"];
                        echo "<strong>$titulo</strong>";
                        echo "<br/>";
                        echo $cuerpo . "<br/>";
                        echo "<em>$fecha</em><br/>";
                        echo "------------------------------------<br>";
                    }
                    ?>
                    <br/>
                </article>

                <article class="anunciosPeq">
                    <h2>Publicidad</h2>
                    <img src="banners/mini-ninjas-banner.jpg">
                    <img src="banners/amazon-banner.png">
                </article>

            </section>

            <section class="seccionNoticiasCent">

                <article class="noticiaCent">
                    <a href="./nacional/protesta-1-mayo-20130501.php">
                        <img src="nacional/protesta-1-mayo-20130501/protesta-1-mayo-20130501.jpg"/>
                        <h1>Cientos de miles de españoles toman las calles el 1º de Mayo para protestar por el desempleo</h1>
                    </a>
                </article>

                <article class="noticiaCent">
                    <a href="./internacional/estados-unidos-mantiene-politica-20130501.php">
                        <img src="internacional/estados-unidos-mantiene-politica-20130501/estados-unidos-mantiene-politica-20130501.jpg"/>
                        <h1>EE UU mantiene la política de estímulo ante el "moderado" crecimiento económico</h1>
                    </a>
                </article>

                <article class="noticiaCent">
                    <a href="./deportes/prensa-britanica-vuelta-mourinho-20130501.php">
                        <img src="deportes/prensa-britanica-vuelta-mourinho-20130501/prensa-britanica-vuelta-mourinho-20130501.jpg">
                        <h2>La prensa británica da por hecho la vuelta de Mourinho al Chelsea</h2>
                    </a>
                </article>

            </section>

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