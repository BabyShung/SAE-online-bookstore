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



	if($data)//�����Ϊ��,˵���û��Ѿ�ϲ�����鼮�����Է�����Ϣ��֯�û�����Ͷ
	{
		echo '{"vote":"voted","number":'.json_encode($data2).'}';
	}
	else	//Ϊ�գ�˵���û�����ͶƱ
		echo '{"vote":"unvote","number":'.json_encode($data2).'}';

	$mysql->closeDb();

?>