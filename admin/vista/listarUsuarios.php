<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Listar datos de Usuarios.</title>
    <link href="../css/estilo.css" rel="stylesheet">
</head>

<body>



    <table id="usuarios" style="width: 100%" border="1">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>E-MAIL</th>
            <th>ROL</th>
            <th>FOTO</th>
            <th colspan="3">ACCIONES</th>

        </tr>


        <?php
        include('../../config/conexionDB.php');

        $sql = "SELECT * from usuarios where usu_rol = 'USER';";
        $result = $conn->query($sql);




        if ($result->num_rows > 0) {


            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo ("<td>" . $row["usu_nombre"] . "</td>");
                echo ("<td>" . $row["usu_apellido"] . "</td>");
                echo ("<td>" . $row["usu_mail"] . "</td>");
                echo ("<td>" . "<img src=../../imagenes/$row[usu_foto] width='80' height='80'>" . "</td>");
                echo ("<td>" . $row["usu_rol"] . "</td>");
                echo ("<td> <a href = ../controladores/eliminarUsu.php?codigo=" . $row["usu_id"] . ">ELIMINAR</a>" . " </td>");
                echo ("<td> <a href=actualizarUsuario.php?mail=" . $row["usu_id"] .  ">Modificar</a> </td>");
                echo ("</tr>");
            }
        } else {
            echo "<tr>";
            echo ("<td colspan='7'>No existen usuarios registrados </td>");
            echo ("</tr>");
        }



        $conn->close();
        ?>


    </table>




</body>

</html>