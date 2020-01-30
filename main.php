<!doctype html>
<html>
<head>
        <meta charset = 'utf-8'>
</head>
<style>
        table{
                border-top: 1px solid #444444;
                border-collapse: collapse;
        }
        tr{
                border-bottom: 1px solid #444444;
                padding: 10px;
        }
        td{
                border-bottom: 1px solid #efefef;
                padding: 10px;
        }
        table .even{
                background: #efefef;
        }
        .text{
                text-align:center;
                padding-top:20px;
                color:#000000
        }
        .text:hover{
                text-decoration: underline;
        }
        a:link {color : #57A0EE; text-decoration:none;}
        a:hover { text-decoration : underline;}

</style>





<body>

<?php
// DB 접속
  $host = 'localhost';
  $user = 'root';
  $pw = '111111';
  $dbname = 'ex_board';
  $connect = new mysqli($host, $user, $pw, $dbname);
  $query = "select * from board order by board_number desc";
  $result = $connect -> query($query) ;
  $total = mysqli_num_rows($result);

  session_start();

  // function logincheck(){
  //
  //   if(! isset($_SESSION['sessionID'])){
  //     echo "<script> alert('로그인 후 이용가능합니다.'); </script>";
  //     echo "<script> history.back(); </script>";
  //   }else{
  //     echo "<script> location.replace('write.php');</script>";
  //   }
  // }


 ?>


<h2 align=center>게시판</h2>
<table align = center>
  <thead align = "center">
       <tr>
       <td width = "50" align="center">번호</td>
       <td width = "500" align = "center">제목</td>
       <td width = "100" align = "center">작성자</td>
       <td width = "200" align = "center">날짜</td>
       <td width = "50" align = "center">조회수</td>
       </tr>
       </thead>
       <tbody>
              <?php
                      while($rows = mysqli_fetch_assoc($result)){ //DB에 저장된 데이터 수 (열 기준)
                              if($total%2==0){
              ?>                      <tr class = "even">
                              <?php   }
                              else{
              ?>                      <tr>
                              <?php } ?>
                      <td width = "50" align = "center"><?php echo $total?></td>
                      <td width = "500" align = "center">
                      <a href = "view.php?board_number=<?php echo $rows['board_number']?>">
                      <?php echo $rows['board_title']?></td>
                        <td width = "100" align = "center"><?php echo $rows['boad_writer']?></td>
                      <td width = "200" align = "center"><?php echo $rows['board_date']?></td>
                      <td width = "50" align = "center"><?php echo $rows['board_hit']?></td>
                      </tr>
              <?php
                      $total--;
                      }
              ?>
              </tbody>
              </table>

              <div class = text>
              <font style="cursor: hand;" onClick="location.href='./write.php'">글쓰기</font>
              <!-- <button type="button" onclick="logincheck();">글쓰기</button> -->
                </div>
            <?php
            // session_start();


              if(isset($_SESSION['sessionID'])){    // session값이 있을때 (이미 로그인을 했을때 )
                echo $_SESSION['sessionID'];?> 님 안녕하세요

                <div class = text>
                <font style="cursor: hand;" onClick="location.href='./logout_action.php'">로그아웃</font>
                  </div>
            <?php
          } else{
            ?>
              <div class = text>
            <font style="cursor: hand;" onClick="location.href='./login.php'">로그인</font>
            </div>      <?php    }
              ?>



  </table>



  <?php
    mysqli_close($connect);
   ?>







</body>
  </html>
