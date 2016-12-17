<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
require_once DIR.'/model/danhmuc_room_typeService.php';
function show_chitiet_khachsan($data = array())
{
    $asign = array();
    $asign['name']= $data['detail'][0]->name;


    $asign['tour_lienquan'] ='';
    if(count($data['tour_lienquan'])>0) {
        $asign['tour_lienquan'] = print_item('danhmuc_khachsan', $data['tour_lienquan']);
    }

    $asign['Hotline'] = $data['config'][0]->Hotline;
    $asign['Hotline_hcm'] = $data['config'][0]->Hotline_hcm;
    $asign['img']= $data['detail'][0]->img;
    $asign['content']= $data['detail'][0]->content;
    $asign['start']= sao($data['detail'][0]->start);
    $room_type='';
    $room_type_array=explode(',',$data['detail'][0]->room_type);
    if(count($room_type_array)>0){
        $count_room=1;
        foreach($room_type_array as $key)
        {
            $data_room=danhmuc_room_type_getById($key);
            if(count($data_room)>0){
                if($count_room==1){
                    $room_type.=$data_room[0]->name;
                }else{
                    $room_type.=', '.$data_room[0]->name;
                }
            }
            $count_room++;
        }
    }
    $asign['room_type']=$room_type;
    $asign['price']= $data['detail'][0]->price;
    if($data['detail'][0]->price==0||$data['detail'][0]->price==''){
        $asign['price_format']='Liên hệ';
        $asign['vnd']='';
    }
    else{
        $asign['price_format']= number_format($data['detail'][0]->price,0,",",".");
        $asign['vnd']='vnđ';
    }
    $asign['link']=$data['link_url'];
    $asign['name_url']=$data['detail'][0]->name_url;
    $asign['id']= $data['detail'][0]->id;
    $asign['date_now'] = date('Y-m-d', strtotime(date(DATETIME_FORMAT)));
    $asign['date_now_vn'] = date('d-m-Y', strtotime(date(DATETIME_FORMAT)));

    $arr_check=explode(',',$data['detail'][0]->room_type);
    $string_zoom_type='';
    $asign['hidden_zoom_type'] ='';
    if(count($arr_check)>0){

        $data['room_type']=danhmuc_room_type_getByAll();
        foreach($data['room_type'] as $key)
        {
            if(in_array($key->id,$arr_check)){
                $string_zoom_type.='<option value="'.$key->id.'">'.$key->name.'</option>';
            }
        }
    }
    else{
        $asign['hidden_zoom_type'] ='hidden';
    }

    $asign['string_zoom_type'] =$string_zoom_type;
    print_template($asign, 'chitietkhachsan');
}



