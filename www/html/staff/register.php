<?php
require_once '../db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $useremail = $_POST['useremail'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($useremail) || empty($password)) {
        header('Location: signup.php');

        exit();
    }

    // パスワードをハッシュ化する
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    // SQL文を作成する
    $sql = 'INSERT INTO users (username, useremail, password) VALUES (:username, :useremail, :password)';

    // SQL文を実行する準備を行う
    $stmt = $pdo->prepare($sql);

    // パラメータをバインドする
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':useremail', $useremail, PDO::PARAM_STR);
    $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);

    // SQLを実行する
    $stmt->execute();


    // データベースとの接続を閉じる
    $pdo = null;

    header('Location: login.php');
    exit();
}
