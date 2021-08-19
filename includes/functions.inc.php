<?php
function emptyInputSignup($name,$email,$username,$pwd,$pwdRepeat){
  $result;//true false?
  if (empty($name) || empty($email) || empty($username) || empty($pwd)
  || empty($pwdRepeat)) {
    $result = true;//hata verir
  }
  else{
    $result = false;//hatasız
  }
  return $result;
}

function invalidUid($username){
  $result;
  if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    $result =true;
  }else{
    $result = false;
  }
  return $result;
}

function invalidEmail($email){
  $result;
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $result =true;
  }else{
    $result = false;
  }
  return $result;
}

function pwdMatch($pwd,$pwdRepeat){
  $result;
  if ($pwd!==$pwdRepeat) {
    $result =true;
  }else{
    $result = false;
  }
  return $result;
}

function uidExists($conn,$username){
  $sql ="SELECT * FROM users WHERE usersUid = ?;";//???//1. ; sql için 2. ; php için
  $stmt = mysqli_stmt_init($conn);//girilen bilgilerin daha güvenli olmasını
  //sağlar. örneğin isim soyisim yerine düzgün bir isim girmesi gibi isim dışında bir şey girmemesi içi fln.
  if (!mysqli_stmt_prepare($stmt,$sql)) {
    // code...
    header("location: ../signup.php?error=stmtfailed");
    exit();
  }
  mysqli_stmt_bind_param($stmt, "s", $username);//ss 2 string olduğunu br-elirtir
  mysqli_stmt_execute($stmt);//?1,14,00

  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData)) {
    // result varmı kontrol
    //neden row yazdı anlamadım
    //1.17.00
    return $row;//if this user inside db return all data in db and use this data?
  }else {
    $result=false;
    return $result;
  }
  mysqli_stmt_close($stmt);
}


function emailExists($conn,$email){
  $sql ="SELECT * FROM users WHERE usersEmail = ?;";//???//1. ; sql için 2. ; php için
  $stmt = mysqli_stmt_init($conn);//girilen bilgilerin daha güvenli olmasını
  //sağlar. örneğin isim soyisim yerine düzgün bir isim girmesi gibi isim dışında bir şey girmemesi içi fln.
  if (!mysqli_stmt_prepare($stmt,$sql)) {
    // code...
    header("location: ../signup.php?error=stmtfailed");
    exit();
  }
  mysqli_stmt_bind_param($stmt, "s", $email);//ss 2 string olduğunu br-elirtir
  mysqli_stmt_execute($stmt);//?1,14,00

  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData)) {
    // result varmı kontrol
    //neden row yazdı anlamadım
    //1.17.00
    return $row;//if this user inside db return all data in db and use this data?
  }else {
    $result=false;
    return $result;
  }
  mysqli_stmt_close($stmt);
}

function createUser($conn,$name,$email,$username,$pwd){
  $sql ="INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);//girilen bilgilerin daha güvenli olmasını
  //sağlar. örneğin isim soyisim yerine düzgün bir isim girmesi gibi isim dışında bir şey girmemesi içi fln.
  if (!mysqli_stmt_prepare($stmt,$sql)) {
    // code...
    header("location: ../signup.php?error=stmtfailed");
    exit();
  }

  $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);//şifre güvenliği için
  mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);//ss 2 string olduğunu br-elirtir
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ../signup.php?error=none");
  exit();
}

function emptyInputLogin($username,$pwd){
  $result;
  if (empty($username) || empty($pwd)) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

function loginUser($conn,$username,$pwd){
  $uidExists = uidExists($conn,$username);
  if ($uidExists === false){
    header("location: ../login.php?error=wronglogin");
    exit();
  }

  $pwdHashed = $uidExists["usersPwd"];
  $checkPwd = password_verify($pwd,$pwdHashed);
  if ($checkPwd=== false){
    header("location: ../login.php?error=wronglogin");
    exit();
  }
  else if ($checkPwd === true){
    session_start();
    $_SESSION["userid"] = $uidExists["usersId"];
    $_SESSION["useruid"] = $uidExists["usersUid"];
    header("location: ../index.php");
    exit();
  }
}
