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

                    <h1 class="titulo" onmouseover="abrirDialogo();">El grafeno, un material llamado a combatir futuras crisis</h1>

                    <img src="grafeno-material-llamado-20130501/grafeno-material-llamado-20130501.jpg">

                    <h1 class="subtitulo">Es un material extremadamente fino, resistente, impermeable, flexible y transparente que permitirá fabricar desde textiles a pantallas táctiles enrollables.</h1>

                    <h1 class="subtitulo">Aventura pantallas transparentes que se podrán "integrar en las ventanas de nuestros edificios" y casi en cualquier objeto de la vida cotidiana.</h1>

                    <h1 class="subtitulo">Algunas aplicaciones estarán listas en poco tiempo, como su utilización como un electrodo transparente en las pantallas de los teléfonos móviles.</h1>


                    <p>Los investigadores están convencidos de que el grafeno, un material que está llamado a ser tan revolucionario como lo fue el plástico, puede tener tanto valor dentro de unos años que los países que apuesten por su investigación afrontarán con "más fortaleza" futuras crisis económicas.</p>

                    <p>A esta conclusión llegan expertos como el profesor Tomás Palacios, quien dirige un grupo de investigación en el Massachusetts Institute of Technology (MIT) sobre el grafeno y otros materiales. Palacios ha asistido esta semana a ImagineNano, el mayor encuentro europeo sobre nanociencia, que se ha celebrado  en Bilbao, y allí ha explicado las virtudes de este material.</p>

                    <p>Para el profesor del MIT "uno de los motivos por los que hay tantos países interesados en desarrollar el grafeno es porque permitirá en un futuro de diez a veinte años tener nuevos productos, nuevas aplicaciones y aumentar la productividad".</p>

                    <p>El grafeno es un material extremadamente fino, resistente —entre 100 y 300 veces superior al acero—, impermeable, flexible y transparente que permitirá fabricar desde textiles a ordenadores con pantallas táctiles enrollables y con procesadores cien veces más rápidos que los actuales.</p>

                    <p>Palacios ha señalado que el grafeno es "el material más delgado que existe, hecho por una única capa atómica de carbono", pero aunque es muy fino, también es el más duro y con mayor facilidad para la transmisión de la electricidad y la energía térmica.</p>

                    <p>Para este experto, "como cualquier material extremo", el grafeno permite mejorar aplicaciones ya existentes, pero lo más interesante son las "aplicaciones totalmente nuevas que posibilita".</p>

                    <p>La ventana te dirá automáticamente la temperatura que hace fuera o las últimas noticiasAventura pantallas transparentes que se podrán "integrar en las ventanas de nuestros edificios y en el futuro —"esperemos que no muy lejano"—, se podrá mirar a través de la ventana y "automáticamente te dirá la temperatura que hace fuera o las últimas noticias".</p>

                    <p>Palacio asegura que esas pantallas se podrán integrar "en cualquier objeto de la vida diaria" como un vaso de papel en el que sirven el café un una cafetería, lo que permitirá ver un "anuncio o la televisión" mientras te estás bebiendo ese café.</p>

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