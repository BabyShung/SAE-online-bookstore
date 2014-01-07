<?php
		if(!$_POST['uid'])
		die('sorry``');

		$mysql = new SaeMysql();  
		$sql = "SELECT count(*) FROM Reply WHERE HasRead=0 and ToID=".$_POST['uid'];
		$data = $mysql->getVar( $sql );
		if($data)//如果找到回复
		{
			echo json_encode($data);	
		}
		else
			echo '{"status":0}';

?>