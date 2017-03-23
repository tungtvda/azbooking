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
    if($num_nguoi_lon==0){
        $num_nguoi_lon=1;
    }
    $num_tre_em=_returnPostParamSecurity('num_tre_em');
    $num_tre_em_5=_returnPostParamSecurity('num_tre_em_5');
    $httt=_returnPostParamSecurity('httt');
    $dieu_khoan=_returnPostParamSecurity('dieu_khoan');
    $note=_returnPostParamSecurity('note');
    $price=$data['detail'][0]->price;
    $price_2=$data['detail'][0]->price_2;
    $price_3=$data['detail'][0]->price_3;
    if($price==0||$price==''){
        $price='Liên hệ';
    }
    if($price_2==0||$price_2==''){
        $price_2=$price;
    }
    if($price_3==0||$price_3==''){
        $price_3=$price;
    }

    $price_new=$price;
    $price_new_2=$price_2;
    $price_new_3=$price_3;





    if($name_customer!=''&&$email!=''&&$phone!=''&&$num_nguoi_lon!=''&&$httt!=''&&$dieu_khoan!='')
    {
        $price_number= $data['detail'][0]->price_number;
        $price_number_2= $data['detail'][0]->price_number_2;
        $price_number_3= $data['detail'][0]->price_number_3;

        $name_price='Giá người lớn';
        $name_price_2='Giá trẻ em 5-11 tuổi';
        $name_price_3='Giá trẻ em dưới 5 tuổi';
        if($data['detail'][0]->name_price!=''){
            $name_price=$data['detail'][0]->name_price;
        }
        if($data['detail'][0]->name_price_2!=''){
            $name_price_2=$data['detail'][0]->name_price_2;
        }
        if($data['detail'][0]->name_price_3!=''){
            $name_price_3=$data['detail'][0]->name_price_3;
        }

        $total=0;
        $total_nguoi_lon=0;
        $total_tre_em=0;
        $total_tre_em_5=0;

        $name_customer_mahoa=_return_mc_encrypt($name_customer);
        $email_mahoa=_return_mc_encrypt($email);
        $phone_mahoa=_return_mc_encrypt($phone);
        $num_nguoi_lon_mahoa=_return_mc_encrypt($num_nguoi_lon);
        $httt_mahoa=_return_mc_encrypt($httt);
        $note_mahoa=_return_mc_encrypt($note);
        $nguontour_mahoa=_return_mc_encrypt($_SERVER['HTTP_HOST']);
        $name_tour_mahoa=_return_mc_encrypt($data['detail'][0]->name);
        $code_tour_mahoa=_return_mc_encrypt($data['detail'][0]->code);

        $name_price_mahoa=_return_mc_encrypt($name_price);
        $name_price_2_mahoa=_return_mc_encrypt($name_price_2);
        $name_price_3_mahoa=_return_mc_encrypt($name_price_3);

        $price_mahoa=$data['detail'][0]->price;
        $price_2_mahoa=$data['detail'][0]->price_2;
        $price_3_mahoa=$data['detail'][0]->price_3;


        $check_total=1;
        if($num_nguoi_lon>1&&$price!='Liên hệ'){
            $array_price_so_nguoi=returnArray_price($price_number,$array_price=array());
            if(count($array_price_so_nguoi)>0){
                $price_new= price_new($num_nguoi_lon,$array_price_so_nguoi,$price_new);
                $total_nguoi_lon=$num_nguoi_lon*$price_new;
            }
        }else{
            if($price=='Liên hệ'){
                $total_nguoi_lon='Liên hệ';
                $check_total=0;
            }
        }

        if($num_tre_em>1&&$price_2!='Liên hệ'){
            $array_price_so_nguoi_lon=returnArray_price($price_number_2,$array_price=array());
            if(count($array_price_so_nguoi_lon)>0){
                 $price_new_2= price_new($num_tre_em,$array_price_so_nguoi_lon,$price_new_2);
                $total_tre_em=$num_tre_em*$price_new_2;
            }
        }else{
            if($num_tre_em==0){
                $total_tre_em=0;
            }else{
                if($price_2=='Liên hệ'){
                    $total_tre_em='Liên hệ';
                    $check_total=0;
                }
            }

        }

        if($num_tre_em_5>1&&$price_3!='Liên hệ'){
            $array_price_so_nguoi_lon=returnArray_price($price_number_3,$array_price=array());
            if(count($array_price_so_nguoi_lon)>0){
                $price_new_3= price_new($num_tre_em_5,$array_price_so_nguoi_lon,$price_new_3);
                $total_tre_em_5=$price_new_3*$num_tre_em_5;
            }
        }else{
            if($num_tre_em_5==0){
                $total_tre_em_5=0;
            }else{
                if($price_3=='Liên hệ'){
                    $total_tre_em_5='Liên hệ';
                    $check_total=0;
                }
            }

        }
        if($check_total==0){
            $total='Liên hệ';
        }else{
          echo  $total=$total_nguoi_lon+$total_tre_em+$total_tre_em_5;
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"http://manage.mixtourist.com.vn/booking-website/");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
            "name=tungtv&postvar2=value2&postvar3=value3");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec ($ch);

        curl_close ($ch);

//        print_r($server_output);
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

function returnArray_price($price,$array_price_return=array()){
    $array_check_item=array();
    if($price!=''){
        $array_price=explode(',',$price);
        if(count($array_price)>0){
            foreach($array_price as $row){
                if($row!=''){
                    $array_item=explode('-',$row);
                    if(count($array_item)>0){
                        if(isset($array_item[0])&&isset($array_item[1])&&$array_item[0]!=''&&$array_item[1]!=''){
                            array_push($array_check_item,$array_item[0]);
                            $array_item=array(
                                '"'.$array_item[0].'"'=>$array_item[1]
                            );
                            $array_price_return=array_merge($array_price_return,$array_item);
                        }
                    }
                }
            }
        }
    }
    if(count($array_check_item)>0){
        $item_0=array(
            '"0"'=>$array_check_item
        );
        $array_price_return=array_merge($array_price_return,$item_0);
    }

    return $array_price_return;
}

function price_new($num_nguoi_lon,$array_price_so_nguoi,$price_new){
    if(isset($array_price_so_nguoi['"0"'])){
        $array_key=$array_price_so_nguoi['"0"'];
        if(in_array($num_nguoi_lon,$array_key)){
            if(isset($array_price_so_nguoi['"'.$num_nguoi_lon.'"'])){
                $price_new=$array_price_so_nguoi['"'.$num_nguoi_lon.'"'];
            }
        }else{
            foreach($array_key as $row_songuoi){
                $check_lon_hon=strstr($row_songuoi,">");
                if($check_lon_hon!=''){
                    $number_lonhon=str_replace('>','',$check_lon_hon);
                    if($num_nguoi_lon>=$number_lonhon){
                        $price_new=$array_price_so_nguoi['"'.$row_songuoi.'"'];
                    }
                }
            }

        }
    }
    return $price_new;
}


