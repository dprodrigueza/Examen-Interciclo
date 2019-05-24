<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>

    <script type="text/javascript" src="../controladores/funcion.js"></script>
</head>

<body>

    <?php
    $_SESSION['isLogged'] = FALSE;
    $_SESSION['isLoggedAdmin'] = FALSE;
    ?>


    <form id="perfil" method="POST" onsubmit="return validarCamposObligatoriosLogin()" action="../controladores/loginUser.php">
        <h1>INGRESAR.</h1>
        <p>E-Mail (*): <input type="email" id="email" name="email" placeholder="Ingrese su email." onblur="validarMail(this)"></p>
        <span id="mensajeEmail" class="error"></span>
        <br />
        <p>Contraseña (*): <input type="password" id="contrasena" name="contrasena" placeholder="Ingrese su contraseña."></p>
        <span id="mensajePassword" class="error"></span>
        <br />

        <button type="submit" id="btnLogin"> INGRESAR </button>
        <br />
        <br> ¿No tienes un usuario?<a class="creacion" href="crear.html">CREAR USUARIO</a>

    </form>

   
    <footer>
        <p>Diego Rodríguez A</p>
        e-mail:<a href="mailto:drodrigueza@est.ups.edu.ec">drodrigueza@est.ups.edu.ec </a>
        Teléfono:<a href="tel:+593984053639">0984053639</a>
        <p>Marco Cobos F</p>
        e-mail:<a href="mailto:mcobosf@est.ups.edu.ec">drodrigueza@est.ups.edu.ec </a>
        Teléfono:<a href="tel:+593984053639">0984053639</a>
        <p>Malki Yupanki M</p>
        e-mail:<a href="mailto:gchuchucaa@est.ups.edu.ec">drodrigueza@est.ups.edu.ec </a>
        Teléfono:<a href="tel:+593984053639">0984053639</a></p>
        <p>Gabriel Chuchuca A</p>
        e-mail:<a href="mailto:myupanki@est.ups.edu.ec">drodrigueza@est.ups.edu.ec </a>
        Teléfono:<a href="tel:+593984053639">0984053639</a>
        <p>© Todos los derechos reservados</p>
    </footer>

</body>

</html>