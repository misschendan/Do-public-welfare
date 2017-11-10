$(document).ready(function() {


    //轮播图JS设置
    $.ajax({
        url: 'getpic.php',
        type: 'POST',
        dataType: 'json',
        data: 1,
        success: function(data) {
            if (data) {
                var ullength = (data.length + 1) * 100 + '%';
                var ul = document.createElement('ul');
                $(ul).css({ width: ullength, position: 'absolute', top: '0', left: '0', height: '500px' });
                $('#pic_box').append(ul);
                //生成图片
                for (var i = 0; i < data.length; i++) {
                    var li = document.createElement('li');
                    var pic = document.createElement('img');
                    $(li).css({ float: 'left' });
                    $(pic).attr('src', data[i].pic_address);
                    ul.appendChild(li);
                    li.appendChild(pic);
                }
                //轮滑图ul飘移长度

                var lastli = document.createElement('li');
                var lastpic = document.createElement('img');
                $(lastli).css({ position: 'absolute', top: '0', right: '0' });
                $(lastpic).attr('src', data[0].pic_address);
                ul.appendChild(lastli);
                lastli.appendChild(lastpic);

                var num = 0;
                //设置定时器
                var timer = null;
                timer = setInterval(autoPlay, 10);

                function autoPlay() {
                    num--;
                    num <= -800 * (data.length) + 20 ? num = 0 : num;
                    ul.style.left = num + "px";
                }
                pic_box.onmouseover = function() {

                    clearInterval(timer);
                }
                pic_box.onmouseout = function() {
                    timer = setInterval(autoPlay, 10);
                }
            }
        }
    })



    //显示详情的点击事件
    var meselecte;
    $('.showdetail').click(function() {
        $('#third_box')[0].style.display = 'block';
        $('.footbox')[0].style.display = 'block';
        $("#third_box").animatescroll();

        $('#join_form')[0].reset();
        $('.showreq').html('');

        var $news_id = $(this).attr('news_id');
        meselecte = $news_id;
        $.ajax({
            url: './getdetail.php',
            type: 'POST',
            dataType: 'json',
            data: { news_id: $news_id },
            success: function(data) {
                if (data) {
                    $('#news_content').find('i')[0].innerHTML = data['title'];
                    $('#news_content').find('img')[0].src = data["img"];
                    var lis = $('#news_content').find('ul').children();
                    lis[0].innerHTML = '所需人数：' + data['neednum'];
                    lis[1].innerHTML = '已报名人数：' + data['havenum'];
                    lis[2].innerHTML = '活动时间：' + data['times'];
                    lis[3].innerHTML = '活动地址：' + data['address'];
                    lis[4].innerHTML = '活动内容：' + data['content'];
                }
            }
        })


        $('option').css("height", function(index, old) {
            if (this.value == meselecte) {
                $(this).attr('selected', 'ture')
            }
        })

    })


    //点击显示报名信息的页面
    $('#join_detail').click(function() {

        //判断人数是否已满，选择到用户点击活动id字段，判断报名人数是否已满

        $.ajax({
            url: 'judge.php',
            type: 'POST',
            dataType: 'json',
            data: { news_id: meselecte },
            success: function(data) {
                if (data.result == 'yes') {
                    //代表可以报名
                    $('#join').show()
                }
                if (data.result == 'no') {
                    //代表人员已满
                    alert('人员已满，感谢您的支持');
                }
            }
        })


    })
    $("#close_join").click(function() {
        $('#join').hide();
        $('#join_form')[0].reset();
        $('.showreq').html('');
    })


    $('#save_join').click(function() {
        // console.log($('#realname').val());

        var test_name = /^[\u4e00-\u9fa5]{2,4}$/;
        var test_tel = /^1[35678]\d{9}$/;

        var $realname = $('#realname').val();
        var $tel = $('#tell').val();
        var $application = $('#application').find('option:checked').val();
        // console.log($('#application').find('option:checked').val())
        // $('option:checked'))

        // console.log($tel);
        // console.log(test_tel.test($tel));

        if (!$realname || !test_name.test($realname)) {
            $('#realname').next('span').html('请填写姓名');
            return;
        } else {
            $('#realname').next('span').html('');
        }
        if (!$tel || !test_tel.test($tel)) {
            $('#tel').next('span').html('请填写电话');
            // console.log(555)
            return;
        } else {
            $('#tel').next('span').html('');
        }

        // console.log($realname);
        // console.log($tel);
        // console.log($application);

        //判断是否已经报名了，若已经报名则return
        $.ajax({
            url: './judgerepetiton.php',
            type: 'POST',
            dataType: 'json',
            data: { realname: $realname, tel: $tel, application: $application },
            success: function(data) {
                if (data.result == 'repetition') {
                    alert('您已报名此活动');
                    $('#join').hide();
                    $('#realname').val('');
                    $('#tell').val('');
                    return;
                }
                if (data.result == 'have_tel') {
                    alert('此手机号已被注册此活动');
                    $('#tel').val('');
                    return;
                }
                if (data.result == 'yes') {
                    console.log('执行了添加语句');
                    $.ajax({
                        url: './join.php',
                        type: 'POST',
                        dataType: 'json',
                        data: { realname: $realname, tel: $tel, application: $application },
                        success: function(data) {
                            if (data.result == 'yes') {
                                alert('报名成功');
                                window.location.reload();
                            }
                        }
                    })
                }

            }
        })



    })


})
