<?php
	require './common/DB.php';
	$data=$_POST;
	$data['logintime'] = date('Y-m-d H:i:s');
	addnews('user',$data);
	$r=$dblink->query($sql);

	if($r){
		selectdata('user','application='.$_POST['application']);
		// echo $sql;
		$userlist=$dblink->query($sql)->fetch_all(MYSQLI_ASSOC);
		$usernum=count($userlist);

		updatedata('news','havenum='.$usernum,'news_id='.$_POST['application']);
		$dblink->query($sql);
	}

	echo json_encode(array('result'=>'yes'));

?>