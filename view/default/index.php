<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
function show_index($data = array())
{
    $asign = array();
    $asign['tour_PROMOTIONS'] ='';
    if(count($data['tour_PROMOTIONS'])>0)
    {
        $asign['tour_PROMOTIONS'] = print_item('tour_index', $data['tour_PROMOTIONS']);
    }
    $asign['khachsan_index'] ='';
    if(count($data['khachsan_index'])>0)
    {
        $asign['khachsan_index'] = print_item('khachsan_index', $data['khachsan_index']);
    }
    $asign['tour_sales'] ='';
    if(count($data['tour_sales'])>0)
    {
        $asign['tour_sales'] = print_item('tour_index', $data['tour_sales']);
    }
    $asign['tintuc_index'] ='';
    if(count($data['tintuc_index'])>0)
    {
        $asign['tintuc_index'] = print_item('tintuc_index', $data['tintuc_index']);
    }
    $asign['video_index'] ='';
    if(count($data['video_index'])>0)
    {
        $asign['link_video'] = $data['video_index'][0]->link_video;
    }
    print_template($asign, 'index');
}



