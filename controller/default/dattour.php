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
if(!isset($_GET['id_booking'])){
    redict(SITE_NAME);
}
$id=addslashes(strip_tags($_GET['id_booking']));
$id=_return_mc_decrypt($id);
$data['detail']=tour_getById($id);
if(count($data['detail'])==0){
    redict(SITE_NAME);
}

if(isset($_POST['name_customer'])){
    $name_customer=_returnPostParamSecurity('name_customer');
    $email=_returnPostParamSecurity('email');
    $address=_returnPostParamSecurity('address');
    $phone=_returnPostParamSecurity('phone');
    $num_nguoi_lon=_returnPostParamSecurity('num_nguoi_lon');
    $num_tre_em=_returnPostParamSecurity('num_tre_em');
    $num_tre_em_5=_returnPostParamSecurity('num_tre_em_5');
    $httt=_returnPostParamSecurity('httt');
    $dieu_khoan=_returnPostParamSecurity('dieu_khoan');
    $note=_returnPostParamSecurity('note');


    if($name_customer!=''&&$email!=''&&$phone!=''&&$num_nguoi_lon!=''&&$httt!=''&&$dieu_khoan!='')
    {
        $name_customer_mahoa=_return_mc_encrypt($name_customer);
        $email_mahoa=_return_mc_encrypt($email);
        $phone_mahoa=_return_mc_encrypt($phone);
        $num_nguoi_lon_mahoa=_return_mc_encrypt($num_nguoi_lon);
        $httt_mahoa=_return_mc_encrypt($httt);
        $note_mahoa=_return_mc_encrypt($note);
        $nguontour_mahoa=_return_mc_encrypt($_SERVER['HTTP_HOST']);
        $name_tour_mahoa=_return_mc_encrypt($data['detail'][0]->name);
        $code_tour_mahoa=_return_mc_encrypt($data['detail'][0]->code);
        $price=$data['detail'][0]->price;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"http://manage.mixtourist.com.vn/booking-website/");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
            "name=tungtv&postvar2=value2&postvar3=value3");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec ($ch);

        curl_close ($ch);

        print_r($server_output);
    }


}

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
    'name'=>$name,
    'url'=>'<li><a href="'.SITE_NAME.'">Trang chủ</a></li><li><span>'.$name.'</span></li>'
);
$data['link_anh']=$data['menu'][15]->img;

$title=$data['menu'][15]->title;
$description=$data['menu'][15]->description;
$keyword=$data['menu'][15]->keyword;

$title=($title)?$title:'Azbooking.vn';
$description=($description)?$description:'Azbooking.vn';
$keywords=($keyword)?$keyword:'Azbooking.vn';
show_header($title,$description,$keywords,$data);
show_menu($data,$active);
show_banner($data);
show_dattour($data);
show_left_danhmuc($data);
show_footer($data);
