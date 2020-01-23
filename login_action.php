<?php
$host = 'localhost';
$user = 'root';
$pw = '111111';
$dbname = 'ex_board';
$connect = new mysqli($host, $user, $pw, $dbname);

$URL = './main.php';      // return URL

$id = $_POST['id'];
$password = $_POST['pw'];

$result = $connect -> query("select * from ex_board.member where id = '$id';");
$success = mysqli_fetch_assoc($result);

if($success != null){
    // 조회된 아이디가있을때 패스워드 검사
    if($password == $success['pw']){
      $_session['sessionID'] = $id;
      session_start();
      echo "<script> alert('로그인 성공!');</script>";
      echo "<script> location.replace('$URL'); </script>";
    }else{
      echo "<script> alert('아이디 또는 패스워드가 일치하지않습니다.');</script>";
      echo "<script> history.back(); </script>";
    }
}else{

  echo "<script> alert('아이디 또는 패스워드가 일치하지않습니다.');</script>";
  echo "<script> history.back(); </script>";
}


// if($success != null){
//   echo $result;
//   session_start();
//   $_session['sessionID'] =  $success['id'];
//
//   echo "<script> alert('로그인 성공!');</script>";
//   echo "<script> location.replace('$URL'); </script>";
// }
// else {
//   echo "<script> alert('아이디 또는 패스워드가 일치하지않습니다.');</script>";
//   echo "<script> history.back(); </script>";
// }





?>
