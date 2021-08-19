<?php
  include_once 'header.php';
 ?>
      <section class="login-form">
        <h2>Giriş Yap</h2>
        <div class="login-form-form">


        <form action="includes/login.inc.php" method="post">

          <input type="text" name="uid" placeholder="Kullanıcı adınız ya da emailiniz:">
          <input type="password" name="pwd" placeholder="Şifreniz:">

          <button type="submit" name="submit">Gönder</button>

        </form>
        </div>

            <!--Hatalı girişler için error mesajları-->

        <?php
          if (isset($_GET["error"])) {
            if ($_GET["error"]== "emptyinput") {
              echo "<p>Lütfen formdaki bütün boşlukları doldurduğunuzdan emin olun.</p>";
            }
            elseif ($_GET["error"]== "wronglogin") {
              echo "<p>Hatalı giriş yaptınız.</p>";
          }
         }
         ?>
  </section>




<?php
  include_once 'footer.php';
 ?>
