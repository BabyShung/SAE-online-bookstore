<?php
if(empty($_POST['uid'])) die("Sorry");
$uid=$_POST['uid'];//�û�ID
$mysql=new SaeMysql();
//����flag�ж����ⶳ���߶���Ĳ���
$sql ="update User set Freeze='".$_POST['flag']."' where UserID='".$uid."'";   
$mysql->runSql($sql);
$mysql->closeDb();
?>