<!DOCTYPE html>
<html lang="es">

<head>
    <!--  Practica01 – Mi Blog  
          Author: Malki Yupanki  
          Date:   Abril 2019 -->
    <meta charset="utf-8" />
    <title>Insertar</title>
    <link href="../../../public/vista/css/estiloadmin.css" rel="stylesheet" type="text/css" />
    <!--   <link href="css/estilo.css" rel="stylesheet" type="text/css"/>-->

</head>

<body class="fondo">
    <section id="secin">
        <?php
        $codigo = $_GET["codio"];
        $mail = $_GET["adm"];
        //  echo "$codigo";
        include '../../config/conexionDB.php';
        echo "</br>";
        $sql = "SELECT * FROM usuarios WHERE usu_id= '$codigo' and usu_eliminado= 'NO'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>

                <form id="formulario01" method="POST" action="../controladores/eliminarUsu.php?codio=<?php echo $codigo ?>&mail=<?php echo $mail ?>">

                
                <img src="../../imagenes/<?php echo $row["usu_foto"]; ?>" width="80" height="80">
                
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
                
                <input type="submit" id="GUARDAR" name="guardar" value="ELIMINAR" />
            </form>
                </form>
            <?php
        }
    }
    $conn->close();
    ?>
    </section>

</body>

</html>