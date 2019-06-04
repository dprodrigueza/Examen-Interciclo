<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8" />
    <title>MI_CUENTA</title>
    <link href="" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="fun.js"></script>
</head>

<body background="../../../fuserr.jpg" onload="calcular()">
    <section>
        <?php
        session_start();
        $mail = $_GET["mail"];
        $sucursal = $_GET["sucursal"];
        $codio = $_GET["codio"];
<<<<<<< HEAD
        $direccion = $_GET["selCombo"];
=======
        $direccion = $_GET["direccion"];
>>>>>>> 7d976c38ae267d3fa7e45c38a9ad13815ba6f7c1
        //$producto =$_GET["producto"];
        ?>

        <header>
            <nav>
                <ul>
<<<<<<< HEAD
                    <li> <a href="comprar.php?mail=<?php echo "$mail"; ?>&codigo=<?php echo $codio; ?>&sucursal=<?php echo $sucursal; ?>&selCombo=<?php echo $direccion; ?>">Atras</a>
=======
                    <li> <a href="comprar.php?mail=<?php echo "$mail"; ?>&codigo=<?php echo $codio; ?>&sucursal=<?php echo $sucursal;?>&direccion=<?php echo $direccion;?>">Atras</a>
>>>>>>> 7d976c38ae267d3fa7e45c38a9ad13815ba6f7c1
                    </li>
                </ul>
            </nav>
        </header>


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
                    <input type="text" id="sucursal" name="sucursal" value="<?php echo $sucursal;
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


            <label for='cant'>CANTIDAD</label>
            <label for='caracteristicas'>CARACTERISTICAS</label>
            <label for="v_unitario">V. UNITARIO</label>
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

                    <input size=17 type="text" id="caracteristicas" name="caracteristicas" value="<?php echo $rlt; ?>" disabled />


                    <input size=8 type="text" id="valorunitario" name="valorunitario" value="<?php echo $rlt2 ?>" disabled />
                    <input type="hidden" id="vuni<?php echo $cont; ?>" name="vuni<?php echo $cont; ?>" value="<?php echo $rlt2; ?>" />

                    <input size=5 type="text" id="valortotal<?php echo $cont; ?>" name="valortotal<?php echo $cont; ?>" value="" disabled />
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
            <input size=5 type="text" id="subtotal" name="subtotal" value="" disabled />
            <input type="hidden" id="subtotal" name="subtotal" value="<?php echo $subt; ?>" />
            <br>
            <label for="ivaa">IVA 12%</label>
            <input size=5 type="text" id="iva" name="iva" value="" disabled />
            <input type="hidden" id="iva" name="iva" value="<?php echo $iva; ?>" />
            <br>
            <label for="totpagar">TOTAL A PAGAR</label>
            <input size=5 type="text" id="totalpagar" name="totalpagar" value="" disabled />
            <input type="hidden" id="totalpagar" name="totalpagar" value="<?php echo $total; ?>" />
            <br>
            <input class="btn" type="submit" id="modificar" name="modificar" value="Comprar" />
            <button type="button" class="btn btn-default"> <a href="index_usuario.php?cone='<?php echo $cone; ?>'">ATRAS</a></button>

        </form>
    </section>
</body>

</html>