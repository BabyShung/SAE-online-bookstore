<?php

if(empty($_POST['uid'])) die("0");

$mysql=new SaeMysql();
$sql = "SELECT Avatar FROM Customer WHERE CustomerID='".$_POST['uid']."'";
$data=$mysql->getLine($sql);
if($data)//���avatar��Ϊ��
{
	$a=$data['Avatar'];
	echo '{"avatar":'.json_encode($a).'}';
}
else	//avatarΪnull����δ��ֵ
	echo '{"errors":0}';

$mysql->closeDb();

?>