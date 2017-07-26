<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
function show_tiepthi_donhang_chitiet($data = array())
{
    $asign = array();
    $asign['code_booking']=$data['detail']['code_booking'];
    print_template($asign, 'tiep_thi_donhang_chitiet');
}



