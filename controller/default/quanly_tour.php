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

if(!isset($_SESSION["admin_id"])||!isset($_SESSION["tour_id"])||!isset($_SESSION["TenDangNhap"])||!isset($_SESSION["Full_name"])||!isset($_SESSION["Email"])){
    redict(SITE_NAME.'/dang-nhap-tour/');
}
$data_admin=admin_getById($_SESSION["admin_id"]);
if(count($data_admin)==0){
    redict(SITE_NAME.'/dang-nhap-tour/');
}

if (count($data['menu']) == 0) {
    redict(SITE_NAME);
}
$name = $data['menu'][17]->name;
$data['banner'] = array(
    'banner_img' => $data['menu'][17]->img,
    'name' => $name,
    'url' => '<li><a href="' . SITE_NAME . '">Trang chủ</a></li><li><span>' . $name . '</span></li>'
);
$data['link_anh'] = $data['menu'][17]->img;
//$data['link_url'] = SITE_NAME . '/' . $id . '.html';
$title = $data['menu'][17]->title;
$description = $data['menu'][17]->description;
$keyword = $data['menu'][17]->keyword;
$active = '';
if($data_admin[0]->tour_id==''){
    $data['tour_list']=array();
}else{
    $dk='tour.id in ('.$data_admin[0]->tour_id.')';
    $data['tour_list']=tour_getByPagingReplace(1,1000,'id DESC',$dk);
}

$data['tab_tour_title'] = 'active_tab_left';
$data['tab_khachsan_title'] = '';
$data['tab_tintuc_title'] = '';

$data['tab_tour'] = '';
$data['tab_khachsan'] = 'hidden';
$data['tab_tintuc'] = 'hidden';

$title = ($title) ? $title : 'Azbooking.vn';
$description = ($description) ? $description : 'Azbooking.vn';
$keywords = ($keyword) ? $keyword : 'Azbooking.vn';
show_header($title, $description, $keywords, $data);
show_menu($data, $active);
//show_banner($data);
show_quanly_tour($data);
show_footer($data);
