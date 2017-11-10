$(document).ready(function() {


    var $m = $('#title').val() ? 1 : 0;
    $('#addnews').click(function() {
        var ydata = $('#addnewsform').serialize();
        ydata = ydata + '&m=' + $m;

        console.log('添加新闻点击事件执行');
        //判断输入类名框是否为空
        $('#title').val() ? $('#title').next('span').html('') : $('#title').next().html('必填');
        $('#neednum').val() ? $('#neednum').next('span').html('') : $('#neednum').next().html('必填');
        $('#times').val() ? $('#times').next().html('span') : $('#times').next().html('必填');
        $('#address').val() ? $('#address').next().html('span') : $('#address').next().html('必填');
        $.ajax({
            url: './addnewssubmit.php',
            type: 'POST',
            dataType: 'json',
            data: ydata, //对整个表单的数据进行序列化
            success: function(data) {
                console.log(data);
                if (data.result == 'yes') {
                    alert('操作成功');
                    window.location.href = './newslist.php';
                } else {
                    alert('操作失败');
                }
            }
        })
    })

    //删除按钮点击事件
    $('.deletenews').click(function() {
        console.log('删除按钮点击事件执行');
        if (!confirm('你确定要删除该信息吗？')) {
            return;
        }
        var $news_id = $(this).attr('news_id');
        $.ajax({
            url: './deletenews.php',
            type: 'POST',
            dataType: 'json',
            data: { news_id: $news_id },
            success: function(data) {
                if (data.result == 'yes') {
                    alert('删除成功');
                    window.location.reload();
                }
            }
        })
    })


    //显示报名参加者的用户信息
    $('.userlist').click(function() {
        // console.log($(this).attr('news_id'));
        window.location.href = './userlist.php?news_id=' + $(this).attr('news_id');
    })





    //添加图片到数据库
    var $n = $('#pic_name').val() ? 1 : 0;
    $('#addthemepic').click(function() {
        var mdata = $('#addthemepicform').serialize();
        mdata = mdata + '&n=' + $n;
        console.log(mdata)
        if (!$('#pic_address').val()) {
            $('#pic_address').next('span').html('请上传图片');
            return;
        } else {
            $('#pic_address').next('span').html('');
        }
        $.ajax({
            url: './addthemepicsubmit.php',
            type: 'POST',
            dataType: 'json',
            data: mdata, //对整个表单的数据进行序列化
            success: function(data) {
                console.log(data);
                if (data.result == 'yes') {
                    alert('操作成功');
                    window.location.href = './themepiclist.php';
                } else {
                    alert('操作失败');
                }
            }
        })
    })

    //删除轮播图图片数据
    $('.deletepic').click(function() {
        console.log('删除按钮点击事件执行');
        if (!confirm('你确定要删除该图片吗？')) {
            return;
        }
        var $pic_id = $(this).attr('pic_id');
        $.ajax({
            url: './deletepic.php',
            type: 'POST',
            dataType: 'json',
            data: { pic_id: $pic_id },
            success: function(data) {
                if (data.result == 'yes') {
                    alert('删除成功');
                    window.location.reload();
                }
            }
        })
    })

})
