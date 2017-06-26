jQuery(function ($) {
    site_name_manage = $('#site_name_manage').val();
    site_name = $('#site_name').val();
    var value=$('#email_check_confirm').val();
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
                if (response == 0) {
                    link = site_name_manage + '/azbooking-confirm-email.html';
                    $.ajax({
                        method: "POST",
                        url: link,
                        data: $("#confirm-form").serialize(),
                        success: function (response) {
                            response=$.parseJSON(response);
                            if (response.success == 1) {
                                $('#loading_confirm').hide();
                                lnv.alert({
                                    title: 'Xác nhận thành công',
                                    content: response.mess,
                                    alertBtnText: 'Ok',
                                    iconBtnText:'<i style="color: green;" class="ace-icon fa fa-check green"></i>',
                                    alertHandler: function () {
                                        window.location.href=site_name+'/tiep-thi-lien-ket/thanh-vien/';
                                    }
                                });
                            }
                            else {
                                $('#loading_confirm').hide();
                                $("#confirm_reset").show();
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
                    lnv.alert({
                        title: 'Lỗi',
                        content: 'Email không tồn tại trong hệ thống',
                        alertBtnText: 'Ok',
                        iconBtnText:'<i style="color: red;" class="ace-icon fa fa-exclamation-triangle red"></i>',
                        alertHandler: function () {
                        }
                    });
                    $('#loading_confirm').hide();
                    $("#confirm_reset").show();
                }
            }
        });
    }else{
        $('#loading_confirm').hide();
        lnv.alert({
            title: 'Lỗi',
            content: 'Email không đúng định dạng',
            alertBtnText: 'Ok',
            iconBtnText:'<i style="color: red;" class="ace-icon fa fa-exclamation-triangle red"></i>',
            alertHandler: function () {
            }
        });
    }
    //console.log(email_check_confirm);
    //console.log($);
});