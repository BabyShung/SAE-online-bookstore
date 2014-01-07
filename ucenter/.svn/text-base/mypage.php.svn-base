<?php
define("INCLUDE_CHECK",1);
require '../bInfo/functions.php';
include_once('jcart/jcart.php');
session_start();
if(!$_SESSION['id'])//如果用户的UID不存在的话，返回
die('sorry');

$currentAva=getAvatar((int)$_SESSION['id']);	//获得的当前用户头像
//返回用户信息
$mysql=new SaeMysql();
$sql ="select gender,intro,weibo,province,city,Grade from Customer where CustomerID='".$_SESSION['id']."'";   
$data=$mysql->getLine($sql);
//用户上次登录时间
$sql2 ="select lasttime from User where UserID='".$_SESSION['id']."'";   
$data2=$mysql->getVar($sql2);
//用户的订单信息
$sql3 ="select count(*) from Customer a,Order2 b,CustomerOrder c where a.CustomerID=c.CustomerID and b.OrderID=c.OrderID and  a.CustomerID='".$_SESSION['id']."'";   
$data3=$mysql->getVar($sql3);

//用户的订单信息
$sql4 ="select count(*) from Customer a,Order2 b,CustomerOrder c where a.CustomerID=c.CustomerID and b.OrderID=c.OrderID and  a.CustomerID='".$_SESSION['id']."' and b.State='已支付'";   
$data4=$mysql->getVar($sql4);

if(!$data)//如果data为空
{
	die('sorry!');
}
$mysql->closeDb();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" type="text/css" href="css/mypage.css" />
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
                	<li class="containfirstli"><?php echo $_SESSION['usr']?></li>
                    <li><img src="../bInfo/images/<?php if($data['gender']=="男")echo 'manW.jpg';else echo 'womanW.jpg';?>" width="14" height="14" /><span style="margin-left:20px;"><?php echo $data['province'];?></span><span style="margin-left:10px;"><?php echo $data['city'];?></span></li>
	     <li><div class="forumWeibo"><?php if($data['weibo'])echo '微博：<a href='.$data['weibo'].' target="_blank">'.$data['weibo'].'<a/>';?></div></li>
                    <li><div class="forumIntro"><?php if($data['intro'])echo '简介：'.$data['intro'];?></div></li>
                </ul>
            </div>
        </div>
        <div class="clear"></div>
      <div class="forumContain2">
       	<div class="forumdivv">我上次的登录时间：<?php echo waveTimeZ($data2);?></div>
       	<div class="forumdivv">我一共有<?php echo $data3;?>份订单，其中<span style="color:#C92606"><?php echo $data4;?></span>份已支付，<?php echo $data3-$data4;?>份未支付</div>
       	<div class="forumdivv">我的等级：
			<?php 
            for($i=0;$i<$data['Grade'];$i++)
            {
                echo '<img src="../bInfo/images/heart.png" width="20px" height="15px" />';
            }?>
           （<?php echo $data['Grade'];?>级）
        </div>
        </div>
    </div>
</div>
</body>
</html>
