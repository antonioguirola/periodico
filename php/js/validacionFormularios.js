/**
 * Comprueba si un campo está vacío
 *
 * @param value number
 * @returns {boolean}
 */
function empty(value) {
    // Devuelve true si el campo es null o su longitud es 0 o son solo espacios
    var res = (null == value || 0 == value.length || /^\s+$/.test(value));
    if (res) {
        alert("El campo no puede estar vacío");
    }
    return res;
}

/**
 * limita el tamaño de un campo
 *
 * @param campo
 * @param limiteCaracteres number
 * @returns {boolean}
 */
function limitarCaracteres(campo, limiteCaracteres) {
    if (campo.value.length > limiteCaracteres) {
        campo.value = campo.value.substring(0, limiteCaracteres);
    }
}


/**
 * Comprueba que un campo contenga un email válido
 *
 * @param value string
 */
function checkEmail(value) {

    // Si no se cumple que:
    // El nombre de usuario empieza y acaba por letras o números
    // Está formado por letras, números, guiones bajos, guiones o puntos
    // Una sola arroba
    // El nombre de dominio empieza por letas o números y acaba en entre 2 y 4 letras precedidas de un punto
    // Está formado por letas, números, guiones bajos, guiones o puntos no seguidos
    if (!/^[a-z0-9]([a-z0-9_\-\.])*[a-z0-9]@[a-z0-9]([a-z0-9_\-]\.?)*[a-z0-9](\.[a-z]{2,4})$/i.test(value)) {
        alert("El email introducido no tiene el formato correcto");
        return false;
    }
    return true;
}

/**
 * Comprueba que un campo contenga una fecha válida
 *
 * @param value string
 */
function checkDate(value) {

    alert(value);
    // Si el valor esta formado por uno o dos caracteres numéricos seguidos de barra, punto o guión,
    // uno o dos caracteres numéricos seguidos de barra, punto o guión
    // y cuatro caracteres númericos
    if (/^(\d{1,2}\-){2}\d{4}$/.test(value)) {

        /**
         * Comprueba si un año es bisiesto
         *
         * @param year number
         * @returns {boolean}
         */
        function isLeapYear(year) {
            if (0 === year % 4) { // Si es divisible por 4

                // y no lo es entre 100 pero si entre 400 devuelve verdadero
                return ((0 !== year % 100) || (0 === year % 400));

            } else { // en caso contrario no es bisiesto
                return false;
            }
        }

        value = value.replace(/[-\.]/g, "/"); // Reemplaza los puntos y guiones por /

        var arrayDate = value.split("/"); // Convierte el valor a array

        // Al parsear directamente un valor que precede de un 0 en IE8 el resultado es impredecible
        // Comprobamos si ocurre esto y parseamos a entero el valor que nos interesa
        if ("0" === arrayDate[0].charAt(0) && 2 === arrayDate[0].length) { // Comprobación para IE8+
            var day = parseInt(arrayDate[0].charAt(1)); // Dia
        } else {
            day = parseInt(arrayDate[0])
        }

        if ("0" === arrayDate[1].charAt(0) && 2 === arrayDate[1].length) { // Comprobación para IE8+
            var month = parseInt(arrayDate[1].charAt(1)); // Mes
        } else {
            month = parseInt(arrayDate[1])
        }
        var year = parseInt(arrayDate[2]); // Año

        // Array con el número de dias de cada mes
        var days = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

        // Si el año estaácomprendida entre 1900 y 2100
        if (1900 <= year && 2100 >= year) {

            // Si el mes está comprendido enre 1 y 12
            if (1 <= month && 12 >= month) {
                if (2 === month) { // Si es febrero
                    if (!isLeapYear(year)) { // Si el año no es bisiesto

                        // Comprobamos el intervalo de dias con el correspondiente fin del array
                        if (!(day >= 1 && day <= days[1])) {
                            alert("la fecha introducida no es válida");
                            return false;
                        }
                    } else { // Si el año es bisiesto
                        if (!(day >= 1 && day <= days[1] + 1)) { // Sumamos uno al fin del mes
                            alert("la fecha introducida no es válida");
                            return false;
                        }
                    }
                } else { // El resto de los meses
                    if (!(day >= 1 && day <= days[month - 1])) {
                        alert("la fecha introducida no es válida");
                        return false;
                    }
                }
            } else {
                alert("la fecha introducida no es válida");
                return false;
            }
        } else {
            alert("la fecha introducida no es válida");
            return false;
        }
    } else {
        alert("la fecha introducida no es válida");
        return false;
    }
    return true;
}

/**
 * Comprueba que un campo contenga un teléfono válido
 *
 * @param value string
 */
function checkPhone(value) {

    // Si el valor no está formado por un 6,9 u 8 seguido de ocho números ó
    // está formado por el signo + seguido de dos números y 6,9,8 seguido de ocho números
    if (!/(^\+\d{2}[698]\d{8}$)|(^[698]\d{8}$)/.test(value)) {

        // Captura la excepción
        alert("El teléfono introducido no es válido");
        return false;
    }
    return true;
}

/**
 * Comprueba que el formulario correcto es válido. Suponemos fecha válida gracias a JQuery
 * @return {bool} Si el formulario es correcto
 */
function checkFormularioRegistro() {
    var nombre = document.forms["formularioRegistro"]["fieldNombre"].value;
    var apellidos = document.forms["formularioRegistro"]["fieldApellidos"].value;
    var userName = document.forms["formularioRegistro"]["fieldUsername"].value;
    var password = document.forms["formularioRegistro"]["fieldPassword"].value;
    var email = document.forms["formularioRegistro"]["fieldEmail"].value;
    var tlf = document.forms["formularioRegistro"]["fieldTlf"].value;

    if (empty(nombre) || empty(apellidos) || empty(userName) || empty(password) || !checkEmail(email)
            || !checkPhone(tlf))
    {
        return false;
    }
    return true;
}