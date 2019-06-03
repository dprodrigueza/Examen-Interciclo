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
    $mail = $_POST["mail"];

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




    $sql = "INSERT INTO facturacab VALUES(0,'$codigo','$fecha','$sub','$iva','$totalpagar','','CONFIRMADO')";

    if ($conn->query($sql) == TRUE) {

        $sql2    = "SELECT * FROM facturacab WHERE cod_id = '$codigo' AND fcab_fecha ='$fecha';";
        $result2 = $conn->query($sql2);
        $rl      = mysqli_fetch_assoc($result2);
        $rlt = $rl["fcab_id"];
        echo $rlt;
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
            echo "<br>";
            $sql2 = "INSERT INTO facturadet VALUES(0,'$var1','$var2','$rlt','$var')";
            if ($conn->query($sql2) == TRUE) {
                echo "detalle insertado";
                $sql3    = "SELECT * FROM productos WHERE prod_id = '$var';";
                $result3 = $conn->query($sql3);
                $rl3      = mysqli_fetch_assoc($result3);
                $rlt3 = (int)$rl3["prod_stock"];
                echo $rlt3;
                echo "<br>";
                $sta = $rlt3 - (int)$var1;
                echo $sta;
                $sql4 = "UPDATE productos SET prod_stock='$sta' WHERE prod_id='$var'";
                if ($conn->query($sql4) == TRUE) {
                    echo "stock atualizado";
                    $sql5 = "UPDATE pedidos SET ped_estado='CONFIRMADO' WHERE cod_usuario='$codigo';";
                    if ($conn->query($sql5) == TRUE) { 
                        echo "pedido actualizado atualizado";
                         header("Location:../admin/vista/comprar.php?mail=$mail");
                    }  
                }
            }
        }
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