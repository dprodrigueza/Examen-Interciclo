<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>ListarProductos</title>
</head>
<body class="fondo">
    <?php
    session_start();
    $mail = $_GET["mail"];
    $codio = $_GET["codio"];
    //$producto =$_GET["producto"];
    ?>
    <header>
        <nav>
            <ul>
                <li> <a href="comprar.php?mail=<?php echo "$mail"; ?>&codigo=<?php echo $codio; ?>">Atras</a> </li>
            </ul>
        </nav>
    </header>
    <h2>PRODUCTOS</h2>
    <table style="width:100%" border>
        <tr>
            <?php
            $mail = $_GET["mail"];
            //echo $mail;
            include '../../config/conexionDB.php';
            $sql2 = "SELECT * FROM usuarios WHERE usu_mail ='$mail' ;";
            $result2 = $conn->query($sql2);
            $rl = mysqli_fetch_assoc($result2);
            $rlt = $rl["usu_id"];
            $rlt1 = $rl["usu_nombre"];
            $rlt2 = $rl["usu_apellido"];
            echo 'Username: ' . $rlt1 . ' ' . $rlt2;
            echo '<br>';
            $sql3    = "SELECT * FROM pedidos WHERE cod_usuario = '$rlt' AND ped_estado='CREADO' ;";
            $result3 = $conn->query($sql3);
            $cont = 0;
            if ($result3->num_rows > 0) {
                while ($row = $result3->fetch_assoc()) {
                    $cont += 1;
                }
                echo 'Productos añadidos:' . $cont;
                echo '<br>';
            } else {
                echo 'no vale consulta';
            }
            $conn->close();
            ?>
            <th>CARACTERISTICAS</th>
            <th>IMAGEN DEL PRODUCTO</th>
            <th>CANTIDAD</th>
            <th>ELIMINAR</th>
        </tr>
        <?php
        include '../../config/conexionDB.php';
        $sub = 0;
        $sql = "SELECT * FROM pedidos WHERE cod_usuario = '$rlt' and ped_estado = 'CREADO';";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pro     = $row["pro_id"];
                $can = $row["ped_cantidad"];
                $sub += $can;
                $sql2    = "SELECT * FROM productos WHERE prod_id = '$pro';";
                $result2 = $conn->query($sql2);
                $rl = mysqli_fetch_assoc($result2);
                $rlt = $rl["prod_caracteristica"];
                $rlt2 = $rl["prod_foto"];
                echo "<tr>";
                echo "   <td>" . $rlt . "</td>";
                echo "   <td ><img  src='../../imagenes/" . $rlt2 . "' width='80px' height='80px'/></td>";
                echo "   <td>" . $can . "</td>";
                echo "   <td> <a href='../../controladores/eliminar_carrito.php?codigo=" . $row['ped_id'] . "&mail=" . $mail . "' >eliminar    </a>  </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo " <td colspan='6'> No existe Usuarios </td>";
            echo "</tr>";
        }
        echo 'o'.$sub;
        $conn->close();
        ?>
    </table>
</body>
</html>