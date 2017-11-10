<?php
	require './common/DB.php';
	selectdata('themepic','1=1','pic_address');
	$piclist=($dblink->query($sql)->fetch_all(MYSQLI_ASSOC));
	echo json_encode($piclist);
?>