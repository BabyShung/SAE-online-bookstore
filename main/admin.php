<?php
	session_name('adminLogin');
	// 设置session名称
	session_set_cookie_params(10*60);

	session_start();

if(!$_SESSION['adid']||$_SESSION['aStatus']!=1)//如果管理员的UID不存在的话，返回
	{
		header('Location: ../main/login.php?ac=login&act=admin');
		exit;

	}
else //存在，转到Acenter的admin.php
{

		header('Location: ../Acenter/admin.php');
		exit;
}
?>
