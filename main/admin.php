<?php
	session_name('adminLogin');
	// ����session����
	session_set_cookie_params(10*60);

	session_start();

if(!$_SESSION['adid']||$_SESSION['aStatus']!=1)//�������Ա��UID�����ڵĻ�������
	{
		header('Location: ../main/login.php?ac=login&act=admin');
		exit;

	}
else //���ڣ�ת��Acenter��admin.php
{

		header('Location: ../Acenter/admin.php');
		exit;
}
?>
