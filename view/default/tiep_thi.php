<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
function show_tiepthi($data = array())
{
    $asign = array();
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
        'top_5'=>1,
    );
    $list_noti= returnCURL($array_check_noti, SITE_NAME_MANAGE.'/azbooking-get-dashboard.html');
    $data_list_noti=json_decode($list_noti,true);
    print_r($data_list_noti);
    echo 'asdfasdfsadfasdf';
    exit;
    print_template($asign, 'tiep_thi');
}



