<?php

if (!defined('DIR')) require_once '../config.php';
require_once DIR . '/controller/default/public.php';
$data['config'] = config_getByTop(1, '', '');
$active_login = '';
$active_dangky = '';
$active_forget = '';
$active_confirm = '';
$login_focus = '';
$dangky_focus = '';
$forget_focus = '';
$title = '';
$check_tab=0; //0- login, 1-dangky, 2-forget, 3-confirm

if (isset($_GET['type'])) {
    if ($_GET['type'] == 'dang-ky') {
        $active_dangky = 'show_box';
        $dangky_focus = 'autofocus="autofocus"';
        $title = 'Đăng ký - AZBOOKING.VN';
        $check_tab=1;
    } else {
        if ($_GET['type'] == 'quen-mat-khau') {
            $active_forget = 'show_box';
            $forget_focus = 'autofocus="autofocus"';
            $title = 'Quên mật khẩu - AZBOOKING.VN';
            $check_tab=2;
        } else {
             $email_confirm=base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(_returnGetParamSecurity('type'))))));
            $active_confirm = 'show_box';
            $title = 'Xác thực tài khoản - AZBOOKING.VN';
            $check_tab=3;
        }
    }
} else {
    $active_login = 'show_box';
    $login_focus = 'autofocus="autofocus"';
    $title = 'Đăng nhập - AZBOOKING.VN';
    $check_tab=0;
}
$logo = SITE_NAME . '/email_template/images/logoazboong.vn.png';
$banner = SITE_NAME . '/email_template/images/banner.jpg';
$footer = SITE_NAME . '/email_template/images/footer.png';
$title = 'AZBOOKING.VN - GIÁ RẺ VÀ SẼ LUÔN NHƯ VẬY';
$data_tour_sales = tour_getByTop(4, 'price_sales!="" ', 'id desc');
$tour_string = '';

// checklogin
if(isset($_POST['username_login'])&&isset($_POST['password_login'])){
   $check_login=json_decode(_returnLogin(),true);
    if($check_login['success']==1||$check_login['success']==2){

    }else{
        $check_login=$check_login['mess'];
    }
}

if (count($data_tour_sales) > 0) {
    foreach ($data_tour_sales as $row_tour) {
        $name_list_tour = $row_tour->name;
        $price_list = '';
        if ($row_tour->price == 0 || $row_tour->price == '') {
            $price_list = 'Liên hệ';
        } else {
            $price_list = number_format((int)$row_tour->price, 0, ",", ".") . ' vnđ';
        }
        $price_list_sales = number_format((int)$row_tour->price_sales, 0, ",", ".") . ' vnđ';
        $durations = $row_tour->durations;
        $data_danhmuc_1 = danhmuc_1_getById($row_tour->DanhMuc1Id);
        $data_danhmuc_2 = danhmuc_2_getById($row_tour->DanhMuc2Id);
        $name_url_dm1 = '';
        if (count($data_danhmuc_1) > 0) {
            $name_url_dm1 = $data_danhmuc_1[0]->name_url;
        }
        $name_url_dm2 = '';
        if (count($data_danhmuc_2) > 0) {
            $name_url_dm2 = $data_danhmuc_2[0]->name_url;
        }
        $link_tour_list = link_tourdetail_ajax($row_tour, $name_url_dm1, $name_url_dm2);
        $img_list = _returnCheckLinkImg($row_tour->img);
        $tour_string .= '<div style="width: 23%;float: left;padding-left: 10px; padding-right: 10px" class="col-md-3 col-sm-6">
                        <div style="    text-align: center;
    margin-bottom: 30px;" class="news">
                            <a href="' . $link_tour_list . '"><img title="' . $name_list_tour . '" alt="' . $name_list_tour . '" style="    width: 100%;
    max-width: 100%;
    height: 160px;
    margin-bottom: 20px;" class="news-image" src="' . $img_list . '"></a>
                            <h3 title="' . $name_list_tour . '" style="font-size: 1em;text-overflow: ellipsis; text-align: left;
    overflow: hidden;
    white-space: nowrap;
    margin: 0 0 10px;" class="news-title"><a style="text-decoration: none;" href="' . $link_tour_list . '">' . $name_list_tour . '</a></h3>
                            <small class="date">
                                <ins><span class="amount" style="color: red; font-size: 14px; font-weight: bold">' . $price_list . '</span></ins> | <del><span class="amount" style="    color: #B1B1B1;">' . $price_list_sales . '</span></del>
                            </small>
                            <p style="text-align: left">
                                Thời gian: ' . $durations . '
                            </p>
                        </div>
                    </div>';
    }
}

if (count($data['config']) > 0 && $data['config'][0]->Logo != '') {
    $logo = _returnCheckLinkImg($data['config'][0]->Logo);
    $banner = _returnCheckLinkImg($data['config'][0]->banner_email);
    $footer = _returnCheckLinkImg($data['config'][0]->footer_email);
    $title = $data['config'][0]->Name;
}

$name_customer = '[username_dangky]';
$link_dangky = '[link_dangky]';
$content_email='';
if($check_tab==1){
    $content_email=' <h3 style="font-weight: 600;
  font-size: 18px;
  border-bottom: 3px solid #0091EA;
  color: #0091ea;
  line-height: 1.3em;
  margin-top: 0;
  line-height: 58px;
  z-index: 9;
  text-transform: uppercase;
  text-align: center;" class="title_index">XÁC THỰC TÀI KHOẢN</h3>
                <div style="float: left;width: 100%;" class="col-xs-12 row">
                <p>Chào bạn, <b>' . $name_customer . '</b></p>
                <p>Cảm ơn bạn đã đăng ký tài khoản <span style="color: #0091ea;">AZBOOKING.VN</span>. Để kích hoạt tài khoản, bạn vui lòng truy cập đường dẫn bên dưới để hoàn tất quá trình đăng ký.</p>

                <p style="color: #0091ea;"><a href="' .SITE_NAME.'/'.$link_dangky . '">' .SITE_NAME.'/'.$link_dangky . '</a></p>
                <p>Nếu nhấp vào đường dẫn không được, bạn có thể sao chéo đường dẫn vào cửa sổ trình duyệt hoặc gõ lại trực tiếp trong đó</p>
                <p>Trân trọng !</p>
                </div>';

}else{
    if($check_tab==3){
        $content_email=' <h3 style="font-weight: 600;
  font-size: 18px;
  border-bottom: 3px solid #0091EA;
  color: #0091ea;
  line-height: 1.3em;
  margin-top: 0;
  line-height: 58px;
  z-index: 9;
  text-transform: uppercase;
  text-align: center;" class="title_index">XÁC THỰC TÀI KHOẢN</h3>
                <div style="float: left;width: 100%;" class="col-xs-12 row">
                <p>Chào bạn, <b>' . $name_customer . '</b></p>
                <p>Tài khoản của bạn đã được kích hoạt. Bạn đã sẵn sàng đăng nhập và tạo chiến dịch tiếp thị liên kết cho riêng mình</p>

                <p >Link đăng nhập: <a style="color: #0091ea;" href="' .SITE_NAME.'/'.$link_dangky . '">' .SITE_NAME.'/'.$link_dangky . '</a></p>

                <p>Trân trọng !</p>
                </div>';

    }else{
        if($check_tab==2){
            $content_email=' <h3 style="font-weight: 600;
  font-size: 18px;
  border-bottom: 3px solid #0091EA;
  color: #0091ea;
  line-height: 1.3em;
  margin-top: 0;
  line-height: 58px;
  z-index: 9;
  text-transform: uppercase;
  text-align: center;" class="title_index">Cập nhật mật khẩu</h3>
                <div style="float: left;width: 100%;" class="col-xs-12 row">
                <p>Chào bạn, <b >' . $name_customer . '</b></p>
                <p>Hệ thống vừa nhận được yêu cầu reset lại mật khẩu của bạn</p>
                <p>Mật khẩu mới: <b style="color: #0091ea;">[pass_new]</b></p>
                <p>Chú ý: sau khi đăng nhập vào hệ thống, bạn hãy thay đổi mật khẩu vừa tạo để tài khoản của bạn được bảo mật</p>
                <p>Trân trọng !</p>
                </div>';
        }
        else{
            if($check_tab==0){
                $content_email=' <h3 style="font-weight: 600;
  font-size: 18px;
  border-bottom: 3px solid #0091EA;
  color: #0091ea;
  line-height: 1.3em;
  margin-top: 0;
  line-height: 58px;
  z-index: 9;
  text-transform: uppercase;
  text-align: center;" class="title_index">Mã đăng nhập AZBOOKING.VN</h3>
                <div style="float: left;width: 100%;" class="col-xs-12 row">
                <p>Mã đăng nhập: <b style="color: #0091ea;">[pass_code]</b></p>
                <p>Bạn hãy nhập mã <b style="color: #0091ea;">[pass_code]</b> để đăng nhập được vào hệ thống</p>
                </div>';
            }
        }
    }
}

$message_dangky = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    <title>' . $title . '</title>
</head>
<body>
<div style="width: 1000px;  margin:auto" class="site-content">
    <header style="position: relative;z-index: 999; background: white;text-align: center; padding: 10px 0 3px;" class="site-header">
        <div style=" text-align: center" >
            <a style=" text-align: center" href="' . SITE_NAME . '" >
                <img title="' . $title . '" style="width: 20%"
                     src="' . $logo . '"
                     alt="' . $title . '">
            </a>
        </div>
    </header>

    <div style="float: left; width: 100%" class="hero">
        <div class="slides">
            <img style="width: 100%" src="' . $banner . '">
        </div>
    </div>

    <main style="float: left; width: 100%" class="main-content">
        <div class="fullwidth-block">
            <div style="width: 100%;" class="container" class="container">
               '.$content_email.'
            </div>
        </div>

        <div class="fullwidth-block">
            <div style="    width: 100%; " class="container">
                <h3 style="font-weight: 600;
  font-size: 18px;
  border-bottom: 3px solid #0091EA;
  color: #0091ea;
  line-height: 1.3em;
  margin-top: 0;
  line-height: 58px;
  z-index: 9;
  text-transform: uppercase;
  text-align: center;" class="title_index">Có thể bạn quan tâm <a
                        style="float: right; margin-top: 10px; color: red; font-weight: bold;font-size: 14px;"
                        href="' . SITE_NAME . '/tour-du-lich/">Xem thêm...</a></h3>

                <div style="float: left; width: 100%" class="row">

                   ' . $tour_string . '

                </div>
            </div>
        </div>

    </main>

    <footer class="site-footer">
        <div style="    width: 100%;" class="container">
            <div class="row">
               <img title="' . $title . '" style="width: 100%;" src="' . $footer . '">
            </div>
        </div>
    </footer>
</div>
</body>
</html>';
$message_dangky=_return_mc_encrypt($message_dangky,'','');
?>
<html>
<head>
    <title><?php echo $title ?></title>
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
                <a href="<?php echo SITE_NAME ?>"><img style="width: 60%" alt="<?php echo $data['config'][0]->Name ?>"
                                                       src="<?php echo $data['config'][0]->Logo ?>"/></a>
                <input type="password" id="site_name_manage" hidden
                       value="<?php echo SITE_NAME_MANAGE ?>">
                <input type="password" id="site_name" hidden
                       value="<?php echo SITE_NAME ?>">
            </div>
        </div>
        <div id="confirm-box" class="<?php echo $active_confirm ?> hidden_box">
            <div class="separator">
                <span style="left: 19%;font-size: 12px;" class="separator-text-forget">Hệ thống đang xác thực tài khoản...</span>
            </div>
            <form method="post" action="" class="login-form" id="confirm-form">
                <div style="text-align: center;margin-top: 0px; margin-bottom: 10px" class="input-container">
                    <input type="password" hidden name="mail_confirm" value="<?php echo $message_dangky?>">
                    <input type="password" hidden name="mail_send" value="<?php echo $_GET['type']?>">
                    <input type="password" id="email_check_confirm" hidden
                           value="<?php echo $email_confirm ?>">
                   <img id="loading_confirm" src="<?php echo SITE_NAME.'/tiepthi/img/loading_1.gif'?>">
                    <br>
                </div>
            </form>
            <div id="confirm_reset" class="btn_action" id="action_register" style="text-align: center; display: none">
                <a style="width: inherit; float: inherit" href="javascript:void(0)" class="login"  > <i
                        class="ace-icon fa fa-refresh "></i> Thử lại</a>
            </div>
            <br>
        </div>
        <div id="login-box" class="<?php echo $active_login ?> hidden_box">
            <div class="separator">
                <span class="separator-text">Đăng nhập</span>
            </div>
            <?php if(isset($check_login)&&$check_login!=1&&$check_login!=2){?>
            <div class="required_create">
                <span>
                        (<?php echo $check_login?>)
                </span>
            </div>
             <?php }?>
            <form method="post" action="" class="login-form" id="dangnhap_form">
                <input type="password" hidden name="mail_confirm" value="<?php echo $message_dangky?>">
                <div class="input-container">
                    <i class="fa fa-envelope"></i>
                    <input type="email" class="input" name="username_login" id="email_login" <?php echo $login_focus ?>
                           placeholder="Email *"/>
                    <p hidden id="mess_email_login"
                       style="color: red; font-size: 13px"><i class="fa fa-times"></i> Bạn vui lòng nhập email đăng nhập
                    </p>
                </div>
                <div class="input-container">
                    <i class="fa fa-lock"></i>
                    <input type="password" name="password_login" id="password_login" class="input"
                           placeholder="Mật khẩu *"/>
                    <p hidden id="mess_password_login"
                       style="color: red; font-size: 13px"><i class="fa fa-times"></i> Bạn vui lòng nhập mật khẩu đăng nhập
                    </p>
                </div>
                <div class="rememberme-container">
                    <input type="checkbox" name="rememberme" id="rememberme"/>
                    <label for="rememberme" class="rememberme"><span>Ghi nhớ tài khoản</span></label>
                </div>
                <div class="btn_action">
                    <a class="loading" id="loading_login" style="display: none"><img id="loading" style="width: 150px;"
                                                                                      src="http://azbooking.vn/view/default/themes/images/loading.gif"></a>
                    <a href="javascript:void(0)" id="login_btn" class="login"> <i class="ace-icon fa fa-key"></i> Đăng
                        nhập</a>
                    <a href="javascript:void(0)" class="register cancel_btn"> <i class="ace-icon fa fa-refresh"></i> Hủy</a>
                </div>
            </form>


            <div class="separator" style=" margin-bottom: 20px;display: inline-block;width: 100%;">
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
            </div>
            <div class="toolbar clearfix">
                <div><a href="<?php echo SITE_NAME?>/tiep-thi-lien-ket/thanh-vien/?type=quen-mat-khau" class="forgot-password-link"> <i
                            class="ace-icon fa fa-arrow-left"></i> Quên mật khẩu </a></div>
                <div style="float: right;text-align: right;"><a href="<?php echo SITE_NAME?>/tiep-thi-lien-ket/thanh-vien/?type=dang-ky" class="user-signup-link">
                        Đăng ký tài khoản <i
                            class="ace-icon fa fa-arrow-right"></i> </a>
                </div>
            </div>
        </div>
        <div id="forgot-box" class="<?php echo $active_forget ?> hidden_box">
            <div class="separator">
                <span class="separator-text-forget">Quên mật khẩu</span>
            </div>
            <form method="post" action="" class="login-form" id="reset-form">
                <div class="input-container">
                    <i class="fa fa-envelope"></i>
                    <input type="email" class="input" id="email_forget" name="email_forget" <?php echo $forget_focus ?>
                           placeholder="Email"/>
                    <input type="password" hidden name="mail_confirm" value="<?php echo $message_dangky?>">
                </div>
                <div class="btn_action">
                    <a class="loading" id="loading_reset"n style="display: none"><img id="loading" style="width: 150px;"
                                                                                      src="http://azbooking.vn/view/default/themes/images/loading.gif"></a>
                    <a  href="javascript:void(0)" id="send_forget_email" class="login"> <i class="ace-icon fa fa-paper-plane-o"></i> Gửi</a>
                </div>
            </form>
            <br>
            <div style="display: inline-block;    width: 100%;" class="toolbar clearfix">
                <div style="float: right;text-align: right;"><a href="<?php echo SITE_NAME?>/tiep-thi-lien-ket/thanh-vien/" class="login-password-link">
                        Đăng nhập <i
                            class="ace-icon fa fa-arrow-right"></i> </a></div>
            </div>
        </div>
        <div id="signup-box" class="<?php echo $active_dangky ?> hidden_box">
            <div class="separator">
                <span class="separator-text-register">Đăng ký</span>

            </div>
            <div class="required_create">
                <span>(Bạn vui lòng điền đầy đủ thông tin đăng ký)</span>
            </div>
            <form method="post" action="" id="signup-form" class="login-form" style="margin-bottom: 0px">
                <input type="password" hidden name="mail_create" value="<?php echo $message_dangky?>">
                <div class="input-container">
                    <i class="fa fa-envelope"></i>
                    <input maxlength="100" type="email" id="email_dangky" class="input"
                           name="email_dangky" <?php echo $dangky_focus ?>
                           required class="form-control" placeholder="Email *"/>
                    <input type="password" id="check_show_email" hidden value="0">
                    <p hidden id="mess_email_dang_ky"
                       style="color: red; font-size: 13px"><i class="fa fa-times"></i> Email đã tồn tại trong hệ thống
                    </p>
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
                    <p hidden id="power_pass" style="font-size: 13px"></p>
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
                    <label for="confirm_res" class="rememberme"><span>Tôi đã đọc và đồng ý  <a
                                href="<?php echo SITE_NAME ?>/tiep-thi-lien-ket/dieu-khoan-dich-vu.html"
                                target="_blank">Điều khoản</a> -- <a
                                href="<?php echo SITE_NAME ?>/tiep-thi-lien-ket/chinh-sach.html" target="_blank"> Chính
                                sách </a></span></label>
                </div>

            </form>
            <div class="btn_action" id="action_register">
                <a class="loading" id="loading_create" style="display: none"><img id="loading" style="width: 150px;"
                                                                                  src="http://azbooking.vn/view/default/themes/images/loading.gif"></a>
                <a href="javascript:void(0)" class="login" style="display: none" id="dangky_name" name="dangky_name"> <i
                        class="ace-icon fa fa-sign-in"></i> Đăng ký</a>
                <a href="javascript:void(0)" class="register cancel_btn" id="cancel_create"> <i
                        class="ace-icon fa fa-refresh"></i> Hủy</a>
            </div>
            <div class="toolbar clearfix " id="toolbar_create">
                <div><a href="<?php echo SITE_NAME?>/tiep-thi-lien-ket/thanh-vien/" class="login-password-link"> <i
                            class="ace-icon fa fa-arrow-left"></i> Đăng nhập </a></div>
            </div>
        </div>

    </div>
</div>
</body>
<script src="<?php echo SITE_NAME ?>/tiepthi/js/login.js"></script>
<script src="<?php echo SITE_NAME ?>/tiepthi/js/dialog.js"></script>
<?php if($check_tab==3){?>
    <script src="<?php echo SITE_NAME ?>/tiepthi/js/confirm_email.js"></script>
<?php }?>
</html>
<?php
function link_tourdetail_ajax($app, $name_url = '', $name2_url = '')
{
    if ($app->tour_quoc_te == 0) {

        $link = '/tour-du-lich-trong-nuoc/';
    } else {
        $link = '/tour-du-lich-quoc-te/';
    }
    if ($name2_url == '') {
        return SITE_NAME . $link . $name_url . '/' . $app->name_url . '.html';
    } else {
        return SITE_NAME . $link . $name_url . '/' . $name2_url . '/' . $app->name_url . '.html';
    }
}
?>