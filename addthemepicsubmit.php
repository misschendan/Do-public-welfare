<?php
	require './common/DB.php';
	$data=$_POST;
	unset($data['pic_id']);
	unset($data['n']);
	if($_POST['n']==0){
		//添加信息到news表
		addnews('themepic',$data);
		$r=$dblink->query($sql);
		echo json_encode(array('result'=>'yes'));
	}else{
		//修改数据库里的信息
		updatedata('themepic','pic_name="'.$_POST['pic_name'].'",pic_address="'.$_POST['pic_address'].'"','pic_id='.$_POST['pic_id']);
		$r=$dblink->query($sql);
		echo json_encode(array('result'=>'yes'));
	}

?>