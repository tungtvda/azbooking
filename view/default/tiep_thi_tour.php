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
    $data_session=checkSession('', 1);
    $array_user_share_noti = array(
        'id'=>_return_mc_encrypt($data_session['id']),
        'all'=>1,
    );
    $user_detail_pro= returnCURL($array_user_share_noti, SITE_NAME_MANAGE.'/azbooking-hoso.html');
    $user_detail_pro=json_decode($user_detail_pro,true);
    if(count($user_detail_pro)>0 && isset($user_detail_pro['user'])) {
        if(count($data['danhsach'])>0)
        {
            $asign['danhsach'] = print_item('tiep_thi_list', $data['danhsach'],0,0,0,$user_detail_pro['user']['type_tiep_thi']);
        }else{
            $asign['mess_null'] ='Danh sách tour rỗng';
        }
    }
    $asign['PAGING']=$data['PAGING'];
    // active menu
    $asign['all'] = ($data['active_tab'] == 'all') ? 'active' : '';
    $asign['noi_bat'] = ($data['active_tab'] == 'noi_bat') ? 'active' : '';
    $asign['giam_gia'] = ($data['active_tab'] == 'giam_gia') ? 'active' : '';
    $asign['quoc_te'] = ($data['active_tab'] == 'quoc_te') ? 'active' : '';
    $asign['trong_nuoc'] = ($data['active_tab'] == 'trong_nuoc') ? 'active' : '';
    $asign['user_tiep_thi']=_return_mc_encrypt($data_session['id']);
    print_template($asign, 'tiep_thi_tour');
    print_template($asign, 'tiep_thi_create_tour');
}



