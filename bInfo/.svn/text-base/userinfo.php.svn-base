<?php

if(empty($_POST['userid'])) die("Sorry");

//返回用户信息
$mysql=new SaeMysql();
$sql ="select Avatar,gender,intro,weibo,province,city from Customer where CustomerID='".$_POST['userid']."'";   
$data=$mysql->getLine($sql);
if($data)//如果data不为空
{
	echo json_encode($data);
}
else	//avatar为null，即未赋值
	echo '{"errors":0}';

$mysql->closeDb();

?>