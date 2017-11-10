<?php
  require './common/session.php';
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>添加活动页面</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
    <link href="assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/style-responsive.css" rel="stylesheet" />
    <link href="css/style-default.css" rel="stylesheet" id="style_color" />

    <link href="assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/uniform/css/uniform.default.css" />

    <link rel="stylesheet" type="text/css" href="assets/chosen-bootstrap/chosen/chosen.css" />
    <link rel="stylesheet" type="text/css" href="assets/jquery-tags-input/jquery.tagsinput.css" />
    <link rel="stylesheet" type="text/css" href="assets/clockface/css/clockface.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" href="assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-daterangepicker/daterangepicker.css" />

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

    <link rel="stylesheet" type="text/css" href="./css/cancleli.css" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
   <!-- BEGIN HEADER -->
   <div id="header" class="navbar navbar-inverse navbar-fixed-top">
       <!-- BEGIN TOP NAVIGATION BAR -->
       <div class="navbar-inner">
           <div class="container-fluid">
               <!--BEGIN SIDEBAR TOGGLE-->
               <div class="sidebar-toggle-box hidden-phone">
                   <div class="icon-reorder tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
               </div>
               <!--END SIDEBAR TOGGLE-->
               <!-- BEGIN LOGO -->
               <a class="brand" href="index.html">
                   <img src="img/logo.png" alt="Metro Lab" />
               </a>
               <!-- END LOGO -->
               <!-- BEGIN RESPONSIVE MENU TOGGLER -->
               <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="arrow"></span>
               </a>
               <!-- END RESPONSIVE MENU TOGGLER -->
               <!-- END  NOTIFICATION -->
               <div class="top-nav ">
                   <ul class="nav pull-right top-menu" >
                       <!-- BEGIN SUPPORT -->
                       <!-- END SUPPORT -->
                       <!-- BEGIN USER LOGIN DROPDOWN -->
                       <li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               <img src="img/avatar1_small.jpg" alt="">
                               <span class="username"><?=$_SESSION['realname'];?></span>
                               <b class="caret"></b>
                           </a>
                           <ul class="dropdown-menu extended logout">
                               <li><a href="#"><i class="icon-cog"></i> 修改密码</a></li>
                               <li><a href="login.html"><i class="icon-key"></i> 退出登录</a></li>
                           </ul>
                       </li>
                       <!-- END USER LOGIN DROPDOWN -->
                   </ul>
                   <!-- END TOP NAVIGATION MENU -->
               </div>
           </div>
       </div>
       <!-- END TOP NAVIGATION BAR -->
   </div>
   <!-- END HEADER -->
   <!-- BEGIN CONTAINER -->
   <div id="container" class="row-fluid">
      <!-- BEGIN SIDEBAR -->
      <div class="sidebar-scroll">
          <div id="sidebar" class="nav-collapse collapse">

              <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
              <div class="navbar-inverse">
                  <form class="navbar-search visible-phone">
                      <input type="text" class="search-query" placeholder="Search" />
                  </form>
              </div>
              <!-- END RESPONSIVE QUICK SEARCH FORM -->
              <!-- BEGIN SIDEBAR MENU -->
              <ul class="sidebar-menu">
                  <li class="sub-menu active">
                      <a href="javascript:;" class="">
                          <i class="icon-tasks"></i>
                          <span>活动资源管理</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="newslist.php">活动管理</a></li>
                          <li><a class="" href="addnews.php">活动添加</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu active">
                      <a href="javascript:;" class="">
                          <i class="icon-tasks"></i>
                          <span>主页面图片管理</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="themepiclist.php">图片管理</a></li>
                          <li><a class="" href="addthemepic.php">图片添加</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu active">
                      <a href="javascript:;" class="">
                          <i class="icon-tasks"></i>
                          <span>主题页面</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="theme.php">主题页面</a></li>
                      </ul>
                  </li>
              </ul>
              <!-- END SIDEBAR MENU -->
          </div>
      </div>
      <!-- END SIDEBAR -->
      <!-- 编辑器使用的==配置文件 start-->     
    <script type="text/javascript" src="public/plug/ue/ueditor.config.js"></script>
    <script type="text/javascript" src="public/plug/ue/ueditor.all.js"></script>
    <!-- 编辑器使用的==配置文件 end-->
      <!-- BEGIN PAGE -->
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
               <div class="span12">
                   <!-- BEGIN THEME CUSTOMIZER-->
                   <div id="theme-change" class="hidden-phone">
                       <i class="icon-cogs"></i>
                        <span class="settings">
                            <span class="text">Theme Color:</span>
                            <span class="colors">
                                <span class="color-default" data-style="default"></span>
                                <span class="color-green" data-style="green"></span>
                                <span class="color-gray" data-style="gray"></span>
                                <span class="color-purple" data-style="purple"></span>
                                <span class="color-red" data-style="red"></span>
                            </span>
                        </span>
                   </div>
                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                     活动添加
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#">首页</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="#">活动资源管理</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           活动添加
                       </li>
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN SAMPLE FORMPORTLET-->
                    <div class="widget green">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> 添加活动 </h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->
                            <form action="#" class="form-horizontal" id="addnewsform">
                                <div class="control-group">
                                    <label class="control-label">活动标题:</label>
                                    <div class="controls">
                                        <input type="text" id="title" name="title" class="span6 " />
                                        <span class="help-inline"></span>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">活动所需人数</label>
                                    <div class="controls">
                                        <input type="text" id="neednum" name="neednum" class="span6 " />
                                        <span class="help-inline"></span>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">活动时间</label>
                                    <div class="controls">
                                        <input type="text" id="times" name="times" class="span6 " />
                                        <span class="help-inline"></span>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">活动地址</label>
                                    <div class="controls">
                                        <input type="text" id="address" name="address" class="span6 " />
                                        <span class="help-inline"></span>
                                    </div>
                                </div>

                                <textarea id="uploadEditor" style="display: none;"></textarea>
                                <p id="j_upload_img_btn" class="btn" style="cursor: pointer;">图片上传按钮</p>
                                <ul id="upload_img_wrap"></ul>
                                <input type="hidden" id="img" name="img" value="">

                                <div class="control-group">
                                    <label class="control-label">活动活动</label>
                                    <div class="controls">
                                        <textarea id="content" name="content" class="span10 " />
                                        </textarea>
                                        <span class="help-inline"></span>
                                    </div>
                                </div>
                                


                                <div class="form-actions">
                                    <button type="button" class="btn btn-success" id="addnews">添加</button>
                                    <button type="reset" class="btn">重置</button>
                                </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                    <!-- END SAMPLE FORM PORTLET-->
                </div>
            </div>
         <!-- END PAGE CONTAINER-->
      </div>
    </div>
    <script type="text/javascript">
        var ue = UE.getEditor('content'); //detail是需要加载编辑器的id
        
        // 这里需要实例化一个新的编辑器，防止和上面的编辑器的活动冲突
            var uploadEditor = UE.getEditor("uploadEditor", {
                // "uploadEditor":要和18行的id对应
                isShow: false,
                focus: false,
                enableAutoSave: false,
                autoSyncData: false,
                autoFloatEnabled:false,
                wordCount: false,
                sourceEditor: null,
                scaleEnabled:true,
                toolbars: [["insertimage", "attachment"]]
            });
            uploadEditor.ready(function () {
                uploadEditor.addListener("beforeInsertImage", _beforeInsertImage);
            });

            // 自定义按钮绑定触发多图上传和上传附件对话框事件
            // 'j_upload_img_btn':要和22行的id对应
            document.getElementById('j_upload_img_btn').onclick = function () {
                var dialog = uploadEditor.getDialog("insertimage");
                dialog.title = '多图上传';
                dialog.render();
                dialog.open();
            };

            // 多图上传动作
            function _beforeInsertImage(t, result) {
                var imageHtml = '';
                var img = '';
                for(var i in result){
                    imageHtml += '<li><img src="'+result[i].src+'" alt="'+result[i].alt+'" height="150"></li>';
                    img =result[i].src;
                }
                // 'upload_img_wrap'：要和26行的id对应
                document.getElementById('upload_img_wrap').innerHTML = imageHtml;
                //如果需要保存图片地址到数据，还需要把所有的图片地址作为输入值
                //具体怎么设置看项目需求，我这里只是举个例子
                //'img':要和31行的id对应
                document.getElementById('img').value = img;
            }

    </script>
      <!-- END PAGE -->
      
   <!-- END CONTAINER -->
</div>

   <!-- BEGIN FOOTER -->
   <div id="footer">
       2017 &copy; H51702.
   </div>
   <!-- END FOOTER -->

   <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->

   <script src="js/jquery-1.8.2.min.js"></script>
   <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
   <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
   <script src="assets/bootstrap/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="assets/bootstrap/js/bootstrap-fileupload.js"></script>
   <script src="js/jquery.blockui.js"></script>

   <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
   <script src="js/jQuery.dualListBox-1.3.js" language="javascript" type="text/javascript"></script>


   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->
   <script type="text/javascript" src="assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
   <script type="text/javascript" src="assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
   <script type="text/javascript" src="assets/uniform/jquery.uniform.min.js"></script>
   <script type="text/javascript" src="assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
   <script type="text/javascript" src="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
   <script type="text/javascript" src="assets/clockface/js/clockface.js"></script>
   <script type="text/javascript" src="assets/jquery-tags-input/jquery.tagsinput.min.js"></script>
   <script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
   <script type="text/javascript" src="assets/bootstrap-daterangepicker/date.js"></script>
   <script type="text/javascript" src="assets/bootstrap-daterangepicker/daterangepicker.js"></script>
   <script type="text/javascript" src="assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
   <script type="text/javascript" src="assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
   <script type="text/javascript" src="assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
   <script src="assets/fancybox/source/jquery.fancybox.pack.js"></script>
   <script src="js/jquery.scrollTo.min.js"></script>



   <!--common script for all pages-->
   <script src="js/common-scripts.js"></script>

   <!--script for this page-->
   <script src="js/form-component.js"></script>
   <script src="js/admin.js"></script>
  <!-- END JAVASCRIPTS -->



</body>
<!-- END BODY -->
</html>
