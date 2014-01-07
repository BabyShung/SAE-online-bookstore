<?php
if(empty($_POST['uid'])) die("Sorry");
$uid=$_POST['uid'];//用户ID
$mysql=new SaeMysql();
//根据flag判断做解冻或者冻结的操作
$sql ="update User set Freeze='".$_POST['flag']."' where UserID='".$uid."'";   
$mysql->runSql($sql);
$mysql->closeDb();
?>