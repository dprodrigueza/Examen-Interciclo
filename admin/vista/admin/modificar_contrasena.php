<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Modificar datos de persona</title>
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
        $codigo = $_GET["codigo"];
        ?>
        <h2>MODIFICAR CONTRASEÑA</h2>
        <div id="cvd">
            <form id="formulario01" method="POST" action="../../controladores/controlador_contra.php">
                <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
                <input type="hidden" id="usuco" name="usuco" value="<?php echo $ft ?>" />


                <label for="cedula">Contraseña Actual (*)</label>
                <input type="password" id="contrasena1" name="contrasena1" value="" required placeholder="Ingrese su contraseña actual ..." />
                <br>
                <label for="cedula">Contraseña Nueva (*)</label>
                <input type="password" id="contrasena2" name="contrasena2" value="" required placeholder="Ingrese su contraseña nueva ..." />
                <br>
                <div id="mdv">
                    <input class="btn" type="submit" id="modificar" name="modificar" value="Modificar" />
                    <button type="button" class="btn btn-default"> <a href="index.php?cone=<?php echo "$ft"; ?>">Cancelar</a></button>
                </div>
            </form>
        </div>
    </section>

</body>

</html