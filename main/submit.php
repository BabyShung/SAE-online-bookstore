<?php
	$err;
	if(!checkEmail($_POST['email']))
	{
		$err='您输入的邮箱有误';
		
	}
	if(checkEmail($_POST['email']))
	{
        $mysql = new SaeMysql();  
		$_POST['email'] = $mysql->escape($_POST['email']);
		$_POST['password'] = $mysql->escape($_POST['password']);
		$_POST['rememberMe'] = (int)$_POST['rememberMe'];		
		// Escaping all input data
		$sql = "SELECT * FROM User WHERE Email='".$_POST['email']."' AND UserPWD='".md5($_POST['password'])."'";
		$row = $mysql->getLine( $sql );
		if($row) //如果查询出结果
		{
			if($row['Activate']==0) //如果未被激活
			{
				$err='您的账号未激活，请查看激活邮件';	
			}
			else if($row['Freeze']==1)
			{
				$err='您的账已被冻结';		
			}
			else    //开始登陆，录入session
			{
				// If everything is OK login
				$usr=$row['UserName'];
				$id = $row['UserID'];

				$sql2 = "UPDATE User SET lasttime='".date('Y-m-d H:i:s')."' where UserID='".$id."'";
				$mysql->runSql($sql2);



				$rememberMe = $_POST['rememberMe'];
				setcookie('tzRemember',$_POST['rememberMe']);
				 echo json_encode(array('status'=>1,'usr'=>$usr,'id'=>$id,'rememberMe'=>$rememberMe));
			}
		}
		else 
		{
			$err='用户名或密码错误';
		}
		$mysql->closeDb();
	}

	if(!empty($err))
		echo '{"status":0,"errors":'.json_encode($err).'}';

	//检查email合法
function checkEmail($str)
{
	return preg_match("/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/", $str);
}
?>
