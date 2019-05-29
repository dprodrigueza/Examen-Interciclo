function validarContra() {
    var contrasenaVer = document.getElementById("verifi").value;
    var contrasena = document.getElementById("contrasNew").value;

    if (contrasenaVer === contrasena) {
        document.getElementById("mensajeContra").innerHTML = ""
        document.getElementById("btncontrasena").disabled = false
    } else {
        document.getElementById("mensajeContra").innerHTML = "Las contraseñas no coinciden."
        document.getElementById("btncontrasena").disabled = true
    }
}