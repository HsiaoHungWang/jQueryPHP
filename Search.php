<?php
require __DIR__ . '/shares/connection.php';

header('Content-Type:application/json');

$sql = "SELECT ProductName FROM `products` WHERE ProductName LIKE ? LIMIT 10";
//? => '%ch%'

$stmt = $pdo->prepare($sql);

$keyword = isset($_GET['term']) ? $_GET['term'] : '';

$stmt->execute(['%' . $keyword . '%']); 
$rows = $stmt->fetchAll(); 
foreach($rows as $row){
    $array[] = $row['ProductName'];
}

echo json_encode($array, JSON_UNESCAPED_UNICODE);

?>