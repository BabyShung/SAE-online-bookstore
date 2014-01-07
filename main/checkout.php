<?php
include_once('../bInfo/jcart/jcart.php');
session_start();

if(!$_SESSION['id'])//如果用户的UID不存在的话，返回
	{
		header('Location: ../main/login.php?ac=login&cf=co');
		exit;

	}
else //存在，转到bInfo的checkout
{
		header('Location: ../bInfo/checkout.php');
		exit;

}
?>
