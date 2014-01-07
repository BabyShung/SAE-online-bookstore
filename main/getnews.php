<?php
		if(!$_POST['getnews'])
		die('sorry``');

		$mysql = new SaeMysql();  
		$sql = "SELECT * FROM Message WHERE dt>'".date('Y-m-d')."' order by dt desc";
		$data = $mysql->getData( $sql );
		if($data)//如果找到今天的公告
		{
			echo json_encode($data);	
		}
		else
			echo '{"status":0}';

?>