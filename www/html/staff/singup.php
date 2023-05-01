<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>アカウント作成</title>
    <link rel="stylesheet" href="/style/login.css">
  </head>
  <body>
    <form action="register.php" method="post">
      <h1>アカウント作成</h1>

      <label for="username">ユーザー名</label>
      <input type="text" id="username" name="username" />

      <label for="useremail">メールアドレス</label>
      <input type="text" id="useremail" name="useremail" />

      <label for="password">パスワード</label>
      <input type="password" id="password" name="password" />

      <input type="submit" value="アカウント作成" />

      <div class="back-to-login">
        <a href="login.php">ログイン画面に戻る</a>
      </div>
    </form>
  </body>
</html>
