<?php
if (!defined('DIR')) require_once '../config.php';
require_once DIR . '/controller/default/public.php';
$data['config'] = config_getByTop(1, '', '');
$active_login = '';
$active_dangky = '';
$active_forget = '';
$login_focus='';
$dangky_focus='';
$forget_focus='';
$title='';
if (isset($_GET['type'])) {
    if ($_GET['type'] == 'dang-ky') {
        $active_dangky = 'show_box';
        $dangky_focus='autofocus="autofocus"';
        $title='Đăng ký - AZBOOKING.VN';
    } else {
        if ($_GET['type'] == 'quen-mat-khau') {
            $active_forget = 'show_box';
            $forget_focus='autofocus="autofocus"';
            $title='Quên mật khẩu - AZBOOKING.VN';
        } else {
            $active_login = 'show_box';
            $login_focus='autofocus="autofocus"';
            $title='Đăng nhập - AZBOOKING.VN';
        }
    }
} else {
    $active_login = 'show_box';
    $login_focus='autofocus="autofocus"';
    $title='Đăng nhập - AZBOOKING.VN';
}
?>
<html>
<head>
    <title><?php echo $title?></title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="<?php echo $data['config'][0]->Icon; ?>">
    <link rel="apple-touch-icon" href="<?php echo $data['config'][0]->Icon ?>">
    <link rel="stylesheet" href="<?php echo SITE_NAME ?>/tiepthi/css/menu.css"/>
    <link rel="stylesheet" href="<?php echo SITE_NAME ?>/tiepthi/css/main.css"/>
    <link rel="stylesheet" href="<?php echo SITE_NAME ?>/tiepthi/css/bgimg.css"/>
    <link rel="stylesheet" href="<?php echo SITE_NAME ?>/tiepthi/css/font.css"/>
    <link rel="stylesheet" href="<?php echo SITE_NAME ?>/tiepthi/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="<?php echo SITE_NAME ?>/tiepthi/css/dialog.css"/>
    <script type="text/javascript" src="<?php echo SITE_NAME ?>/tiepthi/js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="<?php echo SITE_NAME ?>/tiepthi/js/main.js"></script>
</head>
<body>
<div class="menu">
    <a href="#" class="bars" id="bars">
        <i class="fa fa-bars"></i>
    </a>
    <ul id="menu-list">
        <li><a href="<?php echo SITE_NAME ?>">Đặt tour du lịch</a></li>
        <li><a href="http://khachsan.azbooking.vn/">Đặt phòng khách sạn</a></li>
        <li><a href="http://vemaybay.azbooking.vn/">Đặt vé máy bay</a></li>
        <li><a href="http://thuexe.azbooking.vn/">Thuê xe du lịch</a></li>
        <li><a href="<?php echo SITE_NAME ?>/cam-nang/">Cẩm nang du lịch</a></li>
    </ul>
</div>
<div class="background"></div>
<div class="backdrop"></div>
<div class="login-form-container" id="login-form">
    <div class="login-form-content">
        <div class="login-form-header">
            <div class="logo">
                <a href="<?php echo SITE_NAME ?>"><img style="width: 60%" alt="<?php echo $data['config'][0]->Name ?>" src="<?php echo $data['config'][0]->Logo ?>"/></a>
                <input type="password" id="site_name" hidden
                       value="<?php echo SITE_NAME_MANAGE ?>">
            </div>
        </div>
        <div id="login-box" class="<?php echo $active_login ?> hidden_box">
            <div class="separator">
                <span class="separator-text">Đăng nhập</span>
            </div>
            <form method="post" action="" class="login-form">
                <div class="input-container">
                    <i class="fa fa-envelope"></i>
                    <input type="email" class="input" name="username_login" id="email_login"  <?php echo $login_focus?> placeholder="Email *"/>
                </div>
                <div class="input-container">
                    <i class="fa fa-lock"></i>
                    <input type="password" name="password_login" id="password_login" class="input"  placeholder="Mật khẩu *"/>
                </div>
                <div class="rememberme-container">
                    <input type="checkbox" name="rememberme" id="rememberme"/>
                    <label for="rememberme" class="rememberme"><span>Ghi nhớ tài khoản</span></label>
                </div>
                <div class="btn_action">
                    <a href="javascript:void(0)" id="login_btn" class="login"> <i class="ace-icon fa fa-key"></i> Đăng nhập</a>
                    <a href="javascript:void(0)" class="register cancel_btn"> <i class="ace-icon fa fa-refresh"></i> Hủy</a>
                </div>
            </form>


            <div class="separator" style=" margin-bottom: 20px;">
                <span class="separator-text-bottom">Hoặc đăng nhập bằng</span>
            </div>
            <div class="socmed-login">
                <a href="#facebook" class="socmed-btn facebook-btn">
                    <i class="fa fa-facebook"></i>
                    <span> Facebook</span>
                </a>
                <a href="#g-plus" class="socmed-btn google-btn">
                    <i class="fa fa-google"></i>
                    <span> Google</span>
                </a>
                <a href="#g-plus" class="socmed-btn yahoo-btn">
                    <i class="fa fa-twitter "></i>
                    <span> Twitter</span>
                </a>
            </div>
            <div class="toolbar clearfix">
                <div><a href="javascript:void(0)" class="forgot-password-link"> <i
                        class="ace-icon fa fa-arrow-left"></i> Quên mật khẩu </a></div>
                <div style="float: right;text-align: right;"><a href="javascript:void(0)" class="user-signup-link">
                        Đăng ký tài khoản <i
                        class="ace-icon fa fa-arrow-right"></i> </a>
                </div>
            </div>
        </div>
        <div id="forgot-box" class="<?php echo $active_forget ?> hidden_box">
            <div class="separator">
                <span class="separator-text-forget">Quên mật khẩu</span>
            </div>
            <form method="post" action="" class="login-form">
                <div class="input-container">
                    <i class="fa fa-envelope"></i>
                    <input type="email" class="input" id="email_forget" name="email" <?php echo $forget_focus?> placeholder="Email"/>
                </div>
                <div class="btn_action">
                    <a href="#" class="login"> <i class="ace-icon fa fa-paper-plane-o"></i> Gửi</a>
                </div>
            </form>
            <br>
            <div style="margin-top: 20px;" class="toolbar clearfix">
                <div style="float: right;text-align: right;"><a href="javascript:void(0)" class="login-password-link"> Đăng nhập <i
                            class="ace-icon fa fa-arrow-right"></i> </a></div>
            </div>
        </div>
        <div id="signup-box" class="<?php echo $active_dangky ?> hidden_box">
            <div class="separator">
                <span class="separator-text-register">Đăng ký</span>

            </div>
            <div class="required_create">
                <span >(Bạn vui lòng điền đầy đủ thông tin đăng ký)</span>
            </div>
            <form method="post" action="" id="signup-form" class="login-form" style="margin-bottom: 0px">
                <div class="input-container">
                    <i class="fa fa-envelope"></i>
                    <input maxlength="100" type="email" id="email_dangky" class="input" name="email_dangky" <?php echo $dangky_focus?>
                           required class="form-control" placeholder="Email *"/>
                    <input type="password" id="check_show_email" hidden value="0">
                                                <p hidden id="mess_email_dang_ky"
                                                      style="color: red; font-size: 13px"><i class="fa fa-times"></i> Email đã tồn tại trong hệ thống</p>
                </div>
                <div class="input-container">
                    <i class="fa fa-user"></i>
                    <input type="text" id="username_dangky" class="input" maxlength="150"
                           name="username_dangky" required
                           placeholder="Họ tên *"/>
                    <input type="password" id="check_show_username" hidden value="0">
                                                <p hidden id="mess_username_dang_ky"
                                                      style="color: red; font-size: 13px"><i class="fa fa-times"></i> Bạn vui lòng nhập họ và tên</p>
                </div>
                <div class="input-container">
                    <i class="fa fa-lock"></i>
                    <input type="password" id="password_dangky"
                           name="password_dangky" required class="input" maxlength="100"
                           placeholder="Mật khẩu *"/>
                    <input type="password" id="check_show_pass" hidden value="0">
                    <p hidden id="power_pass" style="font-size: 13px"> </p>
                </div>
                <div class="input-container">
                    <i class="fa fa-retweet"></i>
                    <input type="password" id="confirm_password_dangky" maxlength="100"
                           name="confirm_password_dangky" required
                           class="input"
                           placeholder="Xác nhận mật khẩu *"/>
                     <p hidden id="mess_confirm_password_dangky"
                           style="color: red; font-size: 13px"><i class="fa fa-times"></i> Hai mật khẩu không khớp</p>
                </div>
                <div class="rememberme-container">
                    <input value="1" type="checkbox" name="confirm_res" id="confirm_res"/>
                    <label for="confirm_res" class="rememberme"><span>Tôi đã đọc và đồng ý  <a href="<?php echo SITE_NAME?>/tiep-thi-lien-ket/dieu-khoan-dich-vu.html" target="_blank">Điều khoản</a> -- <a href="<?php echo SITE_NAME?>/tiep-thi-lien-ket/chinh-sach.html" target="_blank"> Chính sách </a></span></label>
                </div>

            </form>
            <div class="btn_action" id="action_register">
                <a class="loading" id="loading_create" style="display: none"><img id="loading" style="width: 150px;" src="http://azbooking.vn/view/default/themes/images/loading.gif"></a>
                <a href="javascript:void(0)" class="login" style="display: none" id="dangky_name" name="dangky_name"> <i class="ace-icon fa fa-sign-in"></i> Đăng ký</a>
                <a href="javascript:void(0)" class="register cancel_btn" id="cancel_create"> <i class="ace-icon fa fa-refresh"></i> Hủy</a>
            </div>
            <div class="toolbar clearfix " id="toolbar_create">
                <div><a href="javascript:void(0)" class="login-password-link"> <i
                            class="ace-icon fa fa-arrow-left"></i> Đăng nhập </a></div>
            </div>
        </div>

    </div>
</div>
</body>
<script src="<?php echo SITE_NAME ?>/tiepthi/js/login.js"></script>
<script src="<?php echo SITE_NAME?>/tiepthi/js/dialog.js"></script>
</html>