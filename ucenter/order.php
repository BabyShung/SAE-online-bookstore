<?php
include_once('jcart/jcart.php');
session_start();
if(!$_SESSION['id'])//如果用户的UID不存在的话，返回
{
	die('回话超时，请重新登录');

}

    $mysql = new SaeMysql();  
	//一个用户有多少张订单表
    $sql = "select * from Customer a,Order2 b,CustomerOrder c where a.CustomerID=c.CustomerID and b.OrderID=c.OrderID and  a.CustomerID='".$_SESSION['id']."' order by b.dt desc";
    $data = $mysql->getData( $sql );


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" type="text/css" href="../bInfo/buttons/buttons.css" />
<link rel="stylesheet" type="text/css" href="jquery.confirm/jquery.confirm.css" />
<link rel="stylesheet" type="text/css" href="css/order.css" />
<script src="js/jquery.min.js"></script>
<script src="jquery.confirm/jquery.confirm.js"></script>
<script src="js/confirmscript.js"></script>
</head>
<body>
<div id="container">
<div style="padding-bottom:5px;">您的订单信息如下：</div>
<div id="allhearder"><span style="margin-left:100px;">书籍</span><span style="margin-left:230px;">单价</span><span style="margin-left:10px;">数量</span><span style="margin-left:45px;">总价（元）</span><span style="margin-left:10px;">交易状态</span><span style="margin-left:25px;">交易操作</span><span style="margin-left:20px;">其他操作</span></div>
                         <?php
                         if($data)//如果存在订单，开始输出
   						 {			
								 $mysql2 = new SaeMysql();
                                // Looping 2 :
                                foreach($data as $order)
                                {
									 //一张订单有多少个item
									$sql2 = "select * from Bookq a,Order2 b,OrderBook c where a.BookID=c.BookID and b.OrderID=c.OrderID and  b.OrderID ='".$order['OrderID']."'";
								    $data2 = $mysql2->getData( $sql2 );
									
									
									
									
									if($data2)//存在item,输出
   								    {
										if($order['State']=="未付款")
										{
										echo '<form class="orderform" action="gateexpress.php" method="post" target="_parent">';
										echo '<div class="ocontain" rel='.$order['OrderID'].'>
													<div class="oheader">
														<span style="margin-right:50px;">订单号：'.$order['OrderID'].'</span>
														<span>下单时间：'.$order['dt'].'</span>	
													</div>
											<div style="width:100%;	border-top:1px solid #e4e4e4;">
											   <table style="width:100%;"><tr><td style="width:60%;">';
                                    	foreach($data2 as $binfo)
										{
                     echo '<div style="padding:5px 0 5px 15px;"><div style="float:left;">

				<a target="_blank" href="../bInfo/index.php?bid='.$binfo['BookID'].'&bn='.urlencode($binfo['Bname']).'">
				<img  src="../page1/img/'.$binfo['imgName'].'" alt="'.$binfo['Bname'].'" width="35px" height="50px" border="0" id="bann" />
				</a>
						   </div>
								
						<div class="downrightX">
		<a target="_blank" href="../bInfo/index.php?bid='.$binfo['BookID'].'&bn='.urlencode($binfo['Bname']).'">'.$binfo['Bname'].'
		</a>
						</div>
						<div class="downright">'.$binfo['SalePrice'].'</div>
						<div class="downright">'.$binfo['Quan'].'</div>
						</div>
						<div class="clear"></div>
						';
										}
										echo '</td>';   
										                                         
        echo '<td class="tdd">'.$order['Amount'].'</td>';
		echo '<td class="tdd" id="Pstate">'.$order['State'].'</td>';
		echo '<td class="tdd2"><input type="submit" name="addrsubmit" value="前往付款" class="button small green rounded" style="font-size:12px;"/></td>';
		echo '<td class="tdd" id="delete"><a>删除</a></td>';                                      	
										echo '</tr>'; 
										echo '</table>'; 
										echo '</div>';
										echo '<div class="clear"></div>';
										echo '<input type="hidden" name="hiddenoid" value="'.$order['OrderID'].'" id="hiddenoid"/>';

                                        echo '</div>';                                       
                                        echo '</form>';                                       

										}
										else
										{
										echo '<div class="ocontain" rel='.$order['OrderID'].'>
													<div class="oheader">
														<span style="margin-right:50px;">订单号：'.$order['OrderID'].'</span>
														<span>下单时间：'.$order['dt'].'</span>	
													</div>
											<div style="width:100%;	border-top:1px solid #e4e4e4;">
											   <table style="width:100%;"><tr><td style="width:60%;">';
                                    	foreach($data2 as $binfo)
										{
                     echo '<div style="padding:5px 0 5px 15px;"><div style="float:left;">

				<a target="_blank" href="../bInfo/index.php?bid='.$binfo['BookID'].'&bn='.urlencode($binfo['Bname']).'">
				<img  src="../page1/img/'.$binfo['imgName'].'" alt="'.$binfo['Bname'].'" width="35px" height="50px" border="0" id="bann" />
				</a>
						   </div>
								
						<div class="downrightX">
		<a target="_blank" href="../bInfo/index.php?bid='.$binfo['BookID'].'&bn='.urlencode($binfo['Bname']).'">'.$binfo['Bname'].'
		</a>
						</div>
						<div class="downright">'.$binfo['SalePrice'].'</div>
						<div class="downright">'.$binfo['Quan'].'</div>
						</div>
						<div class="clear"></div>
						';
										}
										echo '</td>';   
										                                         
        echo '<td class="tdd">'.$order['Amount'].'</td>';
		echo '<td class="tdd" id="Pstate">'.$order['State'].'</td>';
		echo '<td class="tdd2"><input type="button" name="obutton" value="确认收货" class="button small blue rounded" style="font-size:12px;"/></td>';
		echo '<td class="tdd"><a>评价</a></td>';                                      	
										echo '</tr>'; 
										echo '</table>'; 
										echo '</div>';
										echo '<div class="clear"></div>';
                                        echo '</div>';                                       
										}
									}
                                }
                        }
						else//无订单
						echo '<div style="text-align:center;padding-top:30px;font-size:16px;color:#D22F07;">您还没有任何订单</div>'
                        ?>

</div>
</body>
</html>
