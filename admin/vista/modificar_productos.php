<!DOCTYPE html>
<html lang="es">

<head>
    <!--  Practica01 – Mi Blog  
          Author: Malki Yupanki  
          Date:   Abril 2019 -->
    <meta charset="utf-8" />
    <title>CrearProducto</title>


</head>

<body class="fondo">

    <?php
    session_start();
    if (!isset($_SESSION['isLoggedAdmin']) || $_SESSION['isLoggedAdmin'] === FALSE) {
        header("Location: ../../login/login.php");
    }


    ?>
    <section id="bota">
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
                <form action="../../controladores/controlador_modificarpro.php" enctype="multipart/form-data" method="POST">
                    <label for="imagen">Imagen:</label>
                    <img src="../../imagenes/" <?php echo $row["prod_imagen"]; ?> width='80px' height='80px' />

                    <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />

                    <label id="Nombreproducto">Nombre</label>
                    <input type="text" id="nombreproducto" name="nombreproducto" value="<?php echo $row["prod_nombre"]; ?>" required placeholder="Ingrese la nombre ..." />
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
                    <input type="text" id="precio" name="precio" value="<?php echo $row["prod_precion"]; ?>" required placeholder="Ingrese el teléfono ..." />
                    <br>
                    <div id="mdv">
                        <input class="btn" id="guargar" name="guardar" type="submit" value="MODIFICAR">&nbsp;
                        <input class="btn" id="borrar" name="borrar" type="Reset" value="Borrar">
                    </div>
                </form>
                <footer id="ft">
                    <span> Medina Malki Katari &nbsp;
                        &#8226; Universidad Pilitecnica salesiana &#8226; <br />
                        <a href="mailto:malkiyupanki12@hotmail.com">malkiyupanki12@hotmail.com</a>&nbsp;&nbsp;Telefono:&nbsp;<a href="tel:098-286-5431">098-286-5431 </a>
                        &nbsp; &copy; Todos los derechos Reservados.</span>
                </footer>
            </section>
        </body>

        </html>