<?php 
 session_start();
 // session_destroy();
 // var_dump($_SESSION);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首页</title>
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!--CSS开始-->
	<link rel="stylesheet" href="./css/head.css">
    <link rel="stylesheet" href="./css/foot.css">
    <link rel="stylesheet" href="./css/index.css">
    <!--CSS结束-->

	<!--引用JQ-->
     <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
     <script src="http://apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
        <!-- 编辑器使用的==配置文件 start-->
     <script type="text/javascript" src="public/plug/ue/ueditor.config.js"></script>
     <script type="text/javascript" src="public/plug/ue/ueditor.all.js"></script>
        <!--引用百度秘钥-->
     <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&
            ak=boMVxBrqaPPHp97QhKEeypqNhBwGsAMh"></script>
</head>
<body>
<!---->
<!--head开始-->
<div class="headbox" id="headbox">
   
    <span class="logo" id="logo">做公益</span>
    <div class="col-md-4" id="location_box">

    <select name="" id="" class="">
        <option value=" " id="location"></option>
        <option value="">北京</option>
        <option value="">上海</option>
    </select>

    </div>
   
   		<ul class="nav" id="nav">
        <li><a href="./index.php">首页</a></li>
        <li><a href="./theme.php">行动者联盟</a></li>
        <li><a href="./importindex.php">留言板</a></li>
    	</ul>
	
    <?php
        if($_SESSION['regname']){
            echo '<div class="logined_box" id="logined_box">
                <img src="'.$_SESSION['img'].'" width="20px" height="20px" class="img-circle">
                <span>'.$_SESSION['regname'].'</span>
         
                <a href="#" id="exit_btn" value="1">退出</a>
            </div>';
        }else{
            echo '<ul class="loginnav" id="loginnav">

                    <li class="login_btn" id="login_btn"><a href=" " id="login_btna">登录</a></li>
                    <li>|</li>
                    <li class="reg_btn" id="reg_btn"><a href="">注册</a></li>
                </ul>';
        }
    ?> 
    
    
</div>

<!--head结束-->

<!--注册界面开始-->
<div class="reg_mask" id="reg_mask">
</div>
<div class="reg_box" id="reg_box">
<span id="reg_close" class="reg_close">【X】</span> 
    <form action=" " method="post">
        <!-- 加载编辑器的容器：用来上传图片的，必须要，不然上传的图片会追加到上面的编辑器里面或者直接报错 -->
        <textarea id="uploadEditor" style="display: none;"></textarea>
            <!-- 需要一个展示上传图片的盒子：根据实际需求自定义，这里只是举个例子； 如：-->
        <div id="upload_img_wrap" class="upload_img_wrap"></div>
        <!--需要一个上传按钮：按钮的id和内容是可以自定义的；-->
        <button type="button" id="upload_img_btn" class="upload_img_btn">头像上传</button>
         
            <!--  需要一个传递值的input标签：当然你也可以修改他的id及name；-->
            <!-- 传图片地址值用的 -->
        <input type="hidden" id="imgval" name="imgval" class="imgval" value="">
        <span class="s1" id="s1"></span><br>      
        
        <input type="text"  name="regname" class="regname" id="regname" placeholder="昵称">
        <span class="s2" id="s2">字母、数字、汉字组成至少6位的昵称</span><br> 
        <input type="text" name="reg_tel" class="reg_tel" id="reg_tel" placeholder="电话">
        <span class="s3" id="s3"></span><br> 
        <input type="password" name="reg_passwd" class="reg_passwd" id="reg_passwd" placeholder="密码">
        <span class="s4" id="s4">字母、数字组成至少6位的密码</span><br>
        <input type="password" name="repasswd" class="repasswd" id="repasswd" placeholder="确认密码">
        <span class="s5" id="s5"></span><br>
        
        <!--验证码-->
        <input type="text" name="code" id="code" class="code" value="" placeholder="请输入验证码">
        <span class="s8" id="s8"></span><br>
        <img src="./code.php" class="codeimg" id="codeimg" alt="验证码" title="验证码">
        <br>


        <input type="button" class="submit_btn btn-success" value="注册" name="submit_btn" class="submit_btn" id="submit_btn">

    </form>
    <!-- <img src="./img/12.jpg" alt=""> -->
</div>

<!--注册界面结束-->


<!--登录界面开始-->
<div class="login_mask" id="login_mask">

<div class="login_box" id="login_box">
    <span id="login_close" class="login_close">【X】</span> 
    <img src="./img/12.jpg" class="img2" alt="">  
	<form action="" method="post">
	<input type="tel" class="tel" id="tel" placeholder="电话">
	<span class="s6" id="s6"></span><br>
	<input type="password" class="passwd" id="passwd" placeholder="密码">
	<span class="s7" id="s7"></span><br>
	<input type="button" class="login btn-success" id="login" value="登录">
	</form>

</div>
</div>
<!--登录界面结束-->
 <!--引用JS-->
    <script src="./js/reg.js"></script>
    <script src="./js/qlogin.js"></script>
    <script src="./js/upload_img.js"></script>
<script>
//定位开始
window.onload = function() {

    // var location_img=document.createElement('img')
    // location_img.src="./img/20.jpg"
    // $("option").append(location_img);
    $("#location").html("定位中...");
    var geolocation = new BMap.Geolocation();
    geolocation.getCurrentPosition(function(position) {
        console.log(typeof position);
        console.log(position);
        console.log(position.address.city)
        $("#location").html(position.address.city)

    })
}
//定位结束
</script>
<div>