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
      <?php



      echo "<div class='w3-col s3'>";
      echo " <class='w3-button w3-block w3-black'> $_GET[mail]</>";
      echo " </div>";
      ?>

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
      <div class="w3-content" style="max-width:700px">
        <h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">Nosotros</span></h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

        <div class="w3-panel w3-leftbar w3-light-grey">
          <p><i>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor.</p>
        </div>

        <img src="/w3images/coffeeshop.jpg" style="width:100%;max-width:1000px" class="w3-margin-top">
        <p><strong>Horarios</strong> Lunes a Sabad desde 9am hasta 7pm y Domingos desde 9 am hasta 1pm</p>
        <p><strong>Address:</strong> Tomas Ordoñes y Presidente Cordova</p>
      </div>
    </div>

    <!-- Mision Container -->
    <div class="w3-container" id="mision">
      <div class="w3-content" style="max-width:700px">
        <h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">Mision</span></h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
    </div>


    <!-- Mision Container -->
    <div class="w3-container" id="vision">
      <div class="w3-content" style="max-width:700px">
        <h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">Vision</span></h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
    </div>

    <!-- Contact/Area Container -->
    <div class="w3-padding-64 w3-content w3-text-grey" id="contact">
      <h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">Contactos</span></h5>
      <hr style="width:200px" class="w3-opacity">

      <div class="w3-section">
        <p><i class="fa fa-map-marker fa-fw w3-text-white w3-xxlarge w3-margin-right"></i> ECUADOR, EC</p>
        <p><i class="fa fa-phone fa-fw w3-text-white w3-xxlarge w3-margin-right"></i> Telefono: +593 9999</p>
        <p><i class="fa fa-envelope fa-fw w3-text-white w3-xxlarge w3-margin-right"> </i> Email: mail@mail.com</p>
      </div><br>
      <p>Enviar un mensaje</p>

      <form action="/action_page.php" target="_blank">
        <p><input class="w3-input w3-padding-16" type="text" placeholder="Name" required name="Name"></p>
        <p><input class="w3-input w3-padding-16" type="text" placeholder="Email" required name="Email"></p>
        <p><input class="w3-input w3-padding-16" type="text" placeholder="Subject" required name="Subject"></p>
        <p><input class="w3-input w3-padding-16" type="text" placeholder="Message" required name="Message"></p>
        <p>
          <button class="w3-button w3-light-grey w3-padding-large" type="submit">
            <i class="fa fa-paper-plane"></i> Enviar
          </button>
        </p>
      </form>
      <!-- End Contact Section -->
    </div>

    <!-- End page content -->
  </div>

  <!-- Footer -->
  <footer class="w3-center w3-light-grey w3-padding-48 w3-large">
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
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