<?php
	if(empty($_POST['bid'])) die("sorry");
//prepare all the data
	$bid=$_POST['bid'];
	$ip	= sprintf('%u',ip2long($_SERVER['REMOTE_ADDR']));
//SAE connnection
	$mysql=new SaeMysql();

	$sql = "SELECT * FROM FavorVote WHERE ip=".$ip." AND BookID='".$bid."'";
	$data=$mysql->getLine($sql);

	$sql2 = "SELECT Favor FROM Bookq WHERE BookID='".$bid."'";
	$data2=$mysql->getVar($sql2);



	if($data)//如果不为空,说明用户已经喜欢该书籍，所以返回信息组织用户继续投
	{
		echo '{"vote":"voted","number":'.json_encode($data2).'}';
	}
	else	//为空，说明用户可以投票
		echo '{"vote":"unvote","number":'.json_encode($data2).'}';

	$mysql->closeDb();

?>