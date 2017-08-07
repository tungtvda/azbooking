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
    if ($data['user']['hoa_hong'] != '' && $data['user']['hoa_hong'] != 0) {
        $asign['hoa_hong'] = number_format((int)$data['user']['hoa_hong'], 0, ",", ".") . ' vnđ';
    } else {
        $asign['hoa_hong'] = "0 vnđ";
    }
    $asign['all'] = ($data['active_tab'] == 'all') ? 'active' : '';
    $asign['xac_nhan'] = ($data['active_tab'] == 'xac_nhan') ? 'active' : '';
    $asign['cho_xac_nhan'] = ($data['active_tab'] == 'cho_xac_nhan') ? 'active' : '';

    $asign['danhsach'] = '';
    $asign['mess_null'] = '';
    $asign['PAGING'] = $data['PAGING'];

    if (count($data['danhsach']) > 0) {
        $dem=1;
        foreach ($data['danhsach'] as $row) {
            if($row['status']==1){
                $status='<a class="btn btn-success">Đã xác nhận</a>';
            }else{
                $status='<a class="btn btn-warning">Đang chờ</a>';
            }
            $price='';
            if($row['price']!=''){
                $price=number_format((int)$row['price'],0,",",".").' vnđ';
            }
            $price_confirm='';
            if($row['price_confirm']!=''){
                $price_confirm=number_format((int)$row['price_confirm'],0,",",".").' vnđ';
            }
            $date_confirm='';
            if($row['date_confirm']!='0000-00-00 00:00:00'){
                $date_confirm=_returnDateFormatConvert($row['date_confirm']);
            }
            $yeu_cau='';
            if($row['yeu_cau']!=''){
                $yeu_cau='<a href="javascrip:void(0)" rel="tooltip" data-original-title="'.$row['yeu_cau'].'">Xem yêu cầu</button>';
            }
            $yeu_cau_confirm='';
            if($row['yeu_cau_confirm']!=''){
                $yeu_cau_confirm='<a href="javascrip:void(0)" rel="tooltip" data-original-title="'.$row['yeu_cau_confirm'].'">Xem yêu cầu</button>';
            }
            $asign['danhsach'] .= '<tr>
            <td >'.$dem.'</td>
            <td >'.$price.'</td>
            <td>'.$price_confirm.'</td>
            <td>'.$status.'</td>
            <td>'._returnDateFormatConvert($row['date_send']).'</td>
            <td>'.$date_confirm.'</td>
            <td>
               '.$yeu_cau.'
            </td>
            <td>
            '.$yeu_cau_confirm.'
            </td>

        </tr>
        ';
            $dem++;
        }
    } else {
        $asign['mess_null'] = 'Danh sách rút tiền rỗng';
    }
    print_template($asign, 'tiep_thi_hoahong');
}



