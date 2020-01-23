<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Join</title>
  </head>
  <body>
    <h2>회원가입</h2>

    <form action="join_action.php" method="post">
      <input type="text" name="name" placeholder="이름을 입력하세요"/>
      <input type="text" name="id" placeholder="아이디를 입력하세요"/>
      <input type="password" name="pw" placeholder="암호를 입력하세요" />
      <input type="email" name="email" placeholder="이메일을 입력하세요" />

      <input type="submit" value="회원가입">
    </form>


  </body>
</html>
