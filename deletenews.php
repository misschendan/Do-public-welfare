<?php
	require './common/DB.php';

	deletedata('news','news_id='.$_POST['news_id'].'');
	$dblink->query($sql);
	echo json_encode(array('result'=>'yes'));
?>