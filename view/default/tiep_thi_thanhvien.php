<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
function show_tiepthi_thanhvien($data = array())
{
    $asign = array();
    $asign['title_table'] = $data['title_table'];
    $asign['danhsach'] = '';
    $asign['mess_null'] = '';
    if (count($data['danhsach']) > 0) {
        $dem=1;
        foreach ($data['danhsach'] as $row) {
            if($row['status']==1){
                $status='<a class="btn btn-success">Đã kích hoạt</a>';
            }else{
                $status='<a class="btn btn-danger">Chưa kích hoạt</a>';
            }

            if($row['type_tiep_thi']==1){
                $type_tiep_thi='<a class="btn btn-info">4 sao</a>';
            }else{
                if($row['type_tiep_thi']==2){
                    $type_tiep_thi='<a class="btn btn-primary">5 sao</a>';
                }else{
                    $type_tiep_thi='<a class="btn btn-warning">3 sao</a>';
                }
            }
            $lien_he='';
            if($row['phone']!=''){
                $lien_he.='<p><i class="fa fa-phone" ></i> '.$row['phone'].'</p>';
            }
            if($row['mobi']!=''){
                $lien_he.='<p><i class="fa fa-mobile " ></i> '.$row['mobi'].'</p>';
            }
            if($row['facebook']!=''){
                $lien_he.='<p><i class="fa fa-facebook " ></i> '.$row['facebook'].'</p>';
            }
            if($row['skype']!=''){
                $lien_he.='<p><i class="fa fa-skype " ></i> '.$row['skype'].'</p>';
            }
            $asign['danhsach'] .= '<tr>
            <td >'.$dem.'</td>
            <td ><img style="width: 50px" src="'.$row['avatar'].'"></td>
            <td>'.$row['name'].'</td>
            <td class="lienhe_thanhvien">'.$lien_he.'</td>
            <td>'.$type_tiep_thi.'</td>
            <td>'.$status.'</td>
            <td>'._returnDateFormatConvert($row['created']).'</td>


        </tr>
        ';
            $dem++;
        }
    } else {
        $asign['mess_null'] = 'Bạn không có thành viên nào';
        switch($data['active_tab']){
            case '3_sao':
                $asign['mess_null'] = 'Bạn không có thành viên 3 sao nào';
                break;
            case '4_sao':
                $asign['mess_null'] = 'Bạn không có thành viên 4 sao nào';
                break;
            case '5_sao':
                $asign['mess_null'] = 'Bạn không có thành viên 5 sao nào';
                break;
        }
    }
    $asign['PAGING'] = $data['PAGING'];
    $asign['all'] = ($data['active_tab'] == 'all') ? 'active' : '';
    $asign['3_sao'] = ($data['active_tab'] == '3_sao') ? 'active' : '';
    $asign['4_sao'] = ($data['active_tab'] == '4_sao') ? 'active' : '';
    $asign['5_sao'] = ($data['active_tab'] == '5_sao') ? 'active' : '';
    print_template($asign, 'tiep_thi_thanhvien');
}



