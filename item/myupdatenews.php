<?php 
    require './head.php';   

    // 获取全部的一级内容
    //    获取全部的一级内容:左连接查询
    // $sql = 'SELECT  n.news_id, n.title, n.cate_id_parent, 
    //                 n.cate_id_child, n.addtimes, n.realname, 
    //                 cp.catename AS cpname, 
    //                 cc.catename AS ccname
    //         FROM news AS n
    //         LEFT JOIN cate AS cp ON n.cate_id_parent = cp.cate_id
    //         LEFT JOIN cate AS cc ON n.cate_id_child = cc.cate_id
    //         ';

    // $newslist = $db->dblink->query($sql);
   
    $newslist=$db->getDatas('module','*','1=1');
    $news = $db->getOneData('content', '*', 'title_id=' . $_GET['title_id']);    
    $catelist = $db->getDatas('module', '*');
    // $catechildlist = $db->getDatas('module', '*', 'parent_cate_id!=0');
    
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
                     内容修改
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
                           内容修改
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
                            <h4><i class="icon-reorder"></i> 修改内容 </h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->
                            <form action="#" class="form-horizontal" id="addcontentform">
                     
                                <input type="hidden" value='<?=$_GET['title_id']?>' name="title_id">
                                <input type="hidden" value='<?=$catelist['module_id']?>' name="module_id_parent">
                               <!--  <input type="hidden" value='<?=$catechildlist['parent_cate_id']?>' name="cate_id_child"> -->

                                <div class="control-group">
                                    <label class="control-label">模块分类</label>
                                    <div class="controls">
                                        <select class="span6 " data-placeholder="Choose a Category" name="module_id_parent" id="module_id_parent" " tabindex="1">
                                      
                                           <?php 
                                             
                                            foreach ($catelist as $keyc => $valuec) {

                                              echo '<option value="'.$valuec['module_id'] . '"' . ($valuec['module_id'] == $news['module_id_parent'] ? ' selected':'').'>'.$valuec['module_name'] . '</option>';
                                         
                                               }
                                                
                                            ?>
                                        </select>
                                    </div>
                                </div>
<!-- 
                                <div class="control-group">
                                    <label class="control-label">二级分类</label>
                                    <div class="controls">
                                        <select class="span6 " data-placeholder="Choose a Category" name="cate_id_child" id="cate_id_child" " tabindex="1">
                                             <option value="0">请选择</option> 
                                             <?php 
                                                foreach ($catechildlist as $key =>$value){

                                                  echo '<option value="'.$value['cate_id'] . '"' . ($value['cate_id'] == $news['cate_id_child'] ? ' selected':'').'>'.$value['catename'].'</option>';

                                                }
                                            
                                            ?>
                                        </select>
                                    </div>
                                </div> -->

                                <div class="control-group">
                                    <label class="control-label">标题</label>
                                    <div class="controls">
                                        <input type="text" id="title" name="title" class="span6 " value="<?=$news['title'];?>"/>
                                        <span class="help-inline">必填</span>
                                    </div>
                                </div>

<div>
<!-- 加载编辑器的容器：用来上传图片的，必须要，不然上传的图片会追加到上面的编辑器里面或者直接报错 -->
        <textarea id="uploadEditor" style="display: none;"></textarea>
            <!-- 需要一个展示上传图片的盒子：根据实际需求自定义，这里只是举个例子； 如：-->
        <div id="upload_img_wrap" class="upload_img_wrap"></div>
        <!--需要一个上传按钮：按钮的id和内容是可以自定义的；-->
        <button type="button" id="upload_img_btn" class="upload_img_btn">图片上传</button>
         
            <!--  需要一个传递值的input标签：当然你也可以修改他的id及name；-->
            <!-- 传图片地址值用的 -->
        <input type="hidden" id="imgvals" name="imgvals" class="imgvals" value="">


</div>

                                <div class="control-group">
                                    <label class="control-label">详情</label>
                                    <div class="controls">
                                        <textarea id="detail" name="detail" class="span10 "  value="<?=$news['detail'];?>"/>这里是默认信息</textarea>
                                        <span class="help-inline"></span>
                                    </div>
                                </div>
                                
                                <div class="form-actions">
                                    <button type="button" class="btn btn-success" id="addcontent">修改</button>
                                    <button type="reset" class="btn">重置</button>
                                </div>
                            </form>
                            <script src="./upload_imgs.js"></script>
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
        var ue = UE.getEditor('detail'); //detail是需要加载编辑器的id
    </script>
      <!-- END PAGE -->
    <?php
        require './foot.php';
    ?>