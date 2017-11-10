<?php 
    require './head.php';

    //获取全部的一级分类
   // $catelist = $db->getDatas('cate', '*', 'parent_cate_id=0');
    // var_dump($catelist);
?>
<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="http://apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

<script type="text/javascript" src="public/plug/ue/ueditor.config.js"></script>
    <script type="text/javascript" src="public/plug/ue/ueditor.all.js"></script>
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
                     内容添加
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#">首页</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="#">内容管理</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           内容添加
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
                            <h4><i class="icon-reorder"></i> 添加内容 </h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->

 <form action="#" class="form-horizontal" id="addcateform">

   
                                    <div class="control-group">
                                    <label class="control-label">留言</label>
                                    <div class="controls">
                                        <textarea id="content" name="content" class="span10 " />我想说。。。</textarea>
                                </div>
                                
                               <div class="control-group">
                                        
                                        <button type="button" id="j_upload_img_btn">我的表情包</button>
                                        <ul id="upload_img_wrap"></ul>
                                         <input type="hidden" id="article_img" name="article_img" value="">
                                         
                                    <!-- 加载编辑器的容器：用来上传图片的，必须要，不然上传的图片会追加到上面的编辑器里面 -->
                                         <textarea id="imgval" style="display: none;"></textarea>
                                   </div>

                             <div class="control-group">
                                   <textarea id="imgname" style="display: none;"></textarea>
                                        <button type="button" id="j_upload_img_btn1">我的皮肤</button>
                                        <ul id="upload_img_wrap1"></ul>
                                        <input type="hidden" id="article_bgimg" name="article_bgimg" value="">
                                         
                                    <!-- 加载编辑器的容器：用来上传图片的，必须要，不然上传的图片会追加到上面的编辑器里面 -->
                                        
                                   </div>
           

                                <div class="form-actions">
                                    <button type="button" class="btn btn-success" id="addcate">添加</button>
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
      <!-- END PAGE -->
      <script type="text/javascript" src="./myadmin.js"></script>  
    <?php 
        require './foot.php';
   ?>