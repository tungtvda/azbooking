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
    $asign['moi']=0;
    $asign['ket_thuc']=0;
    $asign['huy']=0;
    if(isset($data_list_noti['moi'])){
        $asign['moi']=$data_list_noti['moi'];
    }
    if(isset($data_list_noti['ket_thuc'])){
        $asign['ket_thuc']=$data_list_noti['ket_thuc'];
    }
    if(isset($data_list_noti['huy'])){
        $asign['huy']=$data_list_noti['huy'];
    }
    $asign['count_tour']=$data['count_tour'];
    $asign['tour_noibat']=$data['tour_noibat'];
    $asign['count_giangia']=$data['count_giangia'];
    $asign['count_trongnuoc']=$data['count_trongnuoc'];
    $asign['count_quocte']=$data['count_quocte'];

    $created_user = date("Y-m-d", strtotime($data_session['created']));
    $today_user = date("Y-m-d");
    $first_date = strtotime($created_user);
    $second_date = strtotime($today_user);
    $datediff = abs($first_date - $second_date);
    $count_day = floor($datediff / (60 * 60 * 24));
    $count_day = round($count_day / 30) + 1;
    for ($i = 1; $i <= $count_day; $i++) {
        $created_user = date('Y-m-d', strtotime('+3 months', strtotime($created_user)));
        if (strtotime($created_user) >= strtotime($today_user)) {
            break;
        }
    }
     $start_date = date('Y-m-d', strtotime('-3 months', strtotime($created_user)));
    $array_check_noti['start_date']=$start_date;
    $array_check_noti['end_date']=$today_user;
    $asign['start_date_format']=date("d-m-Y", strtotime($start_date));
    $asign['end_date_format']=date("d-m-Y", strtotime($today_user));
    $list_chart= returnCURL($array_check_noti, SITE_NAME_MANAGE.'/azbooking-get-list-chart.html');
    $data_list_chart=json_decode($list_chart,true);
    $asign['list_chart']='';
    $asign['hight']='500px';
    $asign['count_total_booking']='0';
    $asign['count_total_user']='0';
    if(isset($data_list_chart['list_chart'])&&isset($data_list_chart['count_chart'])&&isset($data_list_chart['count_total_booking'])&&isset($data_list_chart['count_total_user'])){
        $asign['list_chart']=$data_list_chart['list_chart'];
        $asign['hight']=$data_list_chart['count_chart'].'00px';
        $asign['count_total_booking']=$data_list_chart['count_total_booking'];
        $asign['count_total_user']=$data_list_chart['count_total_user'];
    }
    print_template($asign, 'tiep_thi');
}



