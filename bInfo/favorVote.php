<?php
	if(empty($_POST['bid'])) die("sorry");
//prepare all the data
	$bid=$_POST['bid'];
	$ip	= sprintf('%u',ip2long($_SERVER['REMOTE_ADDR']));
//SAE connnection
	$mysql=new SaeMysql();
	//����IP��bookid��FavorVote��
	$sql = "INSERT INTO FavorVote SET ip=".$ip.",BookID='".$bid."'";
	$mysql->runSql($sql);
	//����Favor
	$sql2 = "UPDATE Bookq SET Favor=Favor+1 WHERE BookID='".$bid."'";
	$mysql->runSql($sql2);
	$mysql->closeDb();

?>