<?php
// DB 접속
  $host = 'localhost';
  $user = 'root';
  $pw = '111111';
  $dbname = 'ex_board';
  $connect = new mysqli($host, $user, $pw, $dbname);

  $URL = './main.php';      // return URL

  $title = $_POST['title'];
  $writer = $_POST['writer'];
  $contents = $_POST['contents'];
  $date = date('Y-m-d H:i:s');


  $query = "insert into board values(null,'$writer','$title','$contents',0,'$date')";
  $result = $connect -> query($query) ;

  if($result){
    echo "<script>alert('글이 작성되었습니다');</script>";
    //echo "<script> location.href='$URL'; </script>";
    echo "<script> location.replace('$URL'); </script>";
    }else{
    echo "FAIL";
  }

  mysqli_close($connect);
 ?>
