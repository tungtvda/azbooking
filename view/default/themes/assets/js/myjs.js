// check name
$('body').on("input", '#input_full_name', function () {
    checkNameUser();
});
function checkNameUser() {
    var value = $("#input_full_name").val();
    if (value == '') {
        var mess = 'Bạn vui lòng nhập họ và tên';
        showHiddenNameUser(0, mess);
    } else {
        var mess = '';
        showHiddenNameUser(1, mess);
    }
}
function showHiddenNameUser(res, mess) {
    var name_user_error = $("#error_full_name");
    if (res == 1) {
        name_user_error.hide();
        $('#name_user_error_icon').hide();
        $('#input_full_name').removeClass("input-error").addClass("valid");
    }
    else {
        if (res != 0) {
            mess = res;
        }
        $('#name_user_error_icon').show();
        $('#input_full_name').addClass("input-error").removeClass("valid");
        name_user_error.removeClass("success-color");
        name_user_error.addClass("error-color");
        name_user_error.html(mess);
        name_user_error.show();
    }
}
// check name
$('body').on("input", '#input_birthday', function () {
    checkBirthdayUser();
});
$('body').on("change", '#input_birthday', function () {
    checkBirthdayUser();
});
// check ngày sinh
function checkBirthdayUser() {
    var value = $("#input_birthday").val();
    if (value == '') {
        var mess = 'Bạn vui lòng nhập ngày tháng năm sinh';
        showHiddenBirthdayUser(0, mess);
    } else {
        var value_date = value.split("-");
        var value = new Date(value_date[2], value_date[1] - 1, value_date[0]);
        var mess = '';
        var res = 0;
        var eighteenYearsAgo = moment().subtract(10, "years");
        var birthday = moment(value);

        if (!birthday.isValid()) {
            mess = "Không đúng định dạng ngày tháng năm";
        }
        else if (eighteenYearsAgo.isAfter(birthday)) {
            mess = '';
            res = 1;
        }
        else {
            mess = 'Bạn phải lớn hơn 10 tuổi';
        }
        //var mess='';
        showHiddenBirthdayUser(res, mess);
    }
}
function showHiddenBirthdayUser(res, mess) {
    var birthday_user_error = $("#error_birthday");
    if (res == 1) {
        birthday_user_error.hide();
        $('#input_birthday').removeClass("input-error").addClass("valid");
        $('.date_icon').removeClass("error-color");
    }
    else {
        if (res != 0) {
            mess = res;
        }
        $('#input_birthday').addClass("input-error").removeClass("valid");
        $('.date_icon').addClass("error-color");
        birthday_user_error.removeClass("success-color");
        birthday_user_error.addClass("error-color");
        birthday_user_error.html(mess);
        birthday_user_error.show();
    }
}

// check address
$('body').on("input", '#input_user_phone', function () {
    checkPhoneUser();
});
$('body').on("keyup", '#input_user_phone', function () {
    checkPhoneUser();
});
function checkPhoneUser() {
    var value = $("#input_user_phone").val();
    if (value == '') {
        var mess = 'Bạn vui lòng nhập số điện thoại';
        showHiddenPhoneUser(0, mess);
    } else {
        var mess = '';
        showHiddenPhoneUser(1, mess);
    }
}
function showHiddenPhoneUser(res, mess) {
    var error_user_phone = $("#error_user_phone");
    if (res == 1) {
        error_user_phone.hide();
        $('#error_icon_user_phone').hide();
        $('#input_user_phone').removeClass("input-error").addClass("valid");
    }
    else {
        if (res != 0) {
            mess = res;
        }
        $('#error_icon_user_phone').show();
        $('#input_user_phone').addClass("input-error").removeClass("valid");
        error_user_phone.removeClass("success-color");
        error_user_phone.addClass("error-color");
        error_user_phone.html(mess);
        error_user_phone.show();
    }
}

// check address
$('body').on("input", '#input_address_user', function () {
    checkAddressUser();
});
$('body').on("keyup", '#input_address_user', function () {
    checkAddressUser();
});
//check địa chỉ nhân viên
function checkAddressUser() {
    var value = $("#input_address_user").val();
    if (value == '') {
        var mess = 'Bạn vui lòng nhập địa chỉ';
        showHiddenAddressUser(0, mess);
    } else {
        var mess = '';
        showHiddenAddressUser(1, mess);
    }
}
function showHiddenAddressUser(res, mess) {
    var error_address_user = $("#error_address_user");
    if (res == 1) {
        error_address_user.hide();
        $('#error_icon_address_user').hide();
        $('#input_address_user').removeClass("input-error").addClass("valid");
    }
    else {
        if (res != 0) {
            mess = res;
        }
        $('#error_icon_address_user').show();
        $('#input_address_user').addClass("input-error").removeClass("valid");
        error_address_user.removeClass("success-color");
        error_address_user.addClass("error-color");
        error_address_user.html(mess);
        error_address_user.show();
    }
}

$('body').on("click", '#submit_form_hoso', function () {
    var form_data = $("#form_hoso").serializeArray();
    var error_free = true;
    var count_scroll = 0;
    for (var input in form_data) {
        if (form_data[input]['name'] != "mr" && form_data[input]['name'] != "file-format" && form_data[input]['name'] != "avatar" && form_data[input]['name'] != "user_role") {
            var element = $("#input_" + form_data[input]['name']);
            var error = $("#error_" + form_data[input]['name']);
            var valid = element.hasClass("valid");
            if (valid == false) {
                console.log(form_data[input]['name']);
                if (count_scroll == 0) {
                    $('.main-panel').animate({
                        scrollTop: parseInt($(error).offset().top)
                    }, 1000);
                    count_scroll = 1;
                }
                element.addClass("input-error").removeClass("valid");
                error.show();
                error_free = false
            }
        }
    }
    if (error_free != false) {
        var link = $('#site_name_manage').val() + '/azbooking-update-hoso.html';
        if(link!=''){
            $.ajax({
                method: "POST",
                url: link,
                data : { // Danh sách các thuộc tính sẽ gửi đi
                    user: $('#form_hoso').serializeArray(),
                    form_noti: $('#form_noti').serializeArray()
                },
                success: function (response) {
                    response = $.parseJSON(response);
                    if(response.success==1){
                        showNotification('top','right',2,'Cập nhật hồ sơ thành công');
                    }else{
                        showNotification('top','right',4,response.mess);
                    }
                }
            });
        }else{
            $('error_submit_hoso').show().html('Lỗi! bạn vui lòng F5 và thử lại');
        }
    }

});
function showNotification(from, align,color,mess){
//        color = Math.floor((Math.random() * 4) + 1);
    $.notify({
        icon: "notifications",
        message: mess

    },{
        type: type[color],
        timer: 4000,
        placement: {
            from: from,
            align: align
        }
    });
}
$('body').on('click','.xac_minh_2_buoc', function () {
    var status = 0;
    if ($('#xacminh_2b').is(":checked")) {
        status = 1;
    }
    if(status==1)
    {
        var mess_lable=' Chức năng đăng nhập 2 bước đã được kích hoạt';
    }
    else{
        var mess_lable=' Hủy bỏ đăng nhập 2 bước thành công';
    }
    var link = $('#site_name_manage').val() + '/azbooking-update-2buoc.html';
    if(link!=''){
        $.ajax({
            method: "POST",
            url: link,
            data : { // Danh sách các thuộc tính sẽ gửi đi
                status: status,
                form_noti: $('#form_noti').serializeArray()
            },
            success: function (response) {
                response = $.parseJSON(response);
                if(response.success==1){
                    showNotification('top','right',2,mess_lable);
                }else{
                    showNotification('top','right',4,response.mess);
                }
            }
        });
    }else{
        showNotification('top','right',4,'Lỗi! bạn vui lòng F5 và thử lại');
    }
});
$('body').on("blur",'#input_password_old', function () {
    checkUserPasswordOldConfirm();
});
$('body').on("input",'#input_password_old', function () {
   $('#error_password_old').hide();
});
function checkUserPasswordOldConfirm(){
    var value = $("#input_password_old").val();
    var link = $('#site_name_manage').val() + '/az-check-pass-old.html';
    if(value!=''){
        $.ajax({
            method: "POST",
            url: link,
            data : { // Danh sách các thuộc tính sẽ gửi đi
                value: value,
                form_noti: $('#form_noti').serializeArray()
            },
            success: function (response) {
                response = $.parseJSON(response);
                if (response.success == 1) {
                    var mess="";
                    showHiddenPasswordOldUser(1,mess)
                }
                else{
                    var mess="Mật khẩu cũ không chính xác";
                    showHiddenPasswordOldUser(0,mess)
                }
            }
        });
    }
    else{
        var mess="Bạn vui lòng nhập mật khẩu cũ";
        showHiddenPasswordOldUser(0,mess)
    }

}
function showHiddenPasswordOldUser(res,mess){
    var error_password_old=$("#error_password_old" );
    if (res == 1) {
        error_password_old.hide();
        $('#error_icon_user_password_old').hide();
        $('#user_password_old_success_icon').show();
        $('#input_password_old').removeClass("input-error").addClass("valid");
    }
    else {
        if(res!=0)
        {
            mess=res;
        }
        $('#error_icon_user_password_old').show();
        $('#user_password_old_success_icon').hide();
        $('#input_password_old').addClass("input-error").removeClass("valid");
        error_password_old.removeClass("success-color");
        error_password_old.addClass("error-color");
        error_password_old.html(mess);
        error_password_old.show();
    }
}
// check pass
$('body').on("input",'#input_password', function () {
    checkUserPassword();
});
$('body').on("keyup",'#input_password', function () {
    checkUserPassword();
});
// check pass confirm
$('body').on("input",'#input_password_confirm', function () {
    checkUserPasswordConfirm();
});
$('body').on("keyup",'#input_password_confirm', function () {
    checkUserPasswordConfirm();
});

// check password
function checkUserPassword(){
    var error_password_confirm=$("#error_password_confirm" );
    var value = $("#input_password").val();
    var confirm_password_dangky = $('#input_password_confirm').val();
    if(value==''){
        var mess='Bạn vui lòng nhập mật khẩu';
        showHiddenPasswordUser(0,mess);
    }else{
        if(confirm_password_dangky!=""){
            if(value==confirm_password_dangky)
            {
                error_password_confirm.hide();
                error_password_confirm.html('');
                $('#input_password_confirm').removeClass("input-error").addClass("valid");
            }else{
                error_password_confirm.show();
                error_password_confirm.html('Hai mật khẩu không khớp');
                $('#input_password_confirm').addClass("input-error").removeClass("valid");
            }
        }
        // Must have capital letter, numbers and lowercase letters
        var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");

        // Must have either capitals and lowercase letters or lowercase and numbers
        var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");

        // Must be at least 6 characters long
        var okRegex = new RegExp("(?=.{6,}).*", "g");
        if (okRegex.test(value) === false) {
            // If ok regex doesn't match the password
            $('#error_password').removeClass().addClass('error-color').show().html('Mật khẩu tối thiểu 6 ký tự.');
            $('#error_password').addClass('error-color-size');
            $('#input_password').addClass("input-error").removeClass("valid");


        } else if (strongRegex.test(value)) {
            // If reg ex matches strong password
            showHiddenPasswordValidUser('success_pass','Mật khẩu mạnh!');
            //$('#power_pass').removeClass().addClass('success_pass').html('Mật khẩu mạnh!');
        } else if (mediumRegex.test(value)) {
            // If medium password matches the reg ex
            showHiddenPasswordValidUser('medium_pass','Hãy khiến mật khẩu mạnh hơn với chữ in hoa, số, ký tự đặc biệt!');
            //$('#power_pass').removeClass().addClass('medium_pass').html('Hãy khiến mật khẩu mạnh hơn với chữ in hoa, số, ký tự đặc biệt!');
        } else {
            // If password is ok
            showHiddenPasswordValidUser('weak_pass','Mật khẩu yếu, hãy sử dụng số và chữ hoa!');
            //$('#power_pass').removeClass().addClass('weak_pass').html('Mật khẩu yếu, hãy sử dụng số và chữ hoa.');
        }

        //var mess='';
        //showHiddenPasswordUser(1,mess);
    }
}
function  showHiddenPasswordValidUser(res,mess){
    $('#error_password').removeClass().addClass(res).html(mess);
    $('#input_password').removeClass("input-error").addClass("valid");
    $('#error_password').addClass('error-color-size');
    $('#error_icon_user_pass').hide();
}
function showHiddenPasswordUser(res,mess){
    var error_password=$("#error_password" );
    if (res == 1) {
        error_password.hide();
        $('#error_icon_user_pass').hide();
        $('#input_password').removeClass("input-error").addClass("valid");
    }
    else {
        if(res!=0)
        {
            mess=res;
        }
        $('#error_icon_user_pass').show();
        $('#input_password').addClass("input-error").removeClass("valid");
        error_password.removeClass("success-color");
        error_password.addClass("error-color");
        error_password.html(mess);
        error_password.show();
    }
}

// check pass confirm
function checkUserPasswordConfirm(){
    var error_password_confirm=$("#error_password_confirm" );
    var value = $("#input_password_confirm").val();
    if(value==''){
        var mess='Bạn vui lòng xác nhận mật khẩu';
        showHiddenPasswordConfirmUser(0,mess);
    }else{
        var password_dangky=$('#input_password').val();
        if(value==password_dangky){
            error_password_confirm.hide();
            error_password_confirm.html('');
            $('#error_icon_user_pass_con').hide();
            $('#input_password_confirm').removeClass("input-error").addClass("valid");
        }else{
            error_password_confirm.show();
            error_password_confirm.html('Hai mật khẩu không khớp');
            $('#error_icon_user_pass_con').show();
            $('#input_password_confirm').addClass("input-error").removeClass("valid");
        }
    }
}

function showHiddenPasswordConfirmUser(res,mess){
    var error_password_confirm=$("#error_password_confirm" );
    if (res == 1) {
        error_password_confirm.hide();
        $('#error_icon_user_pass_con').hide();
        $('#input_password_confirm').removeClass("input-error").addClass("valid");
    }
    else {
        if(res!=0)
        {
            mess=res;
        }
        $('#error_icon_user_pass_con').show();
        $('#input_password_confirm').addClass("input-error").removeClass("valid");
        error_password_confirm.removeClass("success-color");
        error_password_confirm.addClass("error-color");
        error_password_confirm.html(mess);
        error_password_confirm.show();
    }
}

$('body').on("click",'#submit_form_password', function () {
    var form_data=$("#submit_chang_pass").serializeArray();
    var error_free=true;
    for (var input in form_data){
        var element=$("#input_"+form_data[input]['name']);
        var error=$("#error_"+form_data[input]['name']);
        var valid=element.hasClass("valid");
        if (valid==false){
            element.addClass("input-error").removeClass("valid");
            error.show();
            error_free=false
        }
    }
    if (error_free!=false){
        var pass_old=$("#input_password_old").val();
        var pass=$("#input_password").val();
        var pass_confirm=$("#input_password_confirm").val();
        if(pass_old!=''&&pass!=""&&pass_confirm!=""){
            var link = $('#site_name_manage').val() + '/az-update-pass.html';
            $.ajax({
                method: "POST",
                url: link,
                data : { // Danh sách các thuộc tính sẽ gửi đi
                    pass_old : pass_old,
                    pass: pass,
                    pass_confirm: pass_confirm,
                    form_noti: $('#form_noti').serializeArray()
                },
                success: function (response) {
                    response = $.parseJSON(response);
                    if(response.success==1){
                        showNotification('top','right',2,'Cập nhật mật khẩu thành công');
                        $('#input_password_old').val('');
                        $('#input_password').val('');
                        $('#input_password_confirm').val('');
                    }else{
                        showNotification('top','right',4,response.mess);
                    }
                }
            });
        }else{
            if(pass_old==''){
                showNotification('top','right',4,'Bạn vui lòng nhập mật khẩu cũ');
            }
            if(pass==''){
                showNotification('top','right',4,'Bạn vui lòng nhập mật khẩu mới');
            }
            if(pass_confirm==''){
                showNotification('top','right',4,'Bạn vui lòng xác nhận mật khẩu');
            }
        }
    }

});
$('body').on("click",'#submit_form_avatar', function () {
    var file_img=$('#imgInp').val();
    if(file_img!=''){
        var link = $('#site_name_manage').val() + '/az-update-avatar.html';
        var fd = new FormData(document.getElementById("form_avatar"));
        fd.append("label", "WEBUPLOAD");
        $(this).html('Loading...');
        $.ajax({
            method: "POST",
            url: link,
            data :fd,
            processData: false,  // tell jQuery not to process the data
            contentType: false,  // tell jQuery not to set contentType
            success: function (response) {
                response = $.parseJSON(response);
                if(response.success==1){
                    showNotification('top','right',2,'Upload ảnh đại diện thành công');
                    $('.nav-user-photo').attr('src', response.avatar)
                    window.location.href = $('#site_name').val()+'/tiep-thi-lien-ket/ho-so/?code='+response.avatar_code;
                }else{
                    showNotification('top','right',4,response.mess);
                }
                $(this).html('Cập nhật');
            }
        });
    }else{
        showNotification('top','right',4,'Bạn vui lòng chọn ảnh đại diện');
    }
});

