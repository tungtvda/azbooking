<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
function show_tiepthi_tour_user($data = array())
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
                    $status='<a class="btn btn-success">Đã xác nhận</a>';
                    break;
                case '2':
                    $status='<a class="btn btn-danger">Đã hủy</a>';
                    break;
                default:
                    $status='<a class="btn btn-danger">Đang đợi xác nhận</a>';
            }

            $lien_he='';
            if($row['name_cus']!=''){
                $lien_he.='<p rel="tooltip" data-original-title="Tên: '.$row['name_cus'].'">
                <i class="fa fa-user" ></i> '.$row['name_cus'].' </p>';
            }
            if($row['email_cus']!=''){
                $lien_he.='<p rel="tooltip" data-original-title="Email: '.$row['email_cus'].'">
                <i class="fa fa-envelope" ></i> '.$row['email_cus'].' </p>';
            }
            if($row['phone_cus']!=''){
                $lien_he.='<p rel="tooltip" data-original-title="Điện thoại: '.$row['phone_cus'].'"><i class="fa fa-phone" ></i> '.$row['phone_cus'].'</p>';
            }
            if($row['address_cus']!=''){
                $lien_he.='<p rel="tooltip" data-original-title="Địa chỉ: '.$row['address_cus'].'"><i class="fa fa-map-marker" ></i> '.$row['address_cus'].'</p>';
            }
            $lien_he.='<input hidden value="'.$row['email_cus'].'" id="email_cus_hidden_'.$row['id'].'">';
            $lien_he.=' <input hidden value="'.$row['name_cus'].'" id="name_cus_hidden_'.$row['id'].'">';
            $lien_he.=' <input hidden value="'.$row['phone_cus'].'" id="phone_cus_hidden_'.$row['id'].'">';
            $lien_he.=' <input hidden value="'.$row['address_cus'].'" id="address_cus_hidden_'.$row['id'].'">';
            $lien_he.=' <input hidden value="'.$row['status'].'" id="status_update_hidden_'.$row['id'].'">';

            $tour='';
            if($row['name_tour']!=''){
                $tour.='<p rel="tooltip" data-original-title="Tour: '.$row['name_tour'].'"><i class="fa fa-plane" ></i> '.$row['name_tour'].'</p>';
            }
            if($row['time_tour']!=''){
                $tour.='<p rel="tooltip" data-original-title="Thời gian: '.$row['time_tour'].'"><i class="fa fa-clock-o" ></i> '.$row['time_tour'].'</p>';
            }
            $date='';
            if($row['date_tour']!='0000-00-00'){
                $date=date("d-m-Y", strtotime($row['date_tour']));
                $tour.='<p rel="tooltip" data-original-title="Ngày khởi hành: '.date("d-m-Y", strtotime($row['date_tour'])).'"><i class="fa fa-calculator" ></i> '.date("d-m-Y", strtotime($row['date_tour'])).'</p>';
            }
            if($row['address_tour']!=''){
                $tour.='<p rel="tooltip" data-original-title="Điểm khởi hành: '.$row['address_tour'].'"><i class="fa fa-map-marker" ></i> '.$row['address_tour'].'</p>';
            }
            $tour.='<input hidden value="'.$row['name_tour'].'" id="name_tour_hidden_'.$row['id'].'">';
            $tour.='<input hidden value="'.$row['time_tour'].'" id="time_tour_hidden_'.$row['id'].'">';
            $tour.='<input hidden value="'.$row['address_tour'].'" id="address_tour_hidden_'.$row['id'].'">';
            $tour.='<input hidden value="'.$date.'" id="date_tour_hidden_'.$row['id'].'">';
            $tour.='<input hidden value="'.$row['note_tour'].'" id="note_tour_hidden_'.$row['id'].'">';

            $asign['danhsach'] .= '<tr id="tr-tour-'.$row['id'].'">
            <td >'.$dem.'</td>
             <td class="lienhe_thanhvien">'.$tour.'</td>
            <td class="lienhe_thanhvien">'.$lien_he.'</td>
            <td>'._returnDateFormatConvert($row['created']).'</td>
            <td>'.$status.'</td>
            <td>
            <a data-name="'.$row['name_tour'].'" data-id="'.$row['id'].'" rel="tooltip" data-original-title="Xem chi tiết"  style="margin-right: 5px; padding: 10px 9px; background-color: #337ab7;border-color: #2e6da4;" class="btn btn-primary view-tour-user">
            <i style="background:none" class="fa fa-eye"></i></a>
            <a data-name="'.$row['name_tour'].'" data-id="'.$row['id'].'"  rel="tooltip" data-original-title="Xóa" href="javascript:void(0)" class="btn btn-danger delete-tour-user">
                <i style="background:none" class="fa fa-trash"></i>
            </a>
            </td>
              </tr>';
            $dem++;
        }
    } else {
        $asign['mess_null'] = 'Bạn không có tour theo yêu cầu nào';
        switch($data['active_tab']){
            case 'type_0':
                $asign['mess_null'] = 'Bạn không có tour theo yêu cầu đang đợi xác nhận';
                break;
            case 'type_1':
                $asign['mess_null'] = 'Bạn không có tour theo yêu cầu đã xác nhận';
                break;
            case 'type_2':
                $asign['mess_null'] = 'Bạn không có tour theo yêu cầu đã hủy';
                break;
        }
    }
    $asign['PAGING'] = $data['PAGING'];
    $asign['all'] = ($data['active_tab'] == 'all') ? 'active' : '';
    $asign['type_0'] = ($data['active_tab'] == 'type_0') ? 'active' : '';
    $asign['type_1'] = ($data['active_tab'] == 'type_1') ? 'active' : '';
    $asign['type_2'] = ($data['active_tab'] == 'type_2') ? 'active' : '';
    $data_session=checkSession('', 1);
    $asign['user_tiep_thi']=_return_mc_encrypt($data_session['id']);
    print_template($asign, 'tiep_thi_tour_user');
    print_template($asign, 'tiep_thi_create_tour');
}



