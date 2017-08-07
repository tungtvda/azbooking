<footer class="footer">
    <div class="container-fluid">
        <nav class="pull-left">
            <ul>
                <li>
                    <a href="#">
                        Home
                    </a>
                </li>
                <li>
                    <a href="#">
                        Company
                    </a>
                </li>
                <li>
                    <a href="#">
                        Portfolio
                    </a>
                </li>
                <li>
                    <a href="#">
                        Blog
                    </a>
                </li>
            </ul>
        </nav>
        <p class="copyright pull-right">
            &copy;
            <a href="http://azbooking.vn/">AZBOOKING.VN</a>
        </p>
    </div>
</footer>
</div>
</div>

<div hidden class="fixed-plugin">
    <div class="dropdown show-dropdown">
        TIỀN HOA HỒNG
    </div>
</div>

</body>

<!--   Core JS Files   -->
<script src="{SITE-NAME}/view/default/themes/assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
<script type="text/javascript" src="{SITE-NAME}/view/default/themes/js/jquery-ui.min.js"></script>
<script src="{SITE-NAME}/view/default/themes/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{SITE-NAME}/view/default/themes/assets/js/material.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="{SITE-NAME}/view/default/themes/assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="{SITE-NAME}/view/default/themes/assets/js/bootstrap-notify.js"></script>

<!-- Material Dashboard javascript methods -->
<script src="{SITE-NAME}/view/default/themes/assets/js/material-dashboard.js"></script>

<!--   Sharrre Library    -->
<script src="{SITE-NAME}/view/default/themes/assets/js/jquery.sharrre.js"></script>

<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{SITE-NAME}/view/default/themes/assets/js/demo.js"></script>
<script src="{SITE-NAME}/view/default/themes/assets/js/fileinput.min.js"></script>

<script src="{SITE-NAME}/view/default/themes/assets/js/myjs.js"></script>
<script src="{SITE-NAME}/view/default/themes/calendar/dist/moment.min.js"></script>
<script>
    $(".notification_menu").click(function () {
        link = '{site_name_manage}/update-notification.html';
        var count_noti = $('#count_notification').html();
        if (count_noti != '') {
            $.ajax({
                method: "POST",
                url: link,
                data: $("#form_noti").serialize(),
                success: function (response) {
                    response = $.parseJSON(response);
                    if (response.success == 1) {
                        $('#count_notification').hide();
                        $('#count_notification').html('');
//                        $('#count_mes_noti').hide();
//                        $('#count_mes_noti').html('');
//                        if(response.count_un_read>0){
//                            $('#count_un_read').html(response.count_un_read+' Thông báo chưa đọc');
//                        }else{
//                            $('#count_un_read').html('Tất cả thông báo đã được đọc');
//                        }

                    }
                }
            });
        }
    });
    $('body').on('click', '.copy_link_list', function () {
        var id = $(this).attr('countId');
        copyToClipboard(document.getElementById('value_key_' + id));
        showNotification('top', 'right', 2, 'Link tiếp thị liên kết đã được copy');
    });
    function copyToClipboard(elem) {
        // create hidden text element, if it doesn't already exist
        var targetId = "_hiddenCopyText_";
        var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
        var origSelectionStart, origSelectionEnd;
        if (isInput) {
            // can just use the original source element for the selection and copy
            target = elem;
            origSelectionStart = elem.selectionStart;
            origSelectionEnd = elem.selectionEnd;
        } else {
            // must use a temporary form element for the selection and copy
            target = document.getElementById(targetId);
            if (!target) {
                var target = document.createElement("textarea");
                target.style.position = "absolute";
                target.style.left = "-9999px";
                target.style.top = "0";
                target.id = targetId;
                document.body.appendChild(target);
            }
            target.textContent = elem.textContent;
        }
        // select the content
        var currentFocus = document.activeElement;
        target.focus();
        target.setSelectionRange(0, target.value.length);

        // copy the selection
        var succeed;
        try {
            succeed = document.execCommand("copy");
        } catch (e) {
            succeed = false;
        }
        // restore original focus
        if (currentFocus && typeof currentFocus.focus === "function") {
            currentFocus.focus();
        }

        if (isInput) {
            // restore prior selection
            elem.setSelectionRange(origSelectionStart, origSelectionEnd);
        } else {
            // clear temporary content
            target.textContent = "";
        }
        return succeed;
    }

    function showNotification(from, align, color, mess) {
//        color = Math.floor((Math.random() * 4) + 1);
        console.log(color);
        $.notify({
            icon: "notifications",
            message: mess

        }, {
            type: type[color],
            timer: 4000,
            placement: {
                from: from,
                align: align
            }
        });
    }
    show_date_format();
    function show_date_format() {
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            maxDate: '-1',
//            startDate: '-3d'
        });
    }
    $(document).on('change', '.btn-file :file', function () {
        var input = $(this),
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function (event, label) {

        var input = $(this).parents('.input-group').find(':text'),
                log = label;

        if (input.length) {
            input.val(log);
        } else {
            if (log) alert(log);
        }

    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
                $('#show_avatar').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            var link_avatar = $('#link_avatar').val();
            $('#img-upload').attr('src', link_avatar);
            $('#show_avatar').attr('src', link_avatar);
        }
    }

    $("#imgInp").change(function () {
        readURL(this);
    });
    $('body').on('click', '.close', function () {
        $('.')
    });
    $('body').on("input", '#input_price', function () {
        returnCheckPrice('');
    });
    $('body').on('click', '#submit_form_rut_tien', function () {
        if (returnCheckPrice(1) == 1) {
            $(this).html('Đang gửi...');
            var link = '{site_name_manage}/az-rut-tien.html';
            $.ajax({
                method: "POST",
                url: link,
                data: { // Danh sách các thuộc tính sẽ gửi đi
                    price: $('#input_price').val(),
                    input_yeu_cau: $('#input_yeu_cau').val(),
                    form_noti: $('#form_noti').serializeArray()
                },
                success: function (response) {
                    response = $.parseJSON(response);
                    console.log(response);
                    if (response.success == 1) {
                        showNotification('top', 'right', 2, 'Gửi yêu cầu rút tiền thành công, bạn vui lòng đợi AZBOOKING.VN xác nhận');
                        $('#input_price').val('');
                        $('#input_yeu_cau').val('');
//
//                        var yeu_cau='';
//                        if(response.data.yeu_cau!=''){
//                            var yeu_cau='<a href="javascrip:void(0)" rel="tooltip" data-original-title="'+response.data.yeu_cau+'">Xem yêu cầu</a>';
//                        }
//                        var html = '<tr><td>1</td>' +
//                                '<td>300.000 vnđ</td>' +
//                                '<td></td>' +
//                                '<td><a class="btn btn-warning">Đang chờ</a></td>' +
//                                '<td>07-08-2017 07:18:34</td>' +
//                                '<td></td>' +
//                                '<td> '+yeu_cau+'' +
//                                '</td><td> </td></tr>';
                    } else {
                        showNotification('top', 'right', 4, response.mess);
                        $(this).html('Rút tiền');
                    }
                    $(this).html('Rút tiền');
                }
            });
        }
    });
    function returnCheckPrice(value) {
        var success = 1;
        var price = $('#input_price').val();
        var price_check = {hoa_hong_check};
        var numberRegex = /^[+-]?\d+(\.\d+)?([eE][+-]?\d+)?$/;
        if (numberRegex.test(price)) {
            if (price <= price_check) {
                success = 1;
                var price_format = price.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") + ' vnđ';
                $('#price_format_rut').html('(' + price_format + ')');
                $('#error_price').hide().html('');
            } else {
                $('#error_price').show().html('Số tiền bạn rút đã vượt quá số tiền hoa hồng');
            }
        }
        else {
            $('#price_format_rut').html('');
            $('#error_price').show().html('Bạn vui lòng nhập số tiền cần rút');
        }
        if (value != '') {
            return success;
        }
    }
</script>
</html>
