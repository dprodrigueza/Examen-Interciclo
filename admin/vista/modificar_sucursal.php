<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8" />
    <title>MODIFICAR</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
    <link rel="stylesheet" type="text/css" href="../../librerias/bootstrap/css/bootstrap.css">
    <script src="../../librerias/jquery-3.2.1.min.js"></script>
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

<body>

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

    <?php
    $codigo = $_GET["codigo"];
    //  echo "$codigo";
    include '../../config/conexionDB.php';
    echo "</br>";
    $sql = "SELECT * FROM sucursal WHERE suc_id= '$codigo' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <form id="formulario01" method="POST" action="../../controladores/controlador_modificarsuc.php">

                <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
                <br>
                <label id="Nombresucursal">Descripcion producto</label>
                <input type="text" class="form-control input-sm" id="nombresucursal" name="nombresucursal" value="<?php echo $row["suc_nombre"]; ?>" required placeholder="Ingrese los dos nombres ..." />
                <br>
                <label id="Direccionsucursal">Caracteristicas</label>
                <input type="text" class="form-control input-sm" id="direccionsucursal" name="direccionsucursal" value="<?php echo $row["suc_direccion"]; ?>" required placeholder="Ingrese los dos apellidos ..." />
                <br>
                <label id="Ciudadsucursal">Ciudad Actual</label>
                <input type="text" class="form-control input-sm" id="ciudadsucursal" name="ciudadsucursal" value="<?php echo $row["suc_ciudad"]; ?>" required placeholder="Ingrese los dos apellidos ..." />
                <br>
                <label id="Ciudad">NUEVA CIUDAD (*)</label>
                <SELECT id="selCombo" NAME="selCombo">
                    <OPTION VALUE=""></OPTION>
                    <OPTION VALUE="cuenca">CUENCA</OPTION>
                    <OPTION VALUE="guayaquil">GUAYAQUIL</OPTION>
                    <OPTION VALUE="quito">QUITO</OPTION>
                    <OPTION VALUE="loja">LOJA</OPTION>
                </SELECT>
                <br>
                <div id="mdv">
                    <input class="btn btn-primary" id="guargar" name="guardar" type="submit" value="MODIFICAR">&nbsp;
                    <input class="btn btn-primary" id="borrar" name="borrar" type="Reset" value="Borrar">
                    <a href="listar_sucursal.php" class="btn btn-default">Cancelar</a>
                </div>
            </form>
        <?php
    }
}
$conn->close();
?>

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