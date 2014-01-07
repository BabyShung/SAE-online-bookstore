<?php
include_once('../bInfo/jcart/jcart.php');
session_start();

if(!$_SESSION['id'])//如果用户的UID不存在的话，返回
	{
		header('Location: ../main/login.php?ac=login&cf=uc');
		exit;

	}
else //存在，转到ucenter的user.php
{
	if($_GET['ac']=='order')
	{
		header('Location: ../ucenter/user.php?ac=order');
		exit;
	}	
	if($_GET['ac']=='reply')
	{
		header('Location: ../ucenter/user.php?ac=reply');
		exit;
	}	

	else	
	{
		header('Location: ../ucenter/user.php');
		exit;
	}

}
?>
