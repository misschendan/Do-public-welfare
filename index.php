<?php 
require "head.php";


 ?>


<img src="./img/02.jpg" class="logo_img" id="logo_img" alt="">
<div class="body_box" id="body_box">
<!--此处轮播图开始-->
    <div class="car" id="car">
         <div class="inner">

<?php 
$dblink=new mysqli('localhost','root','168168','ourdata');
$dblink->query('SET NAMES UTF8');

 ?>

        <ul>
            <li>
            <?php 
            $sql='SELECT * FROM car WHERE car_id=1';
            $result=$dblink->query($sql);
            $car=$result->fetch_array(MYSQLI_ASSOC);
            echo '<img src="'.$car['imgvalss'].'">'
             ?>
            </li>
              <li>
            <?php 
            $sql='SELECT * FROM car WHERE car_id=2';
            $result=$dblink->query($sql);
            $car=$result->fetch_array(MYSQLI_ASSOC);
            echo '<img src="'.$car['imgvalss'].'">'
             ?>
            </li>
              <li>
            <?php 
            $sql='SELECT * FROM car WHERE car_id=3';
            $result=$dblink->query($sql);
            $car=$result->fetch_array(MYSQLI_ASSOC);
            echo '<img src="'.$car['imgvalss'].'">'
             ?>
            </li>
              <li>
            <?php 
            $sql='SELECT * FROM car WHERE car_id=4';
            $result=$dblink->query($sql);
            $car=$result->fetch_array(MYSQLI_ASSOC);
            echo '<img src="'.$car['imgvalss'].'">'
             ?>
            </li>
              <li>
            <?php 
            $sql='SELECT * FROM car WHERE car_id=5';
            $result=$dblink->query($sql);
            $car=$result->fetch_array(MYSQLI_ASSOC);
            echo '<img src="'.$car['imgvalss'].'">'
             ?>
            </li>
        </ul>
    </div>
    <ol>
        <li>1</li>
        <li>2</li>
        <li>3</li>
        <li>4</li>
        <li>5</li>
    </ol>
</div>
</div>
<!--此处轮播图结束-->

<!--益关注开始-->
<div class="body2_box" id="body2_box">
    <img src="./img/13.jpg"  id="img21" class="img21"  alt="">
    <div class="content_box2" id="content_box2">
        <?php 
        $dblink=new mysqli('localhost','root','168168','ourdata');
        $dblink->query('SET NAMES UTF8');
        $sql='SELECT * FROM content WHERE module_id_parent=12';
        $result=$dblink->query($sql);
        $content=$result->fetch_array(MYSQLI_ASSOC);
        ?>
        <div class="content_img_box2" id="content_img_box2">
        <?php 
        echo '<img src="'.$content['imgvals'].'">';
        ?>
        </div>
        <div class="content_detail_box2" id="content_detail_box2">
        <?php 
         echo '<span>'.$content['detail'].'</span>'
        ?>
        </div>                                         

    </div>

</div>
<!--益关注结束-->
<!--益行动开始-->
<div class="body3_box" id="body3_box">
<img src="./img/14.jpg" class="img22" id="img22" alt="">
<div class="content_box3" id="content_box3">
<?php 
$dblink=new mysqli('localhost','root','168168','ourdata');
$dblink->query('SET NAMES UTF8');
$sql='SELECT * FROM content WHERE module_id_parent=13';
$result=$dblink->query($sql);
$content=$result->fetch_array(MYSQLI_ASSOC);
 ?>
    <div class="content_img_box3" id="content_img_box3">
     <?php 
    echo '<img src="'.$content['imgvals'].'">';
    ?>
    </div>
    <div class="content_detail_box3" id="content_detail_box3">
     <?php 
    echo '<span>'.$content['detail'].'</span>'
    ?>
    </div>                                         

</div>



</div>
<!--益行动结束-->
<!--益言堂开始-->
<div class="body4_box" id="body4_box">
<img src="./img/15.jpg" class="img23" id="img23" alt="">
<div class="content_box4" id="content_box4">
<?php 
$dblink=new mysqli('localhost','root','168168','ourdata');
$dblink->query('SET NAMES UTF8');
$sql='SELECT * FROM content WHERE module_id_parent=14';
$result=$dblink->query($sql);
$content=$result->fetch_array(MYSQLI_ASSOC);
 ?>
    <div class="content_img_box4" id="content_img_box4">
     <?php 
    echo '<img src="'.$content['imgvals'].'">';
    ?>
    </div>
    <div class="content_detail_box4" id="content_detail_box4">
     <?php 
    echo '<span>'.$content['detail'].'</span>'
    ?>
    </div>                                         

</div>



</div>
<!--益言堂结束-->


<script>


//轮播图开始
    var car=document.getElementById("car");
    var ul=car.children[0].children[0];
    var ol=car.children[1];
    var lis=ol.children;
    var leader= 0,target=0;
    for(var i=0;i<lis.length;i++){
        lis[i].index=i;
        lis[i].onmouseover=function(){
            // console.log(this.index);
            for(var j=0;j<lis.length;j++){
                lis[j].className=" ";

            }
            lis[this.index].className = "current";
            target=-this.index*800;
        }
    }
    setInterval(function(){
        leader=leader+(target-leader)/10;
        ul.style.left=leader+"px";
    },30)

//轮播图结束
</script>
<?php 

require "foot.php";
 ?>