<?php include('header.php')?>
<?php include('menu.php')?>




    <section id="wrapper-content" class="wrapper-content">
        <?php include('slide.php')?>

        <?php include('cach_thuc_tao.php')?>
        <?php include('gioi_thieu.php')?>
        <?php include('tinh_nang.php')?>
        <?php include('video.php')?>

        <?php include('tai_sao.php')?>
        <?php include('cau_hoi.php')?>
        <?php include('man_hinh.php')?>
        <?php include('y_kien.php')?>
        <?php include('thu_hang.php')?>
        <?php include('lien_he.php')?>



    </section>




    <section id="footer" class="footer-site invert" style="background-color: #2b2b2b" data-foo-overlay=5>
        <div class="container content clearfix">


        </div>


        <div class="copyright-footer-bg" style="background-color: #ffffff; margin-top: 0px; margin-bottom: 0px;">
            <div class="container content clearfix">
                <div class="grid copyright text-center" style="padding-top: 160px;  padding-bottom: 80px;">

                    <div class="column span-12">

                        <div class="footer-logo footer-logo-large">
                            <a href="">
                                <img src="http://azbooking.vn/view/admin/Themes/kcfinder/upload/images/cauhinh/logoazbooking.vn.png" alt="">
                            </a>
                        </div>

                        <!-- Start Footer social icons -->
                        <div class="footer-icon">
                            <div class="menu-footer-social-menu-container">
                                <ul id="menu-footer-social-menu" class="menu">
                                    <li id="menu-item-1085"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1085">
                                        <a href="http://facebook.com/"><i class='fa fa-facebook'></i></a></li>
                                    <li id="menu-item-1086"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1086">
                                        <a href="http://twitter.com/"><i class='fa fa-twitter'></i></a></li>
                                    <li id="menu-item-1087"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1087">
                                        <a href="http://plus.google.com/"><i class='fa fa-google-plus'></i></a></li>
                                    <li id="menu-item-1088"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1088">
                                        <a href="http://linkedin.com/"><i class='fa fa-linkedin'></i></a></li>
                                    <li id="menu-item-1098"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1098">
                                        <a href="http://xing.com/"><i class='fa fa-xing'></i></a></li>
                                    <li id="menu-item-1089"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1089">
                                        <a href="http://pinterest.com/"><i class='fa fa-pinterest'></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- End Footer social icons -->

                        <p class="site-text">Copyright © 2017 <a href="http://azbooking.vn/">AZBOOKING.VN</a> </p>

                    </div>
                    <div class="column span-12 clearfix">
                    </div>
                </div>
            </div>
        </div>


    </section><!-- END / FOOTER -->


    <div class="search-interface-overlay">
        <form role="search" method="get" class="search-interface-holder"
              action="http://bestcareerbd.com/themes/apptech/">
            <label class="search-text">
                Search: </label>
            <input
                    type="text"
                    id="layers-modal-search-field"
                    class="search-field"
                    placeholder="Type Something"
                    value=""
                    name="s"
                    title="Search for:"
                    autocomplete="off"
                    autocapitalize="off"
            >
        </form>
        <a href="#" class="search-close">
            <i class="l-close"></i>
        </a>
    </div>

</div><!-- END / MAIN SITE #wrapper -->
<script type="text/javascript">(function () {
    function addEventListener(element, event, handler) {
        if (element.addEventListener) {
            element.addEventListener(event, handler, false);
        } else if (element.attachEvent) {
            element.attachEvent('on' + event, handler);
        }
    }

    function maybePrefixUrlField() {
        if (this.value.trim() !== '' && this.value.indexOf('http') !== 0) {
            this.value = "http://" + this.value;
        }
    }

    var urlFields = document.querySelectorAll('.mc4wp-form input[type="url"]');
    if (urlFields && urlFields.length > 0) {
        for (var j = 0; j < urlFields.length; j++) {
            addEventListener(urlFields[j], 'blur', maybePrefixUrlField);
        }
    }
    /* test if browser supports date fields */
    var testInput = document.createElement('input');
    testInput.setAttribute('type', 'date');
    if (testInput.type !== 'date') {

        /* add placeholder & pattern to all date fields */
        var dateFields = document.querySelectorAll('.mc4wp-form input[type="date"]');
        for (var i = 0; i < dateFields.length; i++) {
            if (!dateFields[i].placeholder) {
                dateFields[i].placeholder = 'YYYY-MM-DD';
            }
            if (!dateFields[i].pattern) {
                dateFields[i].pattern = '[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])';
            }
        }
    }

})();</script>
<link rel='stylesheet' id='layers-slider-css'
      href='themes/wp-content/themes/layerswp/core/widgets/css/swiper2745.css?ver=1.6.4' type='text/css' media='all'/>
<script type='text/javascript'
        src='themes/wp-content/plugins/contact-form-7/includes/js/jquery.form.mind03d.js?ver=3.51.0-2014.06.20'></script>
<script type='text/javascript'>
    /* <![CDATA[ */
    var _wpcf7 = {"recaptcha": {"messages": {"empty": "Please verify that you are not a robot."}}};
    /* ]]> */
</script>
<script type='text/javascript' src='themes/wp-content/plugins/contact-form-7/includes/js/scripts4906.js?ver=4.7'></script>
<script type='text/javascript'
        src='themes/wp-content/themes/apptech-child/assets/js/vendor/modernizr-2.8.3.min8a54.js?ver=1.0.0'></script>
<script type='text/javascript' src='themes/wp-content/themes/apptech-child/assets/js/wow.min8a54.js?ver=1.0.0'></script>
<script type='text/javascript'
        src='themes/wp-content/themes/apptech-child/assets/js/jquery.scrollUp.min8a54.js?ver=1.0.0'></script>
<script type='text/javascript'
        src='themes/wp-content/themes/apptech-child/assets/js/jquery-ui.min8a54.js?ver=1.0.0'></script>
<script type='text/javascript' src='themes/wp-content/themes/apptech-child/assets/js/plugins8a54.js?ver=1.0.0'></script>
<script type='text/javascript' src='themes/wp-content/themes/apptech-child/assets/js/theme8a54.js?ver=1.0.0'></script>
<script type='text/javascript' src='themes/wp-includes/js/wp-embed.min6996.js?ver=4.7.1'></script>
<script type='text/javascript' src='themes/wp-content/themes/layerswp/core/widgets/js/swiper2745.js?ver=1.6.4'></script>
<script type='text/javascript'>
    /* <![CDATA[ */
    var mc4wp_forms_config = [];
    /* ]]> */
</script>
<script type='text/javascript'
        src='themes/wp-content/plugins/mailchimp-for-wp/assets/js/forms-api.minbfce.js?ver=4.1.0'></script>
<!--[if lte IE 9]>
<script type='text/javascript'
        src='http://bestcareerbd.com/themes/apptech/wp-content/plugins/mailchimp-for-wp/assets/js/third-party/placeholders.min.js?ver=4.1.0'></script>
<![endif]-->
</body>
</html>