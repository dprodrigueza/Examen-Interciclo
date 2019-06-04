<?php

    session_start();
 

    include('../config/conexionDB.php');
    $_SESSION['isLogged'] = FALSE;
    $_SESSION['isLoggedAdmin'] = FALSE;

    $email = isset($_POST["email"]) ? trim($_POST['email']) : null;
    $password = isset($_POST["contrasena"]) ? trim($_POST['contrasena']) : null;
    $sucursal = $_POST["selCombo"];


        
    $sql = "SELECT * FROM usuarios WHERE usu_mail = '$email' AND usu_constrasena = ('$password');";
    $aux = "SELECT usu_rol from usuarios WHERE usu_mail = '$email';";
    
        

    $result = $conn->query($sql);
    $aux = $conn->query($aux);
    $rol= $aux->fetch_assoc();
    
        

    if ($result->num_rows>0) {
        if($rol["usu_rol"]== 'ADMIN'){
            $_SESSION['isLoggedAdmin'] = TRUE;
            header("Location: ../admin/vista/index.php?mail=".$email);
        }else if($rol["usu_rol"]== 'USER'){
            $_SESSION['isLogged'] = TRUE;
            header("Location: ../public/vista/homeUsu.php?mail=".$email."&sucursal=".$sucursal);
        }
            
    }else{
        echo "<h1> Este Correo no existe, intentalo nuevamente. <a href= ../login/login.php>Inicia Sesion </a> </h1>";
        echo "<h1> Create una Cuenta! Es gratis. <a href= ../login/crear.html>Crear Cuenta</a> </h1>";
    }

    $conn->close();

?>