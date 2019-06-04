<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8" />
    <title>MI_CUENTA</title>
    <script type="text/javascript" src="bus.js"></script>
    <link href="" rel="stylesheet" type="text/css" />
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

<body background="../../../fuserr.jpg">

<div class="w3-top">
    <div class="w3-row w3-padding w3-black">

      <?php
      //echo "<div class='w3-col s3'>";
      //echo " <class='w3-button w3-block w3-black'> $_GET[mail]</>";
      //echo " </div>";
      include '../../config/conexionDB.php';
      $sucursal = $_GET["sucursal"];
      $ref = $_GET["mail"];
      $sql2 = "SELECT * FROM usuarios WHERE usu_mail ='$ref' ;";
      $result2 = $conn->query($sql2);
      $rl = mysqli_fetch_assoc($result2);
      $rlt = $rl["usu_id"];
      $rlt1 = $rl["usu_nombre"];
      $rlt2 = $rl["usu_apellido"];
      echo 'Username: ' . $rlt1 . ' ' . $rlt2;
      echo '<br>';
      $conn->close();
      ?>

      <div class="w3-col s3">
        <img src="../../imagenes/<?php echo $rl["usu_foto"]; ?>" width="80" height="80">
      </div>

      <div class="w3-col s3">
        <a href="../../config/cerrarSesion.php" class="w3-button w3-block w3-black">CERRAR SESION</a>
      </div>

    </div>
  </div>

    <br><br><br><br><br><br><br><br>

    <section>
    <?php
        //session_start();
        $mail = $_GET["mail"];
        $codio =$_GET["codigo"];
        $sucursal = $_GET["sucursal"];
        $direccion = $_GET["selCombo"];
        //$producto =$_GET["producto"];
    ?>
       
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
                        <input class="btn btn-default" type="submit" id="modificar" name="modificar" value="Añadir" />
                        <button type="button" class="btn btn-default"> <a href="comprar.php?mail=<?php echo "$mail"; ?>&codigo=<?php echo $codio;?>&sucursal=<?php echo $sucursal;?>&selCombo=<?php echo $direccion;?>">ATRAS</a></button>
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