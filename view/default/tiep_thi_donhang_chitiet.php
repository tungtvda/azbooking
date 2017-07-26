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
    $xacnhan_tiep_thi='';
    if($data['detail']['price_tiep_thi']!=''){
        $asign['price_tiep_thi']=number_format((int)$data['detail']['price_tiep_thi'],0,",",".").' vnđ';
        if($data['detail']['status_tiep_thi']==1 && $data['detail']['confirm_admin_tiep_thi']!=0){
            $xacnhan_tiep_thi='<buttona class="btn btn-success">Đã xác nhận</buttona>';
        }else{
            $xacnhan_tiep_thi='<button class="btn btn-warning">Đang chờ...</button>';
        }
    }
    $asign['xac_nhan_tiep_thi']=$xacnhan_tiep_thi;
    print_template($asign, 'tiep_thi_donhang_chitiet');
}



