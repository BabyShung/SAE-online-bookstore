<?php
ob_start(); ?>
﻿<?php
  	require 'executeReg.php';
?>
<?php
ob_end_flush();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>欢迎注册</title>
<!--Stylesheets-->
<link rel="stylesheet" type="text/css" href="css/jquery.qtip.min.css" />
<link rel="stylesheet" type="text/css" href="css/validate.css" />
<!--JavaScript - Might want to move these to the footer of the page to prevent blocking-->
<script type="text/javascript" src="../main/js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.qtip.min.js"></script>
<script type="text/javascript" src="js/Validform.js"></script>
  <script type="text/javascript" src="js/location.js"></script>
   <script type="text/javascript" src="js/YlChinaArea.js"></script>
<script type="text/javascript" src="js/validate.js"></script>

</head>

<body>
<div id="vform">
	<div id="containerx">
         <div id="loadingdiv"><a href="../main/index.php"><img src="../main/images/Hrbanner.jpg" alt="loading" border="0" /></a></div>
        <div id="formheader">
     	   用户注册
        </div>
       			 <div class="clear"></div>
        <div id="containleftright">
    	      <div id="formleft">
      <form class="registerform" action="" method="post">
    <table   style="table-layout:fixed;" id="LeftTable">
                <tr>
                    <td class="need">*</td>
                    <td style="width:70px;">我的邮箱：</td>
                    <td style="width:205px;"><input type="text" value="" name="email" title="用于激活新账号的邮箱，同时也是您的登录账号" class="inputxt" datatype="e" ajaxurl="validEmail.php"  errormsg="请输入正确的邮箱" /></td>
                    <td><div class="Validform_checktip"></div></td>
                </tr>
                
                <tr>
                    <td class="need">*</td>
                    <td>密码：</td>
                    <td><input type="password" value="" name="userpassword" title="可输入6-20位,不能使用空格" class="inputxt" datatype="*6-20" nullmsg="请输入密码" errormsg="密码必须在6~20位之间" /></td>
                    <td><div class="Validform_checktip"></div></td>
                </tr>
                <tr>
                    <td class="need">*</td>
                    <td>确认密码：</td>
                    <td><input type="password" value="" name="userpassword2" title="确认密码" class="inputxt" datatype="*" recheck="userpassword" nullmsg="请再输入一次密码" errormsg="您两次输入的密码不一致" /></td>
                    <td><div class="Validform_checktip"></div></td>
                </tr>
                <tr>
                    <td class="need" style="width:10px;">*</td>
                    <td >昵称：</td>
                    <td ><input type="text" value="" name="name"  title="可输入2-20位" class="inputxt" datatype="mz" ajaxurl="valid.php" nullmsg="请输入昵称" errormsg="昵称至少2位,最多20位"  /></td>
                    <td><div class="Validform_checktip"></div></td>
                </tr>
                <tr>
                    <td class="need">&nbsp;</td>
                    <td>联系电话：</td>
                    <td><input type="text" value="" name="tel" title="用于交易时的联系（可不填）" class="inputxt"   /></td>
                    <td><div class="Validform_checktip"></div></td>
                </tr>
                <tr>
                    <td class="need">&nbsp;</td>
                    <td>身份证：</td>
                    <td><input type="text" value="" name="card" title="身份证号码（可不填）" class="inputxt" /></td>
                    <td><div class="Validform_checktip"></div></td>
                </tr>
    
                <tr>
                    <td class="need">&nbsp;</td>
                    <td>性别：</td>
                    <td><input type="radio" value="男" name="gender" id="male" class="pr1"  checked="checked" /><label for="male">男</label> <input type="radio" value="女" name="gender" id="female" class="pr1" /><label for="female">女</label></td>
                    <td><div class="Validform_checktip"></div></td>
                </tr>
                <tr>
                    <td class="need">&nbsp;</td>
                    <td>省份：</td>
                    <td class="ChinaArea">
           
          <select id="province" name="province"  datatype="select" errormsg="请选择省份！" style="width: 95px;"><option value="">请选择</option></select>
          <select id="city" name="city" datatype="select"  style="width: 96px;"></select>
    	<input type="hidden" name="hiddenprovince" value="" id="hiddenprovince"/>
        <input type="hidden" name="hiddencity" value="" id="hiddencity"/>
                </td>
                    <td><div class="Validform_checktip"></div></td>
                </tr>
                <tr>
                    <td class="need" style="width:10px;">*</td>
                    <td>验证码：</td>
                    <td>
                    
                    
                    <label id="r1"></label>+&nbsp;&nbsp;&nbsp;<label id="r2"></label>=&nbsp;
                    <input style="width:61px" type="text" value=""  name="random" title="请计算左边的加法" class="inputxt" datatype="random"   errormsg="您的计算有误" id="rresult" />
                    </td>
                    <td><div id="calcu" class="Validform_checktip">	</div></td>
                </tr>
                <tr>
                    <td class="need"></td>
                    <td></td>
                    <td colspan="2" style="padding:20px 0 30px 0; "><input type="submit" name="register" value="注册" class="button small orange"/></td>
                </tr>
            </table>
      </form>
   	      </div>
       
        	<div id="formright">
                <div id="rightcontent">
                    <div class="rightdiv">已有我们的账号？</div>
                    <div class="rightdiv"><input type="button" value="登录" class="button small blue rounded" id="loginBtn"/></div>
                    <div class="rightdiv" style="padding-top:10px; border-top:1px dashed #a5aeb6;"><a href="../main/index.php"  class="button green medium">返回主页</a></div>
                </div>
            </div>
        </div>
       			 <div class="clear"></div>
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
          <div style=" padding-top:20px;"><a href="reg.php" id="speA" class="button green medium">注册</a></div>
        </div>
        </form>
</div>



</body>
</html>