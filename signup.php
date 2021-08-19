<?php
  include_once 'header.php';
 ?>
      <section class="signup-form">
        <h2>Kayıt Ol</h2>
        <div class="signup-form-form">

        <form action="includes/signup.inc.php" method="post">
          <input type="text" name="name" placeholder="Adınız Soyadınız:">
          <input type="text" name="email" placeholder="Email :">
          <input type="text" name="uid" placeholder="Kullanıcı adınız:">
          <input type="password" name="pwd" placeholder="Şifreniz:">
          <input type="password" name="pwdrepeat" placeholder="Şifre tekrar:">
          <button type="submit" name="submit">Gönder</button>

        </form>
        </div>
      </section>

    <!--Hatalı girişler için error mesajları-->
<?php
  if (isset($_GET["error"])) {
    if ($_GET["error"]== "emptyinput") {
      echo "<p>Lütfen formdaki bütün boşlukları doldurduğunuzdan emin olun.</p>";
    }
    elseif ($_GET["error"]== "invaliduid") {
      echo "<p>Kullanıcı adı geçersiz. Başka bir kullanıcı adı seçiniz.</p>";
    }
    elseif ($_GET["error"]== "invalidemail") {
      echo "<p>Email geçersiz. Başka bir email seçiniz.</p>";
    }
    elseif ($_GET["error"]== "passwordsdontmatch") {
      echo "<p>Parolanızı doğrulayamadınız. Lütfen tekrar girin.</p>";
    }
    elseif ($_GET["error"]== "stmtfailed") {
      echo "<p>Bir şeyler ters gitti! Lütfen daha sonra tekrar deneyin.</p>";
    }
    elseif ($_GET["error"]== "usernametaken") {
      echo "<p>Bu kullanıcı adı zaten mevcut. Lütfen tekrar deneyin.</p>";
    }
    elseif ($_GET["error"]== "emailtaken") {
      echo "<p>Bu email zaten kayıtlı. Lütfen tekrar deneyin.</p>";
    }
    elseif ($_GET["error"]== "none") {
      echo "<p>Kayıt olduğunuz için teşekkürler.</p>";
    }
  }
 ?>



<?php
  include_once 'footer.php';
 ?>
