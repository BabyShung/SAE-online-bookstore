<?php
if(!$_POST['header'])die('Sorry');
$mysql=new SaeMysql();
$_POST['header'] = $mysql->escape($_POST['header']);
$_POST['content'] = $mysql->escape($_POST['content']);
$_POST['url'] = $mysql->escape($_POST['url']);
$sql ="INSERT INTO Message SET Header='".$_POST['header']."',Message='".$_POST['content']."',url='".$_POST['url']."'";   
$data=$mysql->runSql($sql);
if($data)//如果data不为空
{
	echo '{"status":1}';
}
else	
	echo '{"errors":0}';

$mysql->closeDb();

?>