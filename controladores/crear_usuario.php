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
    include '../../config/conexionBD.php';
    $nombres = isset($_POST["nombre"]) ? mb_strtoupper(trim($_POST["nombre"]), 'UTF-8') : null;
    $descripcion = isset($_POST["apellido"]) ? mb_strtoupper(trim($_POST["apellido"]), 'UTF-8') : null;
    $caracteristica = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
    $cantidad = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : null;
    
 //   $nombre_img = isset($_POST["imagen"]) ? trim($_POST["imagen"]) : null;
    

    // Recibo los datos de la imagen
    $nombre_img = $_FILES["imagen"]["name"];
    $tipo = $_FILES["imagen"]["type"];
    $tamano = $_FILES["imagen"]["size"];

    //Si existe imagen y tiene un tamaño correcto
    if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 900000)) {
        //indicamos los formatos que permitimos subir a nuestro servidor
        if (($_FILES["imagen"]["type"] == "image/gif")
            || ($_FILES["imagen"]["type"] == "image/jpeg")
            || ($_FILES["imagen"]["type"] == "image/jpg")
            || ($_FILES["imagen"]["type"] == "image/png")
        ) {
            // Ruta donde se guardarán las imágenes que subamos
            $directorio = $_SERVER['DOCUMENT_ROOT'] . 'xampp/Examen-Interciclo/imagenes/';
            // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
            move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . $nombre_img);
        } else {
            //si no cumple con el formato
            echo "No se puede subir una imagen con ese formato ";
        }
    } else {
        //si existe la variable pero se pasa del tamaño permitido
        if ($nombre_img == !NULL) echo "La imagen es demasiado grande ";
    }


    $sql = " INSERT INTO usuario VALUES(0,'$cedula','$nombres','$apellidos','$direccion','$telefono',
    '$correo',MD5('$contrasena'),'$fecha_nac','N',null,null,'$rol','$nombre_img')";

    if ($conn->query($sql) == TRUE) {
        echo "<p>Se ha creado los datos</p>";
        header("Location:../vista/login.html");
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