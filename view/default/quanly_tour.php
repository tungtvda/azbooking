<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
function show_quanly_tour($data = array())
{
    $asign = array();
    $asign['name_admin']=$_SESSION["Full_name"];
    $asign['name'] = $data['menu'][17]->name;
    $asign['tour_list'] = '';
    if (count($data['tour_list']) > 0) {
//        $asign['tour_list'] = print_item('tour_list', $data['tour_list']);
        foreach ($data['tour_list'] as $row) {
            $loai_tour='Trong nước';
            if($row->tour_quoc_te==1){
                $loai_tour='Quốc tế';
            }
            $price='';
            if($row->price==0||$row->price==''){
                $price='Liên hệ';
            }
            else{
                $price=number_format((int)$row->price,0,",",".").' vnđ';
            }
            $name_dm1='';
            $data_dm=danhmuc_1_getById($row->danh_muc_1_id);
            if(count($data_dm)>0){
                $name_dm1=$data_dm[0]->name_url;
            }
            $name_dm2='';
            $data_dm2=danhmuc_2_getById($row->danh_muc_2_id);
            if(count($data_dm2)>0){
                $name_dm2=$data_dm2[0]->name_url;
            }
            $link= link_tourdetail($row,$name_dm1,$name_dm2);
            $asign['tour_list'] .= '<tr>
                                    <td>'.$loai_tour.'</td>
                                    <td>'.$row->DanhMuc1Id.'</td>
                                    <td>'.$row->DanhMuc2Id.'</td>
                                    <td><a target="_blank" href="'.$link.'">'.$row->name.'</a></td>
                                    <td>'.$price.'</td>
                                    <td>
                                        <input style="height: 34px;"  class="form-control colorful" type="number" id="so_cho_'.$row->id.'" countId="'.$row->id.'" value="'.$row->so_cho.'" min="0" />
                                        <div class="input-group">
                                            <input class="btn btn-primary save_so_cho" nameValue="'.$row->name.'" countId="'.$row->id.'" type="button" value="save">
                                        </div>
                                    </td>
                                    <td>'.$row->departure_time.'</td>

</tr>';
        }
    } else {
        $asign['tour_list'] = 'Tài khoản của bạn không có tour nào được cài đặt';
    }
    print_template($asign, 'quanly_tour');
}



