<?php
	$mysql5=new SaeMysql();
	$sql5="SELECT * FROM BookList";
	$data=$mysql5->getData($sql5);
	if($data)
	{
		echo json_encode($data);	
	}
	$mysql5->closeDb();

?>