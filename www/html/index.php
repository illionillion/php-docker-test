<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>お問い合わせフォーム</title>
    <link rel="stylesheet" href="/style/style.css">
</head>

<body>
    <h1>お問い合わせフォーム</h1>
    <form method="post" action="send-form.php">
        <label for="name">お名前</label>
        <input type="text" id="name" name="name" required autocomplete="off">

        <label for="email">メールアドレス</label>
        <input type="text" id="email" name="email" required autocomplete="off">

        <label for="subject">件名</label>
        <input type="text" id="subject" name="subject" required autocomplete="off">

        <label for="message">メッセージ</label>
        <textarea id="message" name="message" required></textarea>

        <input type="submit" value="送信">
    </form>
</body>

</html>