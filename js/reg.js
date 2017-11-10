//form表单数据处理
$(document).ready(function() {

    $('#codeimg').click(function() {
        this.src = "./code.php";
    })


    $("#submit_btn").click(function() {
        var $imgval = $("#imgval").val();

        var $regname = $("#regname").val();

        var $reg_tel = $("#reg_tel").val();
        var $reg_passwd = $("#reg_passwd").val();
        var $repasswd = $("#repasswd").val();
        var $code = $("#code").val();




        if (!$imgval) {
            $('#imgval').next('span').html("请上传头像！");
            return;
        } else {
            $('#imgval').next('span').html(" ");
        }
        if (!$regname) {
            $('#regname').next('span').html("昵称必填！");
            return;
        } else {
            $('#regname').next('span').html(" ");
        }
        if (!$reg_tel) {
            $('#reg_tel').next('span').html("电话必填！");
            return;
        } else {
            $('#reg_tel').next('span').html(" ");
        }

        //验证账号
        var usernamep = /^[\w\u4e00-\u9fa5]{6,20}$/i;
        // var usernamep = /^[\w\-]{4,20}$/;
        var ur = usernamep.test($regname);
        if (!ur) {
            $('#regname').next('span').html("请输入有效昵称！");
            return;

        } else {
            $('#regname').next('span').html(" ");
        }
        //验证手机号
        var telp = /^1[35678]\d{9}$/;
        var mr = telp.test($reg_tel);
        if (!mr) {
            $('#reg_tel').next('span').html("请输入有效手机号！");
            return;

        } else {
            $('#reg_tel').next('span').html(" ");
        }





        if (!$reg_passwd) {
            $('#reg_passwd').next('span').html("密码必填！");
            return;
        } else {
            $('#reg_passwd').next('span').html(" ");
        }
        //验证密码
        var passwdtelp = /^[a-zA-Z]{1,19}[\d]{1,19}$/;
        if (passwdtelp.test($reg_passwd) && $reg_passwd.length >= 6 && $reg_passwd.length <= 20) {
            $('#reg_passwd').next('span').html(" ");
        } else {
            $('#reg_passwd').next('span').html("请输入有效密码！");
            return;
        }
        // var pr = passwdtelp.test($reg_passwd);
        // if (!pr) {
        //     $('#reg_passwd').next('span').html("请输入有效密码！");
        //     return;

        // } else {
        //     $('#reg_passwd').next('span').html(" ");
        // }



        if ($repasswd != $reg_passwd) {
            $('#repasswd').next('span').html('确认密码有误！');
            return;
        } else {
            $('#repasswd').next('span').html(" ");
        }

        if (!$code) {
            $('#code').next('span').html("请输入验证码！");
            return;
        } else {
            $('#code').next('span').html(" ");
        }
        // alert($code);


        $.ajax({

            url: './regsubmit.php',
            type: 'POST',
            dataType: 'json',
            data: { img: $imgval, regname: $regname, reg_tel: $reg_tel, reg_passwd: $reg_passwd, code: $code },
            success: function(data) {
                if (data.res == 'name_existing') {

                    $('#regname').next('span').html('此昵称已存在！');
                } else if (data.res == 'tel_existing') {
                    $('#reg_tel').next('span').html('此用户已存在！');
                } else if (data.res == 'false') {
                    $('#code').next('span').html('请输入正确验证码！');
                } else if (data.res == 'success') {


                    alert('注册成功！');

                    window.location.href = ' ';



                }

            }


        });


    });
    $("#regname").blur(function() {
        $('#regname').next('span').html(" ");
    })
    $("#reg_tel").blur(function() {
        $('#reg_tel').next('span').html(" ");
    })
    $("#reg_passwd").blur(function() {
        $('#reg_passwd').next('span').html(" ");
    })
    $("#repasswd").blur(function() {
        $('#repasswd').next('span').html(" ");
    })
    $("#code").blur(function() {
        $('#code').next('span').html(" ");
    })

});
