<?php
	session_start();
	require './common/DB.php';
	//获取传递的数据
	selectdata('admin','admin_name="'.$_POST['admin_name'].'"');
	// echo $sql;
	$r=$dblink->query($sql);
	$row=$r->fetch_array(MYSQLI_ASSOC);
	//判断账号密码是否正确
	if(!$row){
		echo json_encode(array('result'=>'no_admin_name'));
		exit;
	}
	if(md5($_POST['admin_pw'])!=$row['admin_pw']){
		echo json_encode(array('result'=>'no_admin_pw'));
		exit;
	}
	//记住我，设置COOKIE
	if($_POST['remember']=='1'){
		setcookie('admin_name',	$row['admin_name'],	time()+7*24*3600);
		setcookie('admin_pw', $_POST['admin_pw'],	time()+7*24*3600);
	}else{
		setcookie('admin_name','',time()-7*24*3600);
		setcookie('admin_pw','',	time()-7*24*3600);
	}
	$_SESSION['admin_name']=$_POST['admin_name'];
	echo json_encode(array('result'=>'yes'));
	
?>