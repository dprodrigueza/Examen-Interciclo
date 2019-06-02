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
    $cont = $_POST["contador"];

    $codigo = isset($_POST["codigo"]) ? mb_strtoupper(trim($_POST["codigo"]), 'UTF-8') : null;
    $fecha = isset($_POST["fecha"]) ? mb_strtoupper(trim($_POST["fecha"]), 'UTF-8') : null;
    $sub = $_POST["subtotal"];
    $iva = isset($_POST["iva"]) ? trim($_POST["iva"]) : null;
    $totalpagar = isset($_POST["totalpagar"]) ? trim($_POST["totalpagar"]) : null;

    echo $codigo;
    echo "<br> fexha";
    echo $fecha;
    echo "<br>";
    echo $sub;
    echo "<br>";
    echo $iva;
    echo "<br>";
    echo $totalpagar;
    echo "<br>";
    echo "contador = " . $cont;
    echo "<br>";

    for ($i = 1; $i <= $cont; $i++) {
        $var = $_POST["pro$i"];
        $var1 = $_POST["cant$i"];
        $var2 = $_POST["tot$i"];
        //  echo "pro$i";
        echo "<br>";
        echo "<br>";
        echo $var;
        echo "<br>";
        echo $var1;
        echo "<br>";
        echo $var2;
    }

    $sql = "INSERT INTO productos VALUES(0,'$nombre','$descripcion','$pr','$cd','$nombre_img','NO')";

    if ($conn->query($sql) == TRUE) {
        echo "<p>Se ha creado los datos</p>";
        //    header("Location:../admin/vista/listar_productos.php?");
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