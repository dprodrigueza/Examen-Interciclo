<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>CREARSUCURSAL</title>
    <style type="text/css" rel="stylesheet">
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    include '../config/conexionDB.php';
    $nombre = isset($_POST["nombresucursal"]) ? mb_strtoupper(trim($_POST["nombresucursal"]), 'UTF-8') : null;
    $direccion = isset($_POST["direccionsucursal"]) ? mb_strtoupper(trim($_POST["direccionsucursal"]), 'UTF-8') : null;
    $ciudad = $_POST["selCombo"];
   
        echo "$ciudad";
    $sql = "INSERT INTO sucursal VALUES(0,'$nombre','$direccion','$ciudad')";

    if ($conn->query($sql) == TRUE) {
        echo "<p>Se ha creado los datos</p>";

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