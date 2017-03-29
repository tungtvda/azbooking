<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
function show_dattourdetail($data = array())
{
    $asign = array();
    $asign['name']= $data['detail'][0]->name;
    $asign['code']= $data['detail'][0]->code;
    $asign['img']= $data['detail'][0]->img;
    $asign['durations']= $data['detail'][0]->durations;
    $asign['destination']=$data['detail'][0]->destination;
    $asign['start']=sao($data['detail'][0]->hotel);
    $asign['name_url']=$data['detail'][0]->name_url;
    $asign['id']= $data['detail'][0]->id;
    $asign['price']= $data['detail'][0]->price;
    $asign['price_2']= $data['detail'][0]->price_2;
    $asign['price_3']= $data['detail'][0]->price_3;
    $asign['price_4']= $data['detail'][0]->price_4;
    $asign['price_5']= $data['detail'][0]->price_5;
    $asign['price_6']= $data['detail'][0]->price_6;
    if($data['detail'][0]->price==0||$data['detail'][0]->price==''){
        $asign['price_format']='Liên hệ';
        $asign['price']='Liên hệ';
    }
    else{
        $asign['price_format']= number_format($data['detail'][0]->price,0,",",".").' vnđ';
    }

    if($data['detail'][0]->price_2==''){
        $asign['price_2_format']=$asign['price_format'];
        $asign['price_2']=$asign['price'];
    }else{
        $asign['price_2_format']= number_format($data['detail'][0]->price_2,0,",",".").' vnđ';
    }
    if($data['detail'][0]->price_3==''){
        $asign['price_3_format']=$asign['price_format'];
        $asign['price_3']=$asign['price'];
    }else{
        $asign['price_3_format']= number_format($data['detail'][0]->price_3,0,",",".").' vnđ';
    }
    if($data['detail'][0]->price_4==''){
        $asign['price_4_format']=$asign['price_format'];
        $asign['price_4']=$asign['price'];
    }else{
        $asign['price_4_format']= number_format($data['detail'][0]->price_4,0,",",".").' vnđ';
    }
    if($data['detail'][0]->price_5==''){
        $asign['price_5_format']=$asign['price_format'];
        $asign['price_5']=$asign['price'];
    }else{
        $asign['price_5_format']= number_format($data['detail'][0]->price_5,0,",",".").' vnđ';
    }
    if($data['detail'][0]->price_6==''){
        $asign['price_6_format']=$asign['price_format'];
        $asign['price_6']=$asign['price'];
    }else{
        $asign['price_6_format']= number_format($data['detail'][0]->price_6,0,",",".").' vnđ';
    }
    $asign['ngay_khoi_hanh']='';
    if($data['booking_server']['ngay_khoi_hanh']!='0000-00-00'){
        $asign['ngay_khoi_hanh']=date('d-m-Y', strtotime(date($data['booking_server']['ngay_khoi_hanh'])));
    }
    $asign['ngay_ket_thuc']='';
    if($data['booking_server']['ngay_ket_thuc']!='0000-00-00'){
        $asign['ngay_ket_thuc']=date('d-m-Y', strtotime(date($data['booking_server']['ngay_ket_thuc'])));
    }
    $asign['code_booking']=$data['booking_server']['code_booking'];

    $asign['total_price']='Liên hệ';
    if($data['booking_server']['total_price']!='Liên hệ'){
        $asign['total_price']=number_format($data['booking_server']['total_price'],0,",",".").' vnđ';
    }

    $asign['ngay_tao']='';
    if($data['booking_server']['created']!='0000-00-00 00:00:00'){
        $asign['ngay_tao']=date('d-m-Y H:j:s', strtotime(date($data['booking_server']['created']))).' (Theo giờ Việt Nam)';
    }
    $asign['httt_name']=$data['booking_server']['httt_name'];
    $asign['ttdh_name']=$data['booking_server']['ttdh_name'];

    $asign['han_thanh_toan']='';
    if($data['booking_server']['han_thanh_toan']!='0000-00-00'){
        $asign['han_thanh_toan']=date('d-m-Y', strtotime(date($data['booking_server']['han_thanh_toan'])));
    }

    $asign['name_cus']='';
    $asign['address_cus']='';
    $asign['phone_cus']='';
    $asign['email_cus']='';
    $asign['note_cus']=$data['booking_server']['note'];

    $asign['num_nguoi_lon']=$data['booking_server']['num_nguoi_lon'];
    $asign['num_tre_em']=$data['booking_server']['num_tre_em'];
    $asign['num_tre_em_5']=$data['booking_server']['num_tre_em_5'];

    $asign['name_price']='Giá người lớn';
    $asign['name_price_2']='Giá trẻ em 5-11 tuổi';
    $asign['name_price_3']='Giá trẻ em dưới 5 tuổi';
    if($data['booking_server']['name_price']!=''){
        $asign['name_price']=$data['booking_server']['name_price'];
    }
    if($data['booking_server']['name_price_2']!=''){
        $asign['name_price_2']=$data['booking_server']['name_price_2'];
    }
    if($data['booking_server']['name_price_3']!=''){
        $asign['name_price_3']=$data['booking_server']['name_price_3'];
    }
    $asign['total_cus']=$data['booking_server']['num_nguoi_lon']+$data['booking_server']['num_tre_em']+$data['booking_server']['num_tre_em_5'];
    if(isset($data['booking_server']['data_cus_booking'])&&count($data['booking_server']['data_cus_booking'])>0){
        $data_cus_booking=$data['booking_server']['data_cus_booking'];
        $asign['name_cus']=$data_cus_booking[0]['name'];
        $asign['address_cus']=$data_cus_booking[0]['address'];
        $asign['phone_cus']=$data_cus_booking[0]['phone'];
        $asign['email_cus']=$data_cus_booking[0]['email'];
    }

    $asign['price_number']= $data['detail'][0]->price_number;
    $asign['price_number_2']= $data['detail'][0]->price_number_2;
    $asign['price_number_3']= $data['detail'][0]->price_number_3;
    $asign['price_number_4']= $data['detail'][0]->price_number_4;
    $asign['price_number_5']= $data['detail'][0]->price_number_5;
    $asign['price_number_6']= $data['detail'][0]->price_number_6;
    $asign['name_price']='Giá người lớn';
    $asign['name_price_2']='Giá trẻ em 5-11 tuổi';
    $asign['name_price_3']='Giá trẻ em dưới 5 tuổi';
    if($data['detail'][0]->name_price!=''){
        $asign['name_price']=$data['detail'][0]->name_price;
    }
    if($data['detail'][0]->name_price_2!=''){
        $asign['name_price_2']=$data['detail'][0]->name_price_2;
    }
    if($data['detail'][0]->name_price_3!=''){
        $asign['name_price_3']=$data['detail'][0]->name_price_3;
    }



    $asign['name_price_4']=$data['detail'][0]->name_price_4;
    $asign['name_price_5']=$data['detail'][0]->name_price_5;
    $asign['name_price_6']=$data['detail'][0]->name_price_6;


    $arr_check=explode(',',$data['detail'][0]->departure);
    if($arr_check==''){
        $arr_check=array();
    }
    $string_khoihanh='';
    $data_khoihanh=departure_getByTop('','','position asc');
    $count_khoihanh=0;
    foreach($data_khoihanh as $row_kh){
        if(in_array($row_kh->id,$arr_check)){
            if($count_khoihanh==0)
            {
                $string_khoihanh.=$row_kh->name;
            }
            else{
                $string_khoihanh.=', '.$row_kh->name;
            }

            $count_khoihanh++;
        }

    }
    $asign['khoihanh']=$string_khoihanh;
    $asign['sub_cus']='';
    if(isset($data['booking_server']['sub_customer'])&&count($data['booking_server']['sub_customer'])>0){
        $stt=1;
       foreach($data['booking_server']['sub_customer'] as $row_sub){
           $ngay_sinh='';
           if($row_sub['birthday']!='0000-00-00'){
               $ngay_sinh=date('d-m-Y', strtotime($row_sub['birthday']));
           }
           $date_passport='';
           if($row_sub['date_passport']!='0000-00-00'){
               $date_passport=date('d-m-Y', strtotime($row_sub['date_passport']));
           }
           $price_item='Liên hệ';
           if($row_sub['do_tuoi_number']==1){
                if($data['booking_server']['price_new']!=''&&$data['booking_server']['price_new']!='Liên hệ'){
                    $price_item= number_format($data['booking_server']['price_new'],0,",",".").' vnđ';
                }
           }
           if($row_sub['do_tuoi_number']==2){
               if($data['booking_server']['price_11_new']!=''&&$data['booking_server']['price_11_new']!='Liên hệ'){
                   $price_item= number_format($data['booking_server']['price_11_new'],0,",",".").' vnđ';
               }
           }
           if($row_sub['do_tuoi_number']==3){
               if($data['booking_server']['price_5_new']!=''&&$data['booking_server']['price_5_new']!='Liên hệ'){
                   $price_item= number_format($data['booking_server']['price_5_new'],0,",",".").' vnđ';
               }
           }
           $asign['sub_cus'].='<tr class="row_customer_1">
                                                            <td class="center stt_cus">'.$stt.'</td>
                                                            <td>
                                                                <input class="input_table" style="height: 30px; font-size: 10px; padding-left: 10px" title="'.$row_sub['name'].'" value="'.$row_sub['name'].'" >
                                                            </td>
                                                            <td>
                                                                <input class="input_table" style="height: 30px; font-size: 10px;padding-left: 10px" title="'.$ngay_sinh.'" value="'.$ngay_sinh.'" >
                                                            </td>
                                                            <td>
                                                                <input class="input_table" style="height: 30px; font-size: 10px;padding-left: 10px" title="'.$row_sub['email'].'" value="'.$row_sub['email'].'" >
                                                            </td>
                                                            <td>
                                                                <input class="input_table"  style="height: 30px; font-size: 10px;padding-left: 10px" title="'.$row_sub['phone'].'" value="'.$row_sub['phone'].'" >
                                                            </td>
                                                            <td>
                                                                <input class="input_table" style="height: 30px; font-size: 10px;padding-left: 10px" title="'.$row_sub['address'].'" value="'.$row_sub['address'].'" >
                                                            </td>
                                                            <td>
                                                                <span style="font-size: 11px">'.$row_sub['do_tuoi'].'</span>
                                                            </td>
                                                            <td>
                                                                <input class="input_table" style="height: 30px; font-size: 10px;padding-left: 10px" title="'.$row_sub['passport'].'" value="'.$row_sub['passport'].'" >
                                                            </td>

                                                            <td>
                                                                <input class="input_table" style="height: 30px; font-size: 10px;padding-left: 10px" title="'.$date_passport.'" value="'.$date_passport.'" >
                                                            </td>
                                                            <td style="width: 130px">
                                                                <span style="color: red; font-size: 12px">'.$price_item.'</span>
                                                            </td>
                                                        </tr>';
           $stt=$stt+1;
       }
    }

    print_template($asign, 'dattourdetail');
}

//function returnInput_price($price,$name_price){
//    $string='';
//    if($price!=''){
//        $array_price=explode(',',$price);
//        if(count($array_price)>0){
//            foreach($array_price as $row){
//                if($row!=''){
//                    $array_item=explode('-',$row);
//                    if(count($array_item)>0){
//                        if(isset($array_item[0])&&isset($array_item[1])&&$array_item[0]!=''&&$array_item[1]!=''){
//                           $check_lon_hon=strstr($array_item[0],">");
//                            $input_lon_hon='';
//                            if($check_lon_hon!=''){
//                                $number_lonhon=str_replace('>','',$check_lon_hon);
//                                $input_lon_hon='<input hidden value="'.$number_lonhon.'" id="input_'.$name_price.'tu" class="valid" name="'.$name_price.'tu">';
//                                $array_item[0]=str_replace('>','lon_hon_',$array_item[0]);
//                            }
//                            $string.='<input hidden value="'.$array_item[1].'" id="input_'.$name_price.$array_item[0].'" class="valid" name="'.$name_price.$array_item[0].'">'.$input_lon_hon;
//
//                        }
//                    }
//                }
//            }
//        }
//    }
//    return $string;
//}

