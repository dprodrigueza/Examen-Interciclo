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
    //$mail = $_GET['mail'];
    //$codio =(int)$_GET['codigo'];
    //$producto = (int)$_GET['producto'];

    $mail = $_POST['mail'];
    $codio =(int)$_POST['codigo'];
    $producto = (int)$_POST['producto'];
    $cantidad = (int)$_POST['cantidad'];
    $sucursal = $_POST['sucursal'];
    $direccion = $_POST['selCombo'];



    $sql = "INSERT INTO pedidos VALUES(0,'$producto','$codio','$cantidad','CREADO')";

    if ($conn->query($sql) == TRUE) {
        echo "<p>Se ha creado los datos</p>";
        echo $mail;
        header("Location:../admin/vista/comprar.php?mail=$mail&sucursal=$sucursal&selCombo=$direccion");

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