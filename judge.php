<?php
	require './common/DB.php';
	selectdata('news','news_id='.$_POST['news_id']);
	$choosenews=($dblink->query($sql)->fetch_all(MYSQLI_ASSOC))[0];
	if($choosenews['havenum']<$choosenews['neednum']){
		echo json_encode(array('result'=>'yes'));
	}else{
		echo json_encode(array('result'=>'no'));
	}
?>