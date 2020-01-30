<?php
  session_start();

    $session = session_destroy();

    if($session){
      echo "<script> alert('로그아웃 되었습니다.'); </script>";
      echo "<script> history.back() ; </script>";
    }

 ?>
