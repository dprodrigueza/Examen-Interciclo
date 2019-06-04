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
    //$codio = $_GET["codio"];
    //$producto =$_GET["producto"];
    ?>

    <header>
        <nav>
            <ul>
                <li> <a href="../../public/vista/homeUsu.php?mail=<?php echo "$mail"; ?>">Atras</a> </li>
            </ul>
        </nav>
    </header>

    <h2>PRODUCTOS</h2>
    <?php
            $mail = $_GET["mail"];
            
            include '../../config/conexionDB.php';
            $sql = "SELECT * FROM usuarios WHERE usu_mail ='$mail' ;";
            
            $result = $conn->query($sql);
            $rl = mysqli_fetch_assoc($result);
            $conn->close();
            ?>
                  <img src="../../imagenes/<?php echo $rl["usu_foto"]; ?>" width="80" height="80">
    <table style="width:100%" border>
        <tr>
            
            <?php
            $mail = $_GET["mail"];
            //echo $mail;
            //echo '<br>';
            include '../../config/conexionDB.php';
            $sql2 = "SELECT * FROM usuarios WHERE usu_mail ='$mail' ;";
            
            $result2 = $conn->query($sql2);
            $rl = mysqli_fetch_assoc($result2);
            $rlt = $rl["usu_id"];
            

            $rlt1 = $rl["usu_nombre"];
            $rlt2 = $rl["usu_apellido"];
            echo 'Username: ' . $rlt1 . ' ' . $rlt2;
            echo '<br>';

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
            <a href="facturaff.php?codio=<?php echo $rlt; ?>&mail=<?php echo $mail; ?>">Continuar Compra a factura</a>
            <br>
            <a href="vercarrito.php?codio=<?php echo $rlt; ?>&mail=<?php echo $mail; ?>">Ver carrito</a>
            <br>
            <a href="listar_factcliente.php?codio=<?php echo $rlt; ?>&mail=<?php echo $mail; ?>">MIS COMPRAS</a>
            <br>



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
                echo "   <td> <a href='ver_producto.php?mail=" . $mail . "&codigo=" . $rlt . "&producto=" . $row['prod_id'] . "' >VER producto</a>  </td>";

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
</body>

</html>