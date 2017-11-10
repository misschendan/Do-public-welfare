<?php
    require './common/admin.common.php';
    // $sql = 'DELETE FROM cate WHERE cate_id=' . $_POST['cate_id'];
    // 删除当前分类
   
        //  function delData($table, $where = '1=1'){
        //     $sql = 'DELETE FROM '.$table.' WHERE ' . $where;
        //     // echo $sql;
        //     return $this->dblink->query($sql);
        // }

 // $sql = 'DELETE FROM module WHERE   module_id='.$_POST['module_id'];
 // var_dump($sql);
 // var_dump($_POST['module_id']);

    $r1 = $db->delData('car', 'car_id=' . $_POST['car_id']);
    //把子分类也删除
    // $r2 = $db->delData('content', 'module_id_parent=' . $_POST['module_id']);
    if($r1){
        echo json_encode(array('result'=>'ok'));
    }else{
        echo json_encode(array('result'=>'fail'));
    }