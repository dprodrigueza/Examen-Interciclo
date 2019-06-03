<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8" />
    <title>MODIFICAR</title>
</head>

<body>

    <?php
    $codigo = $_GET["codigo"];
    //  echo "$codigo";
    include '../../config/conexionDB.php';
    echo "</br>";
    $sql = "SELECT * FROM sucursal WHERE suc_id= '$codigo' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <form id="formulario01" method="POST" action="../../controladores/controlador_modificarsuc.php">

                <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
                <br>
                <label id="Nombresucursal">Descripcion producto</label>
                <input type="text" id="nombresucursal" name="nombresucursal" value="<?php echo $row["suc_nombre"]; ?>" required placeholder="Ingrese los dos nombres ..." />
                <br>
                <label id="Direccionsucursal">Caracteristicas</label>
                <input type="text" id="direccionsucursal" name="direccionsucursal" value="<?php echo $row["suc_direccion"]; ?>" required placeholder="Ingrese los dos apellidos ..." />
                <br>
                <label id="Ciudadsucursal">Ciudad Actual</label>
                <input type="text" id="ciudadsucursal" name="ciudadsucursal" value="<?php echo $row["suc_ciudad"]; ?>" required placeholder="Ingrese los dos apellidos ..." />
                <br>
                <label id="Ciudad">NUEVA CIUDAD (*)</label>
                <SELECT id="selCombo" NAME="selCombo">
                    <OPTION VALUE=""></OPTION>
                    <OPTION VALUE="cuenca">CUENCA</OPTION>
                    <OPTION VALUE="guayaquil">GUAYAQUIL</OPTION>
                    <OPTION VALUE="quito">QUITO</OPTION>
                    <OPTION VALUE="loja">LOJA</OPTION>
                </SELECT>
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


</body>

</html>