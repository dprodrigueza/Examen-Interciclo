<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>ListarSucursales</title>
</head>

<body class="fondo">

    <h2>EN CAMINO</h2>
    <table style="width:100%" border>
        <tr>
            <th>FECHA</th>
            <th>USUARIO</th>
            <th>TOTAL PEDIDO</th>
            <th>....enviar...</th>
        </tr>
        <?php
        $cod = $_GET["codio"];
        include '../../config/conexionDB.php';
        $sql = "SELECT * FROM facturacab where cod_id='$cod' AND fac_estado='CONFIRMADO';";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "   <td>" . $row["fcab_fecha"] . "</td>";
                $codigo = $row["cod_id"];
                $codigo2 = $row["fcab_id"];
                $sql2    = "SELECT * FROM usuarios WHERE usu_id = '$codigo';";
                $result2 = $conn->query($sql2);
                $rl      = mysqli_fetch_assoc($result2);
                $rlt = $rl["usu_nombre"];
                echo "   <td>" . $rlt . "</td>";
                echo "   <td>" . $row['fcab_total'] . "</td>";
                echo "   <td>" . $row['fac_estado'] . "</td>";
                echo "   <td><a href='../../controladores/cancelar_pedcli.php?codigo=$codigo2&codi=$codigo' >CANCELAR PEDIDO</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo " <td colspan='6'> NO HYA FACTURAS EN CAMINO </td>";
            echo "</tr>";
        }

        $conn->close();

        ?>
    </table>
</body>

</html>