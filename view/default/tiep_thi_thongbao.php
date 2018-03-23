<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
function show_tiepthi_thongbao($data = array())
{
    $asign = array();
    $asign['all'] = ($data['active_tab'] == 'all') ? 'active' : '';
    $asign['chua_doc'] = ($data['active_tab'] == 'chua_doc') ? 'active' : '';
    $asign['da_doc'] = ($data['active_tab'] == 'da_doc') ? 'active' : '';
    $asign['mess_null'] ='';
    $asign['danhsach']='';
    if (count($data['danhsach']) > 0) {
        $dem=1;
        foreach ($data['danhsach'] as $row) {
            switch($row['status']){
                case '1':
                    $status='<a class="btn btn-success">Đã đọc</a>';
                    break;
                case '2':
                    $status='<a class="btn btn-warning">Chưa đọc</a>';
                    break;
                default:
                    $status='<a class="btn btn-warning">Chưa đọc</a>';

            }
            $date_show = date("d-m-Y H:i:s", strtotime($row['created']));
            $date_noti =timeAgo($row['created']);
            if(strstr($row['link'],SITE_NAME)!=''){
                $link=$row['link'];
            }else{
                $link=SITE_NAME.'/'.$row['link'];
            }
            $asign['danhsach'] .= '<tr>
            <td >'.$dem.'</td>
            <td ><a target="_blank" href="'.$link.'&id_noti='._return_mc_encrypt($row['id'], ENCRYPTION_KEY).'">'.$row['name'].'</a></td>
            <td ><a href="javascript:void(0)" rel="tooltip" data-original-title="'.$date_show.'">'.$date_noti.'</a></td>
            <td>'.$status.'</td>
            <td><a target="_blank" href="'.$link.'&id_noti='._return_mc_encrypt($row['id'], ENCRYPTION_KEY).'"><i class="fa fa-eye"></i></a></td>

        </tr>
        ';
            $dem++;
        }
    } else {
        $asign['mess_null'] = 'Danh sách thông báo rỗng';
    }
    $asign['PAGING'] = $data['PAGING'];
    print_template($asign, 'tiep_thi_thongbao');
}



