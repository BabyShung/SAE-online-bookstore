<?php
if($_POST['hiddenuid'])
{
		$mysql = new SaeMysql();
		$_POST['hiddenprovince'] = $mysql->escape($_POST['hiddenprovince']);//ʡ
		$_POST['hiddencity'] = $mysql->escape($_POST['hiddencity']);//��
		$_POST['hiddendis'] = $mysql->escape($_POST['hiddendis']);//��
		$_POST['postcode'] = $mysql->escape($_POST['postcode']);  //postcode
		$_POST['address'] = $mysql->escape($_POST['address']);//street
		$_POST['receiver'] = $mysql->escape($_POST['receiver']);//receiver's name
		$_POST['tel'] = $mysql->escape($_POST['tel']);//receiver's tel
		$_POST['hiddenuid'] = $mysql->escape($_POST['hiddenuid']);//Uid

		$sql="	INSERT INTO Address(CustomerID,Receiver,province,city,county,Tel,address,postcode)
						VALUES(
							'".$_POST['hiddenuid']."',
							'".$_POST['receiver']."',
							'".$_POST['hiddenprovince']."',
							'".$_POST['hiddencity']."',
							'".$_POST['hiddendis']."',
							'".$_POST['tel']."',
							'".$_POST['address']."',
							'".$_POST['postcode']."'
						)";
		//ִ��
		$mysql->runSql($sql);				
		$mysql->closeDb();

		  	header("Location:checkout.php");
		    exit();

}
else
{
	die('sorry');
}
?>