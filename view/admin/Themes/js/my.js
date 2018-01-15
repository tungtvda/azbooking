jQuery(document).ready(function(){
    $('body').on('click', '#add_dichvu', function () {
        var n = $('.item_dichvu').length;
        n = n + 1;
        var list = $('#danhmuc_dichvu_select').html();
        var item =
            ' <tr id="item_dichvu_' +
            n +
            '" data-value="' +
            n +
            '" class="item_dichvu">' +
            '<td style="padding-right: 5px" id="stt_dichvu_td_' +
            n +
            '">' +
            n +
            '</td>' +
            '<td id="name_dichvu_td"><input value="" name="name_dichvu[]" id="input_name_dichvu_' +
            n +
            '" type="text" class="valid input_table width-input-150"></td>' +
            '<td> <select class="width-input-165" name="type_dichvu[]" id="input_type_dichvu_' +
            n +
            '">' +
            list +
            '</select></td>' +

            '<td><input  style="width: 50px" data-value="' +
            n +
            '" value="1" name="soluong_dichvu[]" min="1" id="input_soluong_dichvu_' +
            n +
            '" type="number" class="valid input_table input_soluong_dichvu"></td>' +
            '<td><input  value="0" data-value="' +
            n +
            '" name="price_dichvu[]" id="input_price_dichvu_' +
            n +
            '" type="number" class="valid input_table input_price_dichvu width-input-150">' +
            '</td>' +
            '<td><input readonly  value="" name="thanhtien_dichvu[]" id="input_thanhtien_dichvu_' +
            n +
            '" type="text" class="valid input_table width-input-150"></td>' +
            '<td><input   value="" name="ghichu_dichvu[]" id="input_ghichu_dichvu_' +
            n +
            '" type="text" class="valid input_table width-input-150"></td>' +
            '<td><a  href="javascript:void(0)" id="remove_item_dichvu_' +
            n +
            '" data-remove="' +
            n +
            '" class="remove_item_dichvu">x</a></td>' +
            '</tr>';
        $('#list_dichvu').append(item);
    });
    $('body').on('click', '.remove_item_dichvu', function () {
        var id = $(this).attr('data-remove');
        $('#item_dichvu_' + id).remove();
        $('.item_dichvu').each(function (index) {
            var n = index + 1;
            var id = $(this).attr('data-value');
            $('#stt_dichvu_td_' + id)
                .html(n)
                .attr('id', 'stt_dichvu_td_' + n);
            $(this).attr('id', 'item_dichvu_' + n);
            $(this).attr('data-value', n);
            $('#input_name_dichvu_' + id).attr('id', 'input_name_dichvu_' + n);
            $('#input_type_dichvu_' + id).attr('id', 'input_type_dichvu_' + n);
            $('#input_soluong_dichvu_' + id).attr('id', 'input_soluong_dichvu_' + n);
            $('#input_ghichu_dichvu_' + id).attr('id', 'input_ghichu_dichvu_' + n);
            $('#remove_item_dichvu_' + id).attr('id', 'remove_item_dichvu_' + n);
            $('#remove_item_dichvu_' + id).attr('data-remove', n);
        });
        total_price_dich_vu(0, 0, 0);
    });
    $('body').on('click', '.input_price_dichvu', function () {
        $(this).select();
    });
    $('body').on('click', '.input_soluong_dichvu', function () {
        $(this).select();
    });
    $('body').on('input', '.input_price_dichvu', function () {
        var price = $(this).val();
        var id = $(this).attr('data-value');
        var numberRegex = /^[+-]?\d+(\.\d+)?([eE][+-]?\d+)?$/;
		var price_format='';
        if (numberRegex.test(price)) {
            var price_format = price.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' vnđ';
        } else {
            $(this).val(0);
            price = 0;
        }
        if (price <= 0) {
            price = 0;
            $(this).val(0);
        }
        $('#don_gia_th').html('('+price_format+')');
        total_price_dich_vu(price, id);
    });
    $('body').on('input', '.input_soluong_dichvu', function () {
        var soluong = $(this).val();
        var id = $(this).attr('data-value');
        var numberRegex = /^[+-]?\d+(\.\d+)?([eE][+-]?\d+)?$/;

        if (!numberRegex.test(soluong)) {
            $(this).val(1);
            soluong = 1;
        }
        total_price_dich_vu(0, id, soluong);
    });
    $('body').on('click', '#input_loi_nhuan', function () {
        $(this).select();
    });
    $('body').on('input', '#input_loi_nhuan', function (e) {
        input_loi_nhuan();
    });
    $('body').on('blur', '#input_loi_nhuan', function (e) {
        input_loi_nhuan();
    });
    $('body').on('click', '#input_loi_nhuan_m1', function () {
        $(this).select();
    });
    $('body').on('input', '#input_loi_nhuan_m1', function (e) {
        input_loi_nhuan_1();
    });
    $('body').on('blur', '#input_loi_nhuan_m1', function (e) {
        input_loi_nhuan_1();
    });
    $('body').on('click', '#input_loi_nhuan_m2', function () {
        $(this).select();
    });
    $('body').on('input', '#input_loi_nhuan_m2', function (e) {
        input_loi_nhuan_2();
    });
    $('body').on('blur', '#input_loi_nhuan_m2', function (e) {
        input_loi_nhuan_2();
    });
    $('body').on('click', '#input_loi_nhuan_m3', function () {
        $(this).select();
    });
    $('body').on('input', '#input_loi_nhuan_m3', function (e) {
        input_loi_nhuan_3();
    });
    $('body').on('blur', '#input_loi_nhuan_m3', function (e) {
        input_loi_nhuan_3();
    });
    $('body').on('click', '#input_tyle_m1', function () {
        $(this).select();
    });
    $('body').on('input', '#input_tyle_m1', function (e) {
        input_tyle_1();
    });
    $('body').on('blur', '#input_tyle_m1', function (e) {
        input_tyle_1();
    });
    $('body').on('click', '#input_tyle_m2', function () {
        $(this).select();
    });
    $('body').on('input', '#input_tyle_m2', function (e) {
        input_tyle_2();
    });
    $('body').on('blur', '#input_tyle_m2', function (e) {
        input_tyle_2();
    });
    $('body').on('click', '#input_tyle_m3', function () {
        $(this).select();
    });
    $('body').on('input', '#input_tyle_m3', function (e) {
        input_tyle_3();
    });
    $('body').on('blur', '#input_tyle_m3', function (e) {
        input_tyle_3();
    });

    $('body').on('click', '#input_hoa_hong', function () {
        $(this).select();
    });
    $('body').on('input', '#input_hoa_hong', function (e) {
        input_hoa_hong();
    });
    $('body').on('blur', '#input_hoa_hong', function (e) {
        input_hoa_hong();
    });
});
function input_hoa_hong() {
    var value = $('#input_hoa_hong').val();
    var numberRegex = /^[+-]?\d+(\.\d+)?([eE][+-]?\d+)?$/;
    if (!numberRegex.test(value)) {
        $('#input_hoa_hong').val(0);
        value = 0;
    }
    var price_format = value.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' vnđ';
    $('#hoa_hong_format').html('('+price_format+')');
}
function input_tyle_3() {
    var value = $('#input_tyle_m3').val();
    if (!$.isNumeric(value)) {
        $('#input_tyle_m3').val(0);
    }
    if (value > 100) {
        $('#input_tyle_m3').val(100);
    }
    total_price_dich_vu(0, 0, 0);
}
function input_tyle_2() {
    var value = $('#input_tyle_m2').val();
    if (!$.isNumeric(value)) {
        $('#input_tyle_m2').val(0);
    }
    if (value > 100) {
        $('#input_tyle_m2').val(100);
    }
    total_price_dich_vu(0, 0, 0);
}
function input_tyle_1() {
    var value = $('#input_tyle_m1').val();
    if (!$.isNumeric(value)) {
        $('#input_tyle_m1').val(0);
    }
    if (value > 100) {
        $('#input_tyle_m1').val(100);
    }
    total_price_dich_vu(0, 0, 0);
}
function input_loi_nhuan_3() {
    var value = $('#input_loi_nhuan_m3').val();
    var numberRegex = /^[+-]?\d+(\.\d+)?([eE][+-]?\d+)?$/;
    if (!numberRegex.test(value)) {
        $('#input_loi_nhuan_m3').val(0);
        value = 0;
    }
    var price_format = value.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' vnđ';
    $('#price_loinhuan_format_3').html(price_format);
    total_price_dich_vu(0, 0, 0);
}
function input_loi_nhuan_1() {
    var value = $('#input_loi_nhuan_m1').val();
    var numberRegex = /^[+-]?\d+(\.\d+)?([eE][+-]?\d+)?$/;
    if (!numberRegex.test(value)) {
        $('#input_loi_nhuan_m1').val(0);
        value = 0;
    }
    var price_format = value.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' vnđ';
    $('#price_loinhuan_format_1').html(price_format);
    total_price_dich_vu(0, 0, 0);
}
function input_loi_nhuan_2() {
    var value = $('#input_loi_nhuan_m2').val();
    var numberRegex = /^[+-]?\d+(\.\d+)?([eE][+-]?\d+)?$/;
    if (!numberRegex.test(value)) {
        $('#input_loi_nhuan_m2').val(0);
        value = 0;
    }
    var price_format = value.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' vnđ';
    $('#price_loinhuan_format_2').html(price_format);
    total_price_dich_vu(0, 0, 0);
}
function input_loi_nhuan() {
    var value = $('#input_loi_nhuan').val();
    var numberRegex = /^[+-]?\d+(\.\d+)?([eE][+-]?\d+)?$/;
    if (!numberRegex.test(value)) {
        $('#input_loi_nhuan').val(0);
        value = 0;
    }
    var price_format = value.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' vnđ';
    $('#price_loinhuan_format').html(price_format);
    total_price_dich_vu(0, 0, 0);
}
function total_price_dich_vu(price, item, soluong_dichvu) {
    if (price >= 0 && item > 0) {
        var soluong = $('#input_soluong_dichvu_' + item).val();
        if (soluong <= 0) {
            soluong = 1;
        }
        var thanh_tien = soluong * price;
        var thanh_tien_format = thanh_tien.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' vnđ';
        $('#input_thanhtien_dichvu_' + item).val(thanh_tien_format);
        $('#price_dichvu_format_' + item).html(price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' vnđ');
    }
    if (soluong_dichvu >= 0 && item > 0) {
        var price_dichvu = $('#input_price_dichvu_' + item).val();
        if (price_dichvu <= 0) {
            price_dichvu = 0;
        }
        var thanh_tien = soluong_dichvu * price_dichvu;
        var thanh_tien_format = thanh_tien.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' vnđ';
        $('#input_thanhtien_dichvu_' + item).val(thanh_tien_format);
        $('#price_dichvu_format_' + item).html(
            price_dichvu.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' vnđ'
        );
    }
    var total = 0;
    $('.item_dichvu').each(function (index) {
        var n = index + 1;
        var id = $(this).attr('data-value');
        var soluong = $('#input_soluong_dichvu_' + id).val();
        var price_dichvu = $('#input_price_dichvu_' + id).val();
        var thanhtien = soluong * price_dichvu;
        total = total + thanhtien;
    });
    $('#input_tong_tien_nguoi_lon').val(total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' vnđ');


    // tính giá người lớn
    var giaban_nguoi_lon = price_nguoi_lon(total);

    // tính giá trẻ em mức 1
    var giaban_tre_em_m1 = price_tre_em_m1(total);

    // tính giá trẻ em mức 2
    var giaban_tre_em_m2 = price_tre_em_m2(total);

    // tính giá trẻ em mức 3
    var giaban_tre_em_m3 = price_tre_em_m3(total);

    // tinh_tong_tien(type_tour);
}

function price_nguoi_lon(total) {
   var soluong_nguoi_lon = 1;
    var price_pax = total / soluong_nguoi_lon;
    var price_pax = parseFloat(price_pax);
    price_pax = Math.round(price_pax * 1000) / 1000;
    if (price_pax % 2 == 0 || soluong_nguoi_lon == 1) {
        var price_pax_format = price_pax.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' vnđ';
    } else {
        var price_pax_format = price_pax.toFixed(2).replace('.', ',');
        price_pax_format = price_pax_format.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' vnđ';
    }

    $('#input_don_gia_net').val(price_pax_format);
    var loi_nhuan_nguoi_lon = $('#input_loi_nhuan').val();
    if (loi_nhuan_nguoi_lon == '') {
        loi_nhuan_nguoi_lon = 0;
        $('#input_loi_nhuan').val(0);
    }
    var giaban = parseFloat(loi_nhuan_nguoi_lon) + price_pax;
    giaban = Math.round(giaban * 1000) / 1000;
    if (giaban % 2 == 0 || soluong_nguoi_lon == 1) {
        var giaban_format = giaban.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' vnđ';
    } else {
        var giaban_format = giaban.toFixed(2).replace('.', ',');
        giaban_format = giaban_format.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' vnđ';
    }
    $('#don_gia_price_format').html('('+giaban_format+')');
    $('#input_gia_ban').val(giaban_format);
    $('#input_price').val(giaban);
    return giaban;
}

function price_tre_em_m1(total) {
    var tyle_m1 = $('#input_tyle_m1').val();
    if (tyle_m1 == '') {
        tyle_m1 = 0;
    }
    var total_price_m1 = total * tyle_m1 / 100;
    if (total_price_m1 % 2 != 0) {
        var total_price_m1 = parseFloat(total_price_m1);
        total_price_m1 = Math.round(total_price_m1 * 1000) / 1000;
    }
    var soluong_khach_1=1;
    var price_pax_m1 = 0;
    if (soluong_khach_1 > 0) {
        price_pax_m1 = total_price_m1 / soluong_khach_1;
        price_pax_m1 = parseFloat(price_pax_m1);
        price_pax_m1 = Math.round(price_pax_m1 * 1000) / 1000;
    }
    if (price_pax_m1 % 2 == 0 || soluong_khach_1 == 1) {
        var price_pax_m1_format = price_pax_m1.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' vnđ';
    } else {
        var price_pax_m1_format = price_pax_m1.toFixed(2).replace('.', ',');
        var price_pax_m1_format = price_pax_m1_format.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' vnđ';
    }
    $('#input_don_gia_net_m1').val(price_pax_m1_format);
    var loi_nhuan_m1 = $('#input_loi_nhuan_m1').val();
    if (loi_nhuan_m1 == '') {
        loi_nhuan_m1 = 0;
        $('#input_loi_nhuan_m1').val(0);
    }

    var giaban_m1 = parseFloat(loi_nhuan_m1) + price_pax_m1;
    giaban_m1 = Math.round(giaban_m1 * 1000) / 1000;
    if (giaban_m1 % 2 == 0 || soluong_khach_1 == 1) {
        var giaban_format_m1 = giaban_m1.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' vnđ';
    } else {
        var giaban_format_m1 = giaban_m1.toFixed(2).replace('.', ',');
        var giaban_format_m1 = giaban_format_m1.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' vnđ';
    }
    $('#don_gia_price_2_format').html('('+giaban_format_m1+')');
    $('#input_gia_ban_m1').val(giaban_format_m1);
    $('#input_price_2').val(giaban_m1);
    return giaban_m1;
}

function price_tre_em_m2(total) {
    var tyle_m2 = $('#input_tyle_m2').val();
    if (tyle_m2 == '') {
        tyle_m2 = 0;
    }
    var total_price_m2 = total * tyle_m2 / 100;
    if (total_price_m2 % 2 != 0) {
        var total_price_m2 = parseFloat(total_price_m2);
        total_price_m2 = Math.round(total_price_m2 * 1000) / 1000;
    }
   var soluong_khach_2 = 1;
    var price_pax_m2 = 0;
    if (soluong_khach_2 > 0) {
        price_pax_m2 = total_price_m2 / soluong_khach_2;
        price_pax_m2 = parseFloat(price_pax_m2);
        price_pax_m2 = Math.round(price_pax_m2 * 1000) / 1000;
    }

    if (price_pax_m2 % 2 == 0 || soluong_khach_2 == 1) {
        var price_pax_m2_format = price_pax_m2.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' vnđ';
    } else {
        var price_pax_m2_format = price_pax_m2.toFixed(2).replace('.', ',');
        var price_pax_m2_format = price_pax_m2_format.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' vnđ';
    }
    $('#input_don_gia_net_m2').val(price_pax_m2_format);
    var loi_nhuan_m2 = $('#input_loi_nhuan_m2').val();
    if (loi_nhuan_m2 == '') {
        loi_nhuan_m2 = 0;
        $('#input_loi_nhuan_m2').val(0);
    }

    var giaban_m2 = parseFloat(loi_nhuan_m2) + price_pax_m2;
    giaban_m2 = Math.round(giaban_m2 * 1000) / 1000;
    if (giaban_m2 % 2 == 0 || soluong_khach_2 == 1) {
        var giaban_format_m2 = giaban_m2.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' vnđ';
    } else {
        var giaban_format_m2 = giaban_m2.toFixed(2).replace('.', ',');
        var giaban_format_m2 = giaban_format_m2.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' vnđ';
    }
    $('#don_gia_price_3_format').html('('+giaban_format_m2+')');
    $('#input_gia_ban_m2').val(giaban_format_m2);
    $('#input_price_3').val(giaban_m2);
    return giaban_m2;
}

function price_tre_em_m3(total) {
    var tyle_m3 = $('#input_tyle_m3').val();
    if (tyle_m3 == '') {
        tyle_m3 = 0;
    }
    var total_price_m3 = total * tyle_m3 / 100;
    if (total_price_m3 % 2 != 0) {
        var total_price_m3 = parseFloat(total_price_m3);
        total_price_m3 = Math.round(total_price_m3 * 1000) / 1000;
    }
    var soluong_khach_3 = 1;
    var price_pax_m3 = 0;
    if (soluong_khach_3 > 0) {
        price_pax_m3 = total_price_m3 / soluong_khach_3;
        price_pax_m3 = parseFloat(price_pax_m3);
        price_pax_m3 = Math.round(price_pax_m3 * 1000) / 1000;
    }

    if (price_pax_m3 % 2 == 0 || soluong_khach_3 == 1) {
        var price_pax_m3_format = price_pax_m3.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' vnđ';
    } else {
        var price_pax_m3_format = price_pax_m3.toFixed(2).replace('.', ',');
        var price_pax_m3_format = price_pax_m3_format.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' vnđ';
    }
    $('#input_don_gia_net_m3').val(price_pax_m3_format);
    var loi_nhuan_m3 = $('#input_loi_nhuan_m3').val();
    if (loi_nhuan_m3 == '') {
        loi_nhuan_m3 = 0;
        $('#input_loi_nhuan_m3').val(0);
    }

    var giaban_m3 = parseFloat(loi_nhuan_m3) + price_pax_m3;
    giaban_m3 = Math.round(giaban_m3 * 1000) / 1000;
    if (giaban_m3 % 2 == 0 || soluong_khach_3 == 1) {
        var giaban_format_m3 = giaban_m3.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' vnđ';
    } else {
        var giaban_format_m3 = giaban_m3.toFixed(2).replace('.', ',');
        var giaban_format_m3 = giaban_format_m3.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' vnđ';
    }
    $('#don_gia_price_4_format').html('('+giaban_format_m3+')');
    $('#input_gia_ban_m3').val(giaban_format_m3);
    $('#input_price_4').val(giaban_m3);
    return giaban_m3;
}
