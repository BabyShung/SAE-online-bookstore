<?php
	session_name('adminLogin');
	// 设置session名称
	session_set_cookie_params(30*60);
	// 设置session的有效期为10mins
	session_start();

if(!$_SESSION['adid'])//如果用户的UID不存在的话，返回
{
	die('<div style="text-align:center;font-family:Microsoft Yahei;">回话超时，请重新登录</div>');
}
else if($_SESSION['power']!=0&&$_SESSION['power']!=4)
{
	die('<div style="text-align:center;color:#990000;font-family:Microsoft Yahei;">抱歉，您没有公告管理的权限</div>');
}
?>	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" type="text/css" href="../bInfo/buttons/buttons.css" />
<link rel="stylesheet" type="text/css" href="css/insert.css" />
<script type="text/javascript" src="../main/js/jquery.min.js"></script>
<script type="text/javascript" src="js/Validform2.js"></script>
<script type="text/javascript" src="js/postNews.js"></script>
</head>
<body>
<div id="container">
	<div id="newsscu"><img src="../bInfo/jcart/images/checkmark.png" />发布成功！</div>
    <form class="postnewsform" >
    <table   style="table-layout:fixed;" id="LeftTable">
                <tr>
                    <td class="need" style="width:10px;">*</td>
                    <td style="width:100px;">标题：</td>
                    <td style="width:350px;">
           <input type="text" value="" name="header"  class="inputxt" datatype="*2-15"  nullmsg="请输入标题" errormsg="请输入2-15位字符" id="text" />
                </td>
                    <td><div class="Validform_checktip"></div></td>
                </tr>
                <tr>
                    <td class="need">&nbsp;</td>
                    <td>可用URL：</td>
                    <td><input type="text" value="" name="url"  class="inputxt"  id="text" /></td>
                    <td><div class="Validform_checktip"></div></td>
                </tr>
                <tr>
                    <td class="need">*</td>
                    <td>公告内容：</td>
                    <td><textarea class="textArea" rows="3" cols="45" name="content" datatype="*2-50" nullmsg="请输入公告内容" errormsg="请输入2-50位字符"/></textarea></td>
                    <td><div class="Validform_checktip"></div></td>
                </tr>

                <tr>
                    <td class="need"></td>
                    <td></td>
                    <td colspan="2" style="padding:20px 0 30px 0; "><input type="submit" name="submit" value="发布" class="button small orange" id="postnews"/></td>
                </tr>
      </table>
    </form>


</div>
</body>
</html>
