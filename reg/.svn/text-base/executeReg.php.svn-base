<?php
if(isset($_POST['register']))
{
	// If the Register form has been submitted
	$err = array();
	if(!count($err))
	{
		// If there are no errors	
		//$pass = substr(md5($_SERVER['REMOTE_ADDR'].microtime().rand(1,100000)),0,6);
		// Generate a random password
		//connecting to SAE
		$mysql2 = new SaeMysql();
		$_POST['email'] = $mysql2->escape($_POST['email']);
		$_POST['name'] = $mysql2->escape($_POST['name']);
		$_POST['userpassword'] = $mysql2->escape($_POST['userpassword']);
		$_POST['tel'] = $mysql2->escape($_POST['tel']);  //电话
		$_POST['card'] = $mysql2->escape($_POST['card']);//身份证
		$_POST['gender'] = $mysql2->escape($_POST['gender']);//性别
		$_POST['hiddenprovince'] = $mysql2->escape($_POST['hiddenprovince']);//省份
		$_POST['hiddencity'] = $mysql2->escape($_POST['hiddencity']);//城市
		// Escape the input data
		$pass=$_POST['userpassword'];//密码		
		$send=$_POST['email'];//邮箱
        $oname=$_POST['name'];//称昵
		//先插入到user表
		$sql2="	INSERT INTO User(Email,UserName,UserPWD,regIP,lasttime)
						VALUES(
							'".$_POST['email']."',
							'".$_POST['name']."',
							'".md5($pass)."',
							'".$_SERVER['REMOTE_ADDR']."',
							'".date('Y-m-d H:i:s')."'
						)";
		//执行
		$mysql2->runSql($sql2);				
		//user表插入后先提取userid
		$sql3="SELECT UserID FROM User WHERE Email='".$send."' AND UserName='".$oname."'";
		$result=$mysql2->getLine($sql3);
		$uid=$result['UserID'];
		//然后再插入customer表
		$sql="	INSERT INTO Customer(gender,Tel,IDnum,province,city)
						VALUES(
							'".$_POST['gender']."',
							'".$_POST['tel']."',
							'".$_POST['card']."',
							'".$_POST['hiddenprovince']."',
							'".$_POST['hiddencity']."'
						)";
		//执行,$data不能删！
		$data=$mysql2->runSql($sql);
                
		if($data)//如果插入成功
		{
                        $mail = new SaeMail();
                        $mail->quickSend( 
                            $send,  //收件人
                            "感谢您在华软软件学院书擎网注册——请根据指示激活账号",//邮件标题
                            $oname.",这封信是由华软软件学院书擎网发送的。
			您收到这封邮件，是因为在我们网站的新用户注册，或用户修改 Email 使用
			了您的地址。如果您并没有访问过我们的论坛，或没有进行上述操作，请忽
			略这封邮件。您不需要退订或进行其他进一步的操作。
			
			帐号激活
							
			您是我们论坛的新用户，或在修改您的注册 Email 时使用了本地址，我们需
			要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。
							
			您只需点击下面的链接即可激活您的帐号：
			http://1.lab1.sinaapp.com/reg/activate.php?action=activate&uid=".$uid."
			(如果上面不是链接形式，请将地址手工粘贴到浏览器地址栏再访问)
			感谢您的访问，祝您使用愉快！
			
			华软软件学院书擎网开发团队.",//邮件内容
                            "babyshung66@163.com" ,
                            "1qasw23ed" 
                        );
		  	header("Location:regOK.php?usern=".$oname);
		    exit();
		}	
	}
}
?>
