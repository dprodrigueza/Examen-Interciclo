<?php
        include('../../config/conexionDB.php');

        $sql = "UPDATE usuarios SET usu_del= 'Y' WHERE usu_mail= '$_GET[mail]';";
        echo $sql;
        $result = $conn->query($sql);




    
            header("Location: ../vista/listarUsuarios.php?mail=$_GET[adm]");
        

        $conn->close();
