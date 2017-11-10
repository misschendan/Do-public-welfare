
<?php
require './head.php';

$pagenum    = 4;
    //需要得到当前是第几页：默认是第一页。如果地址栏里面传递了页数，则接收
    $page       = isset($_GET['page']) ? $_GET['page']:1;
    
    $content        = $_GET['content'];
    $article_img    = $_GET['article_img'];
    $article_bgimg  = $_GET['article_bgimg'];

    $reg_id =   $_SESSION['reg_id'];
    $regname =  $_SESSION['realname'];
    $img =      $_SESSION['img'];


    //var_dump($content);
    $where      = ' '; //SQL语句的where扩展
    $pageext    = '';  //分页链接地址的扩展
    if($content){
        $where      .= ' AND content LIKE "%'.$content.'%"';
        $pageext    .= '&content=' . $content;
    }

$sql=' SELECT * FROM article ORDER BY article_id DESC LIMIT '.($page-1)*$pagenum.', ' . $pagenum;

//$sql1='SELECT * FROM reg WHERE reg_id= '.$_GET['reg_id'];
//var_dump($sql1);

//$newcatelist=$db->dblink->query($sql1);

//var_dump($newcatelist);
$mycatelists =$db->dblink->query($sql);
$keylist    = $mycatelists->fetch_all(MYSQLI_ASSOC);   
 
 //count(字段):统计满足条件的记录数
    $sql        = 'SELECT count(article_id) AS totalnum FROM article  WHERE 1=1 '.$where;
    // echo $sql;
    $result     = $db->dblink->query($sql);
    $row        = $result->fetch_array(MYSQLI_ASSOC);
    // var_dump($row);
    $totalnum   = $row['totalnum'];
    $totalpage  = ceil($totalnum/$pagenum);


    ?>
    <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="http://apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

<script type="text/javascript" src="public/plug/ue/ueditor.config.js"></script>
    <script type="text/javascript" src="public/plug/ue/ueditor.all.js"></script>

<link rel="stylesheet" href="./css/cindex.css">
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
                     内容列表
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
                           内容列表
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
                                <h4><i class="icon-reorder"></i> 内容列表</h4>
                            </div>
                            <div class="widget-body">
                                <table class="table table-striped table-bordered table-advance table-hover">
                                    <thead>
                                    <tr>
                                        
                              
                                        
                                        <th><i class="icon-bookmark"></i> 操作者ID</th>
                                        
                                        <th><i class="icon-bookmark"></i> 操作者昵称</th>
                                        
                                        <th><i class="icon-bookmark"></i> 操作者头像</th>
                                       
                                        <th><i class="icon-bookmark"></i> 编辑内容</th>
                                       
                                        <th><i class="icon-bookmark"></i> 表情包图片</th>
                                        
                                        <th><i class="icon-bookmark"></i> 背景图片</th>
                                        
                                        <th><i class="icon-bookmark"></i> 添加时间</th>
                                       
                                    </tr>
                                    </thead>
                                    <tbody>
        
                                    <?php 
                                        foreach ($mycatelists as $key =>$val){
                                    ?>
                                    
                                     <tr id="tr_<?=$val['article_id'];?>">
                                            <td><?=$val['reg_id'];?></td>
                                            <td><?=$val['regname'];?></td>
                                            <td><img  class="cimg2" src='<?=$val['img'];?>' ></td>
                                            <td><?=$val['content'];?></td>
                                            <td><img  class="cimg" src='<?=$val['article_img'];?>' ></td>
                                            <td><img class="cimg1" src='<?=$val['article_bgimg'];?>'></td>
                                            <td><?=$val['article_time'];?></td>
                                            <td>
                                                <a href="myupdatecate.php?article_id=<?=$val['article_id'];?>" class="btn btn-primary"><i class="icon-pencil"></i></a>
                                                <button type="button" article_id="<?=$val['article_id'];?>" class="btn btn-danger delcate"><i class="icon-trash "></i></button>
                                            </td>
                                      </tr>
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
                                   
                                   
                         
                
        <!-- PHP的标签：<? ?>，短标签里面可以用=输出一个信息 -->
        <ul id="ull">
        <?php
            echo '<li><a href="./mycatelist.php?page=1'.$pageext.'">首页</a></li>';
            //大于1的时候才会有上一页
            if($page > 1){
                echo '<li><a href="./mycatelist.php?page='.($page-1).$pageext.'">上一页</a></li>';
            }
            // 打印当前页的前后各2页
            for($i = $page-2; $i < $page+3; $i++){
                //大于0 小于 总页数
                if($i > 0 && $i < $totalpage){
                    // 如果是当前访问的页面，不需要链接地址
                    if($i == $page){
                        echo '<li>'.$i.'</li>';
                    }else{
                        echo '<li><a href="./mycatelist.php?page='.$i.$pageext.'">'.$i.'</a></li>'; 
                    }
                }
            }
            //小于  总页数 的时候才会有下一页
            if($page < $totalpage){
                echo '<li><a href="./mycatelist.php?page='.($page+1).$pageext.'">下一页</a></li>';
            }
            //打印最后一页
            echo '<li><a href="./mycatelist.php?page='.$totalpage.$pageext.'">尾页</a></li>';
        ?>
     </ul>
     <script src="./js/jquery-1.8.3.min.js"></script>
    <script src="./myadmin.js"></script>
<?php
require './foot.php';
?>