// window.onload = function() {
//         window.onscroll = function() {
//             var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
//             console.log(scrollTop)
//             if (scrollTop > 400 && scrollTop < 500) {
//                 console.log(777);
//                 $("#img21").css("display", "block");
//                 $("#img21").css({
//                     'animation': 'change 5s',
//                     'animation-fill-mode': 'forwards',
//                     'animation-timing-function': 'linear'

//                 })

//             }

//         }
//     }
// $(window).scroll(function() {
//     $("#img21").css("display", "inline").fadeIn("slow");
// });




$("#reg_btn").on('click', function() {
    $('#reg_mask').css("display", "block");
    $('#reg_box').css("display", "block");
    return false;
})
$("#reg_close").on('click', function() {
    $('#reg_mask').css("display", "none");
    $('#reg_box').css("display", "none");
    return false;
})




$("#login_btn").on('click', function() {
    $('#login_mask').css("display", "block");
    $('#login_box').css("display", "block");
    return false;
})
$("#login_close").on('click', function() {
    $('#login_mask').css("display", "none");
    $('#login_box').css("display", "none");
    return false;
})
$("#exit_btn").click(function() {
    $.ajax({

        url: './clear_session.php',
        type: 'POST',
        dataType: 'json',
        data: { exit_val: 1 },
        success: function(data) {
            if (data.res == 'success') {
                // alert(00);
                window.location.href = ' ';
            }
        }
    })


})
