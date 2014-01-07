<?php
	session_name('adminLogin');
	// 设置session名称
	session_set_cookie_params(10*60);

	session_start();
	
if(isset($_GET['logoff'])) //logoff 
{
	$_SESSION = array();
	session_destroy();
	
	header("Location: ../main/login.php?act=admin");
	exit;
}
	

if(!$_SESSION['adid']||$_SESSION['aStatus']!=1)//如果用户的UID不存在的话，返回
	{

		header('Location: ../main/login.php?ac=login&act=admin');
		exit;
	

	}	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>书擎网：用户中心</title>

        <link rel="stylesheet" type="text/css" href="../main/css/jquery.qtip.min.css" />
        <link rel="stylesheet" type="text/css" href="../main/css/headerfix.css" />
<link rel="stylesheet" type="text/css" href="css/accordian.css" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="../main/js/jquery.qtip.min.js"></script>

<script type="text/javascript" src="js/accordian.js"></script>
<script type="text/javascript" src="js/headerfix.js"></script>
</head>
<body>
<div id="headerFix2">
	<div id="navigation2">
		<ul style="text-decoration:none;">      
        	<li class="fxx"><?php echo  '<div id="navigateWOa" style="border-left-width:0px;color: #F6A828;font-weight:bold;">您好，'.$_SESSION['adusr'].'</div>';?></li>
			<li class="fxx"><a class="subtitle" href="../main/index.php">首页</a></li>
            <li class="fxx"><a class="subtitle" href="<?php echo '?logoff=1' ;?>" >注销</a></li>      
		</ul>  
	</div>
</div>

<input type="hidden" name="hiddenorder" value="<?php if($_GET['ac']=='order'||$_GET['in']=='order')echo 'order'; ?>" id="hiddenorder"/>




<div id="usermain">
<div id="usermainCtn">
     <div id="loadingdiv2"><a href="../main/index.php"><img src="../main/images/Hrbanner.jpg" alt="loading" border="0" /></a></div>

        <div id="accord">
        <ul class="container">
          <li class="menu">  
              <ul>
                <li class="button"><a href="adminpage.php" class="green" id="mypp">我的主页 <span></span></a></li>          	
              </ul>         
          </li>
          <li class="menu">
              <ul>
                <li class="button"><a href="#" class="green">书库管理 <span></span></a> </li>
                <li class="dropdown">
                    <ul>
                        <li><a href="#" >查看书库</a></li>
                        <li><a href="adminInsert.php" >书籍入库</a></li>
                    </ul>
                </li>
              </ul>      
          </li> 

          <li class="menu">  
              <ul>
                <li class="button"><a href="#" class="orange">网站维护 <span></span></a> </li>          	
                <li class="dropdown">
                    <ul>
                        <li><a href="order.php" id="orderclick" >查看评论</a></li>
                        <li><a href="admincontrol.php">用户查询/控制</a></li>
                    </ul>
                </li>
              </ul>         
          </li>
          <li class="menu">    
              <ul>
                <li class="button"><a href="#" class="blue">订单管理<span></span></a></li>
                <li class="dropdown">
                    <ul>
                        <li><a href="adminOrder.php">查看订单</a></li>
                    </ul>
                </li>
              </ul>          
          </li>  
          <li class="menu">
              <ul>
                <li class="button"><a href="#" class="red">公告管理 <span></span></a></li>
                <li class="dropdown">
                    <ul>
                        <li><a href="adminnews.php" >查看公告</a></li>
                        <li><a href="adminPostNews.php">发布公告</a></li>
                    </ul>
                </li>
              </ul>     
          </li>
          
      </ul>
      </div>
        <div id="frame">
        <div id="loading"><img src="../main/images/panelloading.gif" alt="loading"  style=" margin-top:170px;" /></div>
    <iframe src="adminpage.php" width="800px;"  frameborder="0" ></iframe>
        </div>

  </div>
<div class="clear"></div>

</div>

</body>
</html>
