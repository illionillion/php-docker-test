<?php
require_once '../db_connect.php';
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

if (isset($_POST['logout'])) {
    $_SESSION = array();
    session_destroy();
    header('Location: login.php');
    exit();
}

// SQL文を作成して実行する
$sql = "SELECT * FROM inquiries";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$inquiries = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>お問い合わせ一覧</title>
    <link rel="stylesheet" href="../style/inquiries.css">
</head>

<body>
    <header>
        <h1>お問い合わせ一覧</h1>
        <form action="" method="post">
            <input type="submit" name="logout" value="ログアウト">
        </form>
    </header>
    <table>
        <tr>
            <th>名前</th>
            <th>メールアドレス</th>
            <th>件名</th>
            <th>メッセージ</th>
            <th>時間</th>
        </tr>
        <?php foreach ($inquiries as $inquiry) : ?>
            <tr>
                <td><?= htmlspecialchars($inquiry['name']) ?></td>
                <td><?= htmlspecialchars($inquiry['email']) ?></td>
                <td><?= htmlspecialchars($inquiry['subject']) ?></td>
                <td><?= htmlspecialchars($inquiry['message']) ?></td>
                <td><?= htmlspecialchars($inquiry['created_at']) ?></td>
            </tr>
        <?php endforeach ?>
    </table>
</body>

</html>