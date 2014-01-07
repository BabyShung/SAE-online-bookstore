<?php
define("INCLUDE_CHECK",1);
require '../bInfo/functions.php';
	session_name('adminLogin');
	// 设置session名称
	session_set_cookie_params(10*60);

	session_start();
if(!$_SESSION['adid'])//如果用户的UID不存在的话，返回
{
	die('<div style="text-align:center;font-family:Microsoft Yahei;">回话超时，请重新登录</div>');

}

$currentAva=getAvatar(0);	//获得的当前用户头像
//获取登录时间
$mysql=new SaeMysql();
$sql ="select Email,dt from Admin where AdminID='".$_SESSION['adid']."'";   
$data=$mysql->getLine($sql);
if(!$data)//如果data为空
{
	die('sorry!');
}

$power=$_SESSION['power'];
$mysql->closeDb();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" type="text/css" href="../ucenter/css/mypage.css" />
<link rel="stylesheet" type="text/css" href="../bInfo/buttons/buttons.css" />

</head>

<body>
<div id="container">
	<div class="forum">
    	<div class="forumContain">	
        	<div class="containleft">
            	<img src="../bInfo/<?php echo $currentAva;?>" width="180" height="180"  style="border:1px solid #e4e4e4;" />
            </div>
            <div class="containright">
            	<ul>
                	<li class="containfirstli">管理员：<?php echo $_SESSION['adusr']?></li>
                    <li><img src="../bInfo/images/<?php echo 'manW.jpg'?>" width="14" height="14" /><span style="margin-left:20px;"></span></li>
	     <li><div class="forumWeibo">登录邮箱：<?php echo $data['Email'];?></div></li>
                </ul>
            </div>
        </div>
         <div class="clear"></div>
         
         
      <div class="forumContain3">
       	<div class="forumdivv">我这次的登录时间：<?php echo waveTimeZ($data['dt']);?></div>
       	<div class="forumdivv"><?php if($power==0)echo '我拥有所有权限';else if($power==1)echo '我有书籍管理权限';else if($power==2)echo '我有用户管理权限';else if($power==3)echo '我有订单管理权限';else if($power==4) echo '我有公告管理权限';?></div>
        </div>
    </div>
</div>
</body>
</html>
