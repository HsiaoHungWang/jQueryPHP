<?php
require __DIR__ . '/shares/connection.php';
//header('Content-Type:application/json');

$sql = "INSERT INTO `users`(`name`, `email`, `age`) VALUES ('Tom','Tom@gmail.com','27')";
$stmt = $pdo->prepare($sql);
$stmt->execute();

if($stmt->rowCount() == 1){
    echo "新增成功";
}else{
    echo "新增失敗";
}

?>