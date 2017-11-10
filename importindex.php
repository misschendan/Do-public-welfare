<?php
require './head.php';
require  './common/common.php';



$pagenum    = 2;
    //需要得到当前是第几页：默认是第一页。如果地址栏里面传递了页数，则接收
    $page       = isset($_GET['page']) ? $_GET['page']:1;
    
    $content         = $_GET['content'];
    $article_img         = $_GET['article_img'];
    $article_bgimg         = $_GET['article_bgimg'];


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
$catelist=$db->dblink->query($sql);
$keylist    = $catelist->fetch_all(MYSQLI_ASSOC);   
 
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
    <link rel="stylesheet" href="./css/cfoot.css">



    <input type="text" name="text" id="text" placeholder="小主留个言呗^_^">
 
          <div class="new-list">
                <ul id="uul">
                                    <?php 
                                        foreach ($catelist as $key =>$val){
                                    ?>
                                    <li id="tr_<?=$val['article_id'];?>"  class="cli1" >
                                    
                                    <img class="cimg2" src='<?=$val['img'];?>'>
                                    <div class="cp3"><?=$val['regname'];?></div>
                                   
                                    <img class="cimg1" src='<?=$val['article_bgimg'];?>'>
                                    <img  class="cimg" src='<?=$val['article_img'];?>' >
                                    <p class="cp"> <?=$val['article_time'];?>  
                                    <div class="cp2"> <?=$val['content'];?></div></p>
                                    <?php 
                                    if($val['regname']==$_SESSION['regname']){

                                      echo  '<button><a href="myupdatecate.php?article_id="'.$val['article_id'].'" class="cbtn2"><img class="cimg11" src="./img/203.jpg"></a></button>
                                    <button class="cbtn" article_id="'.$val['article_id'].'"><img class="cimg12" src="./img/202.jpg"></button>';
                                    }

                                     ?>
                                   
                                    
 

                                    </li>
                                       
                                       <?php 
                                            }
                                        ?>
                                  </ul>
                </div>

                                 
        <!-- PHP的标签：<? ?>，短标签里面可以用=输出一个信息 -->
        <ul id="ull">
        <?php
            echo '<li><a href="./importindex.php?page=1'.$pageext.'">首页</a></li>';
            //大于1的时候才会有上一页
            if($page > 1){
                echo '<li><a href="./importindex.php?page='.($page-1).$pageext.'">上一页</a></li>';
            }
            // 打印当前页的前后各2页
            for($i = $page-2; $i < $page+3; $i++){
                //大于0 小于 总页数
                if($i > 0 && $i < $totalpage){
                    // 如果是当前访问的页面，不需要链接地址
                    if($i == $page){
                        echo '<li>'.$i.'</li>';
                    }else{
                        echo '<li><a href="./importindex.php?page='.$i.$pageext.'">'.$i.'</a></li>'; 
                    }
                }
            }
            //小于  总页数 的时候才会有下一页
            if($page < $totalpage){
                echo '<li><a href="./importindex.php?page='.($page+1).$pageext.'">下一页</a></li>';
            }
            //打印最后一页
            echo '<li><a href="./importindex.php?page='.$totalpage.$pageext.'">尾页</a></li>';
        ?>
     </ul>
     </div>
 
    
</div>
    <div class="cfootbox" id="cfootbox">
        <img src="./img/foot_bg.jpg" class=" cfoot_bg" id="cfoot_bg" alt="">
        <ul>
            <li><a href="">法律信息</a></li>
            <li>|</li>
            <li><a href="">谨防诈骗</a></li>
            <li>|</li>
            <li><a href="">加入我们</a></li>
        </ul>
    </div>
</body>

</html>
<script src="./js/index.js" type="text/javascript"></script>
<script type="text/javascript" src="./js/myaddcontent.js"></script> 