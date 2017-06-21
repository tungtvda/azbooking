<?php
$active_login = '';
$active_dangky = '';
$active_forget = '';
$login_focus='';
$dangky_focus='';
$forget_focus='';
if (isset($_GET['type'])) {
    if ($_GET['type'] == 'dang-ky') {
        $active_dangky = 'show_box';
        $dangky_focus='autofocus="autofocus"';
    } else {
        if ($_GET['type'] == 'quen-mat-khau') {
            $active_forget = 'show_box';
            $forget_focus='autofocus="autofocus"';
        } else {
            $active_login = 'show_box';
            $login_focus='autofocus="autofocus"';
        }
    }
} else {
    $active_login = 'show_box';
    $login_focus='autofocus="autofocus"';
}
?>
<html>
<head>
    <title>Form Login Dengan Background Image</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="img/logo.png"/>
    <link rel="stylesheet" href="css/menu.css"/>
    <link rel="stylesheet" href="css/main.css"/>
    <link rel="stylesheet" href="css/bgimg.css"/>
    <link rel="stylesheet" href="css/font.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
    <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</head>
<body>
<div class="menu">
    <a href="#" class="bars" id="bars">
        <i class="fa fa-bars"></i>
    </a>
    <ul id="menu-list">
        <li><a href="http://jagowebdev.com">Home &raquo; Jagowebdev.com</a></li>
        <li><a href="http://jagowebdev.com/mendesain-form-login-dengan-css/">Mendesain Form Login Dengan CSS3</a></li>
        <li><span>Form Login Dengan Background Image</span></li>
        <li><a href="bgimg-dotted.html">Form Login Dengan Background Dot</a></li>
        <li><a href="bgimg-blurred.html">Form Login Dengan Background Blur</a></li>
        <li><a href="nobgimg.html">Form Login Tanpa Background</a></li>
        <li><a href="bgimg-nosocial.html">Form Login Tanpa Social Login</a></li>
        <li><a href="bgimg-parallax.html">Form Login Dengan Background Parallax</a></li>
    </ul>
</div>
<div class="background"></div>
<div class="backdrop"></div>
<div class="login-form-container" id="login-form">
    <div class="login-form-content">
        <div class="login-form-header">
            <div class="logo">
<!--                <img style="width: 60%" src="http://azbooking.vn/view/admin/Themes/kcfinder/upload/images/cauhinh/logoazbooking.vn.png"/>-->
            </div>
        </div>
        <div id="login-box" class="<?php echo $active_login ?> hidden_box">
            <div class="separator">
                <span class="separator-text">Đăng nhập</span>
            </div>
            <form method="post" action="" class="login-form">
                <div class="input-container">
                    <i class="fa fa-envelope"></i>
                    <input type="email" class="input" name="email" placeholder="Email"/>
                </div>
                <div class="input-container">
                    <i class="fa fa-lock"></i>
                    <input type="password" id="login-password" class="input" name="password" placeholder="Password"/>
                </div>
                <div class="rememberme-container">
                    <input type="checkbox" name="rememberme" id="rememberme"/>
                    <label for="rememberme" class="rememberme"><span>Ghi nhớ tài khoản</span></label>
                    <a class="forgot-password" href="#">Lupa Password?</a>
                </div>
                <div class="btn_action">
                    <a href="#" class="login"> <i class="ace-icon fa fa-key"></i> Login</a>
                    <a href="#" class="register"> <i class="ace-icon fa fa-refresh"></i> Cancel</a>
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
                <div style="float: right;text-align: right;"><a href="javascript:void(0)" class="user-signup-link"> Đăng ký tài khoản <i
                        class="ace-icon fa fa-arrow-right"></i> </a></div>
            </div>
        </div>
        <div id="forgot-box" class="<?php echo $active_forget ?> hidden_box">
            forgot-box
        </div>
        <div id="signup-box" class="<?php echo $active_dangky ?> hidden_box">
            <div class="separator">
                <span class="separator-text">Đăng ký</span>
            </div>
            <form method="post" action="" class="login-form">
                <div class="input-container">
                    <i class="fa fa-envelope"></i>
                    <input type="email" id="email_dangky" class="input" name="email_dangky" <?php echo $dangky_focus?>
                           required class="form-control" placeholder="Email *"/>
                    <input type="password" id="check_show_email" hidden value="0">
                                                <p hidden id="mess_email_dang_ky"
                                                      style="color: red; font-size: 13px"><i class="fa fa-times"></i> Email đã tồn tại trong hệ thống</p>
                </div>
                <div class="input-container">
                    <i class="fa fa-user"></i>
                    <input type="text" id="username_dangky" class="input"
                           name="username_dangky" required
                           placeholder="Họ tên *"/>
                    <input type="password" id="check_show_username" hidden value="0">
                                                <p hidden id="mess_username_dang_ky"
                                                      style="color: red; font-size: 13px"><i class="fa fa-times"></i> Bạn vui lòng nhập họ và tên</p>
                </div>
                <div class="input-container">
                    <i class="fa fa-lock"></i>
                    <input type="password" id="password_dangky"
                           name="password_dangky" required class="input"
                           placeholder="Mật khẩu"/>
                    <input type="password" id="check_show_pass" hidden value="0">
                    <p hidden id="power_pass" style="font-size: 13px"> </p>
                </div>
                <div class="input-container">
                    <i class="fa fa-retweet"></i>
                    <input type="password" id="confirm_password_dangky"
                           name="confirm_password_dangky" required
                           class="input"
                           placeholder="Xác nhận mật khẩu"/>
                     <p hidden id="mess_confirm_password_dangky"
                           style="color: red; font-size: 13px"><i class="fa fa-times"></i> Hai mật khẩu không khớp</p>
                </div>
                <div class="input-container">
                    <i class="fa fa-lock"></i>
                    <input type="password"  class="input" name="password" placeholder="Password"/>
                </div>
                <div class="input-container">
                    <i class="fa fa-lock"></i>
                    <input type="password"  class="input" name="password" placeholder="Password"/>
                </div>
                <div class="rememberme-container">
                    <input type="checkbox" name="confirm_res" id="confirm_res"/>
                    <label for="rememberme" class="rememberme"><span>Ghi nhớ tài khoản</span></label>
                    <a class="forgot-password" href="#">Lupa Password?</a>
                </div>
                <div class="btn_action">
                    <a href="#" class="login"> <i class="ace-icon fa fa-key"></i> Login</a>
                    <a href="#" class="register"> <i class="ace-icon fa fa-refresh"></i> Cancel</a>
                </div>
            </form>
        </div>

    </div>
</div>
</body>
<script>
    jQuery(function ($) {
        $('body').on("click",'.user-signup-link', function () {
            $('#forgot-box').hide();
            $('#login-box').hide();
            $('#signup-box').slideDown();
        });
        $('body').on("click",'.forgot-password-link', function () {
            $('#signup-box').hide();
            $('#login-box').hide();
            $('#forgot-box').slideDown();
        });
    });
</script>
</html>