<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Perfil.</title>
    <link href="../css/estilo.css" rel="stylesheet">
</head>

<body>
    <form id="formularioUpdate" method="POST" enctype="multipart/form-data" action="../controladores/controlador_crearusuario.php">
       
        <label>IMAGEN PERFIL:</label>
        <input id="imagen" name="imagen" size="30" type="file" />
        <br>
        <label for="nombres">Nombre: </label>
        <input type="text" id="nombres" name="nombres" />
        <br>
        <label for="apellidos">Apellido: </label>
        <input type="text" id="apellidos" name="apellidos"  />
        <br>
        <label for="lbldireccion">Direccion: </label>
        <input type="text" id="direccion" name="direccion"  />
        <br>
        <label for="correo">Correo electrónico: </label>
        <input type="email" id="correo" name="correo"  />
        <br>
        <label for="correo">Contraseña: </label>
        <input type="password" id="contra" name="contra" />
        <br>
        <br>
        <input type="submit" id="GUARDAR" name="guardar" value="GUARDAR" />
    </form>

</body>

</html>