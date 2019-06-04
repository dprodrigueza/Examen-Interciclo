<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Perfil.</title>
    <script type="text/javascript" src="../controladores/funcion.js"></script>
    <link href="../css/estilo.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
    <link rel="stylesheet" type="text/css" href="../../librerias/bootstrap/css/bootstrap.css">
    <script src="../../librerias/jquery-3.2.1.min.js"></script>
</head>

<style>
    body,
    html {
        height: 100%;
        font-family: "Inconsolata", sans-serif;
    }

      .menu {
        display: none;
      }
</style>

<body>

<div class="w3-top"> 
    <div class="w3-row w3-padding w3-black">

    <?php
      //echo "<div class='w3-col s3'>";
      //echo " <class='w3-button w3-block w3-black'> $_GET[mail]</>";
      //echo " </div>";
      include '../../config/conexionDB.php';
      $ref = $_GET["mail"];
      $sql2 = "SELECT * FROM usuarios WHERE usu_mail ='$ref' ;";
        $result2 = $conn->query($sql2);
        $rl = mysqli_fetch_assoc($result2);
        $rlt = $rl["usu_id"];
        $rlt1 = $rl["usu_nombre"];
        $rlt2 = $rl["usu_apellido"];
        echo 'Username: '. $rlt1 . ' '. $rlt2;
        echo '<br>';
        $conn->close();
    ?>

   <div class="w3-col s3">
    <a href="index.php?mail=<?php echo $_GET['mail']; ?>" class="w3-button w3-block w3-black">INICIO</a>
   </div>

  <div class="w3-col s3">
    <a href="crearusuario.php?mail=<?php echo $_GET['mail']; ?>" class="w3-button w3-block w3-black">CREAR USUARIO</a>
  </div>

  <div class="w3-col s3">
    <a href="listarUsuarios.php?mail=<?php echo $_GET['mail']; ?>" class="w3-button w3-block w3-black">VER USUARIO</a>
  </div>

  <div class="w3-col s3">
    <a href="crear_producto.php?mail=<?php echo $_GET['mail']; ?>" class="w3-button w3-block w3-black">CREAR PRODUCTO</a>
  </div>

  <div class="w3-col s3">
    <a href="crear_sucursal.php?mail=<?php echo $_GET['mail']; ?>" class="w3-button w3-block w3-black">CREAR SUCURSAL</a>
  </div>

  <div class="w3-col s3">
    <a href="listar_productos.php?mail=<?php echo $_GET['mail']; ?>" class="w3-button w3-block w3-black">VER PRODUCTOS</a>
  </div>

  <div class="w3-col s3">
    <a href="listar_sucursal.php?mail=<?php echo $_GET['mail']; ?>" class="w3-button w3-block w3-black">VER SUCURSALES</a>
  </div>

  <div class="w3-col s3">
    <a href="listar_facturas.php?mail=<?php echo $_GET['mail']; ?>" class="w3-button w3-block w3-black">VER PEDIDOS EN CAMINO</a>
  </div>

  <div class="w3-col s3">
    <a href="listar_pedidos.php?mail=<?php echo $_GET['mail']; ?>" class="w3-button w3-block w3-black">PEDIDOS FINALIZADOS</a>
  </div>

  <div class="w3-col s3">
    <a href="listar_cancelados.php?mail=<?php echo $_GET['mail']; ?>" class="w3-button w3-block w3-black">CANCELADOS</a>
  </div>

  <div class="w3-col s3">
    <a href="../../config/cerrarSesion.php" class="w3-button w3-block w3-black">CERRAR SESION</a>
  </div>

  </div>
</div>

<br><br><br><br><br><br><br>
    <h2>Cambiar Contraseña</h2>
    <?php
    include('../../config/conexionDB.php');


    $mail = $_GET['mail'];


    $sql = "SELECT * FROM usuarios where usu_mail='$mail'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>

            <form id="formularioUpdate" method="POST" action="../controladores/actualizapas.php?mail=<?php echo $row["usu_mail"]; ?>">

                <label for="contraNEW">Nueva Contraseña *: </label>
                <input type="password" class="form-control input-sm" id="contrasNew" name="contrasNew" placeholder="Ingrese la nueva contraseña" />
                <br>
                <label for="contraVer">Confirma tu contraseña: </label>
                <input type="password" class="form-control input-sm" id="verifi" name="verifi" placeholder="Ingresa nuevamente tu contraseña" onkeyup="validarContra()" />
                <span id="mensajeContra" class="error"></span>
                <br>
                <br>
                <input type="submit" class="btn btn-primary" id="btncontrasena" name="btncontrasena" value="CAMBIAR CONTRASEÑA" disabled />
                <a href="listarUsuarios.php?mail=<?php echo $_GET['mail']; ?>" class="btn btn-default">Cancelar</a>
            </form>
        <?php
    }
} else {
    echo "<p>Ha ocurrido un error inesperado !</p>";
    echo "<p>" . mysqli_error($conn) . "</p>";
}
$conn->close();
?>

<footer class="w3-center w3-light-grey w3-padding-48 w3-large">
    <p>UPS Hipermedial © Todos los derechos reservados</a></p>
</footer>

  <script>
    // Tabbed Menu
    function openMenu(evt, menuName) {
      var i, x, tablinks;
      x = document.getElementsByClassName("menu");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablink");
      for (i = 0; i < x.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" w3-dark-grey", "");
      }
      document.getElementById(menuName).style.display = "block";
      evt.currentTarget.firstElementChild.className += " w3-dark-grey";
    }
    document.getElementById("myLink").click();
  </script>

</body>

</html>