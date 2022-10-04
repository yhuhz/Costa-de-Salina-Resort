//For username
$(document).ready(function(){

    $("#signup_username").keyup(function(){

        var username = $(this).val().trim();

        if(username != ''){

            $.ajax({
                url: 'php api/check_username.php',
                type: 'post',
                data: {signup_username: username},
                success: function(response){

                    $('#signup_checkUser').html(response);

                }
            });
        }else{
            $("#signup_checkUser").html("");
        }

    });

});

function checkpass() {
var password1 = $("#signup_password1").val();
var password2 = $("#signup_password2").val();

if (password1 != password2) {
    $("#signup_checkdata").html("Passwords do not match");
    $("#signup_checkdata").css("color", "red");
    $("#signup_checkdata").css("font-size", "15px");
    $("#signup_password1").css("border-color", "red");
    $("#signup_password2").css("border-color", "red");
} else if (password1.length == 0 && password2.length == 0) {
    $("#signup_checkdata").html("");
    $("#signup_password1").css("border-color", "rgba(0,0,0,0.2)");
    $("#signup_password2").css("border-color", "rgba(0,0,0,0.2)");
}else {
    $("#signup_checkdata").html("Passwords match");
    $("#signup_checkdata").css("color", "green");
    $("#signup_checkdata").css("font-size", "15px");
    $("#signup_password1").css("border-color", "green");
    $("#signup_password2").css("border-color", "green");
}   
}

$(document).ready(function () {
    $("#signup_password1").keyup(checkpass);
    });

$(document).ready(function () {
    $("#signup_password2").keyup(checkpass);
    });