<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>ListarSucursales</title>
</head>

<body class="fondo">

    <h2>Listar Sucursales</h2>
    <table style="width:100%" border>
        <tr>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>CIUDAD</th>
        </tr>
        <?php
        include '../../config/conexionDB.php';
        $sql = "SELECT * FROM sucursal WHERE suc_eliminado ='NO' OR suc_eliminado ='';";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "   <td>" . $row["suc_nombre"] . "</td>";
                echo "   <td>" . $row['suc_direccion'] . "</td>";
                echo "   <td>" . $row['suc_ciudad'] . "</td>";
                echo "   <td ><a  href='modificar_sucursal.php?codigo=" . $row['suc_id'] . "'>MODIFICAR<a/></td>";
                echo "   <td ><a  href='../../controladores/controlador_eliminarsuc.php?codigo=" . $row['suc_id'] . "'>ELIMINAR<a/></td>";
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