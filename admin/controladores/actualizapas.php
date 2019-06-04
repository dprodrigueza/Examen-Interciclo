<?php
include('../../config/conexionDB.php');


$password = $_POST['contrasNew'];
$mail = $_GET['adm'];
$codio = $_GET['codio'];



$sql = "UPDATE usuarios SET usu_constrasena = '$password' where usu_id = '$codio';";
echo $sql;
$result = $conn->query($sql);


if ($conn->query($sql) === TRUE) {
    echo ("Datos Actualizados correctamente.");
}

header ("Location: ../vista/index.php?mail=$mail");

$conn->close();

?>
