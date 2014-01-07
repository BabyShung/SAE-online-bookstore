<?php
include_once('jcart/jcart.php');
session_start();
//提取用户的收货地址
$mysql=new SaeMysql();
$sql = "SELECT * FROM Address WHERE CustomerID='".$_SESSION['id']."' order by dt desc";
$data=$mysql->getData($sql);
$mysql->closeDb();
?>