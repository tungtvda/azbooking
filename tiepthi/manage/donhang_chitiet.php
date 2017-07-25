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
if(!isset($data_list_hoahong['success'])||$data_list_hoahong['success']==0){
    redict(SITE_NAME.'/tiep-thi-lien-ket/');
}
$name_module='Danh sách đơn hàng';
$data['breadcrumb']="<li href=''>Đơn hàng</li><li class='active'>Tour</li>";

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