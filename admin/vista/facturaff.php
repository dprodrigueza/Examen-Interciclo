<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8" />
    <title>MI_CUENTA</title>
    <link href="" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="fun.js"></script>
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

<body background="../../../fuserr.jpg" onload="calcular()">

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

    <br><br><br><br><br><br>

    <section>

        <?php
        session_start();
        if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
            header("Location: ../../login/login.php");
        }

        ?>
        <?php

        $mail = $_GET["mail"];
        $sucursal = $_GET["sucursal"];
        $codio = $_GET["codio"];

        $direccion = $_GET["selCombo"];

        //  $direccion = $_GET["direccion"];

        //$producto =$_GET["producto"];
        ?>

        <form id="formulario01" method="POST" action="../../controladores/controlador_factura.php">

            <?php
            $mail = $_GET["mail"];
            $codio = $_GET["codio"];
            $sucursal = $_GET["sucursal"];
            $direccion = $_GET["selCombo"];
            //$producto =$_GET["producto"];



            // echo $cone;
            include '../../config/conexionDB.php';
            date_default_timezone_set("America/Guayaquil");
            $fecha = date('Y-m-d H:i:s', time());
            echo "</br>";
            $sql = "SELECT * FROM usuarios WHERE usu_id = '$codio' ";

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <br>
                    <label for='nombres'>Cliente</label>
                    <input size=50 type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombre"];
                                                                                            echo "&nbsp;";
                                                                                            echo $row["usu_apellido"]; ?>" />
                    <br>
                    <br>
                    <label for='direccion'>Direccion</label>
                    <input size=50 type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"]; ?>" />
                    <br>
                    <br>
                    <label for='direccion'>Sucursal</label>
                    <input size=50 type="text" id="sucursal" name="sucursal" value="<?php echo $sucursal;
                                                                            echo '-';
                                                                            echo $direccion; ?>" disabled />
                    <input type="hidden" id="sucursal" name="sucursal" value="<?php echo $sucursal; ?>" />
                    <input type="hidden" id="direccion" name="direccion" value="<?php echo $direccion; ?>" />
                    <br>
                    <br>
                    <label for='fecha'>Fecha</label>
                    <input type="text" id="fecha" name="fecha" value="<?php echo $fecha; ?>" />
                    <br>
                    <br>
                <?php
            }
        } else {
            echo " <p> colspan='10'> EROORRRRR!!!!!! </p>";
            echo "<p>" . mysqli_error($conn) . "</p>";
        }

        $conn->close();
        ?>


<label for='cant'>CANTIDAD&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </label>

            <label for='caracteristicas'>CARACTERISTICAS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <label for="v_unitario">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;V. UNITARIO</label>
            <label for="valortotal">V. TOTAL</label>
            <?php
            $mail = $_GET["mail"];
            $codio = $_GET["codio"];
            //$producto = $_GET["producto"];

            // echo $cone;
            $codio = $_GET['codio'];
            include '../../config/conexionDB.php';
            $sql    = "SELECT * FROM pedidos WHERE cod_usuario = '$codio' and ped_estado='CREADO';";
            $result = $conn->query($sql);
            $subt = 0;
            $cont = 0;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $pro     = $row["pro_id"];
                    $sql2    = "SELECT * FROM productos WHERE prod_id = '$pro';";
                    $result2 = $conn->query($sql2);
                    $rl      = mysqli_fetch_assoc($result2);
                    $rlt = $rl["prod_caracteristica"];
                    $rlt2 = $rl["prod_precio"];
                    $rlt3 = $row["ped_cantidad"];
                    $importe = $rlt2 * $rlt3;
                    //subtotal
                    $subt += $importe;
                    //iva12
                    $iva = ($subt * 12) / 100;
                    echo "</br>";
                    $cont += 1;
                    //echo $cont;
                    //$stock = $rl["prod_stock"];
                    //$stock2 = $stock-$rtl;
                    //$sql2 = "UPDATE  productos set prod_stock = '$stock';";
                    ?>
                    <br>

                    <input type="hidden" id="producto" name="producto" value="<?php echo $row["prod_id"]; ?>" />
                    <input type="hidden" id="pro<?php echo $cont; ?>" name="pro<?php echo $cont; ?>" value="<?php echo $pro; ?>" />

                    <input type="hidden" id="codigo" name="codigo" value="<?php echo $codio; ?>" />

                    <input type="hidden" id="mail" name="mail" value="<?php echo $mail; ?>" />

                    <input size=7 type="text" id="cantidad" name="cantidad" value="<?php echo $rlt3; ?>" disabled />
                    <input type="hidden" id="cant<?php echo $cont; ?>" name="cant<?php echo $cont; ?>" value="<?php echo $rlt3; ?>" />

                    <input size=100 type="text" id="caracteristicas" name="caracteristicas" value="<?php echo $rlt; ?>" disabled />


                    <input size=10 type="text" id="valorunitario" name="valorunitario" value="<?php echo $rlt2 ?>" disabled />
                    <input type="hidden" id="vuni<?php echo $cont; ?>" name="vuni<?php echo $cont; ?>" value="<?php echo $rlt2; ?>" />

                    <input size=10 type="text" id="valortotal<?php echo $cont; ?>" name="valortotal<?php echo $cont; ?>" value="" disabled />
                    <input type="hidden" id="tot<?php echo $cont; ?>" name="tot<?php echo $cont; ?>" value="<?php echo $importe; ?>" />
                <?php
            }
        } else {
            echo "
            <p> colspan='10'> EROORRRRR!!!!!! </p>";
            echo "<p>" . mysqli_error($conn) . "</p>";
        }
        $total = $subt + $iva;

        $conn->close();
        ?>
            <br>
            <input type="hidden" id="contador" name="contador" value="<?php echo $cont; ?>" />
            <label for="subto">SUBTOTAL</label>
            <input size=10 type="text" id="subtotal" name="subtotal" value="" disabled />
            <input type="hidden" id="subtotal" name="subtotal" value="<?php echo $subt; ?>" />
            <br>
            <label for="ivaa">IVA 12%</label>
            <input size=10 type="text" id="iva" name="iva" value="" disabled />
            <input type="hidden" id="iva" name="iva" value="<?php echo $iva; ?>" />
            <br>
            <label for="totpagar">TOTAL A PAGAR</label>
            <input size=10 type="text" id="totalpagar" name="totalpagar" value="" disabled />
            <input type="hidden" id="totalpagar" name="totalpagar" value="<?php echo $total; ?>" />
            <br>
            <input class="btn btn-default"  type="submit" id="modificar" name="modificar" value="Comprar" />
            <button type="button" class="btn btn-default"> <a href="comprar.php?mail=<?php echo "$mail"; ?>&codigo=<?php echo $codio; ?>&sucursal=<?php echo $sucursal; ?>&selCombo=<?php echo $direccion; ?>">ATRAS</a></button>

        </form>
    </section>

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