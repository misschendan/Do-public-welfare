<?php 
	session_start();
    $data = $_POST;
    // echo $data['code'];
    // echo $_SESSION['code'];
    // $num=$_SESSION['code'];
    // echo gettype($num);
    
    if($data['code']!=$_SESSION['code']){
 		
 		$result['res'] = 'false';
    
    	echo json_encode($result);
    	exit;
	}

    $dblink= new mysqli('localhost', 'root', '168168', 'ourdata');
    $dblink->query('SET NAMES UTF8');


    $sqlname='SELECT regname FROM reg WHERE 1=1';
    $rowname=$dblink->query($sqlname);
    $namedata=$rowname->fetch_all(MYSQLI_ASSOC);
    // var_dump($namedata);

    $sqltel='SELECT tel FROM reg WHERE 1=1';
    $rowtel=$dblink->query($sqltel);
    $teldata=$rowtel->fetch_all(MYSQLI_ASSOC);
    // var_dump($teldata);

    foreach ($namedata as $key => $value) {
        // var_dump($value);
        // var_dump($data['regname']);
        if($value['regname']==$data['regname']){

            $result['res']='name_existing';
            echo json_encode($result);
            exit;

        }
    }
   foreach ($teldata as $key => $value) {
        if($data['reg_tel']== $value['tel']){
 
        $result['res']='tel_existing';
        echo json_encode($result);
         exit;

        }
   }
 

    $sqls    = 'INSERT INTO reg(img,regname, tel, passwd, lastlogintime) VALUES("'.$data['img'].'","'.$data['regname'].'","'.$data['reg_tel'].'", "'.md5($data['reg_passwd']).'",  "'.date('Y-m-d H:i:s').'")';

   	
   	// echo    $sqls;
    $r      = $dblink->query($sqls);
    // $row=$r->fetch_array(MYSQLI_ASSOC);
    // var_dump($r);
    $dblink->close();

        //存储登录用户的信息到session
$_SESSION['regname']=$data['regname'];
$_SESSION['tel']=$data['reg_tel'];
$_SESSION['img']=$data['img'];
// var_dump($_SESSION['regname']);
// $_SESSION['admin_id']=$row['admin_id'];

	$result['res'] = 'success';   
    echo json_encode($result);

 	
  	
		






 ?>

