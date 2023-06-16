<?php
require __DIR__ . '/shares/connection.php';

header('Content-Type:application/json');

$sql = "SELECT ProductID,ProductName,unitprice,UnitsInStock FROM `products`";

$stmt = $pdo->prepare($sql);
$stmt->execute(); 
$rows = $stmt->fetchAll(); 

echo json_encode(['data' => $rows], JSON_UNESCAPED_UNICODE);

?>