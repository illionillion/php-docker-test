<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>ログイン</title>
    <link rel="stylesheet" href="/style/login.css">
  </head>
  <body>
    <form action="auth.php" method="post">
      <h1>ログイン</h1>

      <label for="username">ユーザー名</label>
      <input type="text" id="username" name="username" />

      <label for="password">パスワード</label>
      <input type="password" id="password" name="password" />

      <input type="submit" value="ログイン" />

      <div class="create-account">
        <a href="singup.php">アカウント作成</a>
      </div>
    </form>
  </body>
</html>
