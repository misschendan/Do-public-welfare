<?php
	require './common/admin.common.php';

	$data=$_POST;
	$data['admin_id']=$_SESSION['admin_id'];
	$data['realname']=$_SESSION['realname'];
	$data['updatetimes']=date('Y-m-d H:i:s');

	//修改栏目信息
	if($_POST['module_id']){
			// echo ''.$_POST['catename'].'';
			  $sql='UPDATE module SET module_id='.$_POST['module_id'].',module_name="'.$_POST['module_name'].'",updatetimes="'.date('Y-m-d H:i:s').'" WHERE module_id='. $_POST['module_id'];
		
		$r=$db->dblink->query($sql);
		// var_dump($_POST['module_id']);
		//删除多余的信息
		unset($data['module_id']);
		$r=$db->updateData('module',$data,'module_id=' .$_POST['module_id']);

	}else{
		$data['addtimes']=date('Y-m-d H:i:s');
		$r=$db->addData('module',$data);
		
	}

	if($r){
		echo json_encode(array('result'=>'success'));
	}else{
		echo json_encode(array('result'=>'fail'));
	}





