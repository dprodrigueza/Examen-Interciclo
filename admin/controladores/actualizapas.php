<?php
include('../../config/conexionDB.php');


$password = $_POST['contrasNew'];



$sql = "UPDATE usuarios SET usu_constrasena = '$password' where usu_mail = '$_GET[mail]';";
echo $sql;
$result = $conn->query($sql);


if ($conn->query($sql) === TRUE) {
    echo ("Datos Actualizados correctamente.");
}

header ("Location: ../vista/actualizarUsuario.php?mail=$_GET[mail]");

$conn->close();

?>
