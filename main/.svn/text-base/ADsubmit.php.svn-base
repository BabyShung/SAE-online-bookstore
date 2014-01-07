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
		// Escaping all input data
		$sql = "SELECT * FROM Admin WHERE Email='".$_POST['email']."' AND AdminPWD='".md5($_POST['password'])."'";
		$row = $mysql->getLine( $sql );
		if($row) //如果查询出结果
		{
				// If everything is OK login
				$usr=$row['AdminName'];
				$id = $row['AdminID'];
				$power = $row['Power'];//admin power

				$sql2 = "UPDATE Admin SET dt='".date('Y-m-d H:i:s')."' where AdminID='".$id."'";
				$mysql->runSql($sql2);

				$status = $row['Status'];//管理员的标识
				 echo json_encode(array('status'=>1,'usr'=>$usr,'id'=>$id,'aStatus'=>$status,'power'=>$power));
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
