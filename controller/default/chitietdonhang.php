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
require_once DIR . '/model/tourService.php';
require_once DIR . '/model/booking_tourService.php';
require_once DIR . '/model/configService.php';
require_once DIR . '/model/danhmuc_1Service.php';
require_once DIR . '/model/danhmuc_2Service.php';
require_once DIR . '/common/class.phpmailer.php';
require_once(DIR . "/common/Mail.php");
if(!isset($_GET['id_booking'])||!isset($_GET['code_booking'])){
    redict(SITE_NAME);
}
$id=addslashes(strip_tags($_GET['id_booking']));
$code_booking=addslashes(strip_tags($_GET['code_booking']));

$id=_return_mc_decrypt($id);
$code_booking=_return_mc_decrypt($code_booking);
$data['detail_booking']=booking_tour_getById($id);

if(count($data['detail_booking'])==0){
    redict(SITE_NAME);
}else{
    if($code_booking!=$data['detail_booking'][0]->code_booking){
        redict(SITE_NAME);
    }
    $data['detail']=tour_getById($data['detail_booking'][0]->tour_id);
    if(count($data['detail'])==0){
        redict(SITE_NAME);
    }
    $string_info_booking="number="._return_mc_encrypt($code_booking);
    $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL,"http://manage.mixtourist.com.vn/booking-website/");
    curl_setopt($ch, CURLOPT_URL,"http://localhost/manage_mix/return-booking-website/");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$string_info_booking);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec ($ch);
    curl_close ($ch);
    if($res===0){
        redict(SITE_NAME);
    }
    $data['booking_server']=json_decode($res,true);
    if(count($data['booking_server'])==0){
        redict(SITE_NAME);
    }
}

$title='Thông tin đơn hàng "'.$code_booking.'"';
$data['menu']=menu_getByTop('','','');
$data['config']=config_getByTop(1,'','');
$active='';
$date_now=_returnGetDateTime();

$data['tab_tour_title']='active_tab_left';
$data['tab_khachsan_title']='';
$data['tab_tintuc_title']='';

$data['tab_tour']='';
$data['tab_khachsan']='hidden';
$data['tab_tintuc']='hidden';

$name=$data['menu'][15]->name;
$data['banner']=array(
    'banner_img'=>$data['menu'][15]->img,
    'name'=>$title,
    'url'=>'<li><a href="'.SITE_NAME.'">Trang chủ</a></li><li><span>'.$name.'</span></li>'
);
$data['link_anh']=$data['menu'][15]->img;


$description=$data['menu'][15]->description;
$keyword=$data['menu'][15]->keyword;

$title=($title)?$title:'Azbooking.vn';
$description=($description)?$description:'Azbooking.vn';
$keywords=($keyword)?$keyword:'Azbooking.vn';
show_header($title,$description,$keywords,$data);
show_menu($data,$active);
show_banner($data);
show_dattourdetail($data);
//show_left_danhmuc($data);
show_footer($data);


