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
    $mail = $GET["mail"];
    $codigo = $_POST["codigo"];
    $nombre = isset($_POST["nombresucursal"]) ? mb_strtoupper(trim($_POST["nombresucursal"]), 'UTF-8') : null;
    $direccion = isset($_POST["direccionsucursal"]) ? mb_strtoupper(trim($_POST["direccionsucursal"]), 'UTF-8') : null;
    $ciudad = isset($_POST["ciudadsucursal"]) ? mb_strtoupper(trim($_POST["ciudadsucursal"]), 'UTF-8') : null;
    $ciudadc = $_POST["selCombo"];
    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s', time());
    if ($ciudadc == "") {
        $sql = "UPDATE sucursal " .
            "SET suc_nombre = '$nombre', " .
            "suc_direccion = '$direccion', " .
            "suc_ciudad = '$ciudad' " .
            "WHERE suc_id = $codigo" . ";";

        if ($conn->query($sql) === TRUE) {
            echo "Se ha actualizado MISMA CIUDAD!!!<br>";
            header("Location:../admin/vista/listar_sucursal.php?mail=$mail");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
        }
    } else {
        $sql = "UPDATE sucursal " .
            "SET suc_nombre = '$nombre', " .
            "suc_direccion = '$direccion', " .
            "suc_ciudad = '$ciudadc' " .
            "WHERE suc_id = $codigo" . ";";

        if ($conn->query($sql) === TRUE) {
            echo "Se ha actualizado OTRA CIUDAD!!!<br>";
            header("Location:../admin/vista/listar_sucursal.php?mail=$mail");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
        }
    }

    



    $conn->close();
    ?>
</body>

</html>