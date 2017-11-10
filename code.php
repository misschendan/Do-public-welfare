<?php 

isset($_SESSION) || session_start();
header('Content-type:image/png');
  // header('Content-type:text/html');
//创建一个图像资源
$im = imagecreate(90, 30);
//创建颜色值
$bgc = imagecolorallocate($im, 255, 255, 255);
$fontcolor = imagecolorallocate($im, 20, 205, 108);
$bordercolor = imagecolorallocate($im, 102, 201, 120);
$linecolor = imagecolorallocate($im, 50, 80, 90);
$pixcolor = imagecolorallocate($im, 100, 20, 0);


imagefill($im, 0, 0, $bgc);

//画干扰线
$ll_s_x=0;
$ll_s_y=rand(0, 30);
$ll_e_x=90;
$ll_e_y=rand(0, 30);

$l2_s_x=0;
$l2_s_y=rand(0, 30);
$l2_e_x=90;
$l2_e_y=rand(0, 30);

imageline($im,$ll_s_x, $ll_s_y, $ll_e_x, $ll_e_y, $linecolor);
imageline($im,$l2_s_x, $l2_s_y, $l2_e_x, $l2_e_y, $linecolor);


//画个边框
imagerectangle($im, 0, 0, 90, 30, $bordercolor);
//画很多点
for($pi = 0; $pi < 200; $pi++){
	imagesetpixel($im, rand(0,90), rand(0,30), $pixcolor);
}

//创建随机数
$code = '';
for($ci = 0; $ci < 4; $ci++){
	$code .= rand(0,9);
}
$_SESSION['code']=$code;


//然后把随机生成的数字追加到图像里面
$startx=2;
$fontfile='./font/pala.ttf';

for($ci=0;$ci<4;$ci++){
	$codestr=substr($code, $ci,1);
	$starty=rand(25,29);
	imagettftext($im, 20, 20, $startx, $starty, $fontcolor, $fontfile,$codestr );
	$startx += rand(16,18);
}

//输出图片
imagepng($im);
//释放资源
imagedestroy($im);

