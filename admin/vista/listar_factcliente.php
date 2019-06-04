<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>ListarSucursales</title>
    <link href="" rel="stylesheet" type="text/css" />
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

<body class="fondo">

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
        <a href="../../config/cerrarSesion.php" class="w3-button w3-block w3-black">CERRAR SESION</a>
      </div>

    </div>
  </div>

    <br><br><br><br><br><br><br><br>

<?php
    session_start();
    $mail = $_GET["mail"];
    $codio = $_GET["codio"];
    $sucursal = $_GET["sucursal"];
    $direccion = $_GET["selCombo"];
    //$producto =$_GET["producto"];
    ?>
    
    <h2>EN CAMINO</h2>

    <table style="width:100%" border>
        <tr>
            <th>FECHA</th>
            <th>USUARIO</th>
            <th>TOTAL PEDIDO</th>
            <th>....enviar...</th>
        </tr>
        <?php
        $cod = $_GET["codio"];
        $sucursal = $_GET["sucursal"];
        $mail = $_GET["mail"];
        $direccion = $_GET["selCombo"];
        
        include '../../config/conexionDB.php';
        $sql = "SELECT * FROM facturacab where cod_id='$cod' AND fac_estado='CONFIRMADO';";
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
                echo "   <td>" . $rlt . "</td>";
                echo "   <td>" . $row['fcab_total'] . "</td>";
                echo "   <td>" . $row['fac_estado'] . "</td>";
                echo "   <td><a href='../../controladores/cancelar_pedcli.php?codigo=$codigo2&codi=$codigo&mail=$mail&sucursal=$sucursal&selCombo=$direccion' >CANCELAR PEDIDO</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo " <td colspan='6'> NO HYA FACTURAS EN CAMINO </td>";
            echo "</tr>";
        }

        $conn->close();

        ?>
    </table>

    <div id="mdv">
    <a href="comprar.php?mail=<?php echo "$mail"; ?>&codigo=<?php echo $codio; ?>&sucursal=<?php echo $sucursal; ?>&selCombo=<?php echo $direccion; ?>" class="btn btn-default">Atras</a> 
    </div>

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