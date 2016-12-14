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
    print_template($asign, 'left_danhmuc');
}
