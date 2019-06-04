<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Perfil.</title>
    <script type="text/javascript" src="../controladores/funcion.js"></script>
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


    $sql = "SELECT * FROM usuarios where usu_mail='$mail'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>

            <form id="formularioUpdate" method="POST" action="../controladores/actualizapas.php?mail=<?php echo $row["usu_mail"]; ?>">
            <input type="hidden" id="sucursal" name="sucursal" value="<?php echo $sucursal; ?>" />

                <label for="contraNEW">Nueva Contraseña *: </label>
                <input type="password" id="contrasNew" name="contrasNew" placeholder="Ingrese la nueva contraseña" />
                <br>
                <label for="contraVer">Confirma tu contraseña: </label>
                <input type="password" id="verifi" name="verifi" placeholder="Ingresa nuevamente tu contraseña" onkeyup="validarContra()" />
                <span id="mensajeContra" class="error"></span>
                <br>
                <br>
                <input type="submit" class="btn btn-primary btn-sm" id="btncontrasena" name="btncontrasena" value="CAMBIAR CONTRASEÑA" disabled />
                <a href="actualizarUsuario.php?mail=<?php echo "$mail"; ?>&sucursal=<?php echo "$sucursal"; ?>" class="btn btn-default">Cancelar</a>
            </form>
        <?php
    }
} else {
    echo "<p>Ha ocurrido un error inesperado !</p>";
    echo "<p>" . mysqli_error($conn) . "</p>";
}
$conn->close();
?>



