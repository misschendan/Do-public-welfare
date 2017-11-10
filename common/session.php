<?php
	session_start();
	if(!$_SESSION['admin_name']){
    echo "have";
        //PHP的跳转
        header('Location:./login.php');
        exit;
  }
	
?>