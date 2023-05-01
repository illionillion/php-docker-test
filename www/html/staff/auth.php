<?php
require_once '../db_connect.php';

session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "ユーザー名とパスワードを入力してください。";
        header("Location: login.php");
        exit;
    }

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username=:username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user === false) {
        $_SESSION['error'] = "ユーザー名が正しくありません。";
        header("Location: login.php");
        exit;
    }

    if (password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        header("Location: inquiries.php");
        exit;
    } else {
        $_SESSION['error'] = "パスワードが正しくありません。";
        header("Location: login.php");
        exit;
    }
} else {
    $_SESSION['error'] = "ユーザー名とパスワードを入力してください。";
    header("Location: login.php");
    exit;
}
