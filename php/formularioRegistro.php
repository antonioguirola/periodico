<!DOCTYPE html>

<html lang="es">

    <head>

        <title>El periódico - Registro de nuevo usuario</title>
        <meta charset="UTF-8"/>

        <meta name ="author" content="Antonio Ángel Guirola Vicente"/>
        <meta name="description" content="Periódico para la práctica evaluable 1 de TW"/>
        <link rel="stylesheet" type="text/css" href="styles/formularioSuscripcion.css"/>
        <script type="text/javascript" src="js/validacionFormularios.js"></script>
        <!--        jquery-->
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
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
                <a href="./"><img src="img/logo.png"></a>
            </section>

            <section class="seccionSecciones">
                <a href="./nacional.php">Nacional</a>
                <a href="./internacional.php">Internacional</a>
                <a href="./tecnologia.php">Tecnología</a>
                <a href="./deportes.php">Deportes</a>
            </section>

            <?php
            //si estamos registrando un nuevo usuario comprobamos que no exista e insertarlo en la BD
            if (isset($_POST["fieldUsername"])) {
                require_once './BD/configuracionBD.inc';
                require_once './BD/DataObject.class.inc';
                require_once './BD/Usuario.class.inc';

                $newUser = $_POST["fieldUsername"];
                echo "$newUser ENTRANDO";
                
                $usuariosExistentes = Usuario::obtenerUsuarios(0, 500, "nombreUsuario asc");
                $encontrado=false;
                foreach ($usuariosExistentes[0] as $fila) {
                    $userName = $fila->datos["nombreUsuario"];
                    if ($userName == $newUser) {
                        echo "<h2>El nombre de usuario ya existe en el sistema, elija otro</h2>";
                        $encontrado=true;
                    }
                }
                
                if(!$encontrado)
                {
                    //si no existe el usuario se inicia en la base de datos
                    $pass=$_POST["fieldPassword"];
                    $nombre=$_POST["fieldNombre"];
                    $ap=$_POST["fieldApellidos"];
                    $em=$_POST["fieldEmail"];
                    $tlf=$_POST["fieldTlf"];
                    $fecha=$_POST["fieldFecha"];
                    Usuario::insertarUsuario($newUser, $pass, $nombre, $ap, $tlf, $fecha, $em);
                    header("Location: ./index.php");
                }
            }
            ?>
            <!-- Sección con el formulario para el registro -->
            <section>
                <form action="./formularioRegistro.php" method="POST" name="formularioRegistro" onsubmit="return checkFormularioRegistro()" autocomplete="OFF">
                    <fieldset>
                        <legend>Datos personales</legend>

                        <label for="fieldNombre">Nombre:</label>
                        <input type = "text" name="fieldNombre" onblur="empty(this.value);" required/>
                        <br/>
                        <label for="fieldApellidos">Apellidos:</label>
                        <input type = "text" name="fieldApellidos" onblur="empty(this.value);" required/>	
                        <br/>
                        <label for="fieldUsername">Nombre de usuario:</label>
                        <input type = "text" name="fieldUsername" onblur="empty(this.value);" required/>	
                        <br/>
                        <label for="fieldPassword">Contraseña:</label>
                        <input type = "text" name="fieldPassword" onblur="empty(this.value);" required/>	
                        <br/>			
                        <label for="fieldEmail">Correo electrónico:</label>
                        <input type = "email" name="fieldEmail" onblur="checkEmail(this.value);" required/>	
                        <br/>			
                        <label for="fieldTlf">Teléfono:</label>
                        <input type = "tel" name="fieldTlf" onblur="checkPhone(this.value);"/>
                        <br/>			
                        <label for="fieldFecha">Fecha de nacimiento (AAAA-MM-DD):</label>
                        <input type = "text" id="campoFecha" name="fieldFecha" onblur=""/>
                        <br/>	
                        <script>
                            $(function() {
                                $("#campoFecha").datepicker({dayNamesMin: ["Dom", "Lun", "Mar", "Mier", "Jue", "Vie", "Sab"], monthNamesShort: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                                    defaultDate: new Date(1995, 1 - 1, 1), dateFormat: "yy-mm-dd", yearRange: "1930:1996", changeYear: true, changeMonth: true, maxDate: new Date(1996, 1 - 1, 1)});

                            });
                        </script>

                        <input type = "submit" id = "botonEnviar" value = "Aceptar"/>
                        <input type = "reset" id = "botonBorrar" value = "Limpiar formulario"/>
                    </fieldset>	
                </form>
            </section>

            <footer>
                <br/>
                <ul>
                    <li>C/Periodista Daniel Saucedo Aranda, s/n · E-18071 GRANADA (Spain) · +34-958242802</li>
                    <li><a href="mailto:elperiodico@etsiit.es">Escríbenos</a></li>
                    <li><a href="./practicaEvaluableII.pdf">Cómo se hizo</a></li>
                </ul>
            </footer>

        </section>  <!--fin de la sección principal-->


    </body>

</html>