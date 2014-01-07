<?php
include_once('jcart/jcart.php');
session_start();

if(!$_SESSION['id'])//如果用户的UID不存在的话，返回
	{
		if($_GET['in']=="order")
		{
		header('Location: ../main/login.php?ac=login&cf=uc&in=order');
		exit;
		}
		if($_GET['in']=="reply")
		{
		header('Location: ../main/login.php?ac=login&cf=uc&in=reply');
		exit;
		}
		else
		{
		header('Location: ../main/login.php?ac=login&cf=uc');
		exit;
	
		}
	}	

?>
<!DOCTYPE >
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>书擎网：用户中心</title>

<link rel="stylesheet" type="text/css" href="css/accordian.css" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/accordian.js"></script>

</head>
<body>
        <input type="hidden" name="hiddenorder" value="<?php if($_GET['ac']=='order'||$_GET['in']=='order')echo 'order';else if($_GET['ac']=='reply'||$_GET['in']=='reply')echo 'reply'; ?>" id="hiddenorder"/>
<div id="usermain">
<div id="usermainCtn">
     <div id="loadingdiv2"><a href="../main/index.php"><img src="../main/images/Hrbanner.jpg" alt="loading" border="0" /></a></div>

        <div id="accord">
        <ul class="container">
          <li class="menu">  
              <ul>
                <li class="button"><a href="mypage.php" class="green" id="mypp">我的主页 <span></span></a></li>          	
              </ul>         
          </li>
          <li class="menu">
              <ul>
                <li class="button"><a href="#" class="green" >公告评论 <span></span></a> </li>
                <li class="dropdown">
                    <ul>
                        <li><a href="allnews.php" id="allnews" >本站公告</a></li>
                        <li><a href="myreply.php" id="replyclick" >评论回复</a></li>
                    </ul>
                </li>
              </ul>      
          </li> 

          <li class="menu">  
              <ul>
                <li class="button"><a href="#" class="orange">我是买家 <span></span></a> </li>          	
                <li class="dropdown">
                    <ul>
                        <li><a href="order.php" id="orderclick" >已买到的书</a></li>
                        <li><a href="#">我喜欢的书</a></li>
                    </ul>
                </li>
              </ul>         
          </li>
          <li class="menu">    
              <ul>
                <li class="button"><a href="#" class="blue">我是卖家<span></span></a></li>
                <li class="dropdown">
                    <ul>
                        <li><a href="#">已卖出的书</a></li>
                        <li><a href="#">出售中的书</a></li>
                        <li><a href="#">仓库中的书</a></li>
                        <li><a href="#">上传新书</a></li>
                    </ul>
                </li>
              </ul>          
          </li>  
          <li class="menu">
              <ul>
                <li class="button"><a href="#" class="red">账号管理 <span></span></a></li>
                <li class="dropdown">
                    <ul>
                        <li><a href="#">安全设置</a></li>
                        <li><a href="#">基本信息</a></li>
                        <li><a href="address.php">收货地址</a></li>
                    </ul>
                </li>
              </ul>     
          </li>
      </ul>
      </div>
        <div id="frame">
        <div id="loading"><img src="../main/images/panelloading.gif" alt="loading"  style=" margin-top:170px;" /></div>
    <iframe src="mypage.php" width="800px;"  frameborder="0" ></iframe>
        </div>

  </div>
<div class="clear"></div>

</div>

</body>
</html>
