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
    $codigo = $_GET["codigo"];
    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s', time());
    $sql = "UPDATE sucursal " .
        "SET suc_eliminado = 'SI' " .
        "WHERE suc_id = $codigo" . ";";

    if ($conn->query($sql) === TRUE) {
        echo "Se ha actualizado MISMA CIUDAD!!!<br>";
        header("Location:../admin/vista/listar_sucursal.php?");

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
    }

    $conn->close();
    ?>
</body>

</html>