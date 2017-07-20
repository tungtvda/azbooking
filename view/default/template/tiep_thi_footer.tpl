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
<script>
    $( ".notification_menu" ).click(function() {
        link = '{site_name_manage}/update-notification.html';
        var count_noti=$('#count_notification').html();
        if(count_noti!=''){
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
    $('body').on('click','.copy_link_list', function () {
        var id=$(this).attr('countId');
        copyToClipboard(document.getElementById('value_key_'+id));
        showNotification('top','right',2,'Link tiếp thị liên kết đã được copy');
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
        } catch(e) {
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

    function showNotification(from, align,color,mess){
//        color = Math.floor((Math.random() * 4) + 1);
        console.log(color);
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
</script>
</html>
