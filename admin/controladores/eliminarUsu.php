<!DOCTYPE html>
<html>


<head>
    <meta charset="UTF-8">
    <title>Modificar datos de persona </title>
</head>

       


<body>
    <?php
    //incluir conexión a la base de datos     

    include '../../config/conexionDB.php';
    $codigo = $_GET["codio"];
    $mail = $_GET["mail"];

    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s', time());

    $sql = "UPDATE usuarios " .
        "SET usu_eliminado = 'SI' " .
        "WHERE usu_id = $codigo".";";

    if ($conn->query($sql) === TRUE) {
        echo "Se ha eliminado los datos personales correctamemte!!!<br>";
        header("Location:../vista/listarUsuarios.php?mail=$mail");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
    }

    $conn->close();
    ?>
</body>

</html>