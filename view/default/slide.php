<?php
/**
 * Created by PhpStorm.
 * User: ductho
 * Date: 8/15/14
 * Time: 3:43 PM
 */
require_once DIR.'/view/default/public.php';
function view_slide($data=array())
{
    $asign=array();
    if(count($data['slide'])>0)
    {
        $asign['slide'] = print_item('slide', $data['slide']);
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
    print_template($asign,'slide');
}
