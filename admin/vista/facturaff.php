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
        $codio = $_GET["codio"];
        //$producto =$_GET["producto"];
        ?>

        <header>
            <nav>
                <ul>
                    <li> <a href="comprar.php?mail=<?php echo "$mail"; ?>&codigo=<?php echo $codio; ?>">Atras</a>
                    </li>
                </ul>
            </nav>
        </header>


        <form id="formulario01" method="POST" action="../controladores/controlador_pedido.php" align="center">
        
        <label for='cedula'>CANTIDAD                             </label>
        <label for='nombres'>CARACTERISTICAS</label>
        <label for="apellidos">VALOR UNITARIO</label>
        <label for="Cantidad">IMPORTE</label>
            <?php
            $mail = $_GET["mail"];
            $codio = $_GET["codio"];
            //$producto = $_GET["producto"];



            // echo $cone;
            $codio = $_GET['codio'];
            include '../../config/conexionDB.php';
            $sql    = "SELECT * FROM pedidos WHERE cod_usuario = '$codio' and ped_estado='CREADO';";
            $result = $conn->query($sql);
            $sub2 = 0;
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
                    $cont += 1;
                    echo $cont;
                    //$stock = $rl["prod_stock"];
                    //$stock2 = $stock-$rtl;
                    //$sql2 = "UPDATE  productos set prod_stock = '$stock';";
                    ?>
                    <input type="hidden" id="producto" name="producto" value="<?php echo $row["prod_id"]; ?>" />
                    <br>
                    <input type="hidden" id="codigo" name="codigo" value="<?php echo $codio; ?>" />
                    <br>
                    <input type="hidden" id="mail" name="mail.<?php echo $cont; ?>" value="<?php echo $mail; ?>" />
                    <br>             
                    <input size=1 type="text" id="cantidad" name="cantidad" value="<?php echo $rlt3; ?>" disabled />
                    <input size=160 type="text" id="caracteristicas" name="caracteristicas" value="<?php echo $rlt; ?>" disabled />
                    <input size=4 type="text" id="valorunitario" name="valorunitario" value="<?php echo $rlt2 ?>" disabled />
                    <input size=1 type="text" id="cantidad" name="cantidad" value="<?php echo $importe; ?>" disabled />
                    <br>
                <?php

            }
        } else {
            echo " <p> colspan='10'> EROORRRRR!!!!!! </p>";
            echo "<p>" . mysqli_error($conn) . "</p>";
        }

        $conn->close();
        ?>

            <br>
            <div>
                <input class="btn" type="submit" id="modificar" name="modificar" value="Modificar" />
                <button type="button" class="btn btn-default"> <a href="index_usuario.php?cone='<?php echo $cone; ?>'">ATRAS</a></button>
            </div>

        </form>



    </section>
</body>