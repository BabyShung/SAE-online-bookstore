<?php
define("INCLUDE_CHECK",1);
	session_name('adminLogin');
	// 设置session名称
	session_set_cookie_params(10*60);
	// 设置session的有效期为10mins
	session_start();
require '../bInfo/functions.php';

if(!$_SESSION['adid'])//如果用户的UID不存在的话，返回
{
	die('<div style="text-align:center;font-family:Microsoft Yahei;">回话超时，请重新登录</div>');

}

    $mysql = new SaeMysql();  
	//提取Message表
    $sql = "select * from Message order by dt desc";
    $data = $mysql->getData( $sql );
	//提取有多少条评论
	$sql2="select count(*) from Message";
	$count=$mysql->getVar( $sql2 );
?>	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" type="text/css" href="../bInfo/buttons/buttons.css" />
<link rel="stylesheet" type="text/css" href="../ucenter/jquery.confirm/jquery.confirm.css" />
<link rel="stylesheet" type="text/css" href="../ucenter/css/myreply.css" />
<link rel="stylesheet" type="text/css" href="../bInfo/css/demo.css" />
<script src="js/jquery.min.js"></script>
<script src="../ucenter/jquery.confirm/jquery.confirm.js"></script>
<script src="js/confirmdltNews.js"></script>
</head>
<body>
<div id="container">
<div style="padding-bottom:5px;">网站公告</div>
<div style="padding-bottom:5px;">共<?php echo $count;?>条</div>

<?php
	if($data)
	{
		foreach($data as $c)
		{
			showNewsAd($c);	
		}
	}
?>
</div>
</body>
</html>
