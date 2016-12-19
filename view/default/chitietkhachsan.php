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
    $string_zoom_type='';
    $data_room=khachsan_room_price_getByTop('','danhmuc_id='.$data['detail'][0]->id,'id desc');
    if(count($data_room)>0){
        $count_room=1;
        foreach($data_room as $row){
            if($count_room==1){
                $room_type.=$row->name;
            }else{
                $room_type.=', '.$row->name;
            }
            $dongia='Liên hệ';
            if($row->price>0){
                $dongia=number_format($row->price,0,",",".").'vnđ';
            }

//            $string_zoom_type.='<option myTag="'.$row->price.'" value="'.$row->id.'">'.$row->name.'</option>';
            $string_zoom_type.=' <tr>
                                            <td>
                                                <label title="Đơn giá: '.$dongia.'"><input  style="height: 14px; width: 14px; margin: 0px" type="checkbox" class="price_room" valueName="'.$row->name.'" value="'.$row->id.'" valuePrice="'.$row->price.'" valueNumber="" id="price_'.$row->id.'" name="price_room[]"> '.$row->name.'</label>
                                            </td>
                                            <td>
                                                <input   style="width: 50px; height: 27px;" type="number" id="number_'.$row->id.'"  min="0" max="'.$row->amount_people.'" name="amount_people_'.$row->id.'">
                                            </td>
                                        </tr>';
            $count_room++;
        }

    }
    $asign['string_zoom_type'] =$string_zoom_type;
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



    print_template($asign, 'chitietkhachsan');
}



