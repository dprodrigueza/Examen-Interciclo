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
    $mail = $_GET['mail'];
    $codigo = $_GET["codigo"];
    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s', time());
    $sql = "DELETE FROM pedidos WHERE ped_id = $codigo ;";

    if ($conn->query($sql) === TRUE) {
        echo "Se ha actualizado MISMA CIUDAD!!!<br>";
        header("Location:../public/vista/vercarrito.php?mail=$mail");

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
    }

    $conn->close();
    ?>
</body>

</html>