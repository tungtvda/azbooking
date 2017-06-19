<?php
if (!defined('DIR')) require_once '../config.php';
require_once DIR . '/controller/default/public.php';
$data['config'] = config_getByTop(1, '', '');
$active_login = '';
$active_dangky = '';
$active_forget = '';
if (isset($_GET['type'])) {
    if ($_GET['type'] == 'dang-ky') {
        $active_dangky = 'visible';
    } else {
        if ($_GET['type'] == 'quen-mat-khau') {
            $active_forget = 'visible';
        } else {
            $active_login = 'visible';
        }
    }
} else {
    $active_login = 'visible';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta charset="utf-8"/>
    <title>Đăng nhập - AZBOOKING.VN</title>

    <meta name="description" content="User login page"/>
    <link rel="shortcut icon" href="<?php echo $data['config'][0]->Icon; ?>">
    <link rel="apple-touch-icon" href="<?php echo $data['config'][0]->Icon ?>">
    <link rel="apple-touch-icon" sizes="72x72"
          href="<?php echo $data['config'][0]->Icon ?>">
    <link rel="apple-touch-icon" sizes="114x114"
          href="<?php echo $data['config'][0]->Icon ?>">

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="<?php echo SITE_NAME ?>/tiep-thi-lien-ket/themes/admin/css/bootstrap.min.css"/>
    <link rel="stylesheet"
          href="<?php echo SITE_NAME ?>/tiep-thi-lien-ket/themes/admin/font-awesome/4.2.0/css/font-awesome.min.css"/>

    <!-- text fonts -->
    <link rel="stylesheet"
          href="<?php echo SITE_NAME ?>/tiep-thi-lien-ket/themes/admin/fonts/fonts.googleapis.com.css"/>

    <!-- ace styles -->
    <link rel="stylesheet" href="<?php echo SITE_NAME ?>/tiep-thi-lien-ket/themes/admin/css/ace.min.css"/>


    <link rel="stylesheet" href="<?php echo SITE_NAME ?>/tiep-thi-lien-ket/themes/admin/css/ace-part2.min.css"/>

    <link rel="stylesheet" href="<?php echo SITE_NAME ?>/tiep-thi-lien-ket/themes/admin/css/ace-rtl.min.css"/>


    <link rel="stylesheet" href="<?php echo SITE_NAME ?>/tiep-thi-lien-ket/themes/admin/css/ace-ie.min.css"/>
    <link rel="stylesheet" href="<?php echo SITE_NAME ?>/tiep-thi-lien-ket/themes/admin/css/login.css"/>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <script src="<?php echo SITE_NAME ?>/tiep-thi-lien-ket/themes/admin/js/html5shiv.min.js"></script>
    <script src="<?php echo SITE_NAME ?>/tiep-thi-lien-ket/themes/admin/js/respond.min.js"></script>

</head>

<body style="background:url('<?php echo SITE_NAME ?>/tiep-thi-lien-ket/themes/admin/images/square.gif')"
      class="login-layout">
<div class="main-container">
    <div class="main-content">
        <div class="row">
            <div class=" col-xs-12 ">
                <div class="login-container">
                    <div class="center">
                        <h1>
                            <a href="<?php echo SITE_NAME ?>"><img alt="<?php echo $data['config'][0]->Name ?>"
                                                                   src="<?php echo $data['config'][0]->Logo ?>"></a>
                        </h1>
                        <?php if (isset($mess) && $mess != '') { ?>
                            <h5 style="color:#DD5A43!important;" id="id-company-text"><span
                                    class="badge badge-transparent tooltip-error" title=""
                                    data-original-title="2 Important Events">
									<i class="ace-icon fa fa-exclamation-triangle red bigger-130"></i>
								</span> <?php echo $mess . ', Bạn vui lòng liên hệ với ADMIN để được hỗ trợ' ?></h5>
                        <?php } ?>
                    </div>

                    <div class="space-6"></div>

                    <div class="position-relative">
                        <div id="login-box" class="<?php echo $active_login ?> login-box  widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h6 style="font-size: 13px" class="header blue lighter bigger">
                                        <i class="ace-icon fa fa-user-md green"></i>
                                        Vui lòng nhập đầy đủ thông tin đăng nhập
                                    </h6>

                                    <div class="space-6"></div>

                                    <form action="" method="post">
                                        <fieldset>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input name="username_login" type="text"
                                                                   class="form-control" required
                                                                   placeholder="Username/email"/>
															<i class="ace-icon fa fa-user"></i>
														</span>
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input name="password_login" type="password" required
                                                                   class="form-control" placeholder="Password"/>
															<i class="ace-icon fa fa-lock"></i>
														</span>
                                            </label>

                                            <div class="space"></div>

                                            <div class="clearfix">
                                                <label class="inline">
                                                    <input type="checkbox" name="ghinho_login" class="ace"/>
                                                    <span class="lbl"> Ghi nhớ tài khoản</span>
                                                </label>
                                                <button name="login" type="submit"
                                                        class="width-35 pull-right btn btn-sm btn-primary">
                                                    <i class="ace-icon fa fa-key"></i>
                                                    <span class="bigger-110">Login</span>
                                                </button>
                                            </div>

                                            <div class="space-4"></div>
                                        </fieldset>
                                    </form>

                                    <div class="social-or-login center">
                                        <span class="bigger-110">Hoặc đăng nhập bằng</span>
                                    </div>

                                    <div class="space-6"></div>

                                    <div class="social-login center">
                                        <a class="btn btn-primary">
                                            <i class="ace-icon fa fa-facebook"></i>
                                        </a>

                                        <a class="btn btn-info">
                                            <i class="ace-icon fa fa-twitter"></i>
                                        </a>

                                        <a class="btn btn-danger">
                                            <i class="ace-icon fa fa-google-plus"></i>
                                        </a>
                                    </div>
                                </div><!-- /.widget-main -->

                                <div class="toolbar clearfix">
                                    <div>
                                        <a href="#" data-target="#forgot-box" class="forgot-password-link">
                                            <i class="ace-icon fa fa-arrow-left"></i>
                                            Quên mật khẩu
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" data-target="#signup-box" class="user-signup-link">
                                            Đăng ký tài khoản
                                            <i class="ace-icon fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div><!-- /.widget-body -->
                        </div><!-- /.login-box -->

                        <div id="forgot-box" class="<?php echo $active_forget ?> forgot-box widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header red lighter bigger">
                                        <i class="ace-icon fa fa-key"></i>
                                        Quên mật khẩu
                                    </h4>

                                    <div class="space-6"></div>
                                    <p>
                                        Nhập email của bạn và nhận được hướng dẫn
                                    </p>

                                    <form action="" method="post">
                                        <fieldset>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" required name="email_forgot"
                                                                   class="form-control" placeholder="Email"/>
															<i class="ace-icon fa fa-envelope"></i>
														</span>
                                            </label>

                                            <div class="clearfix">
                                                <button type="submit" name="send_forgot"
                                                        class="width-35 pull-right btn btn-sm btn-danger">
                                                    <i class="ace-icon fa fa-lightbulb-o"></i>
                                                    <span class="bigger-110">Gửi!</span>
                                                </button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div><!-- /.widget-main -->

                                <div class="toolbar center">
                                    <a href="#" data-target="#login-box" class="back-to-login-link">
                                        Đăng nhập
                                        <i class="ace-icon fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div><!-- /.widget-body -->
                        </div><!-- /.forgot-box -->

                        <div id="signup-box" class="<?php echo $active_dangky ?> signup-box widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header green lighter bigger">
                                        <i class="ace-icon fa fa-users blue"></i>
                                        Đăng ký tài khoản mới
                                    </h4>

                                    <div class="space-6"></div>
                                    <p> Nhập chi tiết của bạn để bắt đầu: </p>

                                    <form action="" method="post">
                                        <fieldset>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" id="email_dangky" name="email_dangky"
                                                                   required class="form-control" placeholder="Email"
                                                                   value="<?php if (isset($email)) echo $email ?>"/>
															<i class="ace-icon fa fa-envelope"></i>
														</span>
                                                <input type="password" id="check_show_email" hidden value="0">
                                                <span hidden id="mess_email_dang_ky"
                                                      style="color: red; font-size: 13px">Email đã tồn tại trong hệ thống</span>
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" id="username_dangky"
                                                                   name="username_dangky" required class="form-control"
                                                                   value="<?php if (isset($username_dk)) echo $username_dk ?>"
                                                                   placeholder="Tên đăng nhập"/>
															<i class="ace-icon fa fa-user"></i>
														</span>
                                                <input type="password" id="check_show_username" hidden value="0">
                                                <span hidden id="mess_username_dang_ky"
                                                      style="color: red; font-size: 13px">Username đã tồn tại trong hệ thống</span>
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" id="password_dangky"
                                                                   name="password_dangky" required class="form-control"
                                                                   placeholder="Mật khẩu"/>
															<i class="ace-icon fa fa-lock"></i>
														</span>
                                                <input type="password" id="check_show_pass" hidden value="0">
                                                <span id="power_pass" style="font-size: 13px"></span>
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" id="confirm_password_dangky"
                                                                   name="confirm_password_dangky" required
                                                                   class="form-control"
                                                                   placeholder="Xác nhận mật khẩu"/>
															<i class="ace-icon fa fa-retweet"></i>
														</span>
                                                <span hidden id="mess_confirm_password_dangky"
                                                      style="color: red; font-size: 13px">Hai mật khẩu không khớp</span>
                                            </label>
                                            <div class="clearfix">
                                                <label class="inline">
                                                    <input type="checkbox" name="confirm_res" id="confirm_res" class="ace">
                                                    <span class="lbl"> Tôi đã đọc và đồng ý  <a href="" target="_blank">Điều khoản</a> và <a href="" target="_blank"> Chính sách </a></span>
                                                </label>
                                            </div>
                                            <div class="clearfix">
                                                <input type="password" id="site_name" hidden
                                                       value="<?php echo SITE_NAME_MANAGE ?>">

                                                <button id="reset_login" type="reset"
                                                        class="width-30 pull-left btn btn-sm">
                                                    <i class="ace-icon fa fa-refresh"></i>
                                                    <span class="bigger-110">Hủy</span>
                                                </button>

                                                <button type="button" id="dangky_name" name="dangky_name"
                                                        class="width-65 pull-right btn btn-sm btn-success">
                                                    <span class="bigger-110">Đăng ký</span>

                                                    <i class="ace-icon fa fa-sign-in icon-on-right"></i>
                                                </button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>

                                <div class="toolbar center">
                                    <a href="#" data-target="#login-box" class="back-to-login-link">
                                        <i class="ace-icon fa fa-arrow-left"></i>
                                        Đăng nhập
                                    </a>
                                </div>
                            </div><!-- /.widget-body -->
                        </div><!-- /.signup-box -->
                    </div><!-- /.position-relative -->

                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.main-content -->
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="<?php echo SITE_NAME ?>/tiep-thi-lien-ket/themes/admin/js/jquery.2.1.1.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="<?php echo SITE_NAME?>/tiep-thi-lien-ket/themes/admin/js/jquery.1.11.1.min.js"></script>
<![endif]-->

<!--[if !IE]> -->
<script type="text/javascript">
    window.jQuery || document.write("<script src='<?php echo SITE_NAME?>/tiep-thi-lien-ket/themes/admin/js/jquery.min.js'>" + "<" + "/script>");
</script>

<!-- <![endif]-->

<script type="text/javascript">
    if ('ontouchstart' in document.documentElement) document.write("<script src='<?php echo SITE_NAME?>/tiep-thi-lien-ket/themes/admin/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function ($) {
        $(document).on('click', '.toolbar a[data-target]', function (e) {
            e.preventDefault();
            var target = $(this).data('target');
            $('.widget-box.visible').removeClass('visible');
            $(target).addClass('visible');
        });
    });


    //you don't need this, just used for changing background
    jQuery(function ($) {
        $('#btn-login-dark').on('click', function (e) {
            $('body').attr('class', 'login-layout');
            $('#id-text2').attr('class', 'white');
            $('#id-company-text').attr('class', 'blue');

            e.preventDefault();
        });
        $('#btn-login-light').on('click', function (e) {
            $('body').attr('class', 'login-layout light-login');
            $('#id-text2').attr('class', 'grey');
            $('#id-company-text').attr('class', 'blue');

            e.preventDefault();
        });
        $('#btn-login-blur').on('click', function (e) {
            $('body').attr('class', 'login-layout blur-login');
            $('#id-text2').attr('class', 'white');
            $('#id-company-text').attr('class', 'light-blue');

            e.preventDefault();
        });

    });
</script>
<script src="<?php echo SITE_NAME ?>/tiep-thi-lien-ket/themes/admin/js/login.js"></script>
</body>
</html>

