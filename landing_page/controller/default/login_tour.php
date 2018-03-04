<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:40 PM
 */
if (!defined('SITE_NAME')) {
    require_once '../../config.php';
}

require_once DIR . '/controller/default/public.php';
require_once DIR . '/common/redict.php';
require_once(DIR."/common/hash_pass.php");
require_once DIR.'/model/adminService.php';
$data['menu'] = menu_getByTop('', '', '');
$data['config'] = config_getByTop(1, '', '');

$function = '';
$active = '';

if (count($data['menu']) == 0) {
    redict(SITE_NAME);
}
$name = $data['menu'][16]->name;
$data['banner'] = array(
    'banner_img' => $data['menu'][16]->img,
    'name' => $name,
    'url' => '<li><a href="' . SITE_NAME . '">Trang chủ</a></li><li><span>' . $name . '</span></li>'
);
$data['link_anh'] = $data['menu'][16]->img;
//$data['link_url'] = SITE_NAME . '/' . $id . '.html';
$title = $data['menu'][16]->title;
$description = $data['menu'][16]->description;
$keyword = $data['menu'][16]->keyword;
$active = '';



$data['tab_tour_title'] = 'active_tab_left';
$data['tab_khachsan_title'] = '';
$data['tab_tintuc_title'] = '';

$data['tab_tour'] = '';
$data['tab_khachsan'] = 'hidden';
$data['tab_tintuc'] = 'hidden';

if(isset($_POST['email_username'])&&isset($_POST['password'])){
    $username=_returnPostParamSecurity('email_username');
    $password=_returnPostParamSecurity('password');
    if($username==''||$password==''){
        echo '<script>alert("Bạn vui lòng điền đầy đủ thông tin đăng nhập")</script>';
    }else{
        $Pass=hash_pass($password);
        $dk="(TenDangNhap='".$username."' or Email='".$username."') and MatKhau='".$Pass."'";
        $data_check=admin_getByTop('1',$dk,'');
        if(count($data_check)==0){
            echo '<script>alert("Đăng nhập thất bại!. Bạn vui lòng kiểm tra lại thông tin đăng nhập")</script>';
        }else{
            if($data_check[0]->status==0)
            {
                echo '<script>alert("Đăng nhập thất bại!. Tài khoản của bạn hiện chưa được kích hoạt")</script>';
            }else{
                $_SESSION["admin_id"] = $data_check[0]->Id;
                $_SESSION["tour_id"] = $data_check[0]->tour_id;
                $_SESSION["TenDangNhap"] = $data_check[0]->TenDangNhap;
                $_SESSION["Email"] = $data_check[0]->Email;
                $_SESSION["Full_name"] = $data_check[0]->Full_name;
                redict(SITE_NAME.'/quan-ly-tour/');
            }
        }
    }
}
if(isset($_POST['email_forgot'])&&isset($_POST['password_forgot'])&&isset($_POST['password_confirm'])){
    $email_forgot=_returnPostParamSecurity('email_forgot');
    $password_dk = _returnPostParamSecurity('password_forgot');
    $confirm_password = _returnPostParamSecurity('password_confirm');
    $dk="Email='".$email_forgot."' and status=1";
    $data_check=admin_getByTop('1',$dk,'');
    if(count($data_check)==0){
        echo '<script>alert("Email không tồn tại trong hệ thống")</script>';
    }else{
        if ($password_dk == '' || $confirm_password == '') {
            echo '<script>alert("Bạn vui lòng điền đầy đủ mật khẩu")</script>';
        } else {
            if ($password_dk != $confirm_password) {
                echo '<script>alert("Hai mật khẩu không khớp")</script>';
            } else {
                $user_update=new admin((array)$data_check[0]);
                $user_update->password=hash_pass($password_dk);
                admin_update($user_update);
                echo '<script>alert("Bạn đã đổi mật khẩu thành công")</script>';
            }
        }
    }
}
$title = ($title) ? $title : 'Azbooking.vn';
$description = ($description) ? $description : 'Azbooking.vn';
$keywords = ($keyword) ? $keyword : 'Azbooking.vn';
show_header($title, $description, $keywords, $data);
show_menu($data, $active);
//show_banner($data);
show_login($data);
show_footer($data);
