<?php

if(empty($_POST['user'])) die("Sorry");
$user=$_POST['user'];


$mysql=new SaeMysql();

$sql ="select CustomerID,UserName,Freeze,lasttime,Avatar,gender,province,city from User a,Customer b where a.UserID=b.CustomerID and UserName like '%".$user."%'";   
$data=$mysql->getData($sql);
if($data)//如果data不为空
{
	echo json_encode($data);
}
else	//avatar为null，即未赋值
	echo '{"errors":0}';

$mysql->closeDb();

?>