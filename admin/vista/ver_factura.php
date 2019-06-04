<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8" />
    <title>MI_CUENTA</title>
    <link href="" rel="stylesheet" type="text/css" />

</head>

<body background="../../../fuserr.jpg">
    <section>
        <?php
        session_start();
        $mail = $_GET["mail"];
        $codio = $_GET["usuario"];
        $mail2 = $_GET["mail2"];
        //$producto =$_GET["producto"];
        ?>

        <header>
            <nav>
                <ul>
                    <li> <a href="index.php?mail=<?php echo "$mail2"; ?>">Atras</a>
                    </li>
                </ul>
            </nav>
        </header>


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
                    <input align="center" type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombre"];
                                                                                            echo "&nbsp;";
                                                                                            echo $row["usu_apellido"]; ?>" disabled />
                    <br>
                    <br>
                    <label for='direccion'>Direccion</label>
                    <input type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"]; ?>" disabled />
                    <br>
                    <br>
                    <label for='direccion'>Sucursal</label>
                    <input type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"]; ?>" disabled />
                    <br>
                    <br>
                    <label for='fecha'>Fecha</label>
                    <input type="text" id="fecha" name="fecha" value="<?php echo $rlt22; ?>" />
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


            <label for='cant'>CANTIDAD</label>
            <label for='caracteristicas'>CARACTERISTICAS</label>
            <label for="v_unitario">V. UNITARIO</label>
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

                    <input size=17 type="text" id="caracteristicas" name="caracteristicas" value="<?php echo $rlt; ?>" disabled />

                    <input size=8 type="text" id="valorunitario" name="valorunitario" value="<?php echo $rlt2 ?>" disabled />

                    <input size=5 type="text" id="valortotal<?php echo $cont; ?>" name="valortotal<?php echo $cont; ?>" value="<?php echo $tttt; ?>" disabled />

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
            <input size=5 type="text" id="subtotal" name="subtotal" value="<?php echo $rlt23; ?>" disabled />
          
            <br>
            <label for="ivaa">IVA 12%</label>
            <input size=5 type="text" id="iva" name="iva" value="<?php echo $rlt24; ?>" disabled />
           
            <br>
            <label for="totpagar">TOTAL A PAGAR</label>
            <input size=5 type="text" id="totalpagar" name="totalpagar" value="<?php echo $rlt25; ?>" disabled />
            
            <br>
            <button type="button" class="btn btn-default"> <a href="index_usuario.php?cone='<?php echo $cone; ?>'">ATRAS</a></button>

        </form>
    </section>
</body>

</html>