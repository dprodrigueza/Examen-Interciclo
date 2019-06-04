function mailRepetido() {
    document.getElementById('mensajeEmail').innerHTML = 'Este e-mail esta siendo usado por otra persona, elije otro.'
}

function validarMail(datos) {

    var mail = document.getElementById(datos.id).value.trim()
    var len = mail.length
    var mail1 = '@ups.edu.ec'
    var mail2 = '@est.ups.edu.ec'
    if (len <= 100) {
        var tamm1 = mail.substr(len - 11, len - 1)
        var tamm2 = mail.substr(len - 15, len - 1)
        if (tamm1 == mail1) {
            console.log(tamm1)
            document.getElementById('mensajeEmail').innerHTML = ''
        } else if (tamm2 == mail2) {
            console.log(tamm2)
            document.getElementById('mensajeEmail').innerHTML = ''
        } else {
            document.getElementById('mensajeEmail').innerHTML = '<br>El E-mail ingresado no es correcto.'
            document.getElementById('email').value = ''
        }
    } else {
        document.getElementById('mensajeEmail').innerHTML = '<br> Usted a excedido la cantidad de caracteres permitidos.'
        document.getElementById('email').value = ''
    }

}

function validarCamposObligatorios() {
    var bandera = true
    for (var i = 0; i < document.forms[0].elements.length - 1; i++) {
        var elemento = document.forms[0].elements[i]

        if (elemento.value == '') {
            bandera = false

            if (elemento.id == 'nombre') {
                document.getElementById('mensajeNombre').innerHTML = "El Nombre está vacio."
            } else if (elemento.id == 'apellido') {
                document.getElementById('mensajeApellido').innerHTML = "El Apellido está vacio."
            } else if (elemento.id == 'email') {
                document.getElementById('mensajeEmail').innerHTML = "El E-Mail está vacio."
            } else if (elemento.id == 'contrasena') {
                document.getElementById('mensajePassword').innerHTML = "La contraseña está vacia."
            }

            elemento.style.border = '3px red solid'


        }
    }


    return bandera;
}

function validarCamposObligatoriosLogin() {
    var bandera = true
    for (var i = 0; i < document.forms[0].elements.length - 1; i++) {
        var elemento = document.forms[0].elements[i]

        if (elemento.value == '') {
            bandera = false

            if (elemento.id == 'email') {
                document.getElementById('mensajeEmail').innerHTML = "El E-Mail está vacio."
            } else if (elemento.id == 'contrasena') {
                document.getElementById('mensajePassword').innerHTML = "La contraseña está vacia."
            }
            elemento.style.border = '3px red solid'


        }
    }


    return bandera;
}