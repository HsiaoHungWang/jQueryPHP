<?php
$mySQL_host = 'localhost';  //資料庫伺服器的位置  IP
$mySQL_user = 'root'; //權限 帳號
$mySQL_pass = 'root'; //權限 密碼
$mySQL_DB = 'pubs';  //資料庫名稱

 $connString = "mysql:host={$mySQL_host}; port=3306; dbname={$mySQL_DB}; charset=utf8";

 $accessOptions = [
      PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, 
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
 ];

 
 try {  
      $pdo = new PDO($connString, $mySQL_user, $mySQL_pass, $accessOptions);
   //echo "連結資料庫成功!!!";
 } catch(Exception $ex){
      echo "存取資料庫時發生錯誤，訊息:" . $ex->getMessage() . "<br>";
      echo "苦主:" . $ex->getFile() . "<br>";
      echo "行號:" . $ex->getLine() . "<br>";
      echo "Code:" . $ex->getCode() . "<br>";
      echo "堆疊:" . $ex->getTraceAsString() . "<br>";
 }


?>