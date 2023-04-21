<?php
$dir_path = "db-txt";
$csv_path = "db-txt/form-data.csv";
if (!is_dir($dir_path)) {
    // ディレクトリが存在しない場合
    mkdir($dir_path);
}
if (!file_exists($csv_path)) {
    // ファイルが存在しない場合
    $file = fopen($csv_path, 'w');
    fclose($file);
}
