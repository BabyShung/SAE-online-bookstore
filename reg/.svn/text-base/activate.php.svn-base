<?php
	if(!$_GET['uid']) die('访问错误');
			$tmp=$_GET['uid'];
			//Connecting to SAE
			$mysql=new SaeMysql();
                        $sql2="SELECT UserName,Activate FROM User where UserID = '".$tmp."'";
                        $data=$mysql->getLine($sql2);
                        $name=$data['UserName'];
                        if($data['Activate']==1)
                        {
                        	
                        }
                        else
                        {
                                $sql="Update User set Activate = 1 where UserID = '".$tmp."'";
                                $mysql->runSql($sql);
                                
                        }
			$mysql->closeDb();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册成功</title>

<!--Stylesheets-->
<link rel="stylesheet" type="text/css" href="css/validate.css" />
<!--JavaScript - Might want to move these to the footer of the page to prevent blocking-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function()
{

	setTimeout("changeNum()",1000);//每隔一秒执行 changeNum()方法一次
  setTimeout("window.location.href=\"../main/index.php\";",3000);//4秒后执行跳转(为了和数字相应)
	
	})
	function changeNum(){
	var num = $('#num').text();//获取当前显示的数字
	$('#num').html(num-1);//数字减一
	if(num-1>=0){//判断
		setTimeout("changeNum()",1000);
	}
}

</script>
</head>

<body>
<div id="vformoOK">
     <div id="loadingdiv2"><a href="../main/index.php"><img src="../main/images/Hrbanner.jpg" alt="loading" border="0" /></a></div>
	<div id="formheader2">
	您的账号已激活，<?php echo $name ?>
    </div>
    
    
    <div id="regok">
  		亲爱的用户<?php echo $name ?>，您的账号已激活成功。<br/>
        祝您使用愉快！<br/>
      <div id="cc"><span style='color:red' id='num'>3</span>秒后自动跳转</div>
      <br/><br/><a href="../main/index.php">没有反应请点击这里</a>
      <br/><br/><br/><br/>
        华软软件学院书擎网开发团队
        
    </div>
    
    
    

</div>




</body>
</html>