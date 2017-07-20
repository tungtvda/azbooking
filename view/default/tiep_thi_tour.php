<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
function show_tiepthi_tour($data = array())
{
    $asign = array();
    $asign['title_table']=$data['title_table'];
    $asign['danhsach']='';
    $asign['mess_null']='';
    if(count($data['danhsach'])>0)
    {
        $asign['danhsach'] = print_item('tiep_thi_list', $data['danhsach']);
    }else{
        $asign['mess_null'] ='Danh sách tour rỗng';
    }
    $asign['PAGING']=$data['PAGING'];
    print_template($asign, 'tiep_thi_tour');
}



