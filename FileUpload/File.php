
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ޱ����ĵ�</title>
<?
		define('DOMAIN','zhenghao');
		$s = new SaeStorage();


		$sort=12;
		$f_type=strtolower("swf,jpg,rar,zip,7z,iso,gif");//���ÿ��ϴ����ļ����� 
		$file_size_max=200*1024*1024;//���Ƶ����ļ��ϴ�������� 
		$overwrite = 0;//�Ƿ�����������ͬ�ļ�,1:����,0:������ 
		$f_input="Files";//�����ϴ�������
		$_msg="";

			foreach($_FILES[$f_input]["error"] as $key => $error)
			{ 
				$up_error="no"; 
				if ($error == UPLOAD_ERR_OK)
				{ 
					$f_name=$_FILES[$f_input]['name'][$key];//��ȡ�ϴ�Դ�ļ��� 
					$uploadfile=$uploaddir.strtolower(basename($f_name)); 
					$tmp_type=substr(strrchr($f_name,"."),1);//��ȡ�ļ���չ��
					$tmp_type=strtolower($tmp_type); 
					if(!stristr($f_type,$tmp_type))
					{ 
						echo "�Բ���,�����ϴ�".$tmp_type."��ʽ�ļ�, ".$f_name." �ļ��ϴ�ʧ��!<br/>"; 
						$up_error="yes"; 
					} 
					if ($_FILES[$f_input]['size'][$key]>$file_size_max)
					{ 
						echo "�Բ���,���ϴ����ļ� ".$f_name." ����Ϊ".round($_FILES[$f_input]['size'][$key]/1024)."Kb,���ڹ涨��".($file_size_max/1024)."Kb,�ϴ�ʧ��!<br />"; 
						$up_error="yes"; 
					} 
					if (file_exists($uploadfile)&&!$overwrite)
					{ 
						echo "�Բ���,�ļ� ".$f_name." �Ѿ�����,�ϴ�ʧ��!<br />"; 
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
						$_msg=$_msg.$f_name.'�ϴ��ɹ�\n';	
					} 
					else
					{
						$_msg=$_msg.$f_name.'�ϴ�ʧ��\n';
					}
				} 
			} 
			echo "<script>window.parent.Finish('".$_msg."');</script>";	
?>
</head>

<body>

</body>
</html>