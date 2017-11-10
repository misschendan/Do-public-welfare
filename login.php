<?php
session_start();
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>登录页面</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="css/style.css" rel="stylesheet" />
   <link href="css/style-responsive.css" rel="stylesheet" />
   <link href="css/style-default.css" rel="stylesheet" id="style_color" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="lock" background="white">
    <div class="lock-header">
        <!-- BEGIN LOGO -->
        <a class="center" id="logo" href="index.html">
            <img class="center" alt="logo" src="img/logo.png">
        </a>
        <!-- END LOGO -->
    </div>
    <div class="login-wrap">
        <div class="metro single-size red" id="reg_btn">
            <div class="locked">
                <i class="icon-lock"></i>
                <span>登录</span>
            </div>
        </div>
        <div class="metro double-size green">
            <div class="input-append lock-input">
                <input type="text" name="realname" id="admin_name" class="" placeholder="账号" value="<?=$_COOKIE['admin_name'];?>">
                <h6></h6>
            </div>
        </div>
        <div class="metro double-size yellow">
            <div class="input-append lock-input">
                <input type="password" name="passwd" id="admin_pw" class="" placeholder="密码" value="<?=$_COOKIE['admin_pw'];?>">
                <h6></h6>
            </div>
        </div>
        <div class="metro single-size terques login" id="loginbutton">
            <button type="button" class="btn login-btn">
                登录
                <i class=" icon-long-arrow-right"></i>
            </button>
        </div>
        <div class="login-footer">
            <div class="remember-hint pull-left">
                <input type="checkbox" name="remember" id="remember" value="1" checked> 记住我
            </div>
        </div>
    </div>
    <script src="./js/jquery-1.8.3.min.js"></script>
    <script src="./js/login.js"></script>
</body>
<!-- END BODY -->
</html>