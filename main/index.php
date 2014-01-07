<?php
	if($_GET['booksuggest'])
	{
		header('Location: ../Gsearch/search.php?bn='.$_GET['booksuggest']);
		exit;

	}
	include_once('../bInfo/jcart/jcart.php');
  	require 'Session.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>华软软件学院书擎网</title>
<!--Stylesheets-->
<link rel="stylesheet" type="text/css" href="css/jquery.qtip.min.css" />
<link rel="stylesheet" type="text/css" href="css/headerfix.css" />
<link rel="stylesheet" type="text/css" href="css/menu.css" />
  <link rel="stylesheet" type="text/css" media="screen, projection" href="../bInfo/jcart/css/jcart.css" />

<!--JavaScript-->
<script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.qtip.min.js"></script>
<script type="text/javascript" src="js/j.suggest.js"></script>
<script type="text/javascript" src="js/menu.js"></script>
<script type="text/javascript" src="../bInfo/jcart/js/jcart.js"></script>
<script type="text/javascript" src="js/news.js"></script>

<script type="text/javascript">
$(function(){
		
	//suggest应用
	$.ajax({
						   url: "getbook.php",
				   		   dataType: 'json',
						   success: function(msg){
							  		 var data=new Array();
									//返回的JSON再转化成数组
									$.each(msg, function(i){
											data[i]=new Array(msg[i].BookListID,msg[i].Bname,msg[i].Bpinyin,msg[i].Bsuoxie);
									});
											$("#booksuggest").suggest(data,{attachObject:"#suggest2"});
					//$("#arrcity").suggest(data,{onSelect:function(){$("#city2").click();},attachObject:'#suggest'});	
			}});
});
</script>
<style type="text/css">
.jgrowl{
    position: fixed;
	z-index:9050;
	_position:absolute;
	_top:expression(documentElement.scrollTop + 0 + "px");
	_left:expression(documentElement.scrollLeft + 0 + "px");
}
</style>
</head>

<body >
    <div id="headerFix2">
	<div id="navigation2">
		<ul style="text-decoration:none;">      
        	<li class="fxx"><?php echo $_SESSION['usr'] ? '<div id="navigateWOa" style="border-left-width:0px;color: #F6A828;font-weight:bold;">您好，'.$_SESSION['usr'].'</div>' : '<div id="navigateWOa" style="border-left-width:0px;color: #F6A828;font-weight:bold;">欢迎您</div>';?></li>
			<li class="fxx">
				<a class="subtitle" href="#">我的书架<img src="../main/images/expanded.gif" style="border:0px; padding-left:4px; width:8px; height:8px;" /></a>
				<ul class="submenu">
					<li class="fxx"><a  target="_blank" href="../ucenter/user.php?in=order">已买到的书</a></li>
					<li class="fxx"><a  href="#">已卖出的书</a></li>
				</ul>
			</li>
			<li class="fxx"><a class="subtitle" href="#">购物车<img src="../main/images/expanded.gif" style="border:0px; padding-left:4px; width:8px; height:8px;" /></a>
            					<ul class="submenu2">
					<li><div id="jcart" style="width:350px; color:#424444;"><?php $jcart->display_cart();?></div>
</li>
				</ul>
            </li>
            			<li class="fxx" id="newswrap"><a class="subtitle" id="news">公告</a></li>
			<li class="fxx"><?php echo $_SESSION['usr'] ? '<a class="subtitle" target="_blank" href="../ucenter/user.php">用户中心</a>' : '<a class="subtitle" href="#" id="loginBtn">登录</a>';?></li>
            <li class="fxx"><a class="subtitle" href="<?php echo $_SESSION['usr'] ? '?logoff=1' : '../reg/reg.php';?>" ><?php echo $_SESSION['usr'] ? '退出' : '免费注册';?></a></li>
                  
		</ul>
        
	</div>
</div>


<div id="rounded">
	<div id="main" class="container">
         <div id="loadingdiv"><a href="index.php"><img src="../main/images/Hrbanner.jpg" alt="loading" border="0" /></a></div>
    		 <div id="tabdiv">
                        <ul id="navigation">
                        <li><a href="#page1" id="page1">供应书</a></li>
                        <li><a href="#page2">二手书籍</a></li>
                        <li><a href="#page3">自由交易</a></li>
                        <li>
                         <form method="get" action="" name="searchForm" id="searchformx">
                            <div class="searchbox">
                                <div id="inputbox">
                             	   <input type="text" name="booksuggest" value="请输入书名" class="birds" id="booksuggest" />
                                   <div id='suggest2' class="ac_results">
                                   </div>
                                 </div>
                             	   <input type="submit" id="searchsubmit" value="搜 索" name="" class="sreachbtn" />
                         		 </div><!--searchbox end-->
                            </form>
                        </li>
                    </ul>
	  </div>
    <div class="clear"></div>
    
    
    <div id="pageContent">
    <iframe src="../page1/page1.php" width="930px;" height="1015px;" frameborder="0" ></iframe>
    </div>
    <div id="footer">
      <p>广州大学华软软件学院</p>
      <p>South China Institute of Software Engineering,Guangzhou University</p>
      <p>Copyright © 2012 SISE</p>
    </div>
</div>
    
    
    <div class="clear"></div>
</div>


<div style="height:300px;"></div>


<!-- hidden form for jQuery-->
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
        <input type="hidden" name="hiddenuid" value="<?php if($_SESSION['id'])
echo $_SESSION['id']; ?>" id="hiddenuid"/>


</body>
</html>