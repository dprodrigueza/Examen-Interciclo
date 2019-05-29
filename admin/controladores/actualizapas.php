<?php
include('../../config/conexionDB.php');


$password = $_POST['contrasNew'];



$sql = "UPDATE usuarios SET usu_contrasena = '$password' where usu_mail = '$_GET[mail]';";
echo $sql;
$result = $conn->query($sql);


if ($conn->query($sql) === TRUE) {
    echo ("Datos Actualizados correctamente.");
}

header ("Location: ../vista/actualizar.php?mail=$_GET[mail]");

$conn->close();
