<!--data base handler dbh verileri çekmek veya işlemek için-->
<!--
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "adminsifrem34";
$dBName = "phpproject01"; //istediğin ismi ver

$conn = new mysqli($serverName, $dBUsername, $dBPassword, $dBName);

if ($conn->connect_errno > 0){
  die('Veritabanı bağlantısı sağlanamadı.<b>'.$ekle->connect_error.' </b>');
}

$ekle = "INSERT INTO users (userName, userEmail,userUid,userPwd) VALUES ('".$name."','".$email."','".$username."','".$pwd."')";
if ($conn->query($ekle)===TRUE) {
  echo "eklendi";
}
else {
  echo "hata :" . $ekle. "<br>" . $conn->error;
}



  try{
    $conn = new PDO("mysql:host=localhost;dbname=phpproject01","root","adminsifrem34");
    $conn -> exec("SET NAMES utf8");
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sorgu = $conn -> prepare("INSERT INTO users(userName,userEmail,userUid,userPwd) VALUES(?, ?, ?)");
    $sorgu->bindParam(1, $name, PDO::PARAM_STR);
    $sorgu->bindParam(2, $email, PDO::PARAM_STR);
    $sorgu->bindParam(3, $username, PDO::PARAM_STR);
    $sorgu->bindParam(4, $pwd, PDO::PARAM_STR);

    $sorgu->execute();
    echo "kaydedildi";
  } catch (PDOException $e) {
      die($e->getMessage());
  }

  $baglanti = null;
-->
<?php
$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "phpproject01";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);
if (!$conn) {
  die("Bağlanılamadı:" . mysqli_connect_error());
}
