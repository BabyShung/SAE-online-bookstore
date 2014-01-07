<?php

define("INCLUDE_CHECK",1);
if(empty($_POST['comment'])) die("0");
// If there isn't a comment text, exit

//SAE--------
$mysql=new SaeMysql();


$comment = $mysql->escape(nl2br(strip_tags($_POST['comment'])));
$user=$mysql->escape($_POST['usern']); //session Username
$toid=(int)$_POST['toid'];
$parent=(int)$_POST['parent'];
$res=(int)$_POST['reid'];
$bkkid=(int)$_POST['bid'];
$uid=(int)$_POST['uid'];//session Uid

if($parent==0)//此消息是父贴
{
	$sql="INSERT INTO BookComment SET BookID='".$bkkid."',UserID='".$uid."',usr='".$user."',respond='".$res."', comment='".$comment."', dt=NOW(), parent='".$parent."'";
	$data=$mysql->runSql($sql);
}
else//此消息是子贴
{

	$sql="INSERT INTO BookComment SET BookID='".$bkkid."',UserID='".$uid."',usr='".$user."',respond='".$res."', comment='".$comment."', dt=NOW(), parent='".$parent."'";
	$mysql->runSql($sql);
	$HisBCid=$mysql->lastId($link);

	$sql2="INSERT INTO Reply SET HisBCid='".$HisBCid."',BCid='".$res."',BookID='".$bkkid."',FromID='".$uid."',usr='".$user."',ToID='".$toid."', comment='".$comment."'";
	$mysql->runSql($sql2);

}


if($HisBCid)
	echo $HisBCid;
else
	echo '0';
$mysql->closeDb();
?>