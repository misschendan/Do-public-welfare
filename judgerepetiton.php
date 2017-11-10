<?php
	require './common/DB.php';
	selectdata('user','application='.$_POST['application'],'realname,tel');
	$usermessage=($dblink->query($sql)->fetch_all(MYSQLI_ASSOC));
	if(!$usermessage){
		echo json_encode(array('result'=>'yes'));
	}else{
		$r=array('result'=>'yes');
		foreach ($usermessage as $key => $value) {
			if($_POST['realname']==$value['realname']&&$_POST['tel']==$value['tel']){
				echo json_encode(array('result'=>'repetition'));
				exit();
			}
			if($_POST['realname']!=$value['realname']&&$_POST['tel']==$value['tel']){
				echo json_encode(array('result'=>'have_tel'));
				exit();
			}
			else{
				$r['result']='yes';
			}
		}
		echo json_encode($r);
	}
	
?>