<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Modificar datos de persona </title>
</head>

<body>
    <?php
    //incluir conexión a la base de datos     

    include '../config/conexionDB.php';
    $codigo = $_POST["codigo"];

    $descripcion = isset($_POST["descripcionproducto"]) ? mb_strtoupper(trim($_POST["descripcionproducto"]), 'UTF-8') : null;
    $caracteristica = isset($_POST["caracteristicas"]) ? mb_strtoupper(trim($_POST["caracteristicas"]), 'UTF-8') : null;
    $cantidad = isset($_POST["cantidad"]) ? trim($_POST["cantidad"]) : null;
    $precio = isset($_POST["precio"]) ? trim($_POST["precio"]) : null;
    $cd = (int) $cantidad;
    $pr = (int) $precio;  

    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s', time());

    $sql = "UPDATE productos " .
        "SET prod_descripcion = '$descripcion', " .
        "prod_caracteristica = '$caracteristica', " .
        "prod_stock = '$cantidad', " .
        "prod_precio = '$precio' " .
        "WHERE prod_id = $codigo".";";

    if ($conn->query($sql) === TRUE) {
        echo "Se ha actualizado los datos personales correctamemte!!!<br>";
        header("Location:../admin/vista/listar_productos.php?");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
    }

    $conn->close();
    ?>
</body>

</html>