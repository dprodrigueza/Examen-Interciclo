<!DOCTYPE html>
<html lang="es">

<head>
    <!--  Practica01 – Mi Blog  
          Author: Malki Yupanki  
          Date:   Abril 2019 -->
    <meta charset="utf-8" />
    <title>Insertar</title>
    <link href="../../../public/vista/css/estiloadmin.css" rel="stylesheet" type="text/css" />

</head>

<body class="fondo">
    <section id="secin">
        <div class="cb">
            <?php
            session_start();
            $cedula = $_GET["codigo"];
            // echo "$cedula";
            include '../../../config/conexionBD.php';
            echo "</br>";
            $sql = "SELECT * FROM usuario WHERE usu_codigo = '$cedula' ";
            $result = $conn->query($sql);
            $rl = mysqli_fetch_assoc($result);
            $rlt = $_GET["cone"];
            //  echo "$rlt";
            $ft = "'" . $rlt . "'";
            //  echo $ft;
            ?>
            <header>
                <nav>
                    <ul>
                        <li> <a href="index.php?cone=<?php echo "$ft"; ?>">Atras</a> </li>
                    </ul>
                </nav>
            </header>
        </div>
        <?php
        $cedula = $_GET["codigo"];
        //  echo "$cedula";
        include '../../../config/conexionBD.php';
        echo "</br>";
        $sql = "SELECT * FROM usuario WHERE usu_codigo = '$cedula' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <h2>ELIMINAR USUARIO</h2>
                <div id="cvd">

                    <form id="formulario01" method="POST" action="../../controladores/controlador_eliminar.php">

                        <input type="hidden" id="codigo" name="codigo" value="<?php echo $cedula ?>" />
                        <input type="hidden" id="usuco" name="usuco" value="<?php echo $ft ?>" />
                        <label for='cedula'>Cedula (*)</label>
                        <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>" disabled />
                        <br>
                        <label for='nombres'>Nombres (*)</label>
                        <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"]; ?>" disabled />
                        <br>

                        <label for="apellidos">Apelidos (*)</label>
                        <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"]; ?>" disabled />
                        <br>

                        <label for="direccion">Dirección (*)</label>
                        <input type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"]; ?>" disabled />
                        <br>
                        <label for="telefono">Teléfono (*)</label>
                        <input type="text" id="telefono" name="telefono" value="<?php echo $row["usu_telefono"]; ?>" disabled />
                        <br>
                        <label for="fecha">Fecha Nacimiento (*)</label>
                        <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $row["usu_fecha_nacimiento"]; ?>" disabled />
                        <br>
                        <label for="correo">Correo electrónico (*)</label>
                        <input type="email" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>" disabled />
                        <br>
                        <div id="mdv">
                        <input class="btn" type="submit" id="eliminar" name="eliminar" value="Eliminar" />
                        <button type="button" class="btn btn-default"> <a href="index.php?cone=<?php echo "$ft"; ?>">Cancelar</a></button>
                        </div>
                    </form>
                </div>
                <footer id="ft">
                    <span> Medina Malki Katari &nbsp;
                        &#8226; Universidad Pilitecnica salesiana &#8226; <br />
                        <a href="mailto:malkiyupanki12@hotmail.com">malkiyupanki12@hotmail.com</a>&nbsp;&nbsp;Telefono:&nbsp;<a href="tel:098-286-5431">098-286-5431 </a>
                        &nbsp; &copy; Todos los derechos Reservados.</span>
                </footer>
            <?php

        }
    } else {
        echo " <p> colspan='10'> EROORRRRR!!!!!! </p>";
        echo "<p>" . mysqli_error($conn) . "</p>";
    }

    $conn->close();
    ?>
    </section>
</body>