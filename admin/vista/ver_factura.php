<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8" />
    <title>MI_CUENTA</title>
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

<body background="../../../fuserr.jpg">
    <section>
        <?php
        session_start();
        $mail = $_GET["mail"];
        $codio = $_GET["usuario"];
        $mail2 = $_GET["mail2"];
        //$producto =$_GET["producto"];
        ?>


        <form id="formulario01" method="POST" action="../../controladores/controlador_factura.php">

            <?php
            $mail = $_GET["mail"];
            $codio = $_GET["usuario"];
            $pr = $_GET["codigo"];
            //$producto =$_GET["producto"];



            // echo $cone;
            include '../../config/conexionDB.php';
            $sql22    = "SELECT * FROM facturacab WHERE fcab_id = '$pr';";
            $result22 = $conn->query($sql22);
            $rl22      = mysqli_fetch_assoc($result22);
            $rlt22 = $rl22["fcab_fecha"];
            $rlt23 = $rl22["fcab_subtotal"];
            $rlt24 = $rl22["fcab_iva"];
            $rlt25 = $rl22["fcab_total"];

            $sql = "SELECT * FROM usuarios WHERE usu_id = '$codio' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <br>
                    <label for='nombres'>Cliente</label>
                    <input size=50 type="text" class="form-control input-sm" id="nombres" name="nombres" value="<?php echo $row["usu_nombre"];
                                                                                            echo "&nbsp;";
                                                                                            echo $row["usu_apellido"]; ?>" disabled />
                    <br>
                    <br>
                    <label for='direccion'>Direccion</label>
                    <input size=50 type="text" id="direccion" name="direccion" class="form-control input-sm" value="<?php echo $row["usu_direccion"]; ?>" disabled />
                    <br>
                    <br>
                    <label for='direccion'>Sucursal</label>
                    <input size=50 type="text" id="direccion" name="direccion" class="form-control input-sm" value="<?php echo $row["usu_direccion"]; ?>" disabled />
                    <br>
                    <br>
                    <label for='fecha'>Fecha</label>
                    <input size=50 type="text" id="fecha" name="fecha" class="form-control input-sm" value="<?php echo $rlt22; ?>" />
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
            // $mail = $_GET["mail"];
            // $codio = $_GET["codio"];
            //$producto = $_GET["producto"];

            // echo $cone;
            // $codio = $_GET['codio'];
            include '../../config/conexionDB.php';
            $sql    = "SELECT * FROM facturadet WHERE fcab_id = '$pr';";
            $result = $conn->query($sql);
            $subt = 0;
            $cont = 0;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $pro = $row["pro_Id"];
                    $cantoooo     = $row["fdet_cantidad"];
                    $tttt     = $row["fdet_total"];
                    $sql2    = "SELECT * FROM productos WHERE prod_id = '$pro';";
                    $result2 = $conn->query($sql2);
                    $rl      = mysqli_fetch_assoc($result2);
                    $rlt = $rl["prod_caracteristica"];
                    $rlt2 = $rl["prod_precio"];

                    $cont += 1;
                    //echo $cont;
                    //$stock = $rl["prod_stock"];
                    //$stock2 = $stock-$rtl;
                    //$sql2 = "UPDATE  productos set prod_stock = '$stock';";
                    ?>
                    <br>


                    <input size=7 type="text" id="cantidad" name="cantidad" value="<?php echo $cantoooo; ?>" disabled />

                    <input size=100 type="text" id="caracteristicas" name="caracteristicas" value="<?php echo $rlt; ?>" disabled />

                    <input size=10 type="text" id="valorunitario" name="valorunitario" value="<?php echo $rlt2 ?>" disabled />

                    <input size=10 type="text" id="valortotal<?php echo $cont; ?>" name="valortotal<?php echo $cont; ?>" value="<?php echo $tttt; ?>" disabled />

                <?php
            }
        } else {
            echo "
            <p> colspan='10'> EROORRRRR!!!!!! </p>";
            echo "<p>" . mysqli_error($conn) . "</p>";
        }

        $conn->close();
        ?>
            <br>
           
            <label for="subto">SUBTOTAL</label>
            <input size=10 type="text" id="subtotal" name="subtotal" value="<?php echo $rlt23; ?>" disabled />
          
            <br>
            <label for="ivaa">IVA 12%</label>
            <input size=10 type="text" id="iva" name="iva" value="<?php echo $rlt24; ?>" disabled />
           
            <br>
            <label for="totpagar">TOTAL A PAGAR</label>
            <input size=10 type="text" id="totalpagar" name="totalpagar" value="<?php echo $rlt25; ?>" disabled />

        </form>
    </section>

    <div id="mdv">
        <a href="index.php?mail=<?php echo "$mail2"; ?>" class="btn btn-default">Regresar</a>
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