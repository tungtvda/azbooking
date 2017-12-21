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
    $asign['dieuhanh_id']= $data['detail'][0]->dieuhanh_id;
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
    $asign['price_number']= $data['detail'][0]->price_number;
    $asign['price_number_2']= $data['detail'][0]->price_number_2;
    $asign['price_number_3']= $data['detail'][0]->price_number_3;
    $asign['price_number_4']= $data['detail'][0]->price_number_4;
    $asign['price_number_5']= $data['detail'][0]->price_number_5;
    $asign['price_number_6']= $data['detail'][0]->price_number_6;

    $asign['list_price_nguoi_lon']=returnInput_price($asign['price_number'],'price_nguoi_lon_');
    $asign['list_price_tre_em_511']=returnInput_price($asign['price_number_2'],'price_tre_em_511_');
    $asign['list_price_tre_em_5']=returnInput_price($asign['price_number_3'],'price_tre_em_5_');


    $asign['name_price']='người lớn';
    $asign['name_price_2']='trẻ em 5-11 tuổi';
    $asign['name_price_3']='trẻ em dưới 5 tuổi';
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

    $data_httt=httt_getByTop('','','id asc');
    $asign['httt']='';
    $asign['httt_content']='';
    if(count($data_httt)>0){
        foreach($data_httt as $row_httt){
            $asign['httt'].=' <li><label><input class="httt_check" name_value="httt_'.$row_httt->id.'" type="radio" name="httt" value="'.$row_httt->id.'"><i class="awe-icon awe-icon-check"></i>'.$row_httt->name.'</label></li>';
            $asign['httt_content'].='<div class="hidden_content_httt" style="height: 150px;width: auto;overflow: scroll;margin-bottom: 20px" hidden id="httt_'.$row_httt->id.'">
                                                                <p style="font-size: 16px; font-weight: bold">'.$row_httt->name.'</p>
                                                                <p>
                                                               '.$row_httt->content.'
                                                                </p>
                                                            </div>';
        }
    }
    $data_dieu_khoan=dieu_khoan_getById(1);
    $asign['content_dk']='';
    if(count($data_dieu_khoan)>0){
        $asign['content_dk']=$data_dieu_khoan[0]->content;
    }


    $asign['departure_time']=$data['detail'][0]->departure_time;
    $asign['hidden_date']='';
    $asign['hidden_date_select']='hidden';
    $date_option='';
    $now = getdate();
//    $year_current=$now["year"];
    $year_current='2018';
    $string_departure_time='';
    $full_date=date("d-m-Y");
    if($data['detail'][0]->departure_time!=''){
        $array_item=explode(',',$data['detail'][0]->departure_time);
        if(count($array_item)>0){
            foreach($array_item as $key=>$value){
                $array_check_year=explode('/',$value);
                if(isset($array_check_year[1])&&$array_check_year[1]==12){
                    $year_current=date("Y");
                }else{
                    $year_current='2018';
                }
                $value=$value.'-'.$year_current;
                $value=str_replace('/','-',$value);
                if(checkmydate($value) && strtotime($value)>=strtotime($full_date)){
                    $date_en=date('Y-m-d', strtotime(trim($value)));
                    $date_option.='<option value="'.$date_en.'">'.$value.'</option>';
                    if($string_departure_time==''){
                        $string_departure_time=  $value;
                        $asign['date_now']=date('Y-m-d', strtotime(trim($value)));
                        $asign['date_now_vn'] =trim($value);
                    }else{
                        $string_departure_time.= ', '.$value;
                    }
                }
            }
        }
    }

    if($string_departure_time==''){
        $asign['departure_time']='Liên hệ';
        $asign['hidden_date']='';
        $asign['hidden_date_select']='hidden';

        $asign['date_select']=' <div class="form-item">
                                                            <label>Ngày khởi hành<span style="color: red">*</span></label>
                                                            <input required="" type="text" id="input_ngay_khoi_hanh" class="datepicker"
                                                                   name="ngay_khoi_hanh">
                                                            <label class="error_booking" id="error_ngay_khoi_hanh">Bạn vui lòng chọn ngày khởi hành</label>
                                                        </div>';
    }else{
        $asign['departure_time']=$string_departure_time;
        $asign['hidden_date']='hidden';
        $asign['hidden_date_select']='';

        $asign['date_select']='<div class="form-item">
                                                            <label>Ngày khởi hành <span style="color: red">*</span></label>
                                                            <br>

                                                            <select style="width: 100%; padding: 0px;height: 35px" name="ngay_khoi_hanh" id="input_select_ngay_khoi_hanh">';
        $asign['date_select'].=$date_option;
        $asign['date_select'].=' </select>
                                                            <label class="error_booking" id="error_ngay_khoi_hanh">Bạn vui lòng chọn ngày khởi hành</label>
                                                        </div>';

    }

    print_template($asign, 'dattour');
}

function returnInput_price($price,$name_price){
    $string='';
    if($price!=''){
        $array_price=explode(',',$price);
        if(count($array_price)>0){
            foreach($array_price as $row){
                if($row!=''){
                    $array_item=explode('-',$row);
                    if(count($array_item)>0){
                        if(isset($array_item[0])&&isset($array_item[1])&&$array_item[0]!=''&&$array_item[1]!=''){
                           $check_lon_hon=strstr($array_item[0],">");
                            $input_lon_hon='';
                            if($check_lon_hon!=''){
                                $number_lonhon=str_replace('>','',$check_lon_hon);
                                $input_lon_hon='<input hidden value="'.$number_lonhon.'" id="input_'.$name_price.'tu" class="valid" name="'.$name_price.'tu">';
                                $array_item[0]=str_replace('>','lon_hon_',$array_item[0]);
                            }
                            $string.='<input hidden value="'.$array_item[1].'" id="input_'.$name_price.$array_item[0].'" class="valid" name="'.$name_price.$array_item[0].'">'.$input_lon_hon;

                        }
                    }
                }
            }
        }
    }
    return $string;
}

