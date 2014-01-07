<?php
	session_name('adminLogin');
	// 设置session名称
	session_set_cookie_params(30*60);
	// 设置session的有效期为10mins
	session_start();

if(!$_SESSION['adid'])//如果用户的UID不存在的话，返回
{
	die('<div style="text-align:center;font-family:Microsoft Yahei;">回话超时，请重新登录</div>');
}
else if($_SESSION['power']!=0&&$_SESSION['power']!=2)
{
	die('<div style="text-align:center;color:#990000;font-family:Microsoft Yahei;">抱歉，您没有用户管理的权限</div>');
}
?>	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" type="text/css" href="../bInfo/buttons/buttons.css" />
<link rel="stylesheet" type="text/css" href="../ucenter/jquery.confirm/jquery.confirm.css" />
<link rel="stylesheet" type="text/css" href="css/adcontrol.css" />
<script src="js/jquery.min.js"></script>
<script src="../ucenter/jquery.confirm/jquery.confirm.js"></script>
<script src="js/searchuser.js"></script>
</head>
<body>
<div id="container">
        <div style="padding-bottom:5px;" id="searchdiv">
                    <form id="searchForm" method="get">
                            <div class="searchbox">
                            <div id="inputbox">
                            <input type="text" name="booksuggest" value="请输入用户名" class="birds" id="booksuggest" />
                            <div id='suggest2' class="ac_results"></div>
                            </div>
                            <input type="submit" value="搜索" id="submitButton" />
                            </div>
                   </form> 
        </div>
<div id="resultsDiv"></div>

</div>
</body>
</html>
