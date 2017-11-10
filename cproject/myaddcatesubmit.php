<?php
	//require './common/admin.common.php';
    


   // require './class/DB.php';
require './common/common.php';

$data=$_POST;
   $data['reg_id'] = $_SESSION['reg_id'];
    $data['regname'] = $_SESSION['regname'];

    if(!$_SESSION['img']){
        $data['img'] ='1';
    }else {
         $data['img'] = $_SESSION['img'];
    }



    // $data['img'] = $_SESSION['img'];
    
    $data['updatatime'] = date('Y-m-d H:i:s');

      echo $_POST['article_id'];
    //修改栏目信息
    if($_POST['article_id']){
              $sql='UPDATE article SET article_id='. $_POST['article_id'].',content="'.$_POST['content'].'",article_img="'.$_POST['article_img'].'",article_bgimg="'.$_POST['article_bgimg'].'",updatetimes="'.date('Y-m-d H:i:s').'" WHERE article_id='. $_POST['article_id'];
              
        
        $r=$db->dblink->query($sql);
        //删除多余的信息
        unset($data['article_id']);
        $r=$db->updateData('article',$data,'article_id=' .$_POST['article_id']);
        
      
    }else{
        $data['article_time']=date('Y-m-d H:i:s');
      
        $r=$db->addData('article',$data);
    }

if($r){
        echo json_encode(array('result'=>'success'));
    }else{
        echo json_encode(array('result'=>'fail'));
    }


