<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>ListarProductos</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
</head>

    <style>
        body,
        html {
            height: 100%;
            font-family: "Inconsolata", sans-serif;
        }

        .menu {
            display: none;
        }
    </style>

<body class="fondo">

    <div class="w3-top">
    <div class="w3-row w3-padding w3-black">

        <div class="w3-col s3">
            <a href="index.php" class="w3-button w3-block w3-black">INICIO</a>
        </div>

        <div class="w3-col s3">
            <a href="crear_producto.html" class="w3-button w3-block w3-black">CREAR PRODUCTO</a>
        </div>

        <div class="w3-col s3">
            <a href="crear_sucursal.html" class="w3-button w3-block w3-black">CREAR SUCURSAL</a>
        </div>

        <div class="w3-col s3">
            <a href="listar_productos.php" class="w3-button w3-block w3-black">VER PRODUCTOS</a>
        </div>

        <div class="w3-col s3">
            <a href="listar_sucursal.php" class="w3-button w3-block w3-black">VER SUCURSALES</a>
        </div>

        <div class="w3-col s3">
            <a href="crear_pedido.html" class="w3-button w3-block w3-black">VER PEDIDO</a>
        </div>

        <div class="w3-col s3">
            <a href="../../config/cerrarSesion.php" class="w3-button w3-block w3-black">CERRAR SESION</a>
        </div>
    </div>
  </div>

    <br><br><br><br>
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

    <footer class="w3-center w3-light-grey w3-padding-48 w3-large">
        <p>UPS Hipermedial © Todos los derechos reservados</p>
    </footer>

    <script>
    // Tabbed Menu
        function openMenu(evt, menuName) {
        var i, x, tablinks;
        x = document.getElementsByClassName("menu");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < x.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" w3-dark-grey", "");
        }
        document.getElementById(menuName).style.display = "block";
        evt.currentTarget.firstElementChild.className += " w3-dark-grey";
        }
        document.getElementById("myLink").click();
    </script>
    
</body>

</html>