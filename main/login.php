<?php
	include_once('jcart/jcart.php');
	session_start();
	if($_SESSION['id'])//如果用户的UID存在的话，回主页
	{
		header("Location: index.php");
		exit;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>欢迎来到华软软件学院书擎网</title>

<!--Stylesheets-->
<link rel="stylesheet" type="text/css" href="css/login.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/login.js"></script>

</head>

<body>
<input type="hidden" name="comefrom" value="<?php 
if($_GET['cf']=='co')echo 'checkout.php';
else if($_GET['cf']=='uc')
{
	if($_GET['in']=='order') echo 'user.php?ac=order';
	else if($_GET['in']=='reply') echo 'user.php?ac=reply';
	else echo 'user.php';
}
else if($_GET['act']=='admin')echo 'admin';
else echo 'index.php';
?>" id="comefrom"/>
<div id="vformoOK">
     <div id="loadingdiv2"><a href="../main/index.php"><img src="../main/images/Hrbanner.jpg" alt="loading" border="0" /></a></div>
	<div id="formheader2" >
	<?php if($_GET['ac']=='login')echo '抱歉，请您先登录：';else echo '欢迎来到书擎网'?>
  </div>
    
    
    <div id="regok">
    	
        <div id="WinLogin">
    <form class="smallwin" action="" method="post">
    <div id="WinLoginLeft">
    		<div id="errormessage"></div>
            <div class="WLDiv">
            <input type="text" value="您的登录邮箱" name="email"  id="smallwinEmail"  />
            </div>
            <div class="WLDiv" >
            <input type="text" value="请输入密码" id="texttmp"  name="nouse"    />
            <input type="password" value="" id="passwordtmp"  name="password" />
             </div>
            <div class="WLDiv">
            <input type="submit" value="登录" name="login" id="submit" class="button small orange" />
            <label style="margin-left:40px"><input id="rememberMe" type="checkbox"  name="rememberMe" checked="checked"  value="1" /> 
            &nbsp;下次自动登录</label>
             </div>
      </div>
        <div id="WinLoginRight">
          <p style="padding-bottom:4px">没有账号？</p>
          <p>赶快免费注册一个吧！</p>
          <div style=" padding-top:20px;"><a href="../reg/reg.php" class="button green medium">注册</a>
		</div>
        </div>
        </form>
</div>

        
    </div>
    <div class="footback"><a href="../main/index.php">&larr;返回首页</a></div>

    
    

</div>




</body>
</html>