<!doctype html>
<html>
<head>
        <meta charset = 'utf-8'>
</head>
<style>

.view_table {
border: 1px solid #444444;
margin-top: 30px;
}
.view_title {
height: 30px;
text-align: center;
background-color: #cccccc;
color: white;
width: 1000px;
}
.view_id {
text-align: center;
background-color: #EEEEEE;
width: 30px;
}
.view_id2 {
background-color: white;
width: 60px;
}
.view_hit {
background-color: #EEEEEE;
width: 30px;
text-align: center;
}
.view_hit2 {
background-color: white;
width: 60px;
}
.view_content {
padding-top: 20px;
border-top: 1px solid #444444;
height: 500px;
}
.view_btn {
width: 700px;
height: 200px;
text-align: center;
margin: auto;
margin-top: 50px;
}
.view_btn1 {
height: 50px;
width: 100px;
font-size: 20px;
text-align: center;
background-color: white;
border: 2px solid black;
border-radius: 10px;
}
.view_comment_input {
width: 700px;
height: 500px;
text-align: center;
margin: auto;
}
.view_text3 {
font-weight: bold;
float: left;
margin-left: 20px;
}
.view_com_id {
width: 100px;
}
.view_comment {
width: 500px;
}

</style>

<body>


<?php
// DB 접속
  $host = 'localhost';
  $user = 'root';
  $pw = '111111';
  $dbname = 'ex_board';

  $board_number = $_GET['board_number'];

  $connect = new mysqli($host, $user, $pw, $dbname);

  $hitUpdate = "update board set board_hit = board_hit + 1 where board_number = $board_number";
    $success = $connect -> query($hitUpdate);

    if($success){

      $query = "select * from board
      where board_number = $board_number";

      $result = $connect -> query($query) ;

      $data = mysqli_fetch_assoc($result);
    }


 ?>







 <table class="view_table" align=center>
       <tr>
               <td colspan="4" class="view_title"><?php echo $data['board_title']?></td>
       </tr>
       <tr>
               <td class="view_id">작성자</td>
               <td class="view_id2"><?php echo $data['boad_writer']?></td>
               <td class="view_hit">조회수</td>
               <td class="view_hit2"><?php echo $data['board_hit']?></td>
       </tr>


       <tr>
               <td colspan="4" class="view_content" valign="top">
               <?php echo $data['board_contents']?></td>
       </tr>

       </table>
       <a href="main.php">목록으로</a>

<?php
  mysqli_close($connect);
 ?>





</body>
