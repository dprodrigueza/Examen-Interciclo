<?php
include('../config/conexionDB.php');

$nombre = strtoupper(trim($_POST['nombre']));
$apellido = strtoupper(trim($_POST['apellido']));
$email = $_POST['email'];
$contrasena = $_POST['contrasena'];

$eva = false;

$aux = "SELECT MAX(usu_id) from usuarios";


$aux = $conn->query($aux);
$id = $aux->fetch_assoc();
$cod = $id['MAX(usu_id)'];
$cod++;


$mail = "SELECT * from usuarios where usu_mail = '$email';";
$mail = $conn->query($aux);

if ($conn->query($mail) === TRUE) {
    mailRepetido();
    header("Location: ../login/crear.html");
}else{
    $sql = "INSERT INTO usuarios (usu_id, usu_nombre, usu_apellido, usu_mail, usu_constrasena, usu_direccion, usu_rol, usu_foto) VALUES ('$cod', '$nombre', '$apellido', '$email', '$contrasena', '' ,'USER', 'user.png');";

    $result = $conn->query($sql);
    
    
    header("Location: ../login/login.php?mail=$email");
}



$conn->close();
