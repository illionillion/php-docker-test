<?php
require_once 'db_connect.php';
require_once 'dir-check.php';
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
    <link rel="stylesheet" href="style/inquiries.css">
</head>

<body>
    <h1>お問い合わせ一覧</h1>
    <table>
        <tr>
            <th>名前</th>
            <th>メールアドレス</th>
            <th>件名</th>
            <th>メッセージ</th>
        </tr>
        <?php $file = fopen("db-txt/form-data.csv", 'r'); ?>
        <?php while ($data = fgetcsv($file)) : ?>
            <tr>
                <?php foreach ($data as $value) : ?>
                    <td><?= htmlspecialchars($value) ?></td>
                <?php endforeach ?>
            </tr>
        <?php endwhile ?>
        <?php fclose($file); ?>
    </table>
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