<?php
//require('addaddr.php');//添加地址
include_once('getaddr.php');//读取地址
if(!$_SESSION['id'])//如果用户的UID不存在的话，返回
	{
		header('Location: ../main/login.php?ac=login&cf=co');
		exit;

	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>我的购物车</title>
        <link rel="stylesheet" type="text/css" href="../main/css/jquery.qtip.min.css" />
        <link rel="stylesheet" type="text/css" href="buttons/buttons.css" />
		<link rel="stylesheet" type="text/css" media="screen, projection" href="jcart/css/jcart.css" />
        <link rel="stylesheet" type="text/css" href="css/addaddr.css" />

	<style type="text/css">
	*{
    margin: 0;
    padding: 0;
}
body{
	font-family:Microsoft Yahei,"微软雅黑";
	margin:30px 0 50px 0;
	font-size:13px;
	background-color:#9EDFE8;
}
#wrapper{
	margin:0 auto;
	background-color:#FFFFFF;
	padding:10px 50px 20px 50px;
	width:900px;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
	border:1px solid #F4F3F3;
	box-shadow: 6px 8px 7px rgba(0, 0, 0, 0.74);
    -moz-box-shadow: 6px 8px 7px rgba(0, 0, 0, 0.74);
    -webkit-box-shadow: 6px 8px 7px rgba(0, 0, 0, 0.74);
}
#header{
	height:35px;
	background-color:#EFAD37;
	padding:10px 0 0 15px;
	-webkit-border-radius: 15px;
	-moz-border-radius: 15px;
	border-radius: 15px;
	margin-bottom:30px;
}
#jcart td{
	font-size:14px;
}
#jcart th {
	background-color:#FFF;
	}
	</style>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="../main/js/jquery.qtip.min.js"></script>
		<script type="text/javascript" src="jcart/js/jcart.js"></script>
        <script type="text/javascript" src="../reg/js/Validform.js"></script>
        <script type="text/javascript" src="../reg/js/location.js"></script>
	 	<script type="text/javascript" src="../reg/js/YlChinaArea.js"></script>
                <script type="text/javascript" src="js/checkout.js"></script>
	</head>
    
    
    
	<body>
   <form method='post' action='jcart/gateway.php' class='topaypal' name='myform'>
      <input type="hidden" name="hiddenuid" value="<?php echo $_SESSION['id']; ?>" id="hiddenuid"/>
		<div id="wrapper">
         <div id="loadingdiv"><a href="../main/index.php"><img src="../main/images/Hrbanner.jpg" alt="loading" border="0" /></a></div>
                    	<div id="header"><span id="confirm">确认收货地址</span><span style="float:right; padding-right:20px;" class="headback"><a href="#"  >管理收货地址</a></span></div>
			<div id="address">
				<div id="addrcontent">
                <ul>
                <?php
				if($data)//如果data不为空
				{
					$count=1;
					foreach($data as $row)
					{
						echo '<li style="padding-bottom:10px;font-size:16px;" rel="'.$row['Aid'].'"><input type="radio" value="'.$row['Aid'].'" name="addradio" id="addradio" style="margin-right:7px;" />'.$count.'.'.$row['province'].$row['city'].$row['county'].$row['address'].'&nbsp&nbsp&nbsp&nbsp收货人：'.$row['Receiver'].'</li>';	
						$count++;
					}
				}
				else	//无地址
					echo '<div style="text-align:center;color:#E96845;font-size:18px;" id="noaddr">您还没有收货地址，添加后才能付款</div>';
                ?>
                </ul>
                <div style="margin-top:20px; text-align:center;"><a href="#" class="button small green rounded" id="addrr">添加新地址</a></div>
				</div>
			</div>
        	<div id="header">
        	  <span id="confirm">请核对订单信息</span></div>
			<div id="content">
				<div id="jcart"><?php $jcart->display_cart2();?></div>
			</div>
            <div  class="footback"><a href="../main/index.php">&larr;返回首页</a></div>
			<div class="clear"></div>
		</div>
		</form>
        
        


    
    <form class="addressform" action="addaddr.php" method="post">
    <table   style="table-layout:fixed;" id="LeftTable">
                <tr>
                    <td class="need" style="width:10px;">*</td>
                    <td style="width:100px;">地址：</td>
                    <td class="ChinaArea"style="width:250px;">
           
          <select id="province" name="province"  datatype="select" errormsg="请选择省份！" style="width: 75px;"><option value="">请选择</option></select>
          <select id="city" name="city" datatype="select"  style="width: 80px;"></select>
          <select id="county"  name="county" style="width: 80px;"> </select>
    	<input type="hidden" name="hiddenprovince" value="" id="hiddenprovince"/>
        <input type="hidden" name="hiddencity" value="" id="hiddencity"/>
        <input type="hidden" name="hiddendis" value="" id="hiddendis"/>
        <input type="hidden" name="hiddenuid" value="<?php echo $_SESSION['id'];?>" id="hiddenuid"/>
                </td>
                    <td><div class="Validform_checktip"></div></td>
                </tr>
                <tr>
                    <td class="need">*</td>
                    <td>邮政编码：</td>
                    <td><input type="text" value="" name="postcode"  class="inputxt" datatype="p"  nullmsg="请输入邮政编码" errormsg="请输入6位数字" id="postcode" /></td>
                    <td><div class="Validform_checktip"></div></td>
                </tr>
                <tr>
                    <td class="need">*</td>
                    <td>街道地址：</td>
                    <td><textarea class="textArea" rows="3" cols="30" name="address" datatype="*" nullmsg="请输入街道地址" /></textarea></td>
                    <td><div class="Validform_checktip"></div></td>
                </tr>
                <tr>
                    <td class="need">*</td>
                    <td>收货人：</td>
                    <td><input type="text" value="" name="receiver"  class="inputxt" datatype="*"  nullmsg="请输入收货人姓名" errormsg="您输入的有误" width="120px" /></td>
                    <td><div class="Validform_checktip"></div></td>
                </tr>

    

                <tr>
                    <td class="need">*</td>
                    <td>手机：</td>
 <td><input type="text" value="" name="tel"  class="inputxt" datatype="m" nullmsg="请输入手机号码" errormsg="您输入的号码有误" width="120px;"/></td>
                    <td><div class="Validform_checktip"></div></td>
                </tr>

                <tr>
                    <td class="need"></td>
                    <td></td>
                    <td colspan="2" style="padding:20px 0 30px 0; "><input type="submit" name="addrsubmit" value="提交" class="button small green"/></td>
                </tr>
      </table>
    </form>
    
    
    
</body>
</html>