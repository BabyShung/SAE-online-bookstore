<?php

	$mysql = new SaeMysql();  
        $sql = "SELECT * FROM User WHERE Email='".$_POST['param']."'";
        $row = $mysql->getLine( $sql );
	if(!$row)  //不存在邮箱
	{
        	echo 'y';
        }
	else      //存在邮箱
        	echo '该邮箱已注册';
        $mysql->closeDb();
	
?>