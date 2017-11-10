 var divbtn1 = document.getElementById("divbtn1");
 var divbtn2 = document.getElementById("divbtn2");
 var jiyu = document.getElementById("jiyu");
 var cbtnn = document.getElementById("cbtnn");
 divbtn1.onclick = function() {

     jiyu.className = "show";

 }
 divbtn2.onclick = function() {

     location.href = "importindex.php";

 }

 //添加内容事件
 $('#addcontent').click(function() {

     console.log($('#addcontentform').serialize());
     $.ajax({
         url: './myaddcontentsubmit.php',
         type: 'POST',
         dataType: 'json',
         data: $('#addcontentform').serialize(),

         success: function(data) {
             /* body... */
             //console.log(data.result);
             if (data.result == 'success') {
                 alert('操作成功！');
                 window.location.href = './importindex.php';
             } else {
                 alert('操作失败！');
             }
         }
     });
 });

 var ue = UE.getEditor('content'); //content是需要加载编辑器的id

 // 这里需要实例化一个新的编辑器，防止和上面的编辑器的内容冲突
 var imgval = UE.getEditor("imgval", {
     // "imgval":要和18行的id对应
     isShow: false,
     focus: false,
     enableAutoSave: false,
     autoSyncData: false,
     autoFloatEnabled: false,
     wordCount: false,
     sourceEditor: null,
     scaleEnabled: true,
     toolbars: [
         ["insertimage", "attachment"]
     ]
 });
 imgval.ready(function() {
     imgval.addListener("beforeInsertImage", _beforeInsertImage);
 });

 // 自定义按钮绑定触发多图上传和上传附件对话框事件
 // 'j_upload_img_btn':要和22行的id对应
 document.getElementById('cj_upload_img_btn').onclick = function() {
     var dialog = imgval.getDialog("insertimage");
     dialog.title = '请上传单张图片';
     dialog.render();
     dialog.open();
 };

 // 多图上传动作
 function _beforeInsertImage(t, result) {
     var imageHtml = '';
     var article_img = '';
     for (var i in result) {
         imageHtml += '<li><img src="' + result[i].src + '" alt="' + result[i].alt + '" height="150"></li>';
         article_img += result[i].src;
     }
     // 'upload_img_wrap'：要和26行的id对应
     document.getElementById('cupload_img_wrap').innerHTML = imageHtml;
     //如果需要保存图片地址到数据，还需要把所有的图片地址作为输入值
     //具体怎么设置看项目需求，我这里只是举个例子
     //'article_img':要和31行的id对应
     document.getElementById('article_img').value = article_img;
     // console.log(article_img)
 }



 // 这里需要实例化一个新的编辑器，防止和上面的编辑器的内容冲突
 var imgname = UE.getEditor("imgname", {
     // "imgname":要和18行的id对应
     isShow: false,
     focus: false,
     enableAutoSave: false,
     autoSyncData: false,
     autoFloatEnabled: false,
     wordCount: false,
     sourceEditor: null,
     scaleEnabled: true,
     toolbars: [
         ["insertimage", "attachment"]
     ]
 });
 imgname.ready(function() {
     imgname.addListener("beforeInsertImage", mybeforeInsertImage);
 });

 // 自定义按钮绑定触发多图上传和上传附件对话框事件
 // 'j_upload_img_btn1':要和22行的id对应
 document.getElementById('j_upload_img_btn1').onclick = function() {
     var dialogn = imgname.getDialog("insertimage");
     dialogn.title = '请上传背景图片';
     dialogn.render();
     dialogn.open();
 };

 // 上传动作
 function mybeforeInsertImage(t, res) {
     var imagehtml = '';
     var article_bgimg = '';
     for (var i in res) {
         imagehtml += '<li><img src="' + res[i].src + '" alt="' + res[i].alt + '" height="150"></li>';
         article_bgimg += res[i].src;
     }
     // 'upload_img_wrap1'：要和26行的id对应
     document.getElementById('upload_img_wrap1').innerHTML = imagehtml;
     //如果需要保存图片地址到数据，还需要把所有的图片地址作为输入值
     //具体怎么设置看项目需求，我这里只是举个例子
     //'article_bgimg':要和31行的id对应
     document.getElementById('article_bgimg').value = article_bgimg;
     // console.log(article_bgimg)
 }
