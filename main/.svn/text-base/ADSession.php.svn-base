<?php
	session_name('adminLogin');
	// 设置session名称
	session_set_cookie_params(10*60);
	// 设置session的有效期为10mins
	session_start();

if(!empty($_POST['id']))
{
	$_SESSION['adid']=$_POST['id'];
	if(!empty($_POST['usr']))
		$_SESSION['adusr']=$_POST['usr'];
		$_SESSION['aStatus']=$_POST['aStatus'];
		$_SESSION['power']=$_POST['power'];

}
//if($_SESSION['id'] && !isset($_COOKIE['tzRemember']) && !$_SESSION['rememberMe'])
//{
	// If you are logged in, but you don't have the tzRemember cookie (browser restart)
	// and you have not checked the rememberMe checkbox:
//	$_SESSION = array();
//	session_destroy();	
	// 删除session
//}

?>