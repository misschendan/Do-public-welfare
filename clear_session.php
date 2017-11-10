<?php 
$data=$_POST;
if($data['exit_val']==1){
	$res['res']='success';
	session_start();
    session_destroy();
    // echo $_SESSION['regname'];
	echo json_encode($res);
    	exit;
}




 ?>