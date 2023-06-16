<?php
require __DIR__ . '/shares/connection.php';
header('Content-Type:application/json');

$output = [
    'success' => false,
    'errorMessage' => '',
    'data' => $_GET
];


$sql = "DELETE FROM `users` WHERE id=?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_GET["id"]]);

if($stmt->rowCount() == 1){
    $output['success'] = true;
}else{
    $output['errorMessage'] = "刪除失敗";
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);

?>