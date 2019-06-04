<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Cerrado de Sesión</title>
</head>

<body>
    <?php
    session_start();
    $_SESSION['isLogged'] = FALSE;
    $_SESSION['isLoggedAdmin'] = FALSE;
    session_destroy();
    header("Location: ../public/vista/home.php");  ?>
    ?>
</body>

</html>