<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Gestion de Usuarios</title>
    <link href="../../../public/vista/css/estiloadmin.css" rel="stylesheet" type="text/css" />

</head>

<body  class="fondo">
    <section id="secin">
        <div class="cb">
            <header>
                <nav>
                    <ul>
                        <li> <a href="index_admin.php?cone=<?php echo "$cone";?>">Atras</a> </li>
                    </ul>
                </nav>
            </header>

        </div>
        <div id="dtl">
        <h2>USUARIOS</h2>
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
                $sql = "SELECT * FROM productos";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "   <td>" . $row["prod_descripcion"] . "</td>";
                        echo "   <td>" . $row['prod_caracteristica'] . "</td>";
                        echo "   <td>" . $row['prod_precio'] . "</td>";
                        echo "   <td>" . $row['prod_stock'] . "</td>";
                        echo "   <td ><img  src='../../imagenes/" . $row['prod_foto'] . "' width='80px' height='80px'/></td>";
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
        </div>
    </section>
</body>

</html>