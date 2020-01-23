<?php
$host = 'localhost';
$user = 'root';
$pw = '111111';
$dbname = 'ex_board';
$connect = new mysqli($host, $user, $pw, $dbname);

$URL = './main.php';      // return URL

$id = $_get['id'];
$password = $_get['pw'];

$result = $connect -> query("select * from ex_board.member where pw ='$password' and id='$id';");

if(mysqli_num_rows($result)==1){
  echo $result;
  session_start();
  $success = mysqli_fetch_assoc($result);
  $_session['sessionID'] =  $success['id'];

  echo "<script> alert('로그인 성공!');</script>";
  echo "<script> location.replace('$URL'); </script>";
}
else {
  echo "<script> alert('아이디 또는 패스워드가 일치하지않습니다.');</script>";
  echo "<script> history.back(); </script>";
}
mysqli_close;





?>
