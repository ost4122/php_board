<?php

$host = 'localhost';
$user = 'root';
$pw = '111111';
$dbname = 'ex_board';
$connect = new mysqli($host, $user, $pw, $dbname);

$name = $_POST['name'];
$id = $_POST['id'];
$password = $_POST ['pw'];
$email = $_POST['email'];


$URL = './login.php';      // return URL

$result = $connect -> query("insert into ex_board.member values('$id','$name','$password','$email');");

if($result){
  echo "<scipt>alert('회원가입이 되었습니다.'); </script>";
  echo "<script> location.replace('$URL');</script>";
}else{
  echo "FAIL";
}



 ?>
