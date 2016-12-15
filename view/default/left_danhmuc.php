<?php
require_once DIR . '/view/default/public.php';
function view_left_danhmuc($data = array())
{
    $asign = array();
    $asign['tintuc_left'] ='';
    if(count($data['tintuc_left'])>0)
    {
        $asign['tintuc_left'] = print_item('tintuc_left', $data['tintuc_left']);
    }
    if(count($data['danhmuc_1_timkiem'])>0)
    {
        $asign['danhmuc_1_timkiem'] = print_item('danhmuc_cbox', $data['danhmuc_1_timkiem']);
    }
    if(count($data['danhmuc_khachsan_timkiem'])>0)
    {
        $asign['danhmuc_khachsan_timkiem'] = print_item('danhmuc_cbox', $data['danhmuc_khachsan_timkiem']);
    }
    if(count($data['danhmuc_tintuc_timkiem'])>0)
    {
        $asign['danhmuc_tintuc_timkiem'] = print_item('danhmuc_cbox', $data['danhmuc_tintuc_timkiem']);
    }
    $asign['list_Durations']=returnSearchDurations();
    $asign['price_timkiem']=returnPriceTour();
    $asign['price_khachsan']=returnPriceKhachSan();

    //tag
    if(count($data['tag_left'])>0)
    {
        $asign['tag_left'] = print_item('tag_left', $data['tag_left']);
    }
    print_template($asign, 'left_danhmuc');
}
