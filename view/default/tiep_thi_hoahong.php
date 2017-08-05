<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
function show_hoahong($data = array())
{
    $asign = array();
    if($data['user']['hoa_hong']!='' &&$data['user']['hoa_hong']!=0){
    $asign['hoa_hong']=number_format((int)$data['user']['hoa_hong'],0,",",".").' vnđ';
}else{
    $asign['hoa_hong']="0 vnđ";
}

    print_template($asign, 'tiep_thi_hoahong');
}



