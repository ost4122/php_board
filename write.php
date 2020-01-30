<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <title>Write</title>
</head>
  <style>
table.table2{
  border-collapse: separate;
  border-spacing: 1px;
  text-align: left;
  line-height: 1.5;
  border-top: 1px solid #ccc;
  margin : 20px 10px;
}
table.table2 tr {
  width: 50px;
  padding: 10px;
  font-weight: bold;
  vertical-align: top;
  border-bottom: 1px solid #ccc;
}
table.table2 td {
  width: 100px;
  padding: 10px;
  vertical-align: top;
  border-bottom: 1px solid #ccc;
}
  </style>
<?php
session_start();


// 로그인 확인여부 검사
  if(! isset($_SESSION['sessionID'])){

    echo "<script> alert('로그인 후 이용가능합니다.'); </script>";
    echo "<script> location.replace('main.php'); </script>";
  }

 ?>
<body>
  <form action="write_action.php" method="post">
    <table class="table2">
      <tr>

        <td>제목</td>
          <td> <input type = "text" name = "title" /> </td>
    </tr>

    <tr>
      <td>작성자</td>
        <td> <input type = "text" name = "writer" value = "<?= $_SESSION['sessionID']; ?>" disabled/>  <td>
    </tr>

    <tr>
      <td>내용</td>
        <td> <textarea name = "contents" cols ="85" rows = "15"></textarea> </td>
    </tr>

      <tr>
        <td> <input type ="submit" value ="글 작성" /> </td>
    </tr>
    </table>
  </form>



</body>
</html>
