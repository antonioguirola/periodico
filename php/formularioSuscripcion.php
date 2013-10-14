<!DOCTYPE html>

<html lang="es">

    <head>

        <title>El periódico - Suscripción</title>
        <meta charset="UTF-8"/>

        <meta name ="author" content="Antonio Ángel Guirola Vicente"/>
        <meta name="description" content="Periódico para la práctica evaluable 1 de TW"/>
        <link rel="stylesheet" type="text/css" href="styles/formularioSuscripcion.css"/>

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

            <!-- Sección con la tabla de precios -->
            <section>
                <p>A continuación se detallan los precios con las posibles opciones a la hora de suscribirse a nuestra publicación:</p>
                <table border="5">
                    <caption><strong>Precios</strong></caption>
                    <tfoot>
                        <tr>
                            <td colspan="3">Todos los precios están en €</td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td></td>
                            <th>El periódico</th>
                            <th>El periódico + suplemento semanal</th>
                        </tr>
                        <tr>
                            <th>Un mes</th>
                            <td>30</td>
                            <td>35</td>
                        </tr>
                        <tr>
                            <th>Seis meses</th>
                            <td>150</td>
                            <td>175</td>
                        </tr>
                        <tr>
                            <th>Un año</th>
                            <td>300</td>
                            <td>330</td>
                        </tr>
                    </tbody>

                </table>
            </section>

            <br/>


            <!-- Sección con el formulario para la suscripción -->
            <section>

                <p>Rellene el siguiente formulario y pulse "Aceptar" para emezar a recibir El periódico en su domicilio:</p>

                <form action="./realizarSuscripcion.php" method="POST" name="formularioSuscripción" autocomplete="OFF">
                    <fieldset>
                        <legend>Datos personales</legend>

                        <label for="fieldNombre">Nombre:</label>
                        <input type = "text" name="fieldNombre" autofocus required/>
                        <br/>
                        <label for="fieldApellidos">Apellidos:</label>
                        <input type = "text" name="fieldApellidos" required/>	
                        <br/>
                        <label for="fieldDireccion">Dirección:</label>
                        <input type = "text" name="fieldDireccion" required/>	
                        <br/>
                        <label for="fieldPoblacion">Poblacion:</label>
                        <input type = "text" name="fieldPoblacion" required/>	
                        <br/>			
                        <label for="fieldEmail">Correo electrónico:</label>
                        <input type = "email" name="fieldEmail" required/>	
                        <br/>			
                        <label for="fieldTlf">Teléfono:</label>
                        <input type = "tel" name="fieldTlf"/>
                        <br/>			
                        <label for="fieldFecha">Fecha de nacimiento:</label>
                        <input type = "date" name="fieldFecha"/>
                        <br/>			
                        <label for="fieldTarjeta">Número de tarjeta bancaria:</label>
                        <input type = "text" name="fieldTarjeta"/>
                        <br/><br/>			
                        ¿Qué tipo de suscripción desea realizar?<br/>
                        <input type="radio" name="nVisita" value="solo">Sólo a "El periódico"<br/>
                        <input type="radio" name="nVisita" value="supl">A "El periódico" y el suplemento semanal<br/>
                        <br/>	

                        <datalist id="comoNosHasConocido">
                            <option value="Prensa o TV"/>
                            <option value="Recomendación de un amigo o familiar"/>
                            <option value="Otros"/>
                        </datalist>		
                        <label for="fieldMotivo">¿Cómo has conodico "El periódico"?</label> 
                        <input type="text" name="fieldMotivo" list="comoNosHasConocido"/><br/>

                        <br/>
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