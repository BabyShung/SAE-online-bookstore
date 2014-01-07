<?php

if(empty($_POST['category'])) die("Sorry");

//根据分类寻找书籍
$mysql=new SaeMysql();
$sql ="select BookID,imgName,Category,Bname,Author,SalePrice,Stock,Publisher from Bookq where Category='".$_POST['category']."'";   
$data=$mysql->getData($sql);
if($data)//如果data不为空
{
	echo json_encode($data);
}
else	//avatar为null，即未赋值
	echo '{"errors":0}';

$mysql->closeDb();

?>