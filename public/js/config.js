function register() {
    var conf = confirm("Are You Sure to Reigester ?");
    if (conf == true) {
        var form = $("#register_form").serialize() ;
        $.ajax({
            type : "POST",
            url  : "/user/register",
            data : form ,
            success : function (e) {
                var successHtml = "<p  class='text-center'> تم تسجيل عضويتك بنجاح شكراً لأنضمامك <b>"+name+"</b></p>";
                show_alert_success("alert" , successHtml);

                $("#register_model_form").fadeOut(3000,function () {
                    $('#register_model_form').modal('toggle');
                    window.location = "/dashboard";
                });
            },error : function (e) {
                var json = e.responseJSON;
                if (json) {
                    var errors = json.errors;
                    var errorsHtml = '<ul>';
                    $.each(errors, function (index, value) {
                        errorsHtml += "<li> " + value[0]+ "</li>" ;
                    });
                    errorsHtml += "</ul>";
                    show_alert_error("alert" , errorsHtml);
                }
            }
        })
    }
}

function login() {
        var form = $("#login_form").serialize() ;
        $.ajax({
            type : "POST",
            url  : "/login",
            data : form ,
            success : function () {
                var successHtml = "<small class='text-center'> تم تسجيل الدخول بنجاح </small>";
                show_alert_success("alert_login" , successHtml);
                $("#login_model_form").fadeOut(3000,function () {
                    $('#login_model_form').modal('toggle');
                    window.location = "/dashboard";
                });
            },error : function (e) {
                var json = e.responseJSON;
                if (json) {
                    var errors = json.errors;
                    var errorsHtml = '<small>خطاء في تسجيل الدخول يرجى التحقق من البيانات</small>';
                    show_alert_error("alert_login" , errorsHtml);
                }
            }
        })
}


function show_alert_error(E_id , message) {
    var error_message = "<div class='alert alert-danger'> "+message+" </div>";
    $("#"+E_id).html(error_message);
    return false
}
function show_alert_success(E_id , message) {
    var success_message = "<div class='alert alert-success'> "+message+" </div>";
    $("#"+E_id).html(success_message);
    return false
}
