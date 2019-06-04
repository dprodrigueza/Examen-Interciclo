<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Perfil.</title>
    <link href="../css/estilo.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
    <link rel="stylesheet" type="text/css" href="../../librerias/bootstrap/css/bootstrap.css">
    <script src="../../librerias/jquery-3.2.1.min.js"></script>
</head>

<body>

    <?php
    session_start();
    if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
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
      $sucursal = $_GET["sucursal"];
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
        <img src="../../imagenes/<?php echo $rl["usu_foto"]; ?>" width="80" height="80">
      </div>

      <div class="w3-col s3">
        <a href="../vista/home.php" class="w3-button w3-block w3-black">CERRAR SESION</a>
      </div>

    </div>
  </div>

  <br><br><br><br><br><br><br><br>

    <?php

    $mail = $_GET["mail"];
    $sucursal = $_GET["sucursal"];

    ?>

    <?php
    include('../../config/conexionDB.php');


    $mail = $_GET['mail'];
    $sucursal = $_GET['sucursal'];


    $sql = "SELECT * FROM usuarios where usu_mail='$mail'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>

            <form id="formularioUpdate" method="POST" enctype="multipart/form-data" action="../controladores/actualizarUsu.php?mail=<?php echo $row["usu_mail"]; ?>">
                <img src="../../imagenes/<?php echo $row["usu_foto"]; ?>" width="80" height="80">
                <input type="hidden" id="mail" name="mail" value="<?php echo $mail; ?>" />
                <input type="hidden" id="sucursal" name="sucursal" value="<?php echo $sucursal; ?>" />

                <label>IMAGEN PERFIL:</label>
                <input id="imagen" name="imagen" size="30" type="file" />
                <br>
                <label for="nombres">Nombre: </label>
                <input type="text" class="form-control input-sm" id="nombres" name="nombres" value="<?php echo $row["usu_nombre"]; ?>" />
                <br>
                <label for="apellidos">Apelido: </label>
                <input type="text" class="form-control input-sm" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellido"]; ?>" />
                <br>
                <label for="lbldireccion">Direccion: </label>
                <input type="text" class="form-control input-sm" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"]; ?>" />
                <br>
                <label for="correo">Correo electrónico: </label>
                <input type="email" class="form-control input-sm" id="correo" name="correo" disabled value="<?php echo $row["usu_mail"]; ?>" />
                <br>
                <button id="btnCambiarContraseña"><a href="actualizarContra.php?mail=<?php echo $_GET['mail']; ?>&sucursal=<?php echo $sucursal; ?>">CAMBIAR CONTRASEÑA</a> </button>
                <br>
                <br>
                <input type="submit" class="btn btn-primary btn-sm"  id="GUARDAR" name="guardar" value="GUARDAR" />
                <a href="homeUsu.php?mail=<?php echo "$mail"; ?>&sucursal=<?php echo "$sucursal"; ?>" class="btn btn-default">Atras</a>
            </form>
        <?php
    }
} else {

    echo "<p>" . mysqli_error($conn) . "</p>";
}
$conn->close();
?>
  <!-- Footer -->
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

</body>
</html>