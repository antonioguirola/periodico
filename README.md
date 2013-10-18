=========
Práctica I de IV - Despliegue de una aplicación en uns PaaS
=========

Para la realización de esta práctica he desplegado en Openshift el periódico digital creado para la asignatura de tercero TW.


Licencia utilizada: [GPLv3](http://www.gnu.org/licenses/licenses.html#GPL)


Repositorio compartido con OpenShift en https://appdeprueba-antonioguirola.rhcloud.com


En el pie de cualquier página del periódico se puede acceder a la sección "Cómo se hizo" en la cual se encuentra un manual de uso.

### PaaS utilizado

En mi caso he utilizado [OpenShift](http://www.openshift.com) como plataforma para desplegar mi aplicación,
esto es debido principalmente a que permite aplicaciones en PHP 5.3, que es el lenguaje en el que está desarrollado el periódico.

Otra ventaja que he tiene respecto a sus competidores es que permite tener tres máquinas virtuales para una misma cuenta, permitiendo desplegar aplicaciones en distintos lenguajes. Además su interfaz es muy intuitiva y facilita el acceso a la aplicación, por ejemplo mostrando la orden exacta para realizar una conexión SSH con la aplicación.


### Problemas encontrados

El principal obstáculo que me he encontrado es la adaptación de la aplicación al uso de sockets para conectarse a la base de datos, el cuál he resuelto gracias a los foros oficiales de OpenShift.

También tuve que añadir la licencia a posteriori, todos los archivos deberían indicar la licencia pero debido a que no tuve esto en cuenta sólo he añadido las indicaciones en el archivo [index.php](https://github.com/antonioguirola/periodico/blob/master/php/index.php).


### Tareas por realizar

Sustituir las imágenes por otras de las que esté seguro que no tienen derechos de autor o en otro caso indicar la dirección desde las que las he obtenido o su autor.
