<?php

if(empty($_POST['book'])) die("Sorry");

$mysql=new SaeMysql();
//$sql = "SELECT Avatar FROM Customer WHERE CustomerID='".$_POST['uid']."'";
$sql ="select BookID,imgName,Category,Bname,Author,SalePrice,Stock,Publisher from Bookq where Bname like '%".$_POST['book']."%'";   
$data=$mysql->getData($sql);
if($data)//如果data不为空
{
	echo json_encode($data);
}
else	//avatar为null，即未赋值
	echo '{"errors":0}';

$mysql->closeDb();

?>