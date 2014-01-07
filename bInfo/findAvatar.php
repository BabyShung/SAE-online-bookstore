<?php

if(empty($_POST['uid'])) die("0");

$mysql=new SaeMysql();
$sql = "SELECT Avatar FROM Customer WHERE CustomerID='".$_POST['uid']."'";
$data=$mysql->getLine($sql);
if($data)//如果avatar不为空
{
	$a=$data['Avatar'];
	echo '{"avatar":'.json_encode($a).'}';
}
else	//avatar为null，即未赋值
	echo '{"errors":0}';

$mysql->closeDb();

?>