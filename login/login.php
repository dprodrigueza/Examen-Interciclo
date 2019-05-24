<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>

    <script type="text/javascript" src="../controladores/funcion.js"></script>
    <link href="../controladores/css/estilo.css" rel="stylesheet">

</head>

<body>

    <?php
    $_SESSION['isLogged'] = FALSE;
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
        <p>e-mail:<a href="mailto:drodrigueza@est.ups.edu.ec">drodrigueza@est.ups.edu.ec </a></p>
        <p>Teléfono:<a href="tel:+593984053639">0984053639</a></p>
        <p>© Todos los derechos reservados</p>
    </footer>

</body>

</html>