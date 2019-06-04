<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>ListarProductos</title>
</head>

<body class="fondo">


    <header>
        <nav>
            <ul>
                <li> <a href="../../public/vista/home.php">Atras</a> </li>
            </ul>
        </nav>
    </header>

    <h2>PRODUCTOS</h2>
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
                echo "   <td> <a href='ver_productos.php?producto=" . $row['prod_id'] . "' >VER producto</a>  </td>";

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