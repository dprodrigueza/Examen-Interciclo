<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>ListarProductos</title>
    <script type="text/javascript" src="bus.js"></script>
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
    $sucursal = $_GET["sucursal"];
    //$mail = $_GET["mail"];
    //$sucursal = $_GET["sucursal"];
    //$codio = $_GET["codio"];
    //$producto =$_GET["producto"];
    ?>

    <h2>PRODUCTOS</h2>
    <?php
    $mail = $_GET["mail"];


    include '../../config/conexionDB.php';
    $sql = "SELECT * FROM usuarios WHERE usu_mail ='$mail' ;";

    $result = $conn->query($sql);
    $rl = mysqli_fetch_assoc($result);
    $conn->close();
    ?>


    <?php
    $mail = $_GET["mail"];
    $sucursal = $_GET["sucursal"];
    $direccion = $_GET["selCombo"];
    //echo $mail;
    //echo '<br>';
    include '../../config/conexionDB.php';
    $sql2 = "SELECT * FROM usuarios WHERE usu_mail ='$mail' ;";

    $result2 = $conn->query($sql2);
    $rl = mysqli_fetch_assoc($result2);
    $rlt = $rl["usu_id"];


    $rlt1 = $rl["usu_nombre"];
    $rlt2 = $rl["usu_apellido"];
    echo 'Sucursal: ' . $sucursal;
    echo '<br>';
    echo  $direccion;

    $sql3    = "SELECT * FROM pedidos WHERE cod_usuario = '$rlt' and ped_estado='CREADO';";
    $result3 = $conn->query($sql3);

    $cont = 0;
    if ($result3->num_rows > 0) {
        while ($row = $result3->fetch_assoc()) {
            $cont += 1;
        }
        echo '<br>';
        echo 'Productos añadidos : ' . $cont;
        echo '<br>';
    } else {
        echo 'No Tiene Productos Añadidos';
    }

    $conn->close();
    ?>
    <br>
    <a href="facturaff.php?codio=<?php echo $rlt; ?>&mail=<?php echo $mail; ?>&sucursal=<?php echo $sucursal; ?>&selCombo=<?php echo $direccion; ?>" class="btn btn-default">Continuar Compra a factura</a>
    <a href="vercarrito.php?codio=<?php echo $rlt; ?>&mail=<?php echo $mail; ?>&sucursal=<?php echo $sucursal; ?>&selCombo=<?php echo $direccion; ?>" class="btn btn-default">Ver carrito</a>
    <a href="listar_factcliente.php?codio=<?php echo $rlt; ?>&mail=<?php echo $mail; ?>&sucursal=<?php echo $sucursal; ?>&selCombo=<?php echo $direccion; ?>" class="btn btn-default">MIS COMPRAS</a>
    <br>


    <input type="text" name="busqueda" id="busqueda" placeholder="Buscar.." />
    <section id="datos">
        <table style="width:100%" border>
            <tr>
                <th>Descripcion</th>
                <th>precio</th>
                <th>imagen</th>
            </tr>
            <?php
            include '../../config/conexionDB.php';
            $sql = "SELECT * FROM productos WHERE prod_eliminado ='NO' OR prod_eliminado ='';";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";

                    echo "   <td>" . $row['prod_caracteristica'] . "</td>";
                    echo "   <td>" . $row['prod_precio'] . "</td>";

                    echo "   <td ><img  src='../../imagenes/" . $row['prod_foto'] . "' width='80px' height='80px'/></td>";
                    //echo "   <td> <a href='../../controladores/controlador_pedido.php?mail=". $mail ."&codigo=". $rlt ."&producto=". $row['prod_id']."' >ANADIR CARRITO    </a>  </td>";
                    echo "   <td> <a href='ver_producto.php?mail=" . $mail . "&codigo=" . $rlt . "&producto=" . $row['prod_id'] . "&sucursal=" . $sucursal . "&selCombo=". $direccion. "' >VER producto</a>  </td>";

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
    </section>

    <div id="mdv">
            <a href="../../public/vista/homeUsu.php?mail=<?php echo "$mail"; ?>&sucursal=<?php echo "$sucursal"; ?>" class="btn btn-default">Atras</a> 
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