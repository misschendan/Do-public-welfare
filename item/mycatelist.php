<?php 

    require './head.php';
    //获取全部的一级分类
    $catelist = $db->getDatas('module', '*');
    // var_dump($catelist);
    // foreach ($catelist as $key => $value) {
    //     //查询当前分类下面的子分类
    //     $child_catelist = $db->getDatas('module', '*', 'parent_cate_id=' . $value['cate_id']);
    //     //需要把子分类追加到当前元素里面
    //     // $value['child'] = $child_catelist;
    //     $catelist[$key]['child'] = $child_catelist;
    // }
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
                     分类列表
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
                           分类列表
                       </li>
                       <li class="pull-right search-wrap">
                           <form action="search_result.html" class="hidden-phone">
                               <div class="input-append search-input-area">
                                   <input class="" id="appendedInputButton" type="text">
                                   <button class="btn" type="button"><i class="icon-search"></i> </button>
                               </div>
                           </form>
                       </li>
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->

            <div id="page-wraper">
                <div class="row-fluid">
                    <div class="span12">
                        <!-- BEGIN BASIC PORTLET-->
                        <div class="widget orange">
                            <div class="widget-title">
                                <h4><i class="icon-reorder"></i> 分类列表</h4>
                            </div>
                            <div class="widget-body">
                                <table class="table table-striped table-bordered table-advance table-hover">
                                    <thead>
                                    <tr>
                                        
                                        <th class="hidden-phone"><i class="icon-question-sign"></i> 名称</th>
                                        <th><i class="icon-bullhorn"></i> ID</th>
                                        <th><i class="icon-bookmark"></i> 添加时间</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        foreach ($catelist as $key =>$value){
                                    ?>
                                        <tr id="tr_<?=$cv['module_id'];?>">
                                            <td class="hidden-phone"><?=$value['module_name'];?></td>
                                            <td><a href="#"><?=$value['module_id'];?></a></td>
                                            <td><?=$value['addtimes'];?></td>
                                            <td>
                                                <a href="myupdatecate.php?module_id=<?=$value['module_id'];?>" class="btn btn-primary"><i class="icon-pencil"></i></a>
                                                <button type="button" module_id="<?=$value['module_id'];?>" class="btn btn-danger delcate"><i class="icon-trash "></i></button>
                                            </td>
                                        </tr>
                                        <!-- 开始显示一级分类下面的子分类 -->
                                 <!--        <?php 
                                            foreach ($value['child'] as $ck => $cv) {
                                        ?>
                                        <tr id="tr_<?=$cv['cate_id'];?>">
                                            <td class="hidden-phone">&nbsp;&nbsp;｜＿＿<?=$cv['catename'];?></td>
                                            <td><a href="#"><?=$cv['cate_id'];?></a></td>
                                            <td><?=$cv['addtimes'];?></td>
                                            <td>
                                                <a href="myupdatecate.php?cate_id=<?=$cv['cate_id'];?>" class="btn btn-primary"><i class="icon-pencil"></i></a>
                                                <button type="button" cate_id="<?=$cv['cate_id'];?>" class="btn btn-danger delcate"><i class="icon-trash "></i></button>
                                            </td>
                                        </tr>
                                        <?php 
                                            }
                                        ?> -->
                                        <!-- 子分类显示结束 -->
                                        
                                    <?php
                                        }
                                    ?> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END BASIC PORTLET-->
                    </div>
                </div>

            </div>

            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->
       <!--引用JQ-->
<!--      <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
     <script src="http://apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
      <script src="./myadmin.js"></script> -->
    <?php 
        require './foot.php';
    ?>