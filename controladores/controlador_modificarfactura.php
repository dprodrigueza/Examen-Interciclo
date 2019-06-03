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
    
    echo $codigo;

    $sql = "UPDATE facturacab SET fac_estado = 'EN CAMINO' WHERE fcab_id = '$codigo' ;";

    if ($conn->query($sql) === TRUE) {
        echo "Se ha actualizado el estado!!!<br>";
        header("Location:../admin/vista/index.php?");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
    }
    $conn->close();
    ?>
</body>

</html>