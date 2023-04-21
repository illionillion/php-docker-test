<?php
require_once 'dir-check.php';
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
</body>

</html>