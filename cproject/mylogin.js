$(document).ready(function() {
    $("#loginbutton").click(function() {
        var $regname = $('#regname').val();
        var $passwd = $('#passwd').val();
        var $remember = $('input[name="remember"]:checked').val();
        if (!$regname) {

            $('#regname').next('span').html('账号必填！');
            return;
        } else {
            $('#regname').next('span').html("");
        }

        if (!$passwd) {
            $('#passwd').next('span').html('密码必填！');
            return;
        } else {
            $('#passwd').next('span').html("");
        }

        //数据处理
        $.ajax({

            url: './myloginsubmit.php',
            type: 'POST',
            dataType: 'json',
            data: { regname: $regname, passwd: $passwd, remember: $remember },
            success: function(data) {

                if (data.res == 'no_exit_regname') {
                    $('#regname').next('span').html('请输入正确账号！');
                } else if (data.res == 'invail_passwd') {
                    $('#passwd').next('span').html('请输入正确密码！');
                } else if (data.res == 'ok') {
                    alert('登录成功！');

                    window.location.href = './myaddcate.php';

                }

            }


        });


    });


});
