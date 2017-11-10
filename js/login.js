$(document).ready(function() {
    //登录的点击事件
    $('#loginbutton').click(function() {
        console.log('登录点击事件执行');

        //获取账号和密码的值
        var $admin_name = $('#admin_name').val();
        var $admin_pw = $('#admin_pw').val();
        // console.log($admin_name);
        // console.log($admin_pw);

        //验证账号密码是否为空
        if (!$admin_name) {
            $('#admin_name').next().html('请输入账号');
            return;
        } else {
            $('#admin_name').next().html('');
        }
        if (!$admin_pw) {
            $('#admin_pw').next().html('请输入密码');
            return;
        } else {
            $('#admin_pw').next().html('');
        }

        //判断是否记录密码账号信息，判断复选框是否选中
        var user_remember = '';
        if ($('#remember').attr('checked')) {
            user_remember = $('#remember').val()
        }

        //数据处理
        $.ajax({
            url: './loginsubmit.php',
            type: 'POST',
            dataType: 'json',
            data: { admin_name: $admin_name, admin_pw: $admin_pw, remember: user_remember },
            success: function(data) {
                console.log(data);
                if (data.result == 'no_admin_name') {
                    $('#admin_name').next().html('请输入正确账号');
                    return;
                }
                if (data.result == 'no_admin_pw') {
                    $('#admin_pw').next().html('请输入正确密码');
                    return;
                }
                //验证信息成功
                if (data.result == 'yes') {
                    //验证信息成功
                    window.location.href = './addnews.php';
                    alert('验证成功');
                }

            }
        })

    })

})
