<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8" />
    <title>MI_CUENTA</title>
    <link href="" rel="stylesheet" type="text/css" />
</head>

<body background="../../../fuserr.jpg">
    <section>
    <?php
        //session_start();
        $mail = $_GET["mail"];
        $codio =$_GET["codigo"];
        $sucursal = $_GET["sucursal"];
        $direccion = $_GET["selCombo"];
        //$producto =$_GET["producto"];
    ?>

    <header>
        <nav>
            <ul>
                <li> <a href="comprar.php?mail=<?php echo "$mail"; ?>&codigo=<?php echo $codio;?>&sucursal=<?php echo $sucursal;?>&selCombo=<?php echo $direccion;?>">Atras</a> </li>
            </ul>
        </nav>
    </header>
       
        <?php
        $mail = $_GET["mail"];
        $codio =$_GET["codigo"];
        $producto =$_GET["producto"];
        $sucursal = $_GET["sucursal"];
        $direccion = $_GET["selCombo"];


        
        // echo $cone;
        include '../../config/conexionDB.php';
        echo "</br>";
        $sql = "SELECT * FROM productos WHERE prod_id = '$producto' ";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <form id="formulario01" method="POST" action="../../controladores/controlador_pedido.php" align="center">
                    <input type="hidden" id="producto" name="producto" value="<?php echo $row["prod_id"]; ?>" />
                    <br>
                    <input type="hidden" id="codigo" name="codigo" value="<?php echo $codio; ?>" />
                    <br>
                    <input type="hidden" id="mail" name="mail" value="<?php echo $mail; ?>" />
                    <input type="hidden" id="sucursal" name="sucursal" value="<?php echo $sucursal; ?>" />
                    <input type="hidden" id="selCombo" name="selCombo" value="<?php echo $direccion; ?>" />
                    
                   
                    <br>
                    <label for='Imagen'>Imagen (*)</label>
                    <img id="yt" src="../../imagenes/<?php echo $row["prod_foto"]; ?>" alt="" width="250" height="250"/>
                    <br>
                    <br>
                    <label for='cedula'>Descricpcion (*)</label>
                    <input  type="text" id="cedula" name="cedula" value="<?php echo $row["prod_descripcion"]; ?>" disabled/>
                    <br>
                    <br>
                    <label for='nombres'>CARACTERISTICA (*)</label>
                    <input size=100 type="text" id="nombres" name="nombres" value="<?php echo $row["prod_caracteristica"]; ?>" disabled/>
                    <br>
                    <br>

                    <label for="apellidos">Precio (*)</label>
                    <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["prod_precio"]; ?>"disabled />
                    <br>
                    <br>
                    
                    <label for="Cantidad">Cantidad (*)</label>
                    <input  type="text" id="cantidad" name="cantidad" />
                    
                    <br>
                    <br>
                    <?php //echo "   <td> <a href='../controladores/controlador_pedido.php?mail=" . $mail . "&codigo=". $codio ."&producto=". $producto."'>AÑADIR CARRITO</a> </td>"?>

                    <br>
                    <br>

                    <div>
                        <input class="btn" type="submit" id="modificar" name="modificar" value="Modificar" />
                        <button type="button" class="btn btn-default"> <a href="index_usuario.php?cone='<?php echo $cone; ?>'">ATRAS</a></button>
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