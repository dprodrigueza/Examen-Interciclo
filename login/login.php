<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">
    <script type="text/javascript" src="../librerias/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../controladores/funcion.js"></script>
</head>

<body style="background-color: gray">
    <br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel panel-heading">Sistema UPS Computadoras</div>
                    <div class="panel panel-body">
                        <p>
                            <img src="../imagenes/compu.png"  height="190">
                        </p>
                        <form id="perfil" method="POST" onsubmit="return validarCamposObligatoriosLogin()" action="../controladores/loginUser.php">
                            <label>E-Mail (*): </label><input type="email" id="email" name="email" class="form-control input-sm" placeholder="Ingrese su email." onblur="validarMail(this)">
                            <span id="mensajeEmail" class="error"></span>
                            <br/>
                            <label>Password (*): </label> <input type="password" id="contrasena" name="contrasena" placeholder="Ingrese su contraseña." class="form-control input-sm">
                            <span id="mensajePassword" class="error"></span>
                            <br />

       <!-- <button type="submit" id="btnLogin"> INGRESAR </button>
        <br />
        <br> ¿No tienes un usuario?<a class="creacion" href="crear.html">CREAR USUARIO</a> -->

                            <span class="btn btn-primary btn-sm" id="btnLogin">Entrar</span>
                            <a href="crear.html" class="btn btn-danger btn-sm">Registrarse</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>

   
    <footer>
        <p>UPS Hipermedial 2019</p>
        <p>© Todos los derechos reservados</p>
    </footer>

</body>

</html>