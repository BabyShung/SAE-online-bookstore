<?php
	if(empty($_POST['Oid'])) die("sorry");

    $mysql = new SaeMysql();  
	$sql="delete FROM `CustomerOrder` WHERE OrderID='".$_POST['Oid']."'";
    $mysql->runSql( $sql );
	$sql2="delete FROM `Order2` WHERE OrderID='".$_POST['Oid']."'";
    $mysql->runSql( $sql2 );
	$sql3="delete FROM `OrderBook` WHERE OrderID='".$_POST['Oid']."'";
    $mysql->runSql( $sql3 );




	$mysql->closeDb();
?>