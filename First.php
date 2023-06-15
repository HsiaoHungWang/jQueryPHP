<?php
header('Content-Type:application/json');
 $connString = "mysql:host=localhost; port=3306; dbname=pubs; charset=utf8";
 $user = "root";
 $password = "root";
 $accessOptions = array(
    //  PDO::ATTR_EMULATE_PREPARES=>false,
      PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, 
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    //  PDO::ATTR_PERSISTENT => true,
      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
 );
 try {
    //步驟一建立連線
      $pdo = new PDO($connString, $user, $password, $accessOptions);
     // echo "連結資料庫成功!!!";

//步驟二下命令(SQL語法)
$sql = "SELECT * FROM `authors` WHERE state='CA'";
$stmt = $pdo->prepare($sql);
$stmt->execute(); 
$rows = $stmt->fetchAll(); //讀取所有資料

//步驟三將讀出的結果轉成json格式回傳給瀏覽器
echo json_encode($rows, JSON_UNESCAPED_UNICODE);



 } catch(Exception $ex){
      echo "存取資料庫時發生錯誤，訊息:" . $ex->getMessage() . "<br>";
      echo "苦主:" . $ex->getFile() . "<br>";
      echo "行號:" . $ex->getLine() . "<br>";
      echo "Code:" . $ex->getCode() . "<br>";
      echo "堆疊:" . $ex->getTraceAsString() . "<br>";
 }


?>