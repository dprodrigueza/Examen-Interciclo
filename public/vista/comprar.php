<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>ListarProductos</title>
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">-->

</head>

<!--<style>
  body,
  html {
    height: 100%;
    font-family: "Inconsolata", sans-serif;
  }

  .menu {
    display: none;
  }

</style>-->

<body>

    <?php
    session_start();
    if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
        header("Location: ../../login/login.php");
    }

    ?>
    <h2>PRODUCTOS</h2>
    <table style="width:100%" border>
        <tr>
            <?php
            $mail = $_GET["mail"];
            echo $mail;
            echo '<br>';

            include '../../config/conexionDB.php';
            $sql3    = "SELECT * FROM pedidos WHERE cod_usuario = '$rlt';";
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
                echo 'no vale consulta';
            }

            $conn->close();
            ?>
            <br>
            <a href="../factura.php?codio=<?php echo $rlt; ?>">Continuar Compra a factura</a>
            <br>
            <a href="vercarrito.php?codio=<?php echo $rlt; ?>&mail=<?php echo $mail; ?>">Ver Productos añadidos al carrito</a>
            <a href="../factura.php?codio=<?php echo $rlt; ?>">Continuar Compra</a>
            <a href="vercarrito.php?codio=<?php echo $rlt; ?>&mail=<?php echo $mail; ?>">Ver</a>

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
                echo "   <td> <a href='../../controladores/controlador_pedido.php?mail=" . $mail . "&codigo=" . $rlt . "&producto=" . $row['prod_id'] . "' >ANADIR CARRITO    </a>  </td>";

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