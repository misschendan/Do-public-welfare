<?php 
require './common/common.php';
  $row = $db->getOneData('qadmin', '*', 'realname = "'.$_POST['regname'].'"');


// var_dump($row);

//检查账号是否存在
if(!$row){
	$r['res']='no_exit_regname';
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
$sql='UPDATE reg SET loginmun=loginnum+1,lastloginnum=now() WHERE reg_id='.$row['reg_id'];
$db->dblink->query($sql);

//开始存储COOKIE信息，选中的时候存储，没选中的时候就销毁
if($_POST['remember']=='1'){
	setcookie('regname', $row['realname'],  time()+3600);
	setcookie('passwd', $row['passwd'],  time()+3600);
}else{
	//销毁cookie信息
	setcookie('regname', ' ',  time()-3600);
	setcookie('passwd', ' ',  time()-3600);
}
// 存储登录用户的信息到session
$_SESSION['cregname']=$row['realname'];
$_SESSION['ctel']=$row['tel'];
$_SESSION['creg_id']=$row['reg_id'];

//登录成功
  $r['res'] = 'ok';
    // $r['result'] = 'ok';
    echo json_encode($r);
    // var_dump($r);


