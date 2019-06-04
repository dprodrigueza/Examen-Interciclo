<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8" />
    <title>MI_CUENTA</title>
    <link href="" rel="stylesheet" type="text/css" />
</head>

<body background="../../../fuserr.jpg">

    <?php
    session_start();
    if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
        header("Location: ../../login/login.php");
    }

    ?>
    <section>


        <header>
            <nav>
                <ul>
                    <li> <a href="verproductos.php">Atras</a> </li>
                </ul>
            </nav>
        </header>

        <?php

        $producto = $_GET["producto"];



        // echo $cone;
        include '../../config/conexionDB.php';
        echo "</br>";
        $sql = "SELECT * FROM productos WHERE prod_id = '$producto' ";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <form id="formulario01" method="POST" action="../../login/login.php" align="center">
                    <input type="hidden" id="producto" name="producto" value="<?php echo $row["prod_id"]; ?>" />
                    <br>
                    <input type="hidden" id="codigo" name="codigo" value="<?php echo $codio; ?>" />
                    <br>
                    <input type="hidden" id="mail" name="mail" value="<?php echo $mail; ?>" />

                    <br>
                    <label for='Imagen'>Imagen (*)</label>
                    <img id="yt" src="../../imagenes/<?php echo $row["prod_foto"]; ?>" alt="" size="50" />
                    <br>
                    <br>
                    <label for='cedula'>Descricpcion (*)</label>
                    <input type="text" id="cedula" name="cedula" value="<?php echo $row["prod_descripcion"]; ?>" disabled />
                    <br>
                    <br>
                    <label for='nombres'>CARACTERISTICA (*)</label>
                    <input size=100 type="text" id="nombres" name="nombres" value="<?php echo $row["prod_caracteristica"]; ?>" disabled />
                    <br>
                    <br>

                    <label for="apellidos">Precio (*)</label>
                    <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["prod_precio"]; ?>" disabled />
                    <br>
                    <br>
                    <div>
                        <input class="btn" type="submit" id="modificar" name="modificar" value="Comprar" />
                        <button type="button" class="btn btn-default"> <a href="verproductos.php">ATRAS</a></button>
                    </div>

                </form>


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