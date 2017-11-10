<?php 
require './common/common.php';
  $row = $db->getOneData('qadmin', '*', 'realname = "'.$_POST['realname'].'"');


// var_dump($row);

//检查账号是否存在
if(!$row){
	$r['res']='no_exit_realname';
	echo json_encode($r);
	exit;
}
//检查密码是否正确
if(md5($_POST['passwd'])!=$row['passwd']){
	$r['res']='invail_passwd';
	echo json_encode($r);
	exit;
}
//更新登录信息
$sql='UPDATE admin SET loginmun=loginnum+1,lastlogin=now() WHERE admin_id='.$row['admin_id'];
$db->dblink->query($sql);

//开始存储COOKIE信息，选中的时候存储，没选中的时候就销毁
if($_POST['remember']=='1'){
	setcookie('realname', $row['realname'],  time()+3600);
	setcookie('passwd', $row['passwd'],  time()+3600);
}else{
	//销毁cookie信息
	setcookie('realname', ' ',  time()-3600);
	setcookie('passwd', ' ',  time()-3600);
}
//存储登录用户的信息到session
$_SESSION['realname']=$row['realname'];
$_SESSION['tel']=$row['tel'];
$_SESSION['admin_id']=$row['admin_id'];

//登录成功
  $r['res'] = 'ok';
    // $r['result'] = 'ok';
    echo json_encode($r);


