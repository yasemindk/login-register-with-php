<?php
  session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PHP Project 01</title>
    <link href="css/reset.css" rel="stylesheet" type="text/css"/>
    <link href="css/stil.css" rel="stylesheet" type="text/css"/>
  </head>
  <body>
    <nav>
      <div class="wrapper">
        <ul>
          <li style="float:left">
            <a href="index.php">ANA SAYFA</a>
          </li>

          <?php
            if (isset($_SESSION["useruid"])) {
              echo "<li><a href='includes/logout.inc.php'>ÇIKIŞ</a></li>";
            }else {
              echo "<li><a href='signup.php'>KAYIT OL</a></li>";
              echo "<li><a href='login.php'>GİRİŞ YAP</a></li>";
            }
           ?>
        </ul>
      </div>
    </nav>
    <div class="wrapper">
