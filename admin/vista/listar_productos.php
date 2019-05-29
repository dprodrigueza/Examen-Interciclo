<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>ListarProductos</title>
</head>

<body class="fondo">

    <h2>PRODUCTOS</h2>
    <table style="width:100%" border>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>precio</th>
            <th>cantidad</th>
            <th>imagen</th>
        </tr>
        <?php
        include '../../config/conexionDB.php';
        $sql = "SELECT * FROM productos WHERE prod_eliminado ='NO' OR prod_eliminado ='';";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "   <td>" . $row["prod_descripcion"] . "</td>";
                echo "   <td>" . $row['prod_caracteristica'] . "</td>";
                echo "   <td>" . $row['prod_precio'] . "</td>";
                echo "   <td>" . $row['prod_stock'] . "</td>";
                echo "   <td ><img  src='../../imagenes/" . $row['prod_foto'] . "' width='80px' height='80px'/></td>";
                echo "   <td ><a  href='mod.php?codigo=" . $row['prod_id'] . "'>MODIFICAR<a/></td>";
                echo "   <td ><a  href='eliminar_productos.php?codigo=" . $row['prod_id'] . "'>ELIMINAR<a/></td>";
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