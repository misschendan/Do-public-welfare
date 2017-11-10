<?php 
    require './common/common.php';
    //后台管理页面必须是登录状态
    if(!$_SESSION['realname']){
        //PHP的跳转
        header('Location:./mylogin.php');
        exit;
    }
    ?>


    
