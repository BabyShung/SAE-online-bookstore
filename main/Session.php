<?php
	session_name('tzLogin');
	// 设置session名称
	session_set_cookie_params(60*60);
	// 设置session的有效期为1小时
	session_start();

if(!empty($_POST['id']))
{
	$_SESSION['id']=$_POST['id'];
	if(!empty($_POST['usr']))
		$_SESSION['usr']=$_POST['usr'];
		$_SESSION['rememberMe']=$_POST['rememberMe'];
		setcookie('tzRemember',$_POST['rememberMe']);
}
if($_SESSION['id'] && !isset($_COOKIE['tzRemember']) && !$_SESSION['rememberMe'])
{
	// If you are logged in, but you don't have the tzRemember cookie (browser restart)
	// and you have not checked the rememberMe checkbox:
	$_SESSION = array();
	session_destroy();	
	// 删除session
}


//注销----index.php
if(isset($_GET['logoff'])&&isset($_GET['bid'])&&isset($_GET['bn']))
{
	$_SESSION = array();
	session_destroy();
	
	header('Location: index.php?bid='.$_GET['bid'].'&bn='.$_GET['bn']);
	exit;
}
else if(isset($_GET['logoff'])) //logoff in main/index.php
{
	$_SESSION = array();
	session_destroy();
	
	header("Location: index.php");
	exit;
}
?>