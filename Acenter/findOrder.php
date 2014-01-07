<?php

if(empty($_POST['order'])) die("Sorry");
$order=$_POST['order'];


$mysql=new SaeMysql();

$sql ="select CustomerID,UserName from Order2 a,CustomerOrder b,User c where a.OrderID=b.OrderID and c.UserID=b.CustomerID and a.OrderID='".$order."'";   
$data=$mysql->getLine($sql);

$sql2 ="select * from Order2 where OrderID='".$order."'";   
$data2=$mysql->getLine($sql2);

//$sql3 ="select Quan,Bname,SalePrice from Order2 where OrderID='".$order."'";   
//$data3=$mysql->getLine($sql3);

if($data2)//如果data不为空
{
	 echo json_encode(array('OrderID'=>$data2['OrderID'],'State'=>$data2['State'],'Amount'=>$data2['Amount'],'dt'=>$data2['dt'],'UserName'=>$data['UserName'],'CustomerID'=>$data['CustomerID']));
}
else	//avatar为null，即未赋值
	echo '{"errors":0}';

$mysql->closeDb();

?>