<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
function show_khachsan($data = array())
{
    $asign = array();
    $asign['danhsach'] ='';
    if(count($data['danhsach'])>0)
    {
        if(isset( $data['danhmuc_cap1'])){
            $asign['danhsach'] = print_item('item_danhmuc_khachsan', $data['danhsach']);
        }else{
            $asign['danhsach'] = print_item('danhmuc_khachsan', $data['danhsach']);
        }

    }
    else{
        $asign['danhsach'] ='<div class="item_tour col-xs-12 col-sm-6 col-md-4">Hệ thống đang cập nhật dữ liệu</div>';
    }
    $asign['PAGING']=$data['PAGING'];
    print_template($asign, 'danhmuc_khachsan');
}



