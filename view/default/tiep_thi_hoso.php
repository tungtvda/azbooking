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
    $asign['name']=$data['user']['name'];
    $asign['phone']=$data['user']['phone'];
    $asign['email']=$data['user']['user_email'];
    $asign['address']=$data['user']['address'];
    $asign['mobi']=$data['user']['mobi'];
    $asign['account_number_bank']=$data['user']['account_number_bank'];
    $asign['bank']=$data['user']['bank'];
    $asign['open_bank']=$data['user']['open_bank'];
    $asign['user_code']=$data['user']['user_code'];
    $asign['skype']=$data['user']['skype'];
    $asign['facebook']=$data['user']['facebook'];
    $asign['cmnd']=$data['user']['cmnd'];
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
    print_template($asign, 'tiep_thi_ho_so');
}



