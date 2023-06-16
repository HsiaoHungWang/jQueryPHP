<?php
require __DIR__ . '/shares/connection.php';

header('Content-Type:application/json');
 
//步驟二下命令(SQL語法)
$sql = "SELECT * FROM `authors` WHERE state='CA'";
$stmt = $pdo->prepare($sql);
$stmt->execute(); 
$rows = $stmt->fetchAll(); //讀取所有資料

//步驟三將讀出的結果轉成json格式回傳給瀏覽器
echo json_encode($rows, JSON_UNESCAPED_UNICODE);

?>