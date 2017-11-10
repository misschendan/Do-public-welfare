<?php
    session_start();
	$data=$_POST;

	$dblink= new mysqli('localhost', 'root', '168168', 'ourdata');
    $dblink->query('SET NAMES UTF8');

    $sql='SELECT  tel,passwd,regname,img FROM reg WHERE tel='.$data['tel'].'';
    $result     = $dblink->query($sql);
    $row=$result->fetch_array(MYSQLI_ASSOC);

    if(!$row){
    	$res['res']='no_exit_tel';
    	echo json_encode($res);
    	exit;
    }
    if(md5($_POST['passwd'])!=$row['passwd']){
    	$res['res']='invail_passwd';
    	echo json_encode($res);
    	exit;
    }
        //存储登录用户的信息到session
$_SESSION['regname']=$row['regname'];
$_SESSION['tel']=$row['tel'];
$_SESSION['img']=$row['img'];

    	$res['res']='OK';
    	echo json_encode($res);

 ?>    
