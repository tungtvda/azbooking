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
        var mess_lable=' Hủy bỏ chức năng đăng nhập 2 bước thành công';
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

