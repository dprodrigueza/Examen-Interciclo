function validarCamposObligatorios() {
    var bandera = true
    for (var i = 0; i < document.forms[0].elements.length; i++) {
        var elemento = document.forms[0].elements[i]
        if (elemento.value == '' && elemento.type == 'text') {
            if (elemento.id == 'correo') {
                document.getElementById('mensajeCedula').innerHTML = '<br>La cedula esta vacia'
            }
            elemento.style.border = '1px red solid'
            //elemento.className =''
            bandera = false
        }else if (elemento.value == !'' && elemento.type == 'text'){
            if (elemento.id == 'correo') {
                alert("")
                document.getElementById('mensajeCedula').innerHTML = '<br>La cedula esta vacia'
            }

        }
    }
    if (!bandera) {
        alert('LLene todo porfavor ')
    }
    return bandera
}