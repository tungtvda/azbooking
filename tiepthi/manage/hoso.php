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
if(isset($_GET['code'])){
    if(isset($_SESSION['user_token'])){
        $data_user=json_decode($_SESSION['user_token'],true);
        $data_user['avatar']=_return_mc_encrypt(_return_mc_decrypt(_returnGetParamSecurity('code')),ENCRYPTION_KEY,1);
        $_SESSION['user_token']=json_encode($data_user);
        if(isset($_COOKIE['user_token'])){
            setcookie('user_token', $_SESSION['user_token'], time() + (86400 * 30),'/', "",  0); // 86400 = 1 day
        }
    }
}
require_once DIR . '/common/redict.php';

require_once DIR.'/controller/default/public.php';
$data['config']=config_getByTop(1,'','');

$data_session=checkSession('', 1);
$array_check_noti = array(
    'id'=>_return_mc_encrypt($data_session['id']),
    'name'=>_return_mc_encrypt($data_session['name']),
    'user_email'=>_return_mc_encrypt($data_session['user_email']),
    'user_code'=>_return_mc_encrypt($data_session['user_code']),
    'created'=>_return_mc_encrypt($data_session['created']),
    'avatar'=>_return_mc_encrypt($data_session['avatar']),
    'token_code'=>_return_mc_encrypt($data_session['token_code']),
    'time_token'=>_return_mc_encrypt($data_session['time_token']),
);
$list_noti= returnCURL($array_check_noti, SITE_NAME_MANAGE.'/azbooking-hoso.html');
$data_list_noti=json_decode($list_noti,true);
if($data_list_noti['success']==0){
    redict(SITE_NAME.'/tiep-thi-lien-ket/');
}

$data['user']=$data_list_noti['user'];
$title='Hồ sơ "'.$data['user']['name'].'"';
$description='Hệ thống quản lý tiếp thị liên kết';
$keyword='Hệ thống quản lý tiếp thị liên kết';
$data['name_module']=$title;

show_header_tiep_thi($title,$description,$keyword,$data);
show_sidebar_tiep_thi($data,'hoso');
show_navbar_tiep_thi($data);
show_hoso($data);
show_footer_tiep_thi($data);
if(isset($_GET['code'])){
    redict(SITE_NAME.'/tiep-thi-lien-ket/ho-so/');
}