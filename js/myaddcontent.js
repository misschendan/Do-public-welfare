$('#text').click(function() {

    window.location.href = "guestbook.php";
});





$('.cbtn').click(function() {
    //console.log(666);
    if (!confirm('你确定要删除该条留言吗？')) {
        return;
    }
    //如果点了确定删除，下面开始执行删除任务
    //需要找到删除的信息的主键
    var $article_id = $(this).attr('article_id');
    //交给后台进行数据处理
    //alert($article_id);
    $.ajax({
        url: 'cdelcate.php',
        type: 'POST',
        dataType: 'json',
        data: { article_id: $article_id },
        success: function(data) {
            console.log(data.result);
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
