<?php

	$mysql = new SaeMysql();  
        $sql = "SELECT * FROM User WHERE UserName='".$_POST['param']."'";
        $row = $mysql->getLine( $sql );
	if(!$row)  //不存在用户
	{
        	echo 'y';
        }
	else      //存在用户
        	echo '称昵已存在';
        $mysql->closeDb();
	
?>