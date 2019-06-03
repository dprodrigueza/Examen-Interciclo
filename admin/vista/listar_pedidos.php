<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>PEDIDOS ENTREGADOS</title>
</head>

<body class="fondo">

    <h2>PEDIDOS ENTREGADOS</h2>
    <table style="width:100%" border>
        <tr>
            <th>FECHA</th>
            <th>USUARIO</th>
            <th>TOTAL PEDIDO</th>
        </tr>
        <?php
        include '../../config/conexionDB.php';
        $sql = "SELECT * FROM facturacab where fac_estado='FINALIZADO' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "   <td>" . $row["fcab_fecha"] . "</td>";
                $codigo = $row["cod_id"];
                $sql2    = "SELECT * FROM usuarios WHERE usu_id = '$codigo';";
                $result2 = $conn->query($sql2);
                $rl      = mysqli_fetch_assoc($result2);
                $rlt = $rl["usu_nombre"];
                echo "   <td>" . $rlt . "</td>";
                echo "   <td>" . $row['fcab_total'] . "</td>";
               
                // echo "   <td ><a  href='modificar_sucursal.php?codigo=" . $row['suc_id'] . "'>MODIFICAR<a/></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo " <td colspan='6'> NO SE HA ENTREGADO NINGUN PEDIDO </td>";
            echo "</tr>";
        }

        $conn->close();

        ?>
    </table>
</body>

</html>