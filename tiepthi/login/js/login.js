jQuery(function ($) {
    site_name_manage = $('#site_name_manage').val();
    site_name = $('#site_name').val();
    $('body').on("input",'#email_dangky', function () {
        check_email();
    });
    $('body').on("keyup",'#email_dangky', function () {
        check_email();
    });
    function check_email(){
        var check_show_email = $('#check_show_email').val();
        var check_show_username = $('#check_show_username').val();
        var check_show_pass = $('#check_show_pass').val();
        var confirm_res = $('#confirm_res').is(':checked');
        var value = $('#email_dangky').val();
        if(value!=''){
            var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            var is_email=re.test(value);
            if(is_email){
                link = site_name_manage + '/check-login.html';
                var key = "user_email";
                $.ajax({
                    method: "GET",
                    url: link,
                    data: "value=" + value + '&key=' + key,
                    success: function (response) {
                        if (response == 1) {
                            $('#mess_email_dang_ky').hide();
                            $('#check_show_email').val(1);
                            if (check_show_username == 1&&check_show_pass == 1 && confirm_res==1) {
                                $('#dangky_name').show();
                            }
                            else {
                                $('#dangky_name').hide();
                            }
                        }
                        else {
                            $('#mess_email_dang_ky').show().html('<i class="fa fa-times"></i> Email đã tồn tại trong hệ thống');
                            $('#check_show_email').val(0);
                            $('#dangky_name').hide();
                        }
                    }
                });
            }else{
                $('#mess_email_dang_ky').show().html('<i class="fa fa-times"></i> Email không đúng định dạng');
                $('#check_show_email').val(0);
                $('#dangky_name').hide();
            }

        }else{
            $('#check_show_email').val(0);
            $('#mess_email_dang_ky').html('<i class="fa fa-times"></i> Bạn vui lòng nhập email đăng ký').show();
            $('#dangky_name').hide();
        }
    }

    // check username
    $('body').on("input",'#username_dangky', function () {
        check_username();
    });
    $('body').on("keyup",'#username_dangky', function () {
        check_username();
    });
    function check_username(){
        var check_show_email = $('#check_show_email').val();
        var check_show_username = $('#check_show_username').val();
        var check_show_pass = $('#check_show_pass').val();
        var confirm_res = $('#confirm_res').is(':checked');
        var value = $('#username_dangky').val();
        if(value!=''){
            $('#mess_username_dang_ky').hide();
            $('#check_show_username').val(1);
            if (check_show_email == 1&&check_show_pass == 1 && confirm_res==1) {
                $('#dangky_name').show();
            }
        }else{
            $('#mess_username_dang_ky').show().html('<i class="fa fa-times"></i> Bạn vui lòng nhập họ tên');
            $('#check_show_username').val(0);
            $('#dangky_name').hide();
        }
    }


    // check pass
    $('body').on("input",'#password_dangky', function () {
        check_pass();
    });
    $('body').on("keyup",'#password_dangky', function () {
        check_pass();
    });
    function check_pass(){
        var confirm_password_dangky = $('#confirm_password_dangky').val();
        var check_show_pass = $('#check_show_pass').val();
        var confirm_res = $('#confirm_res').is(':checked');
        if (confirm_password_dangky != '') {
            var value = $('#password_dangky').val();
            var check_show_email = $('#check_show_email').val();
            var check_show_username = $('#check_show_username').val();
            if(value==confirm_password_dangky){
                $('#mess_confirm_password_dangky').hide();
                $('#check_show_pass').val(1);
                if (check_show_email == 1&&check_show_username == 1 && confirm_res==1) {
                    $('#dangky_name').show();
                }
            }
            else{
                $('#mess_confirm_password_dangky').show().html('<i class="fa fa-times"></i> Hai mật khẩu không khớp');
                $('#check_show_pass').val(0);
                $('#dangky_name').hide();
            }
        }
        // Must have capital letter, numbers and lowercase letters
        var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");

        // Must have either capitals and lowercase letters or lowercase and numbers
        var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");

        // Must be at least 6 characters long
        var okRegex = new RegExp("(?=.{6,}).*", "g");
        if (okRegex.test($('#password_dangky').val()) === false) {
            // If ok regex doesn't match the password
            $('#power_pass').removeClass().addClass('error_pass').html('<i class="fa fa-times"></i> Mật khẩu tối thiểu 6 ký tự.').show();
            $('#check_show_pass').val(0);
            $('#dangky_name').hide();

        } else if (strongRegex.test($('#password_dangky').val())) {
            // If reg ex matches strong password
            $('#power_pass').removeClass().addClass('success_pass').html('<i class="fa fa-check"></i> Mật khẩu mạnh!').show();
        } else if (mediumRegex.test($('#password_dangky').val())) {
            // If medium password matches the reg ex
            $('#power_pass').removeClass().addClass('medium_pass').html('<i class="fa fa-exclamation-circle"></i> Hãy khiến mật khẩu mạnh hơn với chữ in hoa, số, ký tự đặc biệt!');
        } else {
            // If password is ok
            $('#power_pass').removeClass().addClass('weak_pass').html('<i class="fa fa-exclamation-triangle"></i> Mật khẩu yếu, bạn nên sử dụng số và chữ hoa.');
        }
    }



    // check pass confirm
    $('body').on("input",'#confirm_password_dangky', function () {
        check_pass_confirm();
    });
    $('body').on("keyup",'#confirm_password_dangky', function () {
        check_pass_confirm();
    });

    function check_pass_confirm(){
        var password_dangky=$('#password_dangky').val();
        var check_show_pass = $('#check_show_pass').val();
        var confirm_res = $('#confirm_res').is(':checked');
        var value = $('#confirm_password_dangky').val();
        if (password_dangky != '') {
            if(value!=''){
                var check_show_email = $('#check_show_email').val();
                var check_show_username = $('#check_show_username').val();
                if(value==password_dangky){
                    $('#mess_confirm_password_dangky').hide();
                    $('#check_show_pass').val(1);
                    if (check_show_email == 1&&check_show_username == 1 && confirm_res==1) {
                        $('#dangky_name').show();
                    }
                }
                else{
                    $('#mess_confirm_password_dangky').show().html('<i class="fa fa-times"></i> Hai mật khẩu không khớp');
                    $('#check_show_pass').val(0);
                    $('#dangky_name').hide();
                }
            }else{
                $('#mess_confirm_password_dangky').show().html('<i class="fa fa-times"></i> Bạn vui lòng xác nhận mật khẩu');
                $('#check_show_pass').val(0);
                $('#dangky_name').hide();
            }

        }else{
            if(value!=''){
                $('#mess_confirm_password_dangky').show().html('<i class="fa fa-times"></i> Bạn vui lòng xác nhận mật khẩu');
                $('#check_show_pass').val(0);
                $('#dangky_name').hide();
            }
        }
        var okRegex = new RegExp("(?=.{6,}).*", "g");
        if (okRegex.test(password_dangky) === false) {
            // If ok regex doesn't match the password
            //$('#power_pass').removeClass().addClass('error_pass').html('Mật khẩu tối thiểu 6 ký tự.');
            $('#check_show_pass').val(0);
            $('#dangky_name').hide();
        }
    }
    $('body').on("click",'#confirm_res', function () {
        var check_show=check_dangky(0);
        if(check_show==1){
            $('#dangky_name').show();
        }else{
            $('#dangky_name').hide();
        }
    });
    function check_dangky(show){
        var confirm_res = $('#confirm_res').is(':checked');
        var check_show_pass = $('#check_show_pass').val();
        var check_show_email = $('#check_show_email').val();
        var check_show_username = $('#check_show_username').val();

        if(confirm_res==1&&check_show_pass==1&&check_show_email==1&&check_show_username==1){
            return 1;
        }else{
            if(show==1){
                if(check_show_email==0){
                    $('#mess_email_dang_ky').show().html('<i class="fa fa-times"></i> Bạn vui lòng kiểm tra email');
                }
                if(check_show_username==0){
                    $('#mess_username_dang_ky').show().html('<i class="fa fa-times"></i> Bạn vui lòng kiểm tra họ tên');
                }
                if(check_show_username==0){
                    $('#power_pass').removeClass().addClass('error_pass').html('<i class="fa fa-times"></i> Bạn vui lòng kiểm tra mật khẩu').show();
                }
                if(check_show_username==0){
                    $('#mess_confirm_password_dangky').show().html('<i class="fa fa-times"></i> Bạn vui lòng xác nhận mật khẩu');
                }
                if(confirm_res==0){
                    $('#mess_confirm_res').show();
                }
            }
            return 0
        }
    }
    $('body').on("click",'#dangky_name', function () {
        var check_show=check_dangky(1);
        if(check_show==1){
            $('#action_register').addClass('action_register');
            $('#dangky_name').hide();
            $('#cancel_create').hide();
            $('#toolbar_create').hide();
            $('#loading_create').show();
            link = site_name_manage + '/azbooking-dang-ky.html';
            if($("#signup-form").serialize()){
                $.ajax({
                    method: "POST",
                    url: link,
                    data: $("#signup-form").serialize(),
                    success: function (response) {
                        response=$.parseJSON(response);
                        if (response.success == 1) {
                            $('#action_register').removeClass('action_register');
                            $('#toolbar_create').show();
                            $('#loading_create').hide();
                            lnv.alert({
                                title: 'Đăng ký thành công',
                                content: response.mess,
                                alertBtnText: 'Ok',
                                iconBtnText:'<i style="color: green;" class="ace-icon fa fa-check green"></i>',
                                alertHandler: function () {
                                    window.location.href=site_name+'/tiep-thi-lien-ket/thanh-vien/';
                                }
                            });
                        }
                        else {
                            $('#action_register').removeClass('action_register');
                            $('#dangky_name').show();
                            $('#cancel_create').show();
                            $('#toolbar_create').show();
                            $('#loading_create').hide();
                            lnv.alert({
                                title: 'Lỗi',
                                content: response.mess,
                                alertBtnText: 'Ok',
                                iconBtnText:'<i style="color: red;" class="ace-icon fa fa-exclamation-triangle red"></i>',
                                alertHandler: function () {
                                }
                            });
                        }
                    }
                });
            }else{
                lnv.alert({
                    title: 'Lỗi',
                    content: 'Bạn vui lòng kiểm tra lại thông tin đăng ký',
                    alertBtnText: 'Ok',
                    iconBtnText:'<i style="color: red;" class="ace-icon fa fa-exclamation-triangle red"></i>',
                    alertHandler: function () {
                        $('#action_register').removeClass('action_register');
                        $('#dangky_name').show();
                        $('#cancel_create').show();
                        $('#toolbar_create').show();
                        $('#loading_create').hide();
                    }
                });
            }

        }else{
            lnv.alert({
                title: 'Lỗi',
                content: 'Bạn vui lòng kiểm tra lại thông tin đăng ký',
                alertBtnText: 'Ok',
                iconBtnText:'<i style="color: red;" class="ace-icon fa fa-exclamation-triangle red"></i>',
                alertHandler: function () {
                }
            });
        }
    });
    $("#send_forget_email").on("click", function () {
        var value=$('#email_forget').val();
        var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        var is_email=re.test(value);
        if(is_email){
            $('#loading_reset').show();
            $(this).hide();
            link = site_name_manage + '/check-login.html';
            var key = "user_email";
            $.ajax({
                method: "GET",
                url: link,
                data: "value=" + value + '&key=' + key,
                success: function (response) {
                    if (response == 0) {
                        link = site_name_manage + '/azbooking-reset-password.html';
                        $.ajax({
                            method: "POST",
                            url: link,
                            data: $("#reset-form").serialize(),
                            success: function (response) {
                                response=$.parseJSON(response);
                                if (response.success == 1) {
                                    lnv.alert({
                                        title: 'Reset mật khẩu thành công',
                                        content: response.mess,
                                        alertBtnText: 'Ok',
                                        iconBtnText:'<i style="color: green;" class="ace-icon fa fa-check green"></i>',
                                        alertHandler: function () {
                                            window.location.href=site_name+'/tiep-thi-lien-ket/thanh-vien/';
                                        }
                                    });
                                }
                                else {
                                    $('#loading_reset').hide();
                                    $(this).show();
                                    lnv.alert({
                                        title: 'Lỗi',
                                        content: response.mess,
                                        alertBtnText: 'Ok',
                                        iconBtnText:'<i style="color: red;" class="ace-icon fa fa-exclamation-triangle red"></i>',
                                        alertHandler: function () {
                                        }
                                    });
                                }
                            }
                        });
                    }
                    else {
                        $('#loading_reset').hide();
                        $(this).show();
                        lnv.alert({
                            title: 'Lỗi',
                            content: 'Email không tồn tại trong hệ thống',
                            alertBtnText: 'Ok',
                            iconBtnText:'<i style="color: red;" class="ace-icon fa fa-exclamation-triangle red"></i>',
                            alertHandler: function () {
                                $('#email_forget').focus().select();
                            }
                        });
                    }
                }
            });
        }else{
            lnv.alert({
                title: 'Lỗi',
                content: 'Email không đúng định dạng',
                alertBtnText: 'Ok',
                iconBtnText:'<i style="color: red;" class="ace-icon fa fa-exclamation-triangle red"></i>',
                alertHandler: function () {
                    $('#email_forget').focus().select();
                }
            });
        }

    });
    $("#reset_login").on("click", function () {
        $('#mess_confirm_password_dangky').hide();
        $('#mess_email_dang_ky').hide();
        $('#mess_username_dang_ky').hide();
        $('#power_pass').html('');
        $('#mess_confirm_res').hide();
    });
    $('body').on("click",'.user-signup-link', function () {
        $('#forgot-box').hide();
        $('#login-box').hide();
        $('#signup-box').slideDown();
        $('#email_dangky').focus();

    });
    $('body').on("click",'.forgot-password-link', function () {
        $('#signup-box').hide();
        $('#login-box').hide();
        $('#forgot-box').slideDown();
        $('#email_forget').focus();

    });
    $('body').on("click",'.login-password-link', function () {
        $('#signup-box').hide();
        $('#forgot-box').hide();
        $('#login-box').slideDown();
        $('#email_login').focus();
    });
    $('body').on("click",'.cancel_btn', function () {
        $('#email_login').val('');
        $('#password_login').val('');
        $('#email_dangky').val('');
        $('#username_dangky').val('');
        $('#password_dangky').val('');
        $('#confirm_password_dangky').val('');
        $('#rememberme').prop('checked', false);
        $('#confirm_res').prop('checked', false);
        $('#mess_confirm_password_dangky').hide();
        $('#mess_email_dang_ky').hide();
        $('#mess_username_dang_ky').hide();
        $('#power_pass').html('');
        $('#mess_email_login').hide();
        $('#mess_password_login').hide();
    });
    $('body').on("click",'#login_btn', function () {
        var email_login=$('#email_login').val();
        var password_login=$('#password_login').val();
        if(email_login!=''&&password_login!=''){
            $('#loading_login').show();
            $('#login_btn').hide();
            $('.cancel_btn').hide();
            var check=check_email_login(1);
            if(check==1){
                $("#dangnhap_form").submit();
            }
            else{
                $('#loading_login').hide();
                $('#login_btn').show();
                $('.cancel_btn').show();
            }
        }else{
            if(email_login==''){
                $('#mess_email_login').show();
            }
            if(email_login==''){
                $('#mess_password_login').show();
            }
        }
    });
    $('body').on("input",'#email_login', function () {
        check_email_login(0);
    });
    $('body').on("keyup",'#email_login', function () {
        check_email_login(0);
    });
    function check_email_login(show_check){
        var value = $('#email_login').val();
        var return_check=0;
        if(value!=''){
            var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            var is_email=re.test(value);
            if(is_email){
                $('#mess_email_login').hide();
                return_check=1;
            }else{
                $('#mess_email_login').show().html('<i class="fa fa-times"></i> Email không đúng định dạng');
            }
        }else{
            $('#mess_email_login').html('<i class="fa fa-times"></i> Bạn vui lòng nhập email đăng nhập').show();
        }
        if(show_check==1){
            return return_check;
        }
    }

    $('body').on("input",'#password_login', function () {
        check_password_login();
    });
    $('body').on("keyup",'#password_login', function () {
        check_password_login();
    });
    function check_password_login(){
        var value = $('#password_login').val();
        if(value!=''){
            $('#mess_password_login').hide();
        }else{
            $('#mess_password_login').html('<i class="fa fa-times"></i> Bạn vui lòng nhập mật khẩu đăng nhập').show();
        }
    }
});