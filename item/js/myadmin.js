$(document).ready(function() {
    //添加栏目信息
    $('#addcate').click(function() {
        if (!$('#catename').val()) {
            $('#catename').next('span').html('分类名称必填！');
            return;
        } else {
            $('#catename').next('span').html('');
        }
        // console.log($('#addcateform').serialize());
        //提交数据
        $.ajax({
            url: './myaddcatesubmit.php',
            type: 'POST',
            dataType: 'json',
            data: $('#addcateform').serialize(), //对整个表单的数据进行序列化
            success: function(data) {
                /* body... */
                console.log(data);
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
        var $cate_id = $(this).attr('cate_id');
        //交给后台进行数据处理
        $.ajax({
            url: 'mydelcate.php',
            type: 'POST',
            dataType: 'json',
            data: { cate_id: $cate_id },
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

    $('.delcate2').click(function() {
        // 删除是一个相对较危险的操作，需要给用户确认提示
        if (!confirm('你确定要删除该信息吗？')) {
            return;
        }
        //如果点了确定删除，下面开始执行删除任务
        //需要找到删除的信息的主键
        var $news_id = $(this).attr('news_id');
        //交给后台进行数据处理
        $.ajax({
            url: 'mydelcontent.php',
            type: 'POST',
            dataType: 'json',
            data: { news_id: $news_id },
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

    //联动菜单事件
    $('#cate_id_parent').change(function(event) {
        //得到当前分类的id。然后去数据库里面得到他的子分类
        var $pid = $(this).val();
        $('#cate_id_child').html('');
        $('#cate_id_child').append('<option value="0">请选择</option>');
        $.ajax({
            url: './mygetchild.php',
            type: 'POST',
            dataType: 'json',
            data: { pid: $pid },
            success: function(data) {
                // 循环收到的json数据
                // console.log(data);
                $(data).each(function(index, el) {
                    //console.log(el);
                    var $option = '<option value="' + el.cate_id + '">' + el.catename + '</option>';
                    $('#cate_id_child').append($option);
                });
            }
        });
    });

    //添加内容事件
    $('#addcontent').click(function() {
        if (!$('#title').val()) {
            $('#title').next('span').html('标题必填！');
            return;
        } else {
            $('#title').next('span').html('');
        }
        //提交数据
        $.ajax({
            url: './myaddcontentsubmit.php',
            type: 'POST',
            dataType: 'json',
            data: $('#addcontentform').serialize(), //对整个表单的数据进行序列化
            success: function(data) {
                /* body... */
                console.log(data);
                if (data.result == 'success') {
                    alert('操作成功！');
                    window.location.href = './mycontentlist.php';
                } else {
                    alert('操作失败！');
                }
            }
        });
    });



});
