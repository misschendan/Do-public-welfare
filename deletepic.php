<?php
	require './common/DB.php';

	deletedata('themepic','pic_id='.$_POST['pic_id'].'');
	$dblink->query($sql);
	echo json_encode(array('result'=>'yes'));
?>