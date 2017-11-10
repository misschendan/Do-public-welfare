<?php
    require './common/admin.common.php';
    $r = $db->delData('article', 'article_id=' . $_POST['article_id']);
   
    if($r){
        echo json_encode(array('result'=>'ok'));
    }else{
        echo json_encode(array('result'=>'fail'));
    }