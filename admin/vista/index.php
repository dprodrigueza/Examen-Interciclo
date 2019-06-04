<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8" />
	<title>Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
</head>

<style>
      body,
    html {
        height: 100%;
        font-family: "Inconsolata", sans-serif;
    }

    .bgimg {
        background-position: center;
        background-size: cover;
        background-image: url("../../imagenes/ima1.jpg");
        min-height: 75%;
      }

      .menu {
        display: none;
      }
</style>

<body>
<<<<<<< HEAD
	<?php
	include '../../config/conexionDB.php'
	?>
	<h1>ADMIN</h1>
	<h1>ADMIN</h1>
	<a href="crearusuario.php">CREAR USUARIO</a>
	<a href="crear_producto.html">CREAR PRODUCTO</a>
	<a href="crear_sucursal.html">CREAR SUCURSAL</a>
	<a href="listarUsuarios.php">VER USUARIOS</a>
	<a href="listar_productos.php">VER PRODUCTOS</a>
	<a href="listar_sucursal.php">VER SUCURSALES</a>
	<a href="listar_facturas.php">VER PEDIDOS EN CAMINO</a>
	<a href="listar_pedidos.php">PEDIDOS FENALIZADOS</a>
	<a href="listar_cancelados.php">PEDIDOS CANCELADOS</a>
</body>
=======
<<<<<<< HEAD
	
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

<br><br><br><br>
<header class="bgimg w3-display-container w3-grayscale-min" id="home">
    <div class="w3-display-bottomleft w3-center w3-padding-large w3-hide-small">
      <span class="w3-tag">Abierto desde 9am to 7pm</span>
    </div>
    <div class="w3-display-bottomright w3-center w3-padding-large">
      <span class="w3-text-white"> Tomas Ordoñes y Presidente Cordova </span>
    </div>

</header>

<br><br><br><br><br>
>>>>>>> 044775643bc49ef22c52dc3cb07ca0a51cbf1bf5
<table style="width:100%" border>
	<tr>
		<th>FECHA</th>
		<th>USUARIO</th>
		<th>TOTAL PEDIDO</th>
		<th>....enviar...</th>
	</tr>
	<?php
	include '../../config/conexionDB.php';
	$sql = "SELECT * FROM facturacab where fac_estado='CONFIRMADO';";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo "   <td>" . $row["fcab_fecha"] . "</td>";
			$codigo = $row["cod_id"];
			$codigo2 = $row["fcab_id"];
			$sql2    = "SELECT * FROM usuarios WHERE usu_id = '$codigo';";
			$result2 = $conn->query($sql2);
			$rl      = mysqli_fetch_assoc($result2);
			$rlt = $rl["usu_nombre"];
			$crt = $rl["usu_mail"];
			echo "   <td>" . $rlt . "</td>";
			echo "   <td>" . $row['fcab_total'] . "</td>";
			echo "   <td><a href='ver_factura.php?codigo=$codigo2&usuario=$codigo&mail=$crt'>VER PEDIDO</a></td>";
			echo "   <td><a href='../../controladores/controlador_modificarfactura.php?codigo=$codigo2' >ENVIAR PEDIDO</a></td>";
			echo "   <td><a href='../../controladores/cancelar_pedido.php?codigo=$codigo2' >CANCELAR PEDIDO</a></td>";

			// echo "   <td ><a  href='modificar_sucursal.php?codigo=" . $row['suc_id'] . "'>MODIFICAR<a/></td>";
			echo "</tr>";
		}
	} else {
		echo "<tr>";
		echo " <td colspan='6'> No existe Usuarios </td>";
		echo "</tr>";
	}

	$conn->close();

	?>
</table>

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