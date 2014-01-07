<?php

if(empty($_POST['mid'])) die("Sorry");

//公告表删除公告
$mysql=new SaeMysql();
$sql ="delete from Message where MessageID='".$_POST['mid']."'";   
$mysql->runSql($sql);


$mysql->closeDb();

?>