<?php
define("INCLUDE_CHECK",1);
include_once('jcart/jcart.php');
session_start();
require '../bInfo/functions.php';

if(!$_SESSION['id'])//如果用户的UID不存在的话，返回
{
	die('回话超时，请重新登录');

}
$currentAva=getAvatar((int)$_SESSION['id']);	//获得的当前用户头像

    $mysql = new SaeMysql();  
	//提取Reply表未被读的回复
    $sql = "select * from Reply where ToID='".$_SESSION['id']."' and HasRead='0' order by dt desc";
    $data = $mysql->getData( $sql );
	//提取Reply表已经被读的回复
    $sql4 = "select * from Reply where ToID='".$_SESSION['id']."' and HasRead='1' order by dt desc";
    $data4 = $mysql->getData( $sql4 );
	//提取有多少条评论
	$sql2="select count(*) from Reply where ToID='".$_SESSION['id']."'";
	$count=$mysql->getVar( $sql2 );
	//更新reply,使新评论不再显示
    $sql3 = "update Reply set HasRead='1' where HasRead='0' and ToID='".$_SESSION['id']."'";
    $mysql->runSql( $sql3 );

?>	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" type="text/css" href="../main/css/jquery.qtip.min.css" />
<link rel="stylesheet" type="text/css" href="../bInfo/buttons/buttons.css" />
<link rel="stylesheet" type="text/css" href="css/myreply.css" />
<link rel="stylesheet" type="text/css" href="css/demo.css" />
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="../main/js/jquery.qtip.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>

</head>
<body>
<div id="container">
<div style="padding-bottom:5px;">收到回复如下：</div>
<div style="padding-bottom:5px;">共<?php echo $count;?>条</div>

<?php
	if($data)
	{
		foreach($data as $c)
		{
			showReplyNew($c,$_SESSION['usr'],$_SESSION['id']);	
		}
	}
	if($data4)
	{
		foreach($data4 as $c)
		{
			showReply($c,$_SESSION['usr'],$_SESSION['id']);	
		}
	}
?>
<input type="hidden" name="hiddenuid" value="<?php if($_SESSION['id'])
echo $_SESSION['id']; ?>" id="hiddenuid"/>
        <input type="hidden" name="hiddenusern" value="<?php if($_SESSION['usr'])
$usern=$_SESSION['usr'];echo $usern; ?>" id="hiddenusern"/>
        <input type="hidden" name="hiddenAva" value="<?php echo $currentAva; ?>" id="hiddenAva"/>

</div>
</body>
</html>
