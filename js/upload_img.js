// 这里需要实例化一个新的编辑器，防止和上面的编辑器的内容冲突
var uploadEditor = UE.getEditor("uploadEditor", {
    // "uploadEditor":要和18行的id对应
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
uploadEditor.ready(function() {
    uploadEditor.addListener("beforeInsertImage", _beforeInsertImage);
});

// 自定义按钮绑定触发多图上传和上传附件对话框事件
// 'j_upload_img_btn':要和22行的id对应
document.getElementById('upload_img_btn').onclick = function() {
    var dialog = uploadEditor.getDialog("insertimage");
    dialog.title = '多图上传';
    dialog.render();
    dialog.open();
};

// 多图上传动作
function _beforeInsertImage(t, result) {
    var imageHtml = '';
    var imgval = '';
    for (var i in result) {
        imageHtml = '<li><img src="' + result[i].src + '" alt="' + result[i].alt + '" height="100"></li>';
        imgval = result[i].src;
    }
    // 'upload_img_wrap'：要和26行的id对应
    document.getElementById('upload_img_wrap').innerHTML = imageHtml;
    document.getElementById('upload_img_btn').innerHTML = '已上传';

    //如果需要保存图片地址到数据，还需要把所有的图片地址作为输入值
    //具体怎么设置看项目需求，我这里只是举个例子
    //'imgval':要和31行的id对应
    document.getElementById('imgval').value = imgval;
    document.getElementById('s1').innerHTML = ' ';
}
// 最终存到数据库的是图片的地址，需要显示该图片的地方，把图片地址查询出来，作为img标签的src值输出即可；
