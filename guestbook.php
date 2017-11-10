<?php
require './head.php';
 require  './common/common.php';
    ?>

 <script type="text/javascript" src="public/plug/ue/ueditor.config.js"></script>
<script type="text/javascript" src="public/plug/ue/ueditor.all.js"></script>
<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="http://apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<link rel="stylesheet" href="./css/guestbookbody.css">

<h1 style="background-color: #EBEBEB; margin:55px;">留言板</h1>
<div class="bttn">
            <button  id="divbtn1">寄语</button></div>
           <div class="bttn1"> <button id="divbtn2">算了，下次吧</button></div>
<form action="#" class="form-horizontal" id="addcontentform">

 
<!-- <input type="hidden" id="article_id" name="article_id" value="<?=$_GET['article_id'];?>"> -->
            <div class="hidde" id="jiyu">
                                    
                                    <div class="control-group">
                                    <label class="controllabel">留言</label>
                                    <div class="controls">
                                        <textarea id="content" name="content" class="span10 " />我想说。。。</textarea>
                                </div>
                                
                                <div class="cbox">
                                        
                                        <button type="button" id="cj_upload_img_btn">我的表情包</button>
                                        <ul id="cupload_img_wrap"></ul>
                                         <input type="hidden" id="article_img" name="article_img" value="">
                                         
                                    <!-- 加载编辑器的容器：用来上传图片的，必须要，不然上传的图片会追加到上面的编辑器里面 -->
                                         <textarea id="imgval" style="display: none;"></textarea>
                                   </div>

                                   <div class="ccbox">
                                   <textarea id="imgname" style="display: none;"></textarea>
                                        <button type="button" id="j_upload_img_btn1">我的皮肤</button>
                                        <ul id="upload_img_wrap1"></ul>
                                        <input type="hidden" id="article_bgimg" name="article_bgimg" value="">
                                         
                                    <!-- 加载编辑器的容器：用来上传图片的，必须要，不然上传的图片会追加到上面的编辑器里面 -->
                                        
                                   </div>
                                <div class="form-actions">
                                    <button type="button" class="btnsuccess" id="addcontent">添加</button>
                                </div>

                                </div>
                            </form>



<script src="./js/guestbookbody.js"></script>



   