<!Doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Perfil.</title>
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
      $ref = $_GET["adm"];
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
    <a href="index.php?mail=<?php echo $_GET['adm']; ?>" class="w3-button w3-block w3-black">INICIO</a>
   </div>

  <div class="w3-col s3">
    <a href="crearusuario.php?mail=<?php echo $_GET['adm']; ?>" class="w3-button w3-block w3-black">CREAR USUARIO</a>
  </div>

  <div class="w3-col s3">
    <a href="listarUsuarios.php?mail=<?php echo $_GET['adm']; ?>" class="w3-button w3-block w3-black">VER USUARIO</a>
  </div>

  <div class="w3-col s3">
    <a href="crear_producto.php?mail=<?php echo $_GET['adm']; ?>" class="w3-button w3-block w3-black">CREAR PRODUCTO</a>
  </div>

  <div class="w3-col s3">
    <a href="crear_sucursal.php?mail=<?php echo $_GET['adm']; ?>" class="w3-button w3-block w3-black">CREAR SUCURSAL</a>
  </div>

  <div class="w3-col s3">
    <a href="listar_productos.php?mail=<?php echo $_GET['adm']; ?>" class="w3-button w3-block w3-black">VER PRODUCTOS</a>
  </div>

  <div class="w3-col s3">
    <a href="listar_sucursal.php?mail=<?php echo $_GET['adm']; ?>" class="w3-button w3-block w3-black">VER SUCURSALES</a>
  </div>

  <div class="w3-col s3">
    <a href="listar_facturas.php?mail=<?php echo $_GET['adm']; ?>" class="w3-button w3-block w3-black">VER PEDIDOS EN CAMINO</a>
  </div>

  <div class="w3-col s3">
    <a href="listar_pedidos.php?mail=<?php echo $_GET['adm']; ?>" class="w3-button w3-block w3-black">PEDIDOS FINALIZADOS</a>
  </div>

  <div class="w3-col s3">
    <a href="listar_cancelados.php?mail=<?php echo $_GET['adm']; ?>" class="w3-button w3-block w3-black">CANCELADOS</a>
  </div>

  <div class="w3-col s3">
    <a href="../../config/cerrarSesion.php" class="w3-button w3-block w3-black">CERRAR SESION</a>
  </div>

  </div>
</div>

<br><br><br><br><br><br><br>
    <h2>Actualizar Usuario</h2>
    <?php
        
        $codio = $_GET["codio"];
        $mail2 = $_GET["adm"];
       
        ?>

        <header>
            <nav>
                <ul>
                    <li> <a href="listarUsuarios.php?mail=<?php echo "$mail2"; ?>">Atras</a>
                    </li>
                </ul>
            </nav>
        </header>


    <?php
    include('../../config/conexionDB.php');


    $codio = $_GET['codio'];
    $mail2 = $_GET['adm'];


    $sql = "SELECT * FROM usuarios where usu_id='$codio' and usu_eliminado = 'NO'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>

            <form id="formularioUpdate" method="POST" enctype="multipart/form-data" action="../controladores/actualizarUsu.php?codio=<?php echo $codio; ?>&mail2=<?php echo $mail2; ?>">

            <?php echo $codio; ?>
                <img src="../../imagenes/<?php echo $row["usu_foto"]; ?>" width="80" height="80">
                <label>IMAGEN PERFIL:</label>
                <input id="imagen" name="imagen" size="30" type="file" />
                <br>
                <label for="nombres">Nombre: </label>
                <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombre"]; ?>" />
                <br>
                <label for="apellidos">Apelido: </label>
                <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellido"]; ?>" />
                <br>
                <label for="lbldireccion">Direccion: </label>
                <input type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"]; ?>" />
                <br>
                <label for="correo">Correo electrónico: </label>
                <input type="email" id="correo" name="correo" disabled value="<?php echo $row["usu_mail"]; ?>" />
                <br>
                <button id="btnCambiarContraseña"><a href="actualizarContra.php?mail=<?php echo $mail2; ?>&codio=<?php echo $codio; ?>">CAMBIAR CONTRASEÑA</a> </button>
                <br>
                <br>
                <input type="submit" id="GUARDAR" name="guardar" value="GUARDAR" />
            </form>
        <?php
    }
} else {

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