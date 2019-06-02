<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Insertar</title>
    <style type="text/css" rel="stylesheet">
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    include '../config/conexionDB.php';
    $nombre = isset($_POST["cliente"]) ? mb_strtoupper(trim($_POST["cliente"]), 'UTF-8') : null;
    $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["descripcionproducto"]), 'UTF-8') : null;
    $caracteristica = isset($_POST["caracteristicas"]) ? mb_strtoupper(trim($_POST["caracteristicas"]), 'UTF-8') : null;
    $cantidad = isset($_POST["cantidad"]) ? trim($_POST["cantidad"]) : null;
    $precio = isset($_POST["precio"]) ? trim($_POST["precio"]) : null;
    $cd = (int) $cantidad;
    $pr = (int) $precio;
 


    $sql = "INSERT INTO productos VALUES(0,'$nombre','$descripcion','$pr','$cd','$nombre_img','NO')";

    if ($conn->query($sql) == TRUE) {
        echo "<p>Se ha creado los datos</p>";
        header("Location:../admin/vista/listar_productos.php?");

    } else {
        if ($conn->ermo == 1062) {
            echo "<p class='error'>La perosona con la cedula $cedula ya esta</p>";
        } else {
            echo "<p class='error'> Error" . mysqli_error($conn) . "</p>";
        }
    }

    $conn->close();
    echo "<a href='../vista/crear_usuario.html'>Regresar</a>";


    ?>
</body>

</html>