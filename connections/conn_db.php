<?php
//PDO SQL連線指令
$dsn="mysql:host=localhost;dbname=expstore;charset=utf8";
$user="sales";
$password="123456";
$link=new PDO($dsn,$user,$password);
?>