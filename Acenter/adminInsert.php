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
else if($_SESSION['power']!=0&&$_SESSION['power']!=1)
{
	die('<div style="text-align:center;color:#990000;font-family:Microsoft Yahei;">抱歉，您没有书籍管理的权限</div>');
}

    $mysql = new SaeMysql();  
	//Category
    $sql3 = "SELECT DISTINCT Category FROM Bookq";
    $data3 = $mysql->getData( $sql3 );
?>	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" type="text/css" href="../bInfo/buttons/buttons.css" />
<link rel="stylesheet" type="text/css" href="css/insert.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="../reg/js/Validform.js"></script>
<script type="text/javascript" src="js/insert.js"></script>
</head>
<body>
<div id="container">
     <input type="hidden" name="hiddenuid" value="" id="hiddenuid"/>
    <form class="addressform" action="" method="post">
    <table   style="table-layout:fixed;" id="LeftTable">
                <tr>
                    <td class="need" style="width:10px;">*</td>
                    <td style="width:100px;">书名：</td>
                    <td style="width:350px;">
           <input type="text" value="" name="postcode"  class="inputxt" datatype="mz"  nullmsg="请输入书名" errormsg="请输入2-20位字符" id="text" />
                </td>
                    <td><div class="Validform_checktip"></div></td>
                </tr>
                <tr>
                    <td class="need">*</td>
                    <td>ISBN：</td>
                    <td><input type="text" value="" name="postcode"  class="inputxt" datatype="s17"  nullmsg="请输入ISBN" errormsg="请输入17位的ISBN" id="text" /></td>
                    <td><div class="Validform_checktip"></div></td>
                </tr>
                  <tr>
                    <td class="need">*</td>
                    <td>类别：</td>
                    <td><select id="category" name="category"  datatype="select" errormsg="请选择类别！" style="width: 175px;"><option value="">请选择</option>
					<?php if($data3){
						        foreach ($data3 as $row)
								{
									echo '<option value="'.$row['Category'].'">'.$row['Category'].'</option>';
								}
					}?></select></td>
                    <td><div class="Validform_checktip"></div></td>
                </tr>
                <tr>
                    <td class="need">*</td>
                    <td>作者：</td>
                    <td><input type="text" value="" name="postcode"  class="inputxt" datatype="mz"  nullmsg="请输入作者" errormsg="请输入2-20位字符" id="text" /></td>
                    <td><div class="Validform_checktip"></div></td>
                </tr>
                 <tr>
                    <td class="need">*</td>
                    <td>出版社：</td>
                    <td><input type="text" value="" name="postcode"  class="inputxt" datatype="mz"  nullmsg="请输出版社" errormsg="请输入2-20位字符" id="text" /></td>
                    <td><div class="Validform_checktip"></div></td>
                </tr>
                <tr>
                    <td class="need">*</td>
                    <td>版本：</td>
                    <td><input type="text" value="" name="postcode"  class="inputxt" datatype="mz"  nullmsg="请输入书籍版本" errormsg="请输入2-20位字符" id="text" /></td>
                    <td><div class="Validform_checktip"></div></td>
                </tr>
                <tr>
                    <td class="need">*</td>
                    <td>简介：</td>
                    <td><textarea class="textArea" rows="3" cols="45" name="address" datatype="*" nullmsg="请输入简介" /></textarea></td>
                    <td><div class="Validform_checktip"></div></td>
                </tr>
                <tr>
                    <td class="need">*</td>
                    <td>价格：</td>
                    <td><input type="text" value="" name="receiver"  class="inputxt" datatype="n"  nullmsg="请输入价格" errormsg="您输入的价格有误" width="120px" /></td>
                    <td><div class="Validform_checktip"></div></td>
                </tr>

    

                <tr>
                    <td class="need">*</td>
                    <td>总数：</td>
 <td><input type="text" value="" name="tel"  class="inputxt" datatype="it" nullmsg="请输入总数" errormsg="请输入最多6位的整数" width="120px;"/></td>
                    <td><div class="Validform_checktip"></div></td>
                </tr>

                <tr>
                    <td class="need"></td>
                    <td></td>
                    <td colspan="2" style="padding:20px 0 30px 0; "><input type="submit" name="addrsubmit" value="添加" class="button small green"/></td>
                </tr>
      </table>
    </form>


</div>
</body>
</html>
