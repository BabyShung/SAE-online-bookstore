<?php
define("INCLUDE_CHECK",1);
include_once('jcart/jcart.php');
require '../main/Session.php';
require 'functions.php';
// If your page calls session_start() be sure to include jcart.php first
$currentAva=getAvatar((int)$_SESSION['id']);	//获得的当前用户头像

$bid=$_GET['bid'];
$bname=$_GET['bn'];
//SAE------------------连接
$mysql=new SaeMysql();

//根据传过来的值输出书本内容
if(!$_GET['bn']||!$_GET['bid'])
{
	die('抱歉，您找的书籍不存在');	
}
else
{
 	 $sql8="SELECT * FROM Bookq where BookID='".$bid."'";
	$data8=$mysql->getLine($sql8);
	if(!$data8)//如果书籍不存在
	{
			die('您找的书籍不存在');
	}
	
}

//显示出版日期的函数
function waveTime2($t)
{
	$t = strtotime($t);

//	return date('F jS Y h:i A',$t);
	return date('Y年m月',$t);	
}


//用户评论
//$sql="DELETE FROM wave_comments WHERE id>5 AND dt<SUBTIME(NOW(),'0 1:0:0')";
// Removing comments that are older than an hour.

$sql2="SELECT * FROM BookComment where BookID='".$bid."'ORDER BY BCid ASC";
$data=$mysql->getData($sql2);
//准备所有评论的数据
$comments=array();
$js_history='';
if($data)
{
       foreach($data as $row)
      {
              if($row['parent']==0)
                      // If the comment is not a reply to a previous comment, put it into $comments directly
                      $comments[$row['BCid']] = $row;
              else
              {
                      if(!$comments[$row['parent']])
                      	continue;
                      
                      $comments[$row['parent']]['replies'][] = $row;
                      // If it is a reply, put it in the 'replies' property of its parent
              }
              $js_history.='addHistory({id:"'.$row['BCid'].'"});'.PHP_EOL;
              // Adds JS history for each comment
      }
}
$js_history='<script type="text/javascript">
'.$js_history.'
</script>';
// This is later put into the head and executed on page load
$mysql->closeDb();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>书擎网：<?php echo $data8['Bname']; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
          <!-- The CSS -->
        <link rel="stylesheet" type="text/css" href="../main/css/jquery.qtip.min.css" />
        <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/ui-lightness/jquery-ui.css" />
        <link rel="stylesheet" type="text/css" href="../main/css/headerfix.css" />
		<link rel="stylesheet" type="text/css" href="buttons/buttons.css" />
		<link rel="stylesheet" type="text/css" href="cloud-zoom/cloud-zoom.css" />
		<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.4.css" />
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" media="screen, projection" href="jcart/css/jcart.css" />
        <!-- The JavaScript -->
<style type="text/css">
.jgrowl{
    position: fixed;
	z-index:9050;
	_position:absolute;
	_top:expression(documentElement.scrollTop + 0 + "px");
	_left:expression(documentElement.scrollLeft + 0 + "px");
}
</style>
		
		<script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="../main/js/jquery.qtip.min.js"></script>
		<script type="text/javascript" src="fancybox/jquery.easing-1.3.pack.js"></script>
		<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.js"></script>
		<script type="text/javascript" src="cloud-zoom/cloud-zoom.1.0.2.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
		<script type="text/javascript" src="js/zoom.js"></script>
       	<script type="text/javascript" src="js/script.js"></script>
        <script type="text/javascript" src="js/headerfix.js"></script>
		<script type="text/javascript" src="jcart/js/jcart.js"></script>
        <script type="text/javascript" src="../main/js/news.js"></script>

		<?php echo $js_history; ?>
    </head>
    <body>
    <div id="headerFix2">
	<div id="navigation2">
		<ul style="text-decoration:none;">      
        	<li class="fxx"><?php echo $_SESSION['usr'] ? '<div id="navigateWOa" style="border-left-width:0px;color: #F6A828;font-weight:bold;">您好，'.$_SESSION['usr'].'</div>' : '<div id="navigateWOa" style="border-left-width:0px;color: #F6A828;font-weight:bold;">欢迎您</div>';?></li>
			<li class="fxx"><a class="subtitle" href="../main/index.php">首页</a></li>
			<li class="fxx">
				<a class="subtitle" href="#">我的书架<img src="../main/images/expanded.gif" style="border:0px; padding-left:4px; width:8px; height:8px;" /></a>
				<ul class="submenu">
					<li class="fxx"><a target="_blank" href="../ucenter/user.php?in=order">已买到的书</a></li>
					<li class="fxx"><a href="#">已卖出的书</a></li>
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
            <li class="fxx"><a class="subtitle" href="<?php echo $_SESSION['usr'] ? '?logoff=1&bid='.$bid.'&bn='.$bname : '../reg/reg.php';?>" ><?php echo $_SESSION['usr'] ? '退出' : '免费注册';?></a></li>
                  
		</ul>
        
	</div>
</div>
    
    
		<div class="wrapper">         
		  <div id="content" class="content">
         <div id="loadingdiv"><a href="../main/index.php"><img src="../main/images/Hrbanner.jpg" alt="loading" border="0" /></a></div>
              <div class="item">
                        <div id="Infohearderx">
                            <div id="IfContent">
                              <h1>《<?php echo $data8['Bname']; ?>》</h1>	
                          </div>
           	    </div>
                      	    <div id="cccontent">
                        <div class="thumb_wrapper">
                            <div class="thumb">
                                <ul>
                                    <li><a rev="group1" rel="zoomHeight:250, zoomWidth:250, adjustX: 10, adjustY:-4, position:'body'" class='cloud-zoom' href="../page1/img/<?php echo $data8['imgName']; ?>"><img src="../page1/img/<?php echo $data8['imgName']; ?>" width="140" height="180" alt="加载中"/></a></li>
                                </ul>
                            </div>
                          <span><img src="images/zoomer.jpg" height="10px" width="8px" style="padding:0px; margin:0px;"/> 点击放大</span>
                        </div>
                        <div class="description">
                        <div >
                            <table   style="table-layout:fixed; border:1px dashed #eee" id="LeftTable">
                                 <tr>
                                    <td style="width:75px;">价 格：</td>
                                    <td style="width:225px; color:#E96845"><?php echo $data8['SalePrice']; ?>元</td>

                                </tr>
                                 <tr>
                                    <td  >类 别：</td>
                                    <td ><?php echo $data8['Category']; ?></td>
                 
</tr>
                                 <tr>
                                    <td >作 者：</td>
                                    <td ><?php echo $data8['Author']; ?></td>
                   
</tr>
                                 <tr>
                                    <td  >出版商：</td>
                                    <td><?php echo $data8['Publisher']; ?></td>
               
</tr>   
                               <tr>
                                    <td>出版时间：</td>
                                    <td><?php echo waveTime2($data8['PTime']); ?></td>
                              
</tr>             
                          </table>
                          </div>
                           <div class="demopage" id="s1">
                          <!--holder end-->
                          <!--holder end-->
                          <!--holder end-->
                          <!--holder end-->
                          <div class="holder">
                            <div style="padding:5px 10px 5px 10px;">简介:</div>
                            <div id="pane4" class="scroll-pane">
                            <?php echo $data8['Description']; ?>
                            </div>
                          </div>
                          <!--holder end-->
                        </div>
						
                        </div>
<div class="clear"></div>
                            <div id="secondconitem">
                            	
                           	  <div id="seconditemleft">
                           

                           

                                </div>
                                <div id="tablesecond">
                                <form method="post" action="" class="jcart"  >
                                	 <table   id="tablesecondtable">
                                             <tr>
                                               <td style="width:45px;">购 买：</td>
                                               <td><input type="text" value="1" name="my-item-qty"  style="color:#666; width:40px; height:20px;"  />
                                                本</td>   
                                               <td style="padding-left:20px;" >（库存<?php echo $data8['AQuan']; ?>本）</td>
                                            </tr>
                                    </table>
                                            <div  id="seconditemdiv">
            
                                              <span style=" margin-right:20px;"><input type="button" name="my-add-buttonbn" id="buynow" value="立即购买" class="button orange medium"/></span>
                                                <span><input type="submit" name="my-add-button"  id="addcartx" value="加入购物车" class="button green medium" /></span>

                                            </div>
                                                <input type="hidden" name="my-item-id" value="<?php echo $bid; ?>" id="hiddenbid"/>
                                                <input type="hidden" name="my-item-name" value="<?php echo $data8['Bname']; ?>" />
                                                <input type="hidden" name="my-item-price" value="<?php echo $data8['SalePrice']; ?>" />
             <input type="hidden" name="my-item-img" value="<?php echo '../page1/img/'.$data8['imgName']; ?>" />
                                                <input type="hidden" name="my-item-url" value="<?php echo "http://".$_SERVER ['HTTP_HOST'].$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];?>" />

										</form></div>
                            </div>
                            
                        </div>
                        
                       
            </div>
             <div class="clear"></div>
					             <hr style="width:900px; margin:50px auto 20px auto; color:#eee;"/>
                                 
                                 
            <div id="wave">
        <div id="topBar"><span style="width:900px; margin:0px auto;">用户评论：</span></div>

        <div id="sliderContainer">
        	<div id="slider"></div>
            <div class="clear"></div>
        </div>
        <div id="commentArea">
<?php
if($data)
{
	foreach($comments as $c)
	{
		showComment($c);	
		// Showing each comment
	}
}
else
{
	echo '<div id="zwpl" style=" padding-left:40px;">暂无评论</div>';	
}
?>          
        </div>
        <?php echo $_SESSION['usr'] ? '<input type="button" class="button small green rounded" style="margin:5px 0 20px 25px;" value="我要评论" onclick="addComment()" />' : '<div style="padding:0 0 20px 50px;color:#E96845">您还没登录，登录后可评论。<a href="../reg/reg.php" style="color:#0390C3">注册？</a></div>'; ?><input type="hidden" name="hiddenbid" value="<?php echo $bid; ?>" id="hiddenbid"/>
        <div id="bottomBar">
        </div>
    </div>

                                 
       </div>
			
</div>


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
        <input type="hidden" name="hiddenuid" value="<?php if($_SESSION['id'])
echo $_SESSION['id']; ?>" id="hiddenuid"/>
        <input type="hidden" name="hiddenbname" value="<?php echo $bname; ?>" id="hiddenbname"/>
        <input type="hidden" name="hiddenusern" value="<?php if($_SESSION['usr'])
$usern=$_SESSION['usr'];echo $usern; ?>" id="hiddenusern"/>
        <input type="hidden" name="hiddenAva" value="<?php echo $currentAva; ?>" id="hiddenAva"/>
</div>







    </body>
</html>