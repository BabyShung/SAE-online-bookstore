<?php

if(empty($_POST['category'])) die("Sorry");

//���ݷ���Ѱ���鼮
$mysql=new SaeMysql();
$sql ="select BookID,imgName,Category,Bname,Author,SalePrice,Stock,Publisher from Bookq where Category='".$_POST['category']."'";   
$data=$mysql->getData($sql);
if($data)//���data��Ϊ��
{
	echo json_encode($data);
}
else	//avatarΪnull����δ��ֵ
	echo '{"errors":0}';

$mysql->closeDb();

?>