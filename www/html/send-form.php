<?php
$csv_path = "db-txt/form-data.csv";
// CSVファイルが存在しない場合は、新規作成する
if (!file_exists($csv_path)) {
    $file = fopen($csv_path, 'w');
    // fputcsv($file, array('name', 'email', 'subject', 'message'));
    fclose($file);
}

// フォームデータを取得
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

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
