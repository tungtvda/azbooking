<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
function show_tiepthi_donhang($data = array())
{
    $asign = array();
    $asign['title_table'] = $data['title_table'];
    $asign['danhsach'] = '';
    $asign['mess_null'] = '';
    if (count($data['danhsach']) > 0) {
        $dem=1;
        foreach ($data['danhsach'] as $row) {
            switch($row['status']){
                case '1':
                    $status='<a class="btn btn-success">Đơn hàng mới</a>';
                    break;
                case '2':
                    $status='<a class="btn btn-warning">Đang giao dịch</a>';
                    break;
                case '3':
                    $status='<a class="btn btn-danger">Đơn hàng đã hủy</a>';
                    break;
                case '4':
                    $status='<a class="btn btn-warning">Khách hàng nợ tiền</a>';
                    break;
                case '5':
                    $status='<a class="btn btn-success">Đơn hàng đã giao dịch</a>';
                    break;
                default:
                    $status='<a class="btn btn-warning">Đang giao dịch</a>';

            }
            $price_tiep_thi='';
            if($row['price_tiep_thi']!=''){
                $price_tiep_thi=number_format((int)$row['price_tiep_thi'],0,",",".").' vnđ';
            }
            $asign['danhsach'] .= '<tr>
            <td >'.$dem.'</td>
            <td >'.$row['code_booking'].'</td>
            <td><a target="_blank" href="{link}">'.$row['name_tour'].'</a></td>
            <td>'.$price_tiep_thi.'</td>
            <td>'.$status.'</td>
            <td>'._returnDateFormatConvert($row['created']).'</td>

        </tr>
        ';
            $dem++;
        }
    } else {
        $asign['mess_null'] = 'Danh sách đơn hàng rỗng';
    }
    $asign['PAGING'] = $data['PAGING'];
    print_template($asign, 'tiep_thi_donhang');
}



