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
    // active menu
    $asign['all'] = ($data['active_tab'] == 'all') ? 'active' : '';
    $asign['noi_bat'] = ($data['active_tab'] == 'noi_bat') ? 'active' : '';
    $asign['giam_gia'] = ($data['active_tab'] == 'giam_gia') ? 'active' : '';
    $asign['quoc_te'] = ($data['active_tab'] == 'quoc_te') ? 'active' : '';
    $asign['trong_nuoc'] = ($data['active_tab'] == 'trong_nuoc') ? 'active' : '';
    print_template($asign, 'tiep_thi_tour');
}



