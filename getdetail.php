<?php
	require './common/DB.php';
	selectdata('news','news_id='.$_POST['news_id']);
	$newsdetail=($dblink->query($sql)->fetch_all(MYSQLI_ASSOC))[0];
	echo json_encode($newsdetail);
?>