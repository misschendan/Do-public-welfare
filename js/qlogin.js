$(document).ready(function() {
    $("#login").click(function() {
        console.log(888);
        var $tel = $('#tel').val();
        var $passwd = $('#passwd').val();

        if (!$tel) {

            $('#tel').next('span').html('账号必填！');
            return;
        } else {
            $('#tel').next('span').html("");
        }

        if (!$.isNumeric($tel)) {
            $('#tel').next('span').html('请输入有效手机号！');
            return;
        } else {
            $('#tel').next('span').html("");
        }
        if (!$passwd) {
            $('#passwd').next('span').html('密码必填！');
            return;
        } else {
            $('#passwd').next('span').html("");
        }

        $.ajax({

            url: './qloginsubmit.php',
            type: 'POST',
            dataType: 'json',
            data: { tel: $tel, passwd: $passwd },
            success: function(data) {

                if (data.res == 'no_exit_tel') {
                    $('#tel').next('span').html('请输入正确账号！');
                } else if (data.res == 'invail_passwd') {
                    $('#passwd').next('span').html('请输入正确密码！');
                } else if (data.res == 'OK') {

                    alert('登录成功！');

                    window.location.href = ' ';




                }

            }


        });

    })
    $("#tel").blur(function() {
        $('#tel').next('span').html(" ");
    })
    $("#passwd").blur(function() {
        $('#passwd').next('span').html(" ");
    })
})
