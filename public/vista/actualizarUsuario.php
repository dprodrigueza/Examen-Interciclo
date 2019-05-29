<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Perfil.</title>
    <link href="../css/estilo.css" rel="stylesheet">
</head>

<body>


    <?php
    include('../../config/conexionDB.php');


    $mail = $_GET['mail'];


    $sql = "SELECT * FROM usuarios where usu_mail='$mail'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>

            <form id="formularioUpdate" method="POST" enctype="multipart/form-data" action="../controladores/actualizarUsu.php?mail=<?php echo $row["usu_mail"]; ?>">
                <img src="../../imagenes/<?php echo $row["usu_foto"]; ?>" width="80" height="80">
                <label>IMAGEN PERFIL:</label>
                <input id="imagen" name="imagen" size="30" type="file" />
                <br>
                <label for="nombres">Nombre: </label>
                <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombre"]; ?>" />
                <br>
                <label for="apellidos">Apelido: </label>
                <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellido"]; ?>" />
                <br>
                <label for="lbldireccion">Direccion: </label>
                <input type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"]; ?>" />
                <br>
                <label for="correo">Correo electrónico: </label>
                <input type="email" id="correo" name="correo" disabled value="<?php echo $row["usu_mail"]; ?>" />
                <br>
                <button id="btnCambiarContraseña"><a href="actualizarContra.php?mail=<?php echo $_GET['mail']; ?>">CAMBIAR CONTRASEÑA</a> </button>
                <br>
                <br>
                <input type="submit" id="GUARDAR" name="guardar" value="GUARDAR" />
            </form>
        <?php
    }
} else {

    echo "<p>" . mysqli_error($conn) . "</p>";
}
$conn->close();
?>
