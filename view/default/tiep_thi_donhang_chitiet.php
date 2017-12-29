<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
function show_tiepthi_donhang_chitiet($data = array())
{
    $asign = array();
    $asign['code_booking']=$data['detail']['code_booking'];
    $asign['name_tour']=$data['detail']['name_tour'];
    $asign['price_tour']=$data['detail']['price_tour'];
    if($data['detail']['price_tour']!='Liên hệ' && $data['detail']['price_tour']!='Liên Hệ'&& $data['detail']['price_tour']!='LIÊN HỆ'){
        $asign['price_tour']=number_format((int)$data['detail']['price_tour'],0,",",".").' vnđ';
    }
    $asign['status']='';
    switch($data['detail']['status']){
        case '1':
            $status='<button style="margin:0px" class="btn btn-success">Đơn hàng mới</button>';
            break;
        case '2':
            $status='<button style="margin:0px" class="btn btn-warning">Đang giao dịch</button>';
            break;
        case '3':
            $status='<button style="margin:0px" class="btn btn-danger">Đơn hàng đã hủy</button>';
            break;
        case '4':
            $status='<button style="margin:0px" class="btn btn-warning">Khách hàng nợ tiền</button>';
            break;
        case '5':
            $status='<button style="margin:0px" class="btn btn-success">Đơn hàng đã giao dịch</button>';
            break;
        default:
            $status='<button style="margin:0px" class="btn btn-warning">Đang giao dịch</button>';
    }
    $asign['status']=$status;
    $asign['price_tiep_thi']='';
    $asign['type_hoahong']='Chia sẻ tour';
    $data_session=checkSession('', 1);
    if($data['detail']['user_gioi_thieu_c1']==$data_session['id']){
        if($data['detail']['price_gioi_thieu_c1']){
            $asign['price_tiep_thi']=number_format((int)$data['detail']['price_gioi_thieu_c1'],0,",",".").' vnđ';
            $asign['type_hoahong']='Giới thiệu cấp 1';
        }
    }else{
        if($data['detail']['user_gioi_thieu_c2']==$data_session['id']){
            if($data['detail']['price_gioi_thieu_c2']){
                $asign['price_tiep_thi']=number_format((int)$data['detail']['price_gioi_thieu_c2'],0,",",".").' vnđ';
                $asign['type_hoahong']='Giới thiệu cấp 2';
            }
        }else{
            if($data['detail']['user_gioi_thieu_c3']==$data_session['id']){
                if($data['detail']['price_gioi_thieu_c3']){
                    $asign['price_tiep_thi']=number_format((int)$data['detail']['price_gioi_thieu_c3'],0,",",".").' vnđ';
                    $asign['type_hoahong']='Giới thiệu cấp 3';
                }
            }else{
                if($data['detail']['user_tiep_thi_id']==$data_session['id']){
                    if($data['detail']['price_tiep_thi']){
                        $asign['price_tiep_thi']=number_format((int)$data['detail']['price_tiep_thi'],0,",",".").' vnđ';
                    }
                }else{
                    redict(SITE_NAME.'/tiep-thi-lien-ket/');
                }
            }
        }
    }
    $xacnhan_tiep_thi='';
    if($data['detail']['price_tiep_thi']!=''){
        if($data['detail']['status_tiep_thi']==1 && $data['detail']['confirm_admin_tiep_thi']!=0){
            $xacnhan_tiep_thi='<buttona class="btn btn-success">Đã xác nhận</buttona>';
        }else{
            $xacnhan_tiep_thi='<button class="btn btn-warning">Đang chờ...</button>';
        }
    }
    $asign['xac_nhan_tiep_thi']=$xacnhan_tiep_thi;
    $asign['khach_hang']='';
    if(isset($data['detail']['customer'])){
        $asign['khach_hang']='
                             <p>Tên: '.$data['detail']['customer']['name'].'</p>
                             <p>Địa chỉ: '.$data['detail']['customer']['address'].'</p>
                             <p>Điện thoại: '.$data['detail']['customer']['phone'].'</p>
                             <p>Email: '.$data['detail']['customer']['email'].'</p>
        ';
    }
    $asign['ngay_khoi_hanh']='';
    if($data['detail']['ngay_khoi_hanh']!=''){
        $asign['ngay_khoi_hanh']= date("d-m-Y", strtotime($data['detail']['ngay_khoi_hanh']));
    }
    $asign['ngay_khoi_hanh']='';
    if($data['detail']['created']!=''){
        $asign['created']=_returnDateFormatConvert($data['detail']['created']);
    }
    print_template($asign, 'tiep_thi_donhang_chitiet');
}



