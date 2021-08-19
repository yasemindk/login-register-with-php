<?php
  include_once 'header.php';
 ?>
      <section class="index-intro">
        <?php
          if (isset($_SESSION["useruid"])) {
            echo "<p>Merhaba " . $_SESSION["useruid"] . " :)</p>";
          }
         ?>
         <hr>
        <h1>Hoşgeldiniz!</h1>
    <hr>
        <p>Burası php, css, html ve javascript ile
          hazırlanmış bir login/register sayfasıdır.</p>
      </section>


<?php
  include_once 'footer.php';
 ?>
