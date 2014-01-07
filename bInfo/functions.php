<?php
if(!defined('INCLUDE_CHECK')) die('You are not allowed to execute this file directly');
//获取用户的头像
function getAvatar($av)
{
	if($av!=0)
	{
		$mysql=new SaeMysql();
		$sql = "SELECT Avatar FROM Customer WHERE CustomerID='".$av."'";
		$data=$mysql->getLine($sql);
		if($data)//如果getline不为空
		{
			if($data['Avatar'])//如果avatar不是null
			{
				$a="../bInfo/images/".$data['Avatar'];
				return $a;
			}
			else	//avatar为null，即未赋值
			return "../bInfo/images/Demo.png";

		}
	}
	else	//avatar为null，即未赋值
		return "../bInfo/images/Demo.png";

	$mysql->closeDb();		
}
function getRespondName($av)
{
	if($av!=0)
	{
		$mysql=new SaeMysql();
		$sql = "SELECT usr,UserID FROM BookComment WHERE BCid='".$av."'";
		$data=$mysql->getLine($sql);
			if($data)//如果avatar不是null
			{
				return $data;
			}
	}
	else 
	return "";
	$mysql->closeDb();		
}
function getBookName($av)
{
		$mysql=new SaeMysql();
		$sql = "SELECT Bname FROM Bookq WHERE BookID='".$av."'";
		$data=$mysql->getVar($sql);
			if($data)//如果Bname不是null
			{
				return $data;
			}

		
		$mysql->closeDb();		

}
function getMyComment($av)
{
		$mysql=new SaeMysql();
		$sql = "SELECT parent,comment FROM BookComment WHERE BCid='".$av."'";
		$data=$mysql->getLine($sql);
			if($data)//如果comment不是null
			{
				return $data;
			}
	
		
		$mysql->closeDb();		

}

//展示当前书籍的评论
function showComment($arr)
{
	$gaa=getAvatar($arr['UserID']);
	if($_SESSION['usr'])
	{
	echo '
	   <div class="waveComment com-'.$arr['BCid'].'">			
			<div class="comment">
				<div class="waveTime">'.waveTime($arr['dt']).'</div>
				<div class="commentAvatar" rel="'.$arr['UserID'].'">
				<a href="#"><img src="'.$gaa.'" width="50" height="50" alt="'.$gaa.'" border="0" /></a>
				</div>
				<div class="commentText">
				<span class="name"><a href="" rel="'.$arr['UserID'].'" id="findsnd">'.$arr['usr'].'</a></span>: '.$arr['comment'].'
				</div>
				<div class="replyLink">
				<a href="" onclick="addComment(this,'.$arr['BCid'].','.$arr['BookID'].','.$arr['BCid'].','.$arr['UserID'].');return false;">回复&raquo;</a>
				</div>
				<div class="clear"></div>
			</div>';	
	}
	else{
			echo '
	   <div class="waveComment com-'.$arr['BCid'].'">			
			<div class="comment">
				<div class="waveTime">'.waveTime($arr['dt']).'</div>
				<div class="commentAvatar" rel="'.$arr['UserID'].'">
				<a href="#"><img src="'.$gaa.'" width="50" height="50" alt="'.$gaa.'" border="0" /></a>
				</div>				
				<div class="commentText">
				<span class="name"><a href="" rel="'.$arr['UserID'].'" id="findsnd">'.$arr['usr'].'</a></span>: '.$arr['comment'].'
				</div>
				<div class="replyLink">
				</div>
				<div class="clear"></div>
			</div>';	

	}
	// Output the comment, and its replies, if any	
	if($arr['replies'])
	{
		foreach($arr['replies'] as $r)
			showSmallComment($r,$arr['BCid'],this);
	}
	
	echo '</div>';
}
function showSmallComment($arr,$topparent,$sameheader)
{
	$gaa=getAvatar($arr['UserID']);
	$gpa=getRespondName($arr['respond']);
	if($_SESSION['usr'])
	{
	echo '
	   <div class="waveComment com-'.$arr['BCid'].'">			
			<div class="comment">
				<div class="waveTime">'.waveTime($arr['dt']).'</div>
				<div class="commentAvatar" rel="'.$arr['UserID'].'">
					<a href="#"><img src="'.$gaa.'" width="50" height="50" alt="'.$gaa.'" border="0" /></a>
				</div>
				<div class="commentText">
					<span class="name"><a href="" rel="'.$arr['UserID'].'"  id="findsnd">'.$arr['usr'].'</a></span>回复<span class="name"><a href="" rel="'.$gpa['UserID'].'">@'.$gpa['usr'].'</a></span>: '.$arr['comment'].'
				</div>
				<div class="replyLink">
				<a href="" onclick="addComment('.$sameheader.','.$topparent.','.$arr['BookID'].','.$arr['BCid'].','.$arr['UserID'].');return false;">回复&raquo;</a>
				</div>
				<div class="clear"></div>
			</div>';	
	}
	else{
			echo '
	   <div class="waveComment com-'.$arr['BCid'].'">			
			<div class="comment">
				<div class="waveTime">'.waveTime($arr['dt']).'</div>
				<div class="commentAvatar" rel="'.$arr['UserID'].'">
				<a href="#"><img src="'.$gaa.'" width="50" height="50" alt="'.$gaa.'" border="0" /></a>
				</div>				
				<div class="commentText">
					<span class="name"><a href="" rel="'.$arr['UserID'].'" id="findsnd">'.$arr['usr'].'</a></span>回复<span class="name"><a href="" rel="'.$gpa['UserID'].'" >@'.$gpa['usr'].'</a></span>: '.$arr['comment'].'
				</div>
				<div class="replyLink">
				</div>
				<div class="clear"></div>
			</div>';	

	}	
	echo '</div>';
}
//显示新回复
function showReplyNew($arr,$tname,$tid)
{
	$ca=getMyComment($arr['BCid']);//获取我先前的评论
	$pa=getMyComment($arr['HisBCid']);//获取评论你的人先前的评论
	$ba=getBookName($arr['BookID']);//获取传进来值的书籍名
	$gaa=getAvatar($arr['FromID']);//获取传进来值的用户头像
	echo '
	   <div class="waveComment com-'.$arr['Rid'].'">			
			<div class="commentNew">
				<div class="waveTime">'.waveTime($arr['dt']).'</div>
				<div class="commentAvatar" rel="'.$arr['FromID'].'">
					<a href="#"><img src="'.$gaa.'" width="50" height="50" alt="'.$gaa.'" border="0" /></a>
				</div>
				<div class="commentText">
					<span class="name">'.$arr['usr'].'</span>回复<span class="name">@'.$tname.'</span>: '.$arr['comment'].'
				</div>
				<div style="color:#999999"><p><span style="color:#F06D65;"><新回复></span>在<a target="_parent" href="../bInfo/index.php?bid='.$arr['BookID'].'&bn='.$ba.'">《'.$ba.'》</a>中回复我的评论：<a target="_parent" href="../bInfo/index.php?bid='.$arr['BookID'].'&bn='.$ba.'">'.$ca['comment'].'</a></p></div>
				<div class="replyLink">
				<a href="" onclick="addComment(this,'.$pa['parent'].','.$arr['BookID'].','.$arr['HisBCid'].','.$arr['FromID'].');return false;">回复&raquo;</a>
				</div>
				<div class="clear"></div>
			</div>';		
	echo '</div>';
	echo '<hr style="width:760px; margin:20px 0 20px 10px;;color:#CCCCCC;"/>';

}

//显示回复
function showReply($arr,$tname,$tid)
{
	$ca=getMyComment($arr['BCid']);//获取我先前的评论
	$pa=getMyComment($arr['HisBCid']);//获取评论你的人先前的评论
	$ba=getBookName($arr['BookID']);//获取传进来值的书籍名
	$gaa=getAvatar($arr['FromID']);//获取传进来值的用户头像
	echo '
	   <div class="waveComment com-'.$arr['Rid'].'">			
			<div class="comment">
				<div class="waveTime">'.waveTime($arr['dt']).'</div>
				<div class="commentAvatar" rel="'.$arr['FromID'].'">
					<a href="#"><img src="'.$gaa.'" width="50" height="50" alt="'.$gaa.'" border="0" /></a>
				</div>
				<div class="commentText">
					<span class="name">'.$arr['usr'].'</span>回复<span class="name">@'.$tname.'</span>: '.$arr['comment'].'
				</div>
				<div style="color:#999999"><p>在<a target="_parent" href="../bInfo/index.php?bid='.$arr['BookID'].'&bn='.$ba.'">《'.$ba.'》</a>中回复我的评论：<a target="_parent" href="../bInfo/index.php?bid='.$arr['BookID'].'&bn='.$ba.'">'.$ca['comment'].'</a></p></div>
				<div class="replyLink">
				<a href="" onclick="addComment(this,'.$pa['parent'].','.$arr['BookID'].','.$arr['HisBCid'].','.$arr['FromID'].');return false;">回复&raquo;</a>
				</div>
				<div class="clear"></div>
			</div>';		
	echo '</div>';
	echo '<hr style="width:760px; margin:20px 0 20px 10px;;color:#CCCCCC;"/>';

}
//展示网站公告
function showNews($arr)
{
	echo '
	   <div class="waveComment">			
			<div class="comment2">
				<div class="waveTime">'.waveTime($arr['dt']).'</div>
				<div class="commentText2">'.$arr['Header'].'</div>
				<div class="commentText">
				<p>
				<span class="name">';
			if($arr['url'])echo '<a target="_parent" href="'.$arr['url'].'">'.$arr['Message'].'</a>';
			else echo $arr['Message'];
			echo '</span> 
				</p>
				</div>';

				
			echo '<div class="clear"></div>
			</div>';	
	echo '</div>';
}
//展示网站公告
function showNewsAd($arr)
{
	echo '
	   <div class="waveComment" rel="'.$arr['MessageID'].'">			
			<div class="comment2">
				<div class="waveTime">'.waveTime($arr['dt']).'</div>
				<div class="commentText2">'.$arr['Header'].'</div>
				<div class="commentText">
				<p>
				<span class="name">';
			if($arr['url'])echo '<a target="_parent" href="'.$arr['url'].'">'.$arr['Message'].'</a>';
			else echo $arr['Message'];
			echo '</span> 
				</p>
				</div>';
			if($_SESSION['power']==0||$_SESSION['power']==4)
			echo	'<div class="commentText">
						<div class="replyLink">
						<a id="dltn">删除</a>
						</div>
				</div>';  
				
			echo '<div class="clear"></div>
			</div>';	
	echo '</div>';
}

//日期函数
function waveTime($t)
{
	$t = strtotime($t);
	if(date('d')==date('d',$t)) 
			return date('H:i',$t);
//	return date('F jS Y h:i A',$t);
	return date('Y年m月j日 H:i',$t);	
	// If the comment was written today, output only the hour and minute
	// if it was not, output a full date/time
}
//日期函数2
function waveTimeZ($t)
{
	$t = strtotime($t);
	return date('Y年m月j日 H:i',$t);	
}
?>