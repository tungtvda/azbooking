<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
function show_hoso($data = array())
{
    $asign = array();
    $asign['avatar']=$data['user']['avatar'];
    switch($data['user']['type_tiep_thi']){
        case '1':
            $sao='4 sao';
            break;
        case '2':
            $sao='5 sao';
            break;
        case '3':
            $sao='đại lý';
            break;
        default;
            $sao='3 sao';
    }
    $asign['sao']=$sao;
    $asign['name']=$data['user']['name'];
    if($asign['name']!=''){
        $asign['name_valid']='valid';
    }
    $asign['phone']=$data['user']['phone'];
    if($asign['phone']!=''){
        $asign['phone_valid']='valid';
    }
    $asign['email']=$data['user']['user_email'];
    $asign['address']=$data['user']['address'];
    if($asign['address']!=''){
        $asign['address_valid']='valid';
    }
    $asign['mobi']=$data['user']['mobi'];
    $asign['account_number_bank']=$data['user']['account_number_bank'];
    $asign['bank']=$data['user']['bank'];
    $asign['open_bank']=$data['user']['open_bank'];
    $asign['user_code']=$data['user']['user_code'];
    $asign['skype']=$data['user']['skype'];
    $asign['facebook']=$data['user']['facebook'];
    $asign['cmnd']=$data['user']['cmnd'];
    $asign['login_two_steps']=$data['user']['login_two_steps'];
    if($data['user']['login_two_steps']==1){
        $asign['login_two_steps']='checked';
    }else{
        $asign['login_two_steps']='';
    }
    $asign['date_range_cmnd']=$data['user']['date_range_cmnd'];
    if($asign['date_range_cmnd']=='0000-00-00'){
        $asign['date_range_cmnd']='';

    }else{
        $asign['date_range_cmnd']=date('d-m-Y', strtotime($asign['date_range_cmnd']));

    }
    $asign['issued_by_cmnd']=$data['user']['issued_by_cmnd'];
    $asign['birthday']=$data['user']['birthday'];
    if($asign['birthday']=='0000-00-00'){
        $asign['birthday']='';
    }else{
        $asign['birthday']=date('d-m-Y', strtotime($asign['birthday']));
        $asign['date_valid']='valid';
    }
    if($data['user']['hoa_hong']!='' &&$data['user']['hoa_hong']!=0){
        $asign['hoa_hong']=number_format((int)$data['user']['hoa_hong'],0,",",".").' vnđ';
    }else{
        $asign['hoa_hong']="0 vnđ";
    }
    $asign['gender']=$data['user']['gender'];
    $selected_gender_0='';
    $selected_gender_1='';
    $selected_gender_2='';
    if($asign['gender']==0){
        $selected_gender_0='selected';
    }
    if($asign['gender']==1){
        $selected_gender_1='selected';
    }
    if($asign['gender']==2){
        $selected_gender_2='selected';
    }
    $asign['gender']=' <option '.$selected_gender_0.' value="">Chưa xác định</option>
                       <option '.$selected_gender_1.' value="1">Nam</option>
                       <option '.$selected_gender_2.' value="">Nữ</option>';
    $asign['site_name_manage']=SITE_NAME_MANAGE;
    $asign['site_name']=SITE_NAME;
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
    $asign['div_noti']='<div style="display: none">
        <input name="noti_name" value="'._return_mc_encrypt(json_encode($array_check_noti)).'">
        <input name="id" value="'._return_mc_encrypt($data_session['id']).'">
        <input name="name" value="'._return_mc_encrypt($data_session['name']).'">
        <input name="user_email" value="'._return_mc_encrypt($data_session['user_email']).'">
        <input name="user_code" value="'._return_mc_encrypt($data_session['user_code']).'">
        <input name="created" value="'._return_mc_encrypt($data_session['created']).'">
        <input name="avatar" value="'._return_mc_encrypt($data_session['avatar']).'">
        <input name="token_code" value="'._return_mc_encrypt($data_session['token_code']).'">
        <input name="time_token" value="'._return_mc_encrypt($data_session['time_token']).'">
        </div>';
    print_template($asign, 'tiep_thi_ho_so');
}



