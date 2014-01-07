<?php
include_once('jcart/jcart.php');
session_start();

if(!$_SESSION['id'])//如果用户的UID不存在的话，返回
	{
		header('Location: login.php?ac=login');
		exit;

	}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>书擎网：支付成功</title>
<!--Stylesheets-->
<link rel="stylesheet" type="text/css" href="css/login.css" />
</head>
<body>
<div id="vformoOK">
     <div id="loadingdiv2"><a href="../main/index.php"><img src="../main/images/Hrbanner.jpg" alt="loading" border="0" /></a></div>
	<div id="formheader2" >
	支付成功
  </div>
    <div id="regok2">
      <p><img src="../bInfo/jcart/images/checkmark.png" alt="loading" />亲爱的<?php echo $_SESSION['usr'];?>，您的支付已生效。</p>
      <p><a target="_blank" href="../ucenter/user.php?ac=order">点击这里查看您的订单</a></p>
</div>
    <div class="footback"><a href="../main/index.php">&larr;返回首页</a></div>
</div>
</body>
</html>