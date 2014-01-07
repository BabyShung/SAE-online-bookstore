<?php
include_once('../bInfo/getaddr.php');
if(!$_SESSION['id'])//如果用户的UID不存在的话，返回
{
	die('回话超时，请重新登录');

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" type="text/css" href="css/address.css" />
<link rel="stylesheet" type="text/css" href="../bInfo/buttons/buttons.css" />

</head>

<body>
<div id="container">
<div id="addrcontent">
                <ul>
                <?php
				if($data)//如果data不为空
				{
					$count=1;
					foreach($data as $row)
					{
						echo '<li rel="'.$row['Aid'].'" style="padding-bottom:10px;">'.$count.'.'.$row['province'].$row['city'].$row['county'].$row['address'].'&nbsp&nbsp收货人：'.$row['Receiver'].'&nbsp&nbsp电话：'.$row['Tel'].'&nbsp&nbsp邮编：'.$row['postcode'].'</li>';	
						$count++;
					}
				}
				else	//无地址
					echo '<div style="text-align:center;color:#E96845;" id="noaddr">您还没有收货地址，添加后才能付款</div>';
                ?>
                </ul>
                <div style="margin-top:20px;text-align:center;"><a href="#" class="button small green rounded">添加新地址</a></div>
				</div>
</div>
</body>
</html>
