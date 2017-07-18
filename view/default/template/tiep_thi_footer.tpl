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
</script>
<!-- Mirrored from demos.creative-tim.com/material-dashboard/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Jul 2017 03:43:31 GMT -->
</html>
