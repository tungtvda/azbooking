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
$current=isset($_GET['page'])?$_GET['page']:'1';
$data_session=checkSession('', 1);
if(isset($_GET['type'])){
    $type=_returnGetParamSecurity('type');
}else{
    $type='';
}
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


$dk='';
$name_module='Danh sách tour theo yêu cầu';
$data['active_tab']='all';
switch($type){
    case '0':
        $name_module='Tour đang đợi xác nhận';
        $data['active_tab']='type_0';
        break;
    case '1':
        $name_module='Tour đã xác nhận';
        $data['active_tab']='type_1';
        break;
    case '2':
        $name_module='Tour đã hủy';
        $data['active_tab']='type_2';
        break;
}
$data['danhsach']=array();
$data['PAGING'] ='';
$list_noti= returnCURL($array_check_noti, SITE_NAME_MANAGE.'/azbooking-get-list-tour-yeu-cau.html');
$data_list_noti=json_decode($list_noti,true);
if(isset($data_list_noti['danhsach'])){
    $data['danhsach']=$data_list_noti['danhsach'];
}
if(isset($data_list_noti['PAGING'])){
    $data['PAGING']=$data_list_noti['PAGING'];
}
$data['breadcrumb']="<li class='active'>Tour theo yêu cầu</li>";

$title='Quản lý tour theo yêu cầu';
$description=$title;
$keyword=$title;
$data['name_module']=$name_module;
$data['title_table']=$name_module;
show_header_tiep_thi($title,$description,$keyword,$data);
show_sidebar_tiep_thi($data,'tour_user');
show_navbar_tiep_thi($data);
show_tiepthi_tour_user($data);
show_footer_tiep_thi($data);