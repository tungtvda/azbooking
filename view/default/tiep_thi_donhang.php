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
    $data_session=checkSession('', 1);
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
            $type_hoahong='Chia sẻ tour';
            if($row['user_gioi_thieu_c1']==$data_session['id']){
                if($row['price_gioi_thieu_c1']){
                    $price_tiep_thi=number_format((int)$row['price_gioi_thieu_c1'],0,",",".").' vnđ';
                    $type_hoahong='Giới thiệu cấp 1';
                }
            }else{
                if($row['user_gioi_thieu_c2']==$data_session['id']){
                    if($row['price_gioi_thieu_c2']){
                        $price_tiep_thi=number_format((int)$row['price_gioi_thieu_c2'],0,",",".").' vnđ';
                        $type_hoahong='Giới thiệu cấp 2';
                    }
                }else{
                    if($row['user_gioi_thieu_c3']==$data_session['id']){
                        if($row['price_gioi_thieu_c3']){
                            $price_tiep_thi=number_format((int)$row['price_gioi_thieu_c3'],0,",",".").' vnđ';
                            $type_hoahong='Giới thiệu cấp 3';
                        }
                    }else{
                        if($row['user_tiep_thi_id']==$data_session['id']){
                            if($row['price_tiep_thi']){
                                $price_tiep_thi=number_format((int)$row['price_tiep_thi'],0,",",".").' vnđ';
                            }
                        }else{
                            redict(SITE_NAME.'/tiep-thi-lien-ket/');
                        }
                    }
                }
            }
//            if($row['price_tiep_thi']!=''){
//                $price_tiep_thi=number_format((int)$row['price_tiep_thi'],0,",",".").' vnđ';
//            }
            if($row['status_tiep_thi']==1 && $row['confirm_admin_tiep_thi']!=0){
                $xacnhan_tiep_thi='<a class="btn btn-success">Đã xác nhận</a>';
            }else{
                $xacnhan_tiep_thi='<a class="btn btn-warning">Đang chờ...</a>';
            }

            $asign['danhsach'] .= '<tr>
            <td >'.$dem.'</td>
            <td ><a href="'.SITE_NAME.'/tiep-thi-lien-ket/don-hang/chi-tiet?id='._return_mc_encrypt($row['id'], ENCRYPTION_KEY).'">'.$row['code_booking'].'</a></td>
            <td><a target="_blank" href="'.SITE_NAME.'/tiep-thi-lien-ket/don-hang/chi-tiet?id='._return_mc_encrypt($row['id'], ENCRYPTION_KEY).'">'.$row['name_tour'].'</a></td>
            <td style=" font-weight: bold;; color: #e53935">'.$price_tiep_thi.'</td>
            <td style=" font-weight: bold;; color: #e53935">'.$type_hoahong.'</td>
            <td>'.$xacnhan_tiep_thi.'</td>
            <td>'.$status.'</td>
            <td>'._returnDateFormatConvert($row['created']).'</td>
            <td><a href="'.SITE_NAME.'/tiep-thi-lien-ket/don-hang/chi-tiet?id='._return_mc_encrypt($row['id'], ENCRYPTION_KEY).'"><i class="fa fa-eye"></i></a></td>

        </tr>
        ';
            $dem++;
        }
    } else {
        $asign['mess_null'] = 'Bạn không có đơn hàng nào';
        switch($data['active_tab']){
            case 'dang_giao_dich':
                $asign['mess_null'] = 'Bạn không có đơn hàng đang giao dịch nào';
                break;
            case 'da_giao_dich':
                $asign['mess_null'] = 'Bạn không có đơn hàng đã giao dịch nào';
                break;
            case 'da_huy':
                $asign['mess_null'] = 'Bạn không có đơn hàng đã hủy nào';
                break;
        }
    }
    $asign['PAGING'] = $data['PAGING'];
    $asign['all'] = ($data['active_tab'] == 'all') ? 'active' : '';
    $asign['dang_giao_dich'] = ($data['active_tab'] == 'dang_giao_dich') ? 'active' : '';
    $asign['da_giao_dich'] = ($data['active_tab'] == 'da_giao_dich') ? 'active' : '';
    $asign['da_huy'] = ($data['active_tab'] == 'da_huy') ? 'active' : '';
    print_template($asign, 'tiep_thi_donhang');
}



