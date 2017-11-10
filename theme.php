<?php
	// require './head.html';
	require './head.php';
	require './common/DB.php';
	$n=8;
	selectdata('news','1=1');
	$allpagenum=ceil((count($dblink->query($sql)->fetch_all(MYSQLI_ASSOC)))/$n);

	if($_GET['m']&&$_GET['m']>1&&$_GET['m']<$allpagenum+1){
		$m=$_GET['m'];
	}else if($_GET['m']>$allpagenum) {
		$m=$allpagenum;
	}else{
		$m=1;
	}

	//分页显示
	
	$psql='SELECT * FROM news WHERE 1=1'.$where.' ORDER BY news_id LIMIT '.(($m-1)*8).','.$n;
	// echo $sql;
	$result=$dblink->query($psql)->fetch_all(MYSQLI_ASSOC);














	//获取所有的Title
	selectdata('news','1=1','title,news_id');
	$titlelist=$dblink->query($sql)->fetch_all(MYSQLI_ASSOC);

	//设置默认电话值
	// session_start();
	// if($_SESSION['tel']){
	// 	$default_tel=$_SESSION['tel'];
	// }else{
	// 	$default_tel='';
	// }
	
?>
<link rel="stylesheet" type="text/css" href="./css/theme.css">
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>


<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签必须放在最前面-->
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>



   <script src="js/jquery-1.8.2.min.js"></script>
   <script src="js/animatescroll.js"></script>
</head>
<body>
<div id="first_box">
	<i>大善若水，泽及万物</i>
	<div id="pic_box">

	</div>
	<div id="cont_box">
		<p><strong>做公益</strong>是一个基础性的公益平台,在这里我们没有钱财捐助款项，没有公益束缚，在这里我们只召集一群和我们有共同想法的人一起去做这一件件，一桩桩公益小事。<br>
		用慈善心、公益心、博爱心、爱心感染爱心，传递温暖，帮扶弱势群体是民生的有效彰显，民风的有力感染，和谐的强力推进 ，具有极强的凝聚力、生命力和广阔的发展空间，有各级领导及社会各界的关怀、支持、持之以恒的开展慈善活动，为弘扬慈善文 化尽绵薄之力<br>
		我们等待着同样乐意用自己的力量尝试让我们的生活环境幸福值增大的人们。<br>
		近期公益活动详情请点击下方↓↓↓
		</p>
	</div>
</div>
<div id="second_box">
	<p id="second_line"></p>
	<i>公益讯息发布站</i>
	<?php
		foreach ($result as $key => $value) {
	?>
	<div>
		<p><?=$value['title'];?></p>
		<p>所需人数：<?=$value['neednum'];?></p>
		<p>已报名人数：<?=$value['havenum'];?></p>
		<p class="showdetail btn btn-default" news_id="<?=$value['news_id'];?>">详情</p>
	</div>
	<?php	
		}
	?>
		<ul id="link_page">
		    <li><a href="./theme.php?m=1#second_box">首页</a></li>
		    <li><a href="./theme.php?m=<?=($m-1);?>#second_box">上一页</a></li>
		    <li><a href="./theme.php?m=<?=($m+1);?>#second_box">下一页</a></li>
		    <li><a href="./theme.php?m=<?=$allpagenum;?>#second_box">尾页</a></li>
		</ul>
</div>

<div id="third_box">
	<div id="news_content">
		<p id="join_detail" class=" btn btn-lg btn-default">我要参加</p>
		<i>标题</i>
		<img src="img/123.jpg">
		<ul>
			<li>所需人数：</li>
			<li>已报名人数：</li>
			<li>行动地址：</li>
			<li>行动时间：</li>
			<li>行动内容：</li>
		</ul>
		<div id="join">
		<p>请填入您的准确信息</p>
		<!-- <span  id="close_join">X</span> -->
		<button class='close' id="close_join">&times;</button>
		<form id="join_form">
			姓名：
			<input type="text" placeholder="请输入姓名" class="join_input" id="realname" name="realname"><span class="showreq"></span>
			<br>
			电话：<br>
			<input type="tel" placeholder="请输入电话" class="join_input" id="tell" name="tel"><span class="showreq"></span>
			<!-- <input type="tel" placeholder="请输入手机号码" class="join_input" id="tel" name="tel"><span class="showreq"></span> -->
			<br>
			报名活动：<br>
			<select id="application">
				<?php  
					foreach ($titlelist as $key => $value) {
						echo '<option value='.$value['news_id'].'>'.$value['title'].'</option>';
					}
				?>

			</select>
			<br>
			<input type="button" value="保存" id="save_join" class="join_btn btn btn-default">
			<input type="reset" value="取消" class="join_btn btn btn-default">
		</form>
	</div>
	</div>

</div>

</body>
</html>
<script src='./js/theme.js'></script>
<?php
	require './foot.php';
?>