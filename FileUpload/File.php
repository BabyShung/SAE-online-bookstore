
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
<?
		define('DOMAIN','zhenghao');
		$s = new SaeStorage();


		$sort=12;
		$f_type=strtolower("swf,jpg,rar,zip,7z,iso,gif");//设置可上传的文件类型 
		$file_size_max=200*1024*1024;//限制单个文件上传最大容量 
		$overwrite = 0;//是否允许覆盖相同文件,1:允许,0:不允许 
		$f_input="Files";//设置上传域名称
		$_msg="";

			foreach($_FILES[$f_input]["error"] as $key => $error)
			{ 
				$up_error="no"; 
				if ($error == UPLOAD_ERR_OK)
				{ 
					$f_name=$_FILES[$f_input]['name'][$key];//获取上传源文件名 
					$uploadfile=$uploaddir.strtolower(basename($f_name)); 
					$tmp_type=substr(strrchr($f_name,"."),1);//获取文件扩展名
					$tmp_type=strtolower($tmp_type); 
					if(!stristr($f_type,$tmp_type))
					{ 
						echo "对不起,不能上传".$tmp_type."格式文件, ".$f_name." 文件上传失败!<br/>"; 
						$up_error="yes"; 
					} 
					if ($_FILES[$f_input]['size'][$key]>$file_size_max)
					{ 
						echo "对不起,你上传的文件 ".$f_name." 容量为".round($_FILES[$f_input]['size'][$key]/1024)."Kb,大于规定的".($file_size_max/1024)."Kb,上传失败!<br />"; 
						$up_error="yes"; 
					} 
					if (file_exists($uploadfile)&&!$overwrite)
					{ 
						echo "对不起,文件 ".$f_name." 已经存在,上传失败!<br />"; 
						$up_error="yes"; 
					} 
					$string = 'abcdefghijklmnopgrstuvwxyz0123456789';
					$rand = '';
					for ($x=0;$x<12;$x++)
					{
						$rand .= substr($string,mt_rand(0,strlen($string)-1),1);
					}
					$t=date("ymdHis").substr($gettime[0],2,6).$rand;
					$attdir="./file/";  
					if(!is_dir($attdir))   
					{  
						mkdir($attdir);
					}
					$uploadfile=$attdir.$t.".".$tmp_type; 


					//if(($up_error!="yes") and (move_uploaded_file($_FILES[$f_input]['tmp_name'][$key], $uploadfile)))
				//	if(($up_error!="yes") and ($s->upload(DOMAIN, $uploadfile, $_FILES[$f_input]['tmp_name']))))
					if(($up_error!="yes")&&($s->upload(DOMAIN, $uploadfile, $_FILES[$f_input]['tmp_name'][$key])))
					{ 
						$_msg=$_msg.$f_name.'上传成功\n';	
					} 
					else
					{
						$_msg=$_msg.$f_name.'上传失败\n';
					}
				} 
			} 
			echo "<script>window.parent.Finish('".$_msg."');</script>";	
?>
</head>

<body>

</body>
</html>
