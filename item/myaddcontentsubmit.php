<?php
    require './common/admin.common.php';

    $data                   = $_POST;
    $data['admin_id']       = $_SESSION['admin_id'];
    $data['realname']       = $_SESSION['realname'];
    $data['updatetimes']    = date('Y-m-d H:i:s');
    // echo ''.$_POST['cate_id'].'';
    //在修改信息的时候，会收到$_POST['cate_id']
    if($_POST['title_id']){
        //修改信息
        
      $sql='UPDATE content SET title='.$_POST['title'].',imgvals='.$_POST['imgvals'].', detail="'.$_POST['detail'].'",updatetimes="'.date('Y-m-d H:i:s').'" WHERE title_id='. $_POST['title_id'];  

        $r=$db->dblink->query($sql);
        // var_dump($sql);
   // var_dump($_POST['title_id']);
       // 删除多余的信息
       unset($data['title_id']);
       $r = $db->updateData('content', $data, 'title_id = ' . $_POST['title_id']);
    
    }else{
        $data['addtimes']       = date('Y-m-d H:i:s');
        $r = $db->addData('content', $data);

    }
    
    if($r){
        echo json_encode(array('result'=>'success'));
    }else{
        echo json_encode(array('result'=>'fail'));
    }
