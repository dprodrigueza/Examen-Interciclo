
    <?php
    include('../../config/conexionDB.php');

    $nombre = strtoupper($_POST['nombres']);
    $apellido = strtoupper($_POST['apellidos']);
    $mail = $_GET['mail'];

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
            $directorio = $_SERVER['DOCUMENT_ROOT'] . '/final/imagenes/';
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



    if ($nombre_img != "") {
        $sql = "UPDATE usuarios SET usu_nombre = '$nombre' , usu_apellido = '$apellido' , usu_direccion='$direccion' , usu_foto = '$nombre_img' where usu_mail = '$mail';";
        echo $sql;
        $result = $conn->query($sql);
    } else {
        $sql = "UPDATE usuarios SET usu_nombre = '$nombre' , usu_apellido = '$apellido' , usu_direccion='$direccion' where usu_mail = '$mail';";
        echo $sql;
        $result = $conn->query($sql);
    }





    if ($conn->query($sql) === TRUE) {
        echo ("Datos Actualizados correctamente.");
    }

    header("Location: ../vista/actualizarUsuario.php?mail=$mail");

    $conn->close();
    ?>
