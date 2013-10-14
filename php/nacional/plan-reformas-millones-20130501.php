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

                    <h1 class="titulo" onmouseover="abrirDialogo();">El Plan de Reformas prevé recortar 1.108 millones en dependencia y 700 en Sanidad</h1>

                    <img src="plan-reformas-millones-20130501/plan-reformas-millones-20130501.jpg">

                    <h1 class="subtitulo">"Hay que adecuar las prestaciones a las necesidades reales de los dependientes y priorizar servicios profesionales sobre prestaciones económicas", dice el Plan.</h1>

                    <h1 class="subtitulo">Además, Sanidad tiene previsto recortar otro 700 millones con la ordenación de la cartera de servicios asistenciales.</h1>

                    <h1 class="subtitulo">"Nada ha conseguido la política del Gobierno, que es fallida", dice el PSOE.</h1>


                    <p>El Plan Nacional de Reformas 2013, remitido por el Ejecutivo a la Comisión Europea, prevé un recorte de 1.108 millones de euros en el sistema de atención a la dependencia y plantea que la aportación de los beneficiarios a estos servicios se incremente en torno a un 5% en tres años.</p>

                    <p>Estas son algunas de las medidas incluidas en el plan, publicado por el Gobierno en su página web, y que se enmarcan en el objetivo del Gobierno de "garantizar la sostenibilidad de la atención a la dependencia", lo que supondrá un ahorro de 958 millones de euros.</p>

                    <p>Los beneficiarios tendrán que aportar a los servicios de dependecia en torno a un 5% en tres años A esta cantidad hay que sumar este año otros 150 millones de euros que el Gobierno tiene previsto ajustar en la racionalización del sistema de atención a la dependencia. Por este mismo concepto, en 2014 se espera otros 168 millones de euros de ahorro.</p>

                    <p>En cuanto a la aportación progresiva de un 5% por parte de los beneficiarios, el programa de reformas estima el impacto de la medida en 339 millones de euros para este año.</p>

                    <p>Para "adecuar las prestaciones a las necesidades reales de los dependientes y priorizar los servicios profesionales sobre las prestaciones económicas" está previsto aprobar en 2013 dos reales decretos con los que se prevé un recorte de otros 489 millones de euros, según recoge el texto de la reforma.</p>

                    <p>Por otro lado, y según el mismo Programa Nacional de Reformas 2013, el Ministerio de Sanidad, Servicios Sociales e Igualdad, prevé un ajuste de 700 millones con la ordenación de la cartera de servicios asistenciales.</p>

                    <p>El Gobierno se plantea una optimización de 13 servicios y un nuevo catálogo de implantes quirúrgicos En el programa se asegura que las reformas iniciadas en 2012 en el ámbito del Sistema Nacional de Salud (SNS) van a continuar, que las del año pasado supusieron una reducción del gasto sanitario del 8% y que con las nuevas iniciativas el impacto estimado total será de 3.134 millones de euros en 2013.</p>

                    <p>Para la ordenación de la cartera de servicios, con la que prevé ese ahorro de 700 millones, el Gobierno se plantea "la optimización de 13 servicios de especialidades médicas", la actualización del grupo de cribados y un nuevo catálogo de implantes quirúrgicos.</p>

                    <p>A esta cantidad hay que sumar otros 175 millones que el Gobierno piensa obtener este año a través del repago en la dispensación ambulatoria de dietoterápicos y ortoprótesis y en el uso de transporte sanitario no urgente.</p>

                    <p>En el documento, publicado en la web del Gobierno, se hace alusión a la reforma farmacéutica, en la que por primera vez los ciudadanos contribuyen en función de la renta y que ha generado un ahorro de 1.589 millones de euros desde julio del pasado año a marzo de 2013.</p>

                    <p>De forma mensual, la reducción del gasto sanitario ha sido de casi el 20%. Por la aplicación de la reforma, la reducción del gasto farmacéutico estimada para 2013 se cifra en 1.400 millones, incluyendo la participación de los usuarios en los medicamentos de dispensación hospitalaria.</p>

                    <p>Además de estas medidas se contemplan otras como la nueva orden de precios de referencia, que generará una reducción de gasto de 409 millones.</p>


                    <p>La portavoz del Grupo Socialista en el Congreso de los Diputados, Soraya Rodríguez, ha exigido al Gobierno, al que ha considerado "agotado", que rectifique su "política económica fallida" porque "mete cada vez más" al país en la recesión económica.</p>

                    Las soluciones además de ser inútiles e ineficaces, son injustasLa portavoz socialista ha asegurado que en este primero de mayo la situación es "mucho peor" que en el año anterior y después de "dieciséis meses de gobierno de Mariano Rajoy es dramática". "Nada ha conseguido la política económica del Gobierno, que es una política fallida", ha indicado la portavoz socialista, quien ha asegurado que la situación de los que tienen trabajo "es peor" y el número de desempleados es "mayor", con "2.600 empleos que se destruyen diariamente".</p>

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