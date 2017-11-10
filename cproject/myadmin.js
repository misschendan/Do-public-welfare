$('#addcate').click(function() {

    //console.log($('#addcateform').serialize());
    //提交数据
    $.ajax({
        url: './myaddcatesubmit.php',
        type: 'POST',
        dataType: 'json',
        data: $('#addcateform').serialize(), //对整个表单的数据进行序列化
        success: function(data) {
            /* body... */
            //console.log(data);
            if (data.result == 'success') {
                alert('操作成功！');
                window.location.href = './mycatelist.php';
            } else {
                alert('操作失败！');
            }
        }
    });
});


//删除栏目信息事件

$('.delcate').click(function() {
    // 删除是一个相对较危险的操作，需要给用户确认提示
    if (!confirm('你确定要删除该信息吗？')) {
        return;
    }
    //如果点了确定删除，下面开始执行删除任务
    //需要找到删除的信息的主键
    var $article_id = $(this).attr('article_id');
    //交给后台进行数据处理
    $.ajax({
        url: 'mydelcate.php',
        type: 'POST',
        dataType: 'json',
        data: { article_id: $article_id },
        success: function(data) {
            /* body... */
            if (data.result == 'ok') {
                alert('删除成功！');
                window.location.reload(); //刷新当前页面
                // $('#tr_' + $cate_id).remove();
            } else {
                alert('删除失败！');
            }
        }
    });
});
//删除内容信息事件








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
document.getElementById('j_upload_img_btn').onclick = function() {
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
    document.getElementById('upload_img_wrap').innerHTML = imageHtml;
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
