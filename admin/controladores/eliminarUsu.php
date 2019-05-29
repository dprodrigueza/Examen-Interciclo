<?php
        include('../../config/conexionDB.php');

        $sql = "SELECT * from usuarios where usu_del = 'N';";
        $result = $conn->query($sql);




        if ($result->num_rows > 0) {


            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo ("<td>" . $row["usu_nombre"] . "</td>");
                echo ("<td>" . $row["usu_apellido"] . "</td>");
                echo ("<td>" . $row["usu_mail"] . "</td>");
                echo ("<td>" . $row["usu_rol"] . "</td>");
                echo ("<td>" . $row["usu_rol"] . "</td>");
                echo ("<td> <a href = ../controladores/eliminarUsu.php?mail=" . $row["usu_mail"] . "&adm=". $_GET['mail'] . ">ELIMINAR</a>" . " </td>");
                echo ("<td> <a href=actualizarUsuario.php?mail=" . $row["usu_mail"] . "&adm=". $_GET['mail'] . ">Modificar</a> </td>");
                echo ("</tr>");
            }
        } else {
            echo "<tr>";
            echo ("<td colspan='7'>No existen usuarios registrados </td>");
            echo ("</tr>");
        }



        $conn->close();
        ?>