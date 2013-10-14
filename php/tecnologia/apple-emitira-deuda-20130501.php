<!DOCTYPE html>

<html lang="es">

    <head>

        <title>El periódico</title>
        <meta charset="UTF-8"/>

        <meta name ="author" content="Antonio Ángel Guirola Vicente"/>
        <meta name="description" content="Periódico para la práctica evaluable 1 de TW"/>
        <link rel="stylesheet" type="text/css" href="noticiaTecnologia.css"/>

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
                <a href="../internacional.php">Internacional</a>
                <a class="seccionActual" href="../tecnologia.php">Tecnología</a>
                <a href="../deportes.php">Deportes</a>
            </section>


            <!-- COLUMNA IZQUIERDA -->

            <section class="seccionNoticiasIzq">

                <article class="cuerpoNoticia"><?php require_once '../funcionesGenerales.php';mostrarNoticiasRelacionadas();?>                      

                    <h1 class="titulo" onmouseover="abrirDialogo();">Apple emitirá deuda por primera vez en 17 años</h1>

                    <img src="apple-emitira-deuda-20130501/apple-emitira-deuda-20130501.jpg">

                    <h1 class="subtitulo">El gigante tecnológico emitirá bonos por 17.000 millones de dólares.</h1>

                    <h1 class="subtitulo">La última vez que la compañía informó de su intención de emitir deuda fue en 1996.</h1>

                    <h1 class="subtitulo">La empresa realizará seis emisiones de deuda con vencimientos en 2016, 2018, 2023 y 2043, cuatro a tipo fijo y dos a tipo variable.</h1>


                    <p>La empresa tecnológica Apple ha comunicado a la Comisión de Bolsa y Valores de Estados Unidos (SEC por sus siglas en inglés) su intención de emitir miles de millones en bonos, algo que la compañía de la manzana no hacía desde hace al menos 17 años. </p>

                    <p>El gigante tecnológico estadounidense emitirá bonos por 17.000 millones de dólares, en la que supone la mayor emisión de deuda de una empresa no financiera en la historia de Wall Street.</p>

                    <p>En un escrito remitido a la Comisión del Mercado de Valores de EEUU (SEC, por sus siglas en inglés), Apple detalla que emitirá seis bonos diferentes, cuatro a un tipo fijo con vencimientos entre 2016 y 2043, por 14.000 millones, y dos a intereses variables, con vencimientos en 2016 y 2018, por los 3.000 restantes.</p>

                    <p>En concreto, la empresa realizará seis emisiones de deuda con vencimientos en 2016, 2018, 2023 y 2043, cuatro a tipo fijo y dos a tipo variable, en una operación que tiene como colocadores a Goldman Sach y Deutsche Bank.</p>

                    <p>Asimismo, informa de que utilizará los ingresos netos logrados con esta emisión para "fines empresariales generales", lo que incluye el plan de recompra de acciones y el pago de dividendos recogidos en su programa recientemente ampliado de devolver capital a los accionistas.</p>

                    <p>Según CNN Money, esta emisión sería la primera en 17 años, ya que la última vez que la compañía informó a la SEC de su intención de emitir deuda fue en 1996, cuando pretendía vender bonos convertibles. Sin embargo, no está claro si finalmente esta operación se llevó a cabo.</p>

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
                </ul>
            </footer>

        </section>  <!--fin de la sección principal-->

    </body>

</html>