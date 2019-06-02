<!DOCTYPE html>
<html>
<title>Home</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
<style>
  body,
  html {
    height: 100%;
    font-family: "Inconsolata", sans-serif;
  }

  .bgimg {
    background-position: center;
    background-size: cover;
    background-image: url("/w3images/coffeehouse.jpg");
    min-height: 75%;
  }

  .menu {
    display: none;
  }
</style>

<body>

  <!-- Links (sit on top) -->
  <div class="w3-top">
    <div class="w3-row w3-padding w3-black">
      <div class="w3-col s3">
        <a href="#" class="w3-button w3-block w3-black">INICIO</a>
      </div>
      <div class="w3-col s3">
        <a href="#about" class="w3-button w3-block w3-black">NOSOTROS</a>
      </div>
      <div class="w3-col s3">
        <a href="#mision" class="w3-button w3-block w3-black">MISION</a>
      </div>
      <div class="w3-col s3">
        <a href="#vision" class="w3-button w3-block w3-black">VISION</a>
      </div>

      <div class="w3-col s3">
        <a href="#contact" class="w3-button w3-block w3-black">CONTACTOS</a>
      </div>

      <div class="w3-col s3">
        <a href="#contact" class="w3-button w3-block w3-black">CONTACTOS</a>
      </div>
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
        <a href="../../admin/vista/comprar.php?mail=<?php echo $ref; ?>" class="w3-button w3-block w3-black">COMPRAR</a>
      </div>

      <div class="w3-col s3">
        <a href="../vista/home.php" class="w3-button w3-block w3-black">CERRAR SESION</a>
      </div>


    </div>
  </div>

  <!-- Header with image -->
  <header class="bgimg w3-display-container w3-grayscale-min" id="home">
    <div class="w3-display-bottomleft w3-center w3-padding-large w3-hide-small">
      <span class="w3-tag">Abierto desde 9am to 7pm</span>
    </div>
    <div class="w3-display-middle w3-center">
      <span class="w3-text-white" style="font-size:90px">UPS<br>Compuratadoras</span>
    </div>
    <div class="w3-display-bottomright w3-center w3-padding-large">
      <span class="w3-text-white"> Tomas Ordoñes y Presidente Cordova </span>
    </div>

  </header>

  <!-- Add a background color and large text to the whole page -->
  <div class="w3-sand w3-grayscale w3-large">

    <!-- About Container -->
    <div class="w3-container" id="about">
      <div class="w3-content" style="max-width:700px" >
        <h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">Nosotros</span></h5>
        <p>Somos una empresa dedicada a la venta de equipos de cómputo, así como accesorios, complementos y reparación de los mismos. Actualmente somos una de las empresas más consultadas a la hora de adquirir un equipo de cómputo para la oficina y/o el hogar. En Computadoras Garco nos preocupamos por cubrir perfectamente tus necesidades por lo que ofrecemos un valor agregado, excelente servicio y los productos de mejor calidad en el mercado. El éxito de nuestra empresa se debe a la comunicación de nuestros clientes y amigos, puesto que son ellos nuestra mejor recomendación y es por eso que nos ponemos a sus órdenes para brindarle el producto que usted necesita.</p>

        <div class="w3-panel w3-leftbar w3-light-grey">
          <p><i>Tus necesidades son nuestra prioridad</p>
        </div>

        <img src="../../imagenes/logo.jpg" style="width:100%;max-width:1000px" class="w3-margin-top">
        <p><strong>Atención:</strong> Lunes a Sabado desde 9am hasta 7pm y Domingos desde 9 am hasta 1pm</p>
        <p><strong>Dirección:</strong> Tomas Ordoñes y Presidente Cordova</p>
      </div>
    </div>

    <!-- Mision Container -->
    <div class="w3-container" id="mision">
      <div class="w3-content" style="max-width:700px">
        <h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">Mision</span></h5>
        <p>Somos una empresa dedicada a la comercialización y distribución de productos informáticos, fabricación de ordenadores, desarrollo de aplicaciones informáticas de gestión, soluciones en Internet, servicio técnico y mantenimiento de equipos y sistemas informáticos, hosting, y consultoría de protección de datos. Ofreciendo una solución global a empresas, profesionales, administraciones y usuarios particulares, a todo el territorio nacional.</p>
      </div>
    </div>


    <!-- Mision Container -->
    <div class="w3-container" id="vision">
      <div class="w3-content" style="max-width:700px">
        <h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">Vision</span></h5>
        <p>Pretendemos ser un referente en el mercado nacional en el sector de las TIC, y para ello abarcaremos todos los servicios que ofrecemos actualmente incrementando los que vayan surgiendo debido a la necesidad de cambio provocado por los avances tecnológicos. Esto es así ya que somos una empresa en constante innovación ya que el sector de la tecnología así lo requiere.</p>
      </div>
    </div>

    <!-- Contact/Area Container -->
    <div class="w3-padding-64 w3-content w3-text-grey" id="contact">
      <h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">Contactos</span></h5>
      <hr style="width:200px" class="w3-opacity">

      <div class="w3-section">
        <p><i class="fa fa-map-marker fa-fw w3-text-white w3-xxlarge w3-margin-right"></i> CUENCA-ECUADOR, EC</p>
        <p><i class="fa fa-phone fa-fw w3-text-white w3-xxlarge w3-margin-right"></i> Telefono: +593 984053639</p>
        <p><i class="fa fa-envelope fa-fw w3-text-white w3-xxlarge w3-margin-right"> </i> Email: drodrigueza@est.ups.edu.ec</p>
        <p><i class="fa fa-envelope fa-fw w3-text-white w3-xxlarge w3-margin-right"> </i> Desarrolladores</p>
        <p>Diego Rodríguez A</p>
        e-mail:<a href="mailto:drodrigueza@est.ups.edu.ec">drodrigueza@est.ups.edu.ec </a> Teléfono:
        <a href="tel:+593984053639">0984053639</a>
        <p>Marco Cobos F</p>
        e-mail:<a href="mailto:mcobosf@est.ups.edu.ec">drodrigueza@est.ups.edu.ec </a> Teléfono:
        <a href="tel:+593984053639">0979743801</a>
        <p>Malki Yupanki M</p>
        e-mail:<a href="mailto:gchuchucaa@est.ups.edu.ec">drodrigueza@est.ups.edu.ec </a> Teléfono:
        <a href="tel:+593984053639">0969375242</a></p>
        <p>Gabriel Chuchuca A</p>
        e-mail:<a href="mailto:myupanki@est.ups.edu.ec">drodrigueza@est.ups.edu.ec </a> Teléfono:
        <a href="tel:+593984053639">0982865431</a>
      </div><br>

      <!-- End Contact Section -->
    </div>

    <!-- End page content -->
  </div>

  <!-- Footer -->
  <footer class="w3-center w3-light-grey w3-padding-48 w3-large">
     <p>UPS Hipermedial<a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">© Todos los derechos reservados</a></p>
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