<?php
require_once 'db_connect.php';
require_once 'dir-check.php';

// フォームデータを取得
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// SQL文を作成して実行する
$sql = "INSERT INTO inquiries (name, email, subject, message) VALUES (:name, :email, :subject, :message)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':subject', $subject, PDO::PARAM_STR);
$stmt->bindParam(':message', $message, PDO::PARAM_STR);
$stmt->execute();

// CSVファイルに保存するためのデータを準備
$data = array($name, $email, $subject, $message);

// CSVファイルにデータを追加
$file = fopen($csv_path, 'a'); // ファイルを開く（'a'は追記モード）
fputcsv($file, $data); // データを書き込む
fclose($file); // ファイルを閉じる

// フォーム送信後のメッセージを表示
// リダイレクト
header('Location: thankyou.php');
exit();
