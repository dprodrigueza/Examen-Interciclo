<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8" />
  <title>MODIFICAR</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
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

  <?php
  session_start();
  if (!isset($_SESSION['isLoggedAdmin']) || $_SESSION['isLoggedAdmin'] === FALSE) {
    header("Location: ../../login/login.php");
  }


  ?>


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
      echo 'Username: ' . $rlt1 . ' ' . $rlt2;
      echo '<br>';
      $conn->close();
      ?>

      <div class="w3-col s3">
        <a href="index.php?mail=<?php echo $_GET['mail']; ?>" class="w3-button w3-block w3-black">INICIO</a>
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

  <br><br><br><br><br>

  <h2>Modificar Sucursales</h2>
  <?php
  $mail = $_GET["mail"];
  $codigo = $_GET["codigo"];
  //  echo "$codigo";
  include '../../config/conexionDB.php';
  echo "</br>";
  $sql = "SELECT * FROM sucursal WHERE suc_id= '$codigo' ";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      ?>
      <form id="formulario01" method="POST" action="../../controladores/controlador_modificarsuc.php?mail="<?php echo $mail; ?>>

        <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />

        <input type="hidden" id="mail" name="mail" value="<?php echo $mail ?>" />

        <br>
        <label id="Nombresucursal">Descripcion producto</label>
        <input type="text" id="nombresucursal" name="nombresucursal" value="<?php echo $row["suc_nombre"]; ?>" required placeholder="Ingrese los dos nombres ..." />
        <br>
        <label id="Direccionsucursal">Caracteristicas</label>
        <input type="text" id="direccionsucursal" name="direccionsucursal" value="<?php echo $row["suc_direccion"]; ?>" required placeholder="Ingrese los dos apellidos ..." />
        <br>
        <label id="Ciudadsucursal">Ciudad Actual</label>
        <input type="text" id="ciudadsucursal" name="ciudadsucursal" value="<?php echo $row["suc_ciudad"]; ?>" required placeholder="Ingrese los dos apellidos ..." />
        <br>
        <label id="Ciudad">NUEVA CIUDAD (*)</label>
        <SELECT id="selCombo" NAME="selCombo">
          <OPTION VALUE=""></OPTION>
          <OPTION VALUE="cuenca">CUENCA</OPTION>
          <OPTION VALUE="guayaquil">GUAYAQUIL</OPTION>
          <OPTION VALUE="quito">QUITO</OPTION>
          <OPTION VALUE="loja">LOJA</OPTION>
        </SELECT>
        <br>
        <div id="mdv">
          <input class="btn btn-primary" id="guargar" name="guardar" type="submit" value="MODIFICAR">&nbsp;
          <input class="btn btn-danger btn-sm" id="borrar" name="borrar" type="Reset" value="Borrar">
          <a href="index.php?mail=<?php echo $_GET['mail']; ?>" class="btn btn-default">Cancelar</a>
        </div>
      </form>
    <?php
  }
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