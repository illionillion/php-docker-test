<?php session_start(); ?>
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

    <?php
    // auth.phpから送られてきたエラーメッセージがあれば表示する
    if (isset($_SESSION['error'])) : ?>
      <p class="error"><?= $_SESSION['error'] ?></p>

      <?php unset($_SESSION['error']); ?>

    <?php endif ?>
  </form>
</body>

</html>