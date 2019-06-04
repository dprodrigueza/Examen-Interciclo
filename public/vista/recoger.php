<?php
    
   
    
    include '../../config/conexionDB.php';
    $mail = $_POST["mail"];
    $sucursal = $_POST["sucursal"];
    $direccion = $_POST["selCombo"];

    echo $mail;
    echo $sucursal;
    echo $direccion;

    header ("Location: ../../admin/vista/comprar.php?mail=$mail&sucursal=$sucursal&selCombo=$direccion");

    $conn->close();
?>