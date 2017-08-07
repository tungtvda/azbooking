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
require_once DIR . '/common/redict.php';

require_once DIR.'/controller/default/public.php';
$data['config']=config_getByTop(1,'','');
$data_session=checkSession('', 1);
if(isset($_GET['type'])){
    $type=_returnGetParamSecurity('type');
}else{
    $type=0;
}
$current=isset($_GET['page'])?$_GET['page']:'1';
$array_check_noti = array(
    'id'=>_return_mc_encrypt($data_session['id']),
    'name'=>_return_mc_encrypt($data_session['name']),
    'user_email'=>_return_mc_encrypt($data_session['user_email']),
    'user_code'=>_return_mc_encrypt($data_session['user_code']),
    'created'=>_return_mc_encrypt($data_session['created']),
    'avatar'=>_return_mc_encrypt($data_session['avatar']),
    'token_code'=>_return_mc_encrypt($data_session['token_code']),
    'time_token'=>_return_mc_encrypt($data_session['time_token']),
    'page'=>$current,
    'pagesize'=>10,
    'type'=>$type,
    'site_name'=>SITE_NAME,
);
$list_noti= returnCURL($array_check_noti, SITE_NAME_MANAGE.'/azbooking-hoso.html');
$data_list_noti=json_decode($list_noti,true);
if($data_list_noti['success']==0){
    redict(SITE_NAME.'/tiep-thi-lien-ket/');
}

$data['user']=$data_list_noti['user'];
$data['active_tab']='all';
$title='Rút tiền hoa hồng';
switch($type){
    case '1':
        $title='Yêu cầu rút tiền đã xác nhận';
        $data['active_tab']='xac_nhan';
        break;
    case '2':
        $title='Yêu cầu rút tiền đang chờ';
        $data['active_tab']='cho_xac_nhan';
        break;
}

$data['danhsach']=array();
$data['PAGING'] ='';
$list_rut_tien= returnCURL($array_check_noti, SITE_NAME_MANAGE.'/az-list-rut-tien.html');
$data_list_rut_tien=json_decode($list_rut_tien,true);
if(isset($data_list_rut_tien['danhsach'])){
    $data['danhsach']=$data_list_rut_tien['danhsach'];
}
if(isset($data_list_rut_tien['PAGING'])){
    $data['PAGING']=$data_list_rut_tien['PAGING'];
}

$description='Hệ thống quản lý tiếp thị liên kết';
$keyword='Hệ thống quản lý tiếp thị liên kết';
$data['name_module']=$title;
if($data['user']['hoa_hong']!='' &&$data['user']['hoa_hong']!=0){
    $data['hoa_hong']=$data['user']['hoa_hong'];
}else{
    $data['hoa_hong']=0;
}

show_header_tiep_thi($title,$description,$keyword,$data);
show_sidebar_tiep_thi($data,'hoahong');
show_navbar_tiep_thi($data);
show_hoahong($data);
show_footer_tiep_thi($data);