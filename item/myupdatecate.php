<?php 
    require './head.php';
    //获取全部的一级分类
    $catelist = $db->getDatas('module', '*');
    //获取原始信息
    $cate = $db->getOneData('module', '*', 'module_id=' . $_GET['module_id']);

    // var_dump($catelist);
?>
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
                     分类修改
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#">首页</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="#">分类管理</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           分类修改
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
                            <h4><i class="icon-reorder"></i> 修改分类 </h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->
                            <form action="#" class="form-horizontal" id="addcateform">
                                <input type="hidden" name="module_id" value="<?=$cate['module_id'];?>">
                                
                                <div class="control-group">
                                    <label class="control-label">一级分类</label>
                                    <div class="controls">
                                        <select class="span6 " data-placeholder="Choose a Category" name="module_id" tabindex="1">
                                            <option value="0">请选择</option>
                                            <?php 
                                                foreach ($catelist as $key =>$value){
                                                    echo '<option value="'.$value['module_id'].'"'.($value['module_id'] == $cate['module_id'] ? ' selected':'').'>'.$value['module_name'].'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">分类名称</label>
                                    <div class="controls">
                                        <input type="text" id="module_name" name="module_name" value="<?=$cate['module_name'];?>" class="span6 " />
                                        <span class="help-inline">必填</span>
                                    </div>
                                </div>
                                
                                <div class="form-actions">
                                    <button type="button" class="btn btn-success" id="addcate">修改</button>
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
          <!--引用JQ-->
     <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
     <script src="http://apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
      <script src="./myadmin.js"></script>
    <?php 
        require './foot.php';
    ?>