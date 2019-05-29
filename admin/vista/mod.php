<!DOCTYPE html>
<html lang="es">

<head>
    
    <meta charset="utf-8" />
    <title>MODIFICAR</title>
</head>

<body class="fondo">
    <section id="secin">
        <?php
        $codigo = $_GET["codigo"];
        //  echo "$codigo";
        include '../../config/conexionDB.php';
        echo "</br>";
        $sql = "SELECT * FROM productos WHERE prod_id= '$codigo' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>

                <form id="formulario01" method="POST" action="../../controladores/controlador_modificarpro.php">

                    <label for="imagen">Imagen:</label>
                    <br>
                    <div>
                    <img  width='80px' height='80px' src="../../imagenes/<?php echo $row["prod_foto"];?>"/>
                    </div>
                    <br>
                    <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
                    <br>
                    <label id="Descripcionproducto">Descripcion producto</label>
                    <input type="text" id="descripcionproducto" name="descripcionproducto" value="<?php echo $row["prod_descripcion"]; ?>" required placeholder="Ingrese los dos nombres ..." />
                    <br>

                    <label id="Caracteristicas">Caracteristicas</label>
                    <input type="text" id="caracteristicas" name="caracteristicas" value="<?php echo $row["prod_caracteristica"]; ?>" required placeholder="Ingrese los dos apellidos ..." />
                    <br>

                    <label id="Cantidad">Cantidad</label>
                    <input type="text" id="cantidad" name="cantidad" value="<?php echo $row["prod_stock"]; ?>" required placeholder="Ingrese la dirección ..." />
                    <br>

                    <label id="Precio">Precio</label>
                    <input type="text" id="precio" name="precio" value="<?php echo $row["prod_precio"]; ?>" required placeholder="Ingrese el teléfono ..." />
                    <br>
                    <div id="mdv">
                        <input class="btn" id="guargar" name="guardar" type="submit" value="MODIFICAR">&nbsp;
                        <input class="btn" id="borrar" name="borrar" type="Reset" value="Borrar">
                    </div>
                </form>
            <?php
        }
    }
    $conn->close();
    ?>
    </section>

</body>

</html>