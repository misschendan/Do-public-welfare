<?php 
    require './head.php';

    //获取全部的一级分类
    $catelist = $db->getDatas('car', '*');
    // var_dump($catelist);
?>
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
                     图片添加
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#">首页</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="#">图片管理</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           图片添加
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
                            <h4><i class="icon-reorder"></i> 添加图片 </h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->
                            <form action="#" class="form-horizontal" id="addcarform">
                                <!-- <div class="control-group">
                                    <label class="control-label">模块分类</label>
                                    <div class="controls">
                                        <select class="span6 " data-placeholder="Choose a Category" name="module_id" tabindex="1">
                                            <option value="0">请选择</option>
                                            <?php 
                                                foreach ($catelist as $key =>$value){
                                                    echo '<option value="'.$value['module_id'].'">'.$value['module_name'].'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">分类名称</label>
                                    <div class="controls">
                                        <input type="text" id="module_name" name="module_name" class="span6 " />
                                        <span class="help-inline">必填</span>
                                    </div>
                                </div>
                                
                                <div class="form-actions"> -->
                                   <div>
<!-- 加载编辑器的容器：用来上传图片的，必须要，不然上传的图片会追加到上面的编辑器里面或者直接报错 -->
        <textarea id="uploadEditor" style="display: none;"></textarea>
            <!-- 需要一个展示上传图片的盒子：根据实际需求自定义，这里只是举个例子； 如：-->
        <div id="upload_img_wrapss" class="upload_img_wrapss"></div>
        <span></span>
        <!--需要一个上传按钮：按钮的id和内容是可以自定义的；-->
        <button type="button" id="upload_img_btnss" class="upload_img_btnss">图片上传</button>
         
            <!--  需要一个传递值的input标签：当然你也可以修改他的id及name；-->
            <!-- 传图片地址值用的 -->
        <input type="hidden" id="imgvalss" name="imgvalss" class="imgvalss" value="">


</div>

                                    <button type="button" class="btn btn-success" id="addcar">添加</button>
                                    <button type="reset" class="btn">重置</button>
                                </div>
                            </form>
                             <script src="./upload_imgss.js"></script>
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
       <!--引用JQ-->
     <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
     <script src="http://apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
   <!-- <script src="./myadmin.js"></script> -->
    <?php 
        require './foot.php';
    ?>