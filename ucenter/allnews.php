<?php
define("INCLUDE_CHECK",1);
include_once('jcart/jcart.php');
session_start();
require '../bInfo/functions.php';

if(!$_SESSION['id'])//如果用户的UID不存在的话，返回
{
	die('回话超时，请重新登录');

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
<link rel="stylesheet" type="text/css" href="css/myreply.css" />
<link rel="stylesheet" type="text/css" href="../bInfo/css/demo.css" />
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
			showNews($c);	
		}
	}
?>
</div>
</body>
</html>
