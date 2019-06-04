<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Listar datos de Usuarios.</title>
    <link href="../css/estilo.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
    <link rel="stylesheet" type="text/css" href="../../librerias/bootstrap/css/bootstrap.css">
    <script src="../../librerias/jquery-3.2.1.min.js"></script>
</head>

<style>
    body,
    html {
        height: 100%;
        font-family: "Inconsolata", sans-serif;
    }

      .menu {
        display: none;
      }
</style>

<body>

<div class="w3-top"> 
 <div class="w3-row w3-padding w3-black">

    <?php
      //echo "<div class='w3-col s3'>";
      //echo " <class='w3-button w3-block w3-black'> $_GET[mail]</>";
      //echo " </div>";
      include '../../config/conexionDB.php';
      $ref = $_GET["mail"];
      $sql2 = "SELECT * FROM usuarios WHERE usu_mail ='$ref' ;";
        $result2 = $conn->query($sql2);
        $rl = mysqli_fetch_assoc($result2);
        $rlt = $rl["usu_id"];
        $rlt1 = $rl["usu_nombre"];
        $rlt2 = $rl["usu_apellido"];
        echo 'Username: '. $rlt1 . ' '. $rlt2;
        echo '<br>';
        $conn->close();
    ?>

   <div class="w3-col s3">
    <a href="index.php?mail=<?php echo $_GET['mail']; ?>" class="w3-button w3-block w3-black">INICIO</a>
   </div>

  <div class="w3-col s3">
    <a href="crearusuario.php?mail=<?php echo $_GET['mail']; ?>" class="w3-button w3-block w3-black">CREAR USUARIO</a>
  </div>

  <div class="w3-col s3">
    <a href="listarUsuarios.php?mail=<?php echo $_GET['mail']; ?>" class="w3-button w3-block w3-black">VER USUARIO</a>
  </div>

  <div class="w3-col s3">
    <a href="crear_producto.php?mail=<?php echo $_GET['mail']; ?>" class="w3-button w3-block w3-black">CREAR PRODUCTO</a>
  </div>

  <div class="w3-col s3">
    <a href="crear_sucursal.php?mail=<?php echo $_GET['mail']; ?>" class="w3-button w3-block w3-black">CREAR SUCURSAL</a>
  </div>

  <div class="w3-col s3">
    <a href="listar_productos.php?mail=<?php echo $_GET['mail']; ?>" class="w3-button w3-block w3-black">VER PRODUCTOS</a>
  </div>

  <div class="w3-col s3">
    <a href="listar_sucursal.php?mail=<?php echo $_GET['mail']; ?>" class="w3-button w3-block w3-black">VER SUCURSALES</a>
  </div>

  <div class="w3-col s3">
    <a href="listar_facturas.php?mail=<?php echo $_GET['mail']; ?>" class="w3-button w3-block w3-black">VER PEDIDOS EN CAMINO</a>
  </div>

  <div class="w3-col s3">
    <a href="listar_pedidos.php?mail=<?php echo $_GET['mail']; ?>" class="w3-button w3-block w3-black">PEDIDOS FINALIZADOS</a>
  </div>

  <div class="w3-col s3">
    <a href="listar_cancelados.php?mail=<?php echo $_GET['mail']; ?>" class="w3-button w3-block w3-black">CANCELADOS</a>
  </div>

  <div class="w3-col s3">
    <a href="../../config/cerrarSesion.php" class="w3-button w3-block w3-black">CERRAR SESION</a>
  </div>

  </div>
</div>

<br><br><br><br><br><br><br>

    <h2>Listar Usuarios</h2>
    <table id="usuarios" style="width: 100%" border="1">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>E-MAIL</th>
            <th>FOTO</th>
            <th>ROL</th>
            <th colspan="3">ACCIONES</th>

        </tr>


        <?php
        include('../../config/conexionDB.php');

        $sql = "SELECT * from usuarios where usu_rol = 'USER' and usu_eliminado='NO';";
        $result = $conn->query($sql);




        if ($result->num_rows > 0) {


            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo ("<td>" . $row["usu_nombre"] . "</td>");
                echo ("<td>" . $row["usu_apellido"] . "</td>");
                echo ("<td>" . $row["usu_mail"] . "</td>");
                echo ("<td>" . "<img src=../../imagenes/$row[usu_foto] width='80' height='80'>" . "</td>");
                echo ("<td>" . $row["usu_rol"] . "</td>");
<<<<<<< HEAD


                echo ("<td> <a href = eliminar_usuarios.php?codio=" . $row["usu_id"] . "&adm=". $_GET['mail'] . ">ELIMINAR</a>" . " </td>");
                echo ("<td> <a href=actualizarUsuario.php?codio=" . $row["usu_id"] . "&adm=". $_GET['mail'] . ">Modificar</a> </td>");

=======
                echo ("<td> <a href = ../controladores/eliminarUsu.php?codigo=" . $row["usu_id"] . ">ELIMINAR</a>" . " </td>");
                echo ("<td> <a href=actualizarUsuario.php?mail=" . $row["usu_id"] .  ">Modificar</a> </td>");
                echo ("<td> <a href = ../controladores/eliminarUsu.php?mail=" . $row["usu_mail"] . "&adm=". $_GET['mail'] . ">ELIMINAR</a>" . " </td>");
                echo ("<td> <a href=actualizarUsuario.php?mail=" . $row["usu_mail"] . "&adm=". $_GET['mail'] . ">Modificar</a> </td>");
>>>>>>> 78d2bedd797f92b253858c499e8f400971839ccd
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

    <div id="mdv">
        <a href="index.php?mail=<?php echo $_GET['mail']; ?>" class="btn btn-default">Cancelar</a>
    </div>

<footer class="w3-center w3-light-grey w3-padding-48 w3-large">
    <p>UPS Hipermedial © Todos los derechos reservados</a></p>
</footer>

  <script>
    // Tabbed Menu
    function openMenu(evt, menuName) {
      var i, x, tablinks;
      x = document.getElementsByClassName("menu");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablink");
      for (i = 0; i < x.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" w3-dark-grey", "");
      }
      document.getElementById(menuName).style.display = "block";
      evt.currentTarget.firstElementChild.className += " w3-dark-grey";
    }
    document.getElementById("myLink").click();
  </script>


</body>

</html>