<?php

$host = 'db'; // ホスト名
$dbname = 'contact_db'; // データベース名
$username = 'root'; // ユーザー名
$password = 'secret'; // パスワード

// PDOオブジェクトを作成する
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // エラーモードを例外モードに設定する
} catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage();
    exit;
}
