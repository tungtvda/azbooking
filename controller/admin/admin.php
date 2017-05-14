<?php
require_once '../../config.php';
require_once DIR . '/model/adminService.php';
require_once DIR . '/model/khachsanService.php';
require_once DIR . '/model/tourService.php';
require_once DIR . '/model/quyenService.php';
require_once DIR . '/view/admin/admin.php';
require_once DIR . '/common/messenger.php';
require_once(DIR . "/common/hash_pass.php");
require_once DIR . '/common/class.phpmailer.php';
require_once DIR . '/model/configService.php';
require_once DIR . '/model/danhmuc_1Service.php';
require_once DIR . '/model/danhmuc_2Service.php';
require_once(DIR . "/common/Mail.php");
$data = array();
$insert = true;
if (isset($_SESSION["Admin"])) {
    if (isset($_GET["action"]) && isset($_GET["Id"])) {
        if ($_GET["action"] == "delete") {
            $new_obj = new admin();
            $new_obj->Id = $_GET["Id"];
            admin_delete($new_obj);
            header('Location: ' . SITE_NAME . '/controller/admin/admin.php');
        } else if ($_GET["action"] == "edit") {
            $new_obj = admin_getById($_GET["Id"]);
            if ($new_obj != false) {
                $data['form'] = $new_obj[0];
                $data['tab2_class'] = 'default-tab current';
                $data['tab1_class'] = ' ';
                $insert = false;
                $pass_old = $new_obj[0]->MatKhau;
                $email_old = $new_obj[0]->Email;
                $tendn_old = $new_obj[0]->TenDangNhap;
            } else header('Location: ' . SITE_NAME . '/controller/admin/admin.php');
        } else {
            $data['tab1_class'] = 'default-tab current';
        }
    } else {
        $data['tab1_class'] = 'default-tab current';
    }
    $data['listfkey']['tour_list'] = tour_getByAll();
    $data['listfkey']['khachsan_id'] = khachsan_getByAll();
    $data['listfkey']['Quyen'] = quyen_getByAll();
    if (isset($_GET["action_all"])) {
        if ($_GET["action_all"] == "ThemMoi") {
            $data['tab2_class'] = 'default-tab current';
            $data['tab1_class'] = ' ';
        } else {
            $List_admin = admin_getByAll();
            foreach ($List_admin as $admin) {
                if (isset($_GET["check_" . $admin->Id])) admin_delete($admin);
            }
            header('Location: ' . SITE_NAME . '/controller/admin/admin.php');
        }
    }
    if (isset($_POST["khachsan_id"]) && isset($_POST["TenDangNhap"]) && isset($_POST["Full_name"]) && isset($_POST["MatKhau"]) && isset($_POST["Quyen"])) {

        $array = $_POST;
        if (!isset($array['Id']))
            $array['Id'] = '0';
        if (!isset($array['khachsan_id']))
            $array['khachsan_id'] = '0';
        if (!isset($array['TenDangNhap']))
            $array['TenDangNhap'] = '0';
        if (!isset($array['Full_name']))
            $array['Full_name'] = '0';
        if (!isset($array['MatKhau']))
            $array['MatKhau'] = '0';
        if (!isset($array['Quyen']))
            $array['Quyen'] = '0';
        if (!isset($array['status']))
            $array['status'] = '0';
        $new_obj = new admin($array);

        if ($insert) {
            $check_inser = 1;
            $email = _returnPostParamSecurity('Email');
            $TenDangNhap = _returnPostParamSecurity('TenDangNhap');
            $data_check = admin_getByTop('1', 'Email="' . $email . '" or TenDangNhap="' . $TenDangNhap . '"', 'id desc');
            if (count($data_check) > 0) {
                echo '<script>alert("Tài khoản đã tồn tại trong hệ thống")</script>';
                $check_inser = 0;
            }
            if ($check_inser == 1) {
                $new_obj->MatKhau = hash_pass($_POST["MatKhau"]);
                admin_insert($new_obj);
                if (isset($_POST['Email']) && $_POST['Email'] != '') {
                    $logo = SITE_NAME . '/email_template/images/logoazboong.vn.png';
                    $banner = SITE_NAME . '/email_template/images/banner.jpg';
                    $footer = SITE_NAME . '/email_template/images/footer.png';
                    $title = 'AZBOOKING.VN - GIÁ RẺ VÀ SẼ LUÔN NHƯ VẬY';
                    $data_config = config_getByTop(1, '', '');
                    if (count($data_config) > 0 && $data_config[0]->Logo != '') {
                        $logo = SITE_NAME . $data_config[0]->Logo;
                        $banner = SITE_NAME . $data_config[0]->banner_email;
                        $footer = SITE_NAME . $data_config[0]->footer_email;
                        $title = SITE_NAME . $data_config[0]->name;
                    }
                    $full_name = $_POST['Full_name'];
                    $TenDangNhap = $_POST['TenDangNhap'];
                    $MatKhau = $_POST['MatKhau'];
                    $email = $_POST['Email'];
                    $subject = "Azbooking.vn – Thông báo tạo tài khoản quản trị";
                    $message = "";
                    $message .= '<!DOCTYPE html>
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
                <h3 style="font-weight: 600;
  font-size: 18px;
  border-bottom: 3px solid #0091EA;
  color: #0091ea;
  line-height: 1.3em;
  margin-top: 0;
  line-height: 58px;
  z-index: 9;
  text-transform: uppercase;
  text-align: center;" class="title_index">Xin chào ' . $full_name . '!</h3>
                <div style="float: left;width: 100%;" class="col-xs-12 row">
                    <p style="font-weight: bold;line-height: 25px;"><span style="color: #0091ea;">AZBOOKING.VN</span> vừa thực hiện tạo tài khoản quản trị thông tin tour.

                    </p>
                </div>
                <div class="row" style="float: left; width: 100%; display: inline">
                    <div class="col-md-12 col-sm-12 col-xs-12" style="float: left;width: 47%;padding-right: 10px;">
                        <h6 style="font-size: 16px;
    margin-top: 10px;
    margin-bottom: 10px;
    text-transform: uppercase;
    color: #544531;" class="section-title">Thông tin đăng nhập</h6>
                        <table style="width: 100%">
                            <tr>
                                <td style="width: 30%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;">Tên</td>
                                <td style="width: 70%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;"><span style=" color: #0091ea;
                                font-weight: bold;">' . $full_name . '</span></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;">Email</td>
                                <td style="width: 70%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;"><span style=" color: #0091ea;
                                font-weight: bold;">' . $email . '</span></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;">Tên đăng nhập</td>
                                <td style="width: 70%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;"><span style=" color: #0091ea;
                                font-weight: bold;">' . $TenDangNhap . '</span></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;">Mật khẩu</td>
                                <td style="width: 70%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;"><span style=" color: #0091ea;
                                font-weight: bold;">' . $MatKhau . '</span></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;">Link đăng nhập</td>
                                <td style="width: 70%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;"><span style=" color: #0091ea;
                                font-weight: bold;"><a href="' . SITE_NAME . '/dang-nhap-tour/">' . SITE_NAME . '/dang-nhap-tour/</a></span></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;">Link quản lý sỗ chỗ</td>
                               <td style="width: 70%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;"><span style=" color: #0091ea;
                                font-weight: bold;"><a href="' . SITE_NAME . '/quan-ly-tour/">' . SITE_NAME . '/quan-ly-tour/</a></span></td>
                            </tr>

                        </table>
                    </div>

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
                    SendMail($email, $message, $subject);
                }

                header('Location: ' . SITE_NAME . '/controller/admin/admin.php');
            }

        } else {
            $check_inser = 1;
            if (isset($_POST['Email']) && $_POST['Email'] != '') {
                $email = _returnPostParamSecurity('Email');
                if ($email != $email_old) {
                    $dk = 'Email="' . $email . '"';
                    $data_check = admin_getByTop('1', $dk, 'id desc');
                    if (count($data_check) > 0) {
                        echo '<script>alert("Email đã tồn tại trong hệ thống")</script>';
                        $check_inser = 0;
                    }
                }
            } else {
                $TenDangNhap = _returnPostParamSecurity('TenDangNhap');
                if ($tendn_old != $TenDangNhap) {
                    $dk = 'TenDangNhap="' . $TenDangNhap . '"';
                    $data_check = admin_getByTop('1', $dk, 'id desc');
                    if (count($data_check) > 0) {
                        echo '<script>alert("Tên đăng nhập đã tồn tại trong hệ thống")</script>';
                        $check_inser = 0;
                    }
                }
            }
            if ($check_inser == 1) {
                if ($pass_old == $_POST["MatKhau"]) {
                    $new_obj->MatKhau = $pass_old;
                } else {
                    $new_obj->MatKhau = hash_pass($_POST["MatKhau"]);
                }

                $new_obj->Id = $_GET["Id"];
                admin_update($new_obj);
                $insert = false;
                header('Location: ' . SITE_NAME . '/controller/admin/admin.php');
            }

        }
    }
    $data['username'] = isset($_SESSION["UserName"]) ? $_SESSION["UserName"] : 'quản trị viên';
    $data['count_paging'] = admin_count('');
    $data['page'] = isset($_GET['page']) ? $_GET['page'] : '1';
    $data['table_body'] = admin_getByPagingReplace($data['page'], 20, 'Id DESC', '');
    // gọi phương thức trong tầng view để hiển thị
    view_admin($data);
} else {
    header('location: ' . SITE_NAME);
}
