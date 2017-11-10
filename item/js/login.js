//绑定一个点击事件
// 事件三要素：事件源、事件、干什么
//每次修改代码完成以后，再测试之前，必须CTRL+F5强制刷新
//
$(document).ready(function() {
    //实现登录事件
    $('#loginbutton').click(function () {
        console.log(1);
        /* body... */
        //账号必填
        var $realname   = $('#realname').val();
        var $passwd     = $('#passwd').val();
        var $remember   = $('input[name="remember"]:checked').val();

        //如果账号为空，提示他必填
        if(!$realname){
            $('#realname').next('span').html('账号必填！');
            return ;
        }else{
            $('#realname').next('span').html('');
        }

        if(!$passwd){
            $('#passwd').next('span').html('密码必填！');
            return ;
        }else{
            $('#passwd').next('span').html('');
        }

        //进入数据处理阶段：AJAX
        $.ajax({
            url: './loginsubmit.php', //请求的地址，相当于是form表单里面的action
            type: 'POST',//数据提交方式，相当于是form表单里面的method
            dataType: 'json', //接收的数据类型，不能被其他任何类型的数据污染
            data: {realname:$realname, passwd123:$passwd, remember:$remember}, //提交的数据，相当于是表单里面的input,键名相当于是input标签的name属性里面的值
            success:function (data) {
                /* body... */
                console.log(data.res);
                //无效的账号
                if(data.res == 'no_exit_realname'){
                    $('#realname').next('span').html('请输入正确账号！');
                }else if(data.res == 'invail_passwd'){
                    $('#realname').next('span').html('请输入正确的密码！');
                }else if(data.res == 'ok'){
                    alert('登录成功');
                    window.location.href = 'index.php';
                }
            }
        });

    });
});
