<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
function show_dattour($data = array())
{
    $asign = array();
    $asign['danhsach'] ='';
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
    }
    else{
        $asign['price_format']= number_format($data['detail'][0]->price,0,",",".").' vnđ';
    }

    if($data['detail'][0]->price_2==''){
        $asign['price_2_format']=$asign['price_format'];
    }else{
        $asign['price_2_format']= number_format($data['detail'][0]->price_2,0,",",".").' vnđ';
    }
    if($data['detail'][0]->price_3==''){
        $asign['price_3_format']=$asign['price_format'];
    }else{
        $asign['price_3_format']= number_format($data['detail'][0]->price_3,0,",",".").' vnđ';
    }
    if($data['detail'][0]->price_4==''){
        $asign['price_4_format']=$asign['price_format'];
    }else{
        $asign['price_4_format']= number_format($data['detail'][0]->price_4,0,",",".").' vnđ';
    }
    if($data['detail'][0]->price_5==''){
        $asign['price_5_format']=$asign['price_format'];
    }else{
        $asign['price_5_format']= number_format($data['detail'][0]->price_5,0,",",".").' vnđ';
    }
    if($data['detail'][0]->price_6==''){
        $asign['price_6_format']=$asign['price_format'];
    }else{
        $asign['price_6_format']= number_format($data['detail'][0]->price_6,0,",",".").' vnđ';
    }
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


    $asign['date_now'] = date('Y-m-d', strtotime(date(DATETIME_FORMAT)));
    $asign['date_now_vn'] = date('d-m-Y', strtotime(date(DATETIME_FORMAT)));
    $asign['so_cho']= '';
    $asign['so_cho_input']='';
    if($data['detail'][0]->so_cho!=''){
        $asign['so_cho']=' <p class="product-email"><i class="fa fa-sort-numeric-desc"></i> <a >Số chỗ
                                            còn nhận: '.$data['detail'][0]->so_cho.'</a></p>';

        $asign['so_cho_input']='<input hidden id="input_so_cho" class="valid" value="'.$data['detail'][0]->so_cho.'">';
    }
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
    $asign['departure_time']=$data['detail'][0]->departure_time;


    print_template($asign, 'dattour');
}



