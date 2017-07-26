<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:40 PM
 */
if(!defined('SITE_NAME'))
{
    require_once '../../config.php';
}

require_once DIR.'/controller/default/public.php';
require_once DIR . '/common/paging.php';
require_once DIR . '/common/redict.php';
$data['config']=config_getByTop(1,'','');
$id=_return_mc_decrypt(_returnGetParamSecurity('id'));
if($id==''){
    redict(SITE_NAME.'/tiep-thi-lien-ket/');
}
$id_noti=_return_mc_decrypt(_returnGetParamSecurity('id_noti'));
$array_check_noti = array(
    'id'=>_return_mc_encrypt($id),
    'id_noti'=>_return_mc_encrypt($id_noti),
);

$list_noti= returnCURL($array_check_noti, SITE_NAME_MANAGE.'/azbooking-get-detail-booking.html');
$data_list_hoahong=json_decode($list_noti,true);
if(!isset($data_list_hoahong['success'])||$data_list_hoahong['success']==0 ||!isset($data_list_hoahong['data'][0])||count($data_list_hoahong['data'][0])==0 ){
    redict(SITE_NAME.'/tiep-thi-lien-ket/');
}

$data['detail']=$data_list_hoahong['data'][0];
$link_bread='don-hang';
$name_bre='Danh sách đơn hàng';
if($data['detail']['status']==1||$data['detail']['status']==2||$data['detail']['status']==4){
    $link_bread='don-hang?type=1';
    $name_bre='Đơn hàng đang giao dịch';
}
if($data['detail']['status']==5){
    $link_bread='don-hang?type=2';
    $name_bre='Đơn hàng đã giao dịch';
}
if($data['detail']['status']==3){
    $link_bread='don-hang?type=3';
    $name_bre='Đơn hàng đã hủy';
}
$name_module='Chi tiết đơn hàng "'.$data['detail']['code_booking'].'"';
$data['breadcrumb']="<li><a href='".SITE_NAME."/tiep-thi-lien-ket/".$link_bread."'>".$name_bre."</a></li><li class='active'>Chi tiết đơn hàng</li>";

$title='Hệ thống quản lý tiếp thị liên kết';
$description='Hệ thống quản lý tiếp thị liên kết';
$keyword='Hệ thống quản lý tiếp thị liên kết';
$data['name_module']=$name_module;
$data['title_table']=$name_module;
show_header_tiep_thi($title,$description,$keyword,$data);
show_sidebar_tiep_thi($data,'donhang');
show_navbar_tiep_thi($data);
show_tiepthi_donhang_chitiet($data);
show_footer_tiep_thi($data);