<?php
	require './common/admin.common.php';

	$data=$_POST;
	$data['admin_id']=$_SESSION['admin_id'];
	$data['realname']=$_SESSION['realname'];
	$data['updatetimes']=date('Y-m-d H:i:s');
	// var_dump($data['imgvalss']);

	//修改栏目信息
	if($_POST['car_id']){
			// echo ''.$_POST['catename'].'';
			  $sql='UPDATE car SET car_id='.$_POST['car_id'].',imgvalss='.$_POST['imgvalss'].',updatetimes="'.date('Y-m-d H:i:s').'" WHERE car_id='. $_POST['car_id'];
		
		$r=$db->dblink->query($sql);
		// var_dump($_POST['module_id']);
		//删除多余的信息
		unset($data['car_id']);
		$r=$db->updateData('car',$data,'car_id=' .$_POST['car_id']);

	}else{
		// echo "111";
		// $data['addtimes']=date('Y-m-d H:i:s');
		// $r=$db->addData('car',$data);


		$dblink=new mysqli('localhost','root','168168','ourdata');
		$dblink->query('SET NAMES UTF8');
		$sql='INSERT INTO car(imgvalss,admin_id,realname,addtimes,updatetimes) VALUES("'.$data['imgvalss'].'","'.$data['admin_id'].'","'.$data['realname'].'","'.date('Y-m-d H:i:s').'","'.$data['updatetimes'].'")';
		// var_dump($sql);
		$r=$dblink->query($sql);
		// var_dump($r);
	}

	if($r){
		echo json_encode(array('result'=>'success'));
	}else{
		echo json_encode(array('result'=>'fail'));
	}





