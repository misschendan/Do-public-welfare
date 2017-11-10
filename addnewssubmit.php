<?php
	require './common/DB.php';
	$data=$_POST;
	$data['havenum']    = '0';
	unset($data['m']);
	unset($data['news_id']);
	if($_POST['m']==0){
		//添加信息到news表
		addnews('news',$data);
		$r=$dblink->query($sql);
		echo json_encode(array('result'=>'yes'));
	}else{
		//修改数据库里的信息
		updatedata('news','title="'.$_POST['title'].'",neednum="'.$_POST['neednum'].'",times="'.$_POST['times'].'",address="'.$_POST['address'].'",content="'.$_POST['content'].'",img="'.$_POST['img'].'"','news_id='.$_POST['news_id']);
		$r=$dblink->query($sql);
		echo json_encode(array('result'=>'yes'));
	}

?>
