<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Perfil.</title>
    <script type="text/javascript" src="../controladores/funcion.js"></script>
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

            <form id="formularioUpdate" method="POST" action="../controladores/actualizapas.php?mail=<?php echo $row["usu_mail"]; ?>">

                <label for="contraNEW">Nueva Contraseña *: </label>
                <input type="password" id="contrasNew" name="contrasNew" placeholder="Ingrese la nueva contraseña" />
                <br>
                <label for="contraVer">Confirma tu contraseña: </label>
                <input type="password" id="verifi" name="verifi" placeholder="Ingresa nuevamente tu contraseña" onkeyup="validarContra()" />
                <span id="mensajeContra" class="error"></span>
                <br>
                <br>
                <input type="submit" id="btncontrasena" name="btncontrasena" value="CAMBIAR CONTRASEÑA" disabled />
            </form>
        <?php
    }
} else {
    echo "<p>Ha ocurrido un error inesperado !</p>";
    echo "<p>" . mysqli_error($conn) . "</p>";
}
$conn->close();
?>


