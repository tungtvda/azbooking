<?php
require_once '../../config.php';
require_once DIR . '/model/tourService.php';
require_once DIR . '/model/tour_list_dichvuService.php';
require_once DIR . '/model/danhmuc_1Service.php';
require_once DIR . '/model/danhmuc_2Service.php';
require_once DIR . '/model/departureService.php';
require_once DIR . '/view/admin/tour.php';
require_once DIR . '/common/messenger.php';
require_once DIR . '/common/locdautiengviet.php';
$data = array();
$insert = true;
returnCountData();
$array_check_noti = array(
    'id' => _return_mc_encrypt($_SESSION["Admin"]),
    'user_email' => _return_mc_encrypt('tungtv.soict@gmail.com'),
    'main' => _return_mc_encrypt('azbooking.vn'),
    'module' => _return_mc_encrypt('tour'),
);
$list_dichvu = returnCURL($array_check_noti, SITE_NAME_MANAGE . '/azbooking-list-type-dich-vu.html');
$data['listfkey']['list_type'] = json_decode($list_dichvu);
$list_danhmuc_dichvu = '';
if ($data['listfkey']['list_type']) {
    foreach ($data['listfkey']['list_type'] as $row_dm) {
        $list_danhmuc_dichvu .= '<option value="' . $row_dm->id . '">' . $row_dm->name . '</option>';
    }
}
if (isset($_SESSION["Admin"])) {
    $danhmuc_id_get = '';
    if (isset($_GET['DanhMuc1Id']) && $_GET['DanhMuc1Id'] != '') {
        $danhmuc_id_get = '?DanhMuc1Id=' . $_GET['DanhMuc1Id'];
    } else {
        if (isset($_GET['DanhMuc2Id']) && $_GET['DanhMuc2Id'] != '') {
            $danhmuc_id_get = '?DanhMuc2Id=' . $_GET['DanhMuc2Id'];
        }
    }
    if (isset($_GET["action"]) && isset($_GET["id"])) {
        if ($_GET["action"] == "delete") {
            $data_detail=tour_getById($_GET['id']);
            if($data_detail) {
                $new_obj = new tour();
                $new_obj->id = $_GET["id"];

                $array_send_manage['code_check_send_email'] = _return_mc_encrypt('tungtv_az_mix_12345');
                $array_send_manage['action'] = "delete";
                $array_send_manage['id'] =$data_detail[0]->code_az_mix;
                $list_noti = returnCURL($array_send_manage, SITE_NAME_MANAGE . '/controller/admin/tour_az.php');
                if ($list_noti) {
                    list_bang_gia_tour_delete($_GET["id"]);
                    tour_delete($new_obj);
                }
            }

            header('Location: ' . SITE_NAME . '/controller/admin/tour.php' . $danhmuc_id_get);
        } else if ($_GET["action"] == "edit") {
            $new_obj = tour_getById($_GET["id"]);
            if ($new_obj != false) {
                if($new_obj[0]->price==''){
                    $new_obj[0]->price=0;
                }
                if($new_obj[0]->price_2==''){
                    $new_obj[0]->price_2=0;
                }
                if($new_obj[0]->price_3==''){
                    $new_obj[0]->price_3=0;
                }
                if($new_obj[0]->price_4==''){
                    $new_obj[0]->price_4=0;
                }
                if($new_obj[0]->ty_le_m1==''){
                    $new_obj[0]->ty_le_m1=0;
                }
                if($new_obj[0]->ty_le_m2==''){
                    $new_obj[0]->ty_le_m2=0;
                }
                if($new_obj[0]->ty_le_m3==''){
                    $new_obj[0]->ty_le_m3=0;
                }
                if($new_obj[0]->loi_nhuan==''){
                    $new_obj[0]->loi_nhuan=0;
                }
                if($new_obj[0]->loi_nhuan_m1==''){
                    $new_obj[0]->loi_nhuan_m1=0;
                }
                if($new_obj[0]->loi_nhuan_m2==''){
                    $new_obj[0]->loi_nhuan_m2=0;
                }
                if($new_obj[0]->loi_nhuan_m3==''){
                    $new_obj[0]->loi_nhuan_m3=0;
                }
                if($new_obj[0]->total_dichvu==''){
                    $new_obj[0]->total_dichvu='0 vnđ';
                }
                if($new_obj[0]->gia_net==''){
                    $new_obj[0]->gia_net='0 vnđ';
                }
                if($new_obj[0]->gia_net_m1==''){
                    $new_obj[0]->gia_net_m1='0 vnđ';
                }
                if($new_obj[0]->gia_net_m2==''){
                    $new_obj[0]->gia_net_m2='0 vnđ';
                }
                if($new_obj[0]->gia_net_m3==''){
                    $new_obj[0]->gia_net_m3='0 vnđ';
                }
                if($new_obj[0]->loi_nhuan==''){
                    $new_obj[0]->loi_nhuan=0;
                }
                if($new_obj[0]->loi_nhuan_m1==''){
                    $new_obj[0]->loi_nhuan_m1=0;
                }
                if($new_obj[0]->loi_nhuan_m2==''){
                    $new_obj[0]->loi_nhuan_m2=0;
                }
                if($new_obj[0]->loi_nhuan_m3==''){
                    $new_obj[0]->loi_nhuan_m3=0;
                }
                if($new_obj[0]->price_tiep_thi==''){
                    $new_obj[0]->price_tiep_thi=0;
                }
                $list_dich_vu='';
                $data_list_dichvu=tour_list_dichvu_getByTop('','tour_id='.$_GET["id"],'id asc');
                if($data_list_dichvu>0){
                    $count_dv=1;
                    foreach ($data_list_dichvu as $row_dv){
                        $list_dich_vu.=' <tr id="item_dichvu_'.$count_dv.'" data-value="'.$count_dv.'" class="item_dichvu">
                                            <td id="stt_dichvu_td_'.$count_dv.'" style="padding-right: 5px">'.$count_dv.'</td>
                                        <td id="name_dichvu_td">
                                            <input  value="'.$row_dv->name.'" name="name_dichvu[]" id="input_name_dichvu_'.$count_dv.'" type="text" class="valid input_table width-input-150"></td>
                                        <td>
                                            <select class="width-input-165" name="type_dichvu[]" id="input_type_dichvu_'.$count_dv.'">';
                        if($data['listfkey']['list_type']){
                            foreach($data['listfkey']['list_type'] as $row_dm){
                                $selected='';
                                if($row_dv->type==$row_dm->id){
                                    $selected='selected="selected"';
                                }
                                $list_dich_vu .='<option '.$selected.' value="'.$row_dm->id.'">'.$row_dm->name.'</option>';
                            }
                        }
                        $list_dich_vu.='</select>
                                         </td>
                                         <td > <input style="width: 50px" data-value="'.$count_dv.'" value="'.$row_dv->number.'" name="soluong_dichvu[]" min="1" id="input_soluong_dichvu_'.$count_dv.'" type="number" class="valid input_table input_soluong_dichvu"></td>
                                         <td><input  value="'.$row_dv->price.'" data-value="'.$count_dv.'" name="price_dichvu[]" id="input_price_dichvu_'.$count_dv.'" type="number" class="valid input_table input_price_dichvu width-input-150"></td>
                                         <td> <input  readonly=""  value="'.$row_dv->total.'" name="thanhtien_dichvu[]" id="input_thanhtien_dichvu_'.$count_dv.'" type="text" class="valid input_table width-input-150"></td>
                                         <td> <input  value="'.$row_dv->note.'" name="ghichu_dichvu[]" id="input_ghichu_dichvu_'.$count_dv.'" type="text" class="valid input_table width-input-150"></td>
                                            <td>
                                            <a  href="javascript:void(0)" id="remove_item_dichvu_'.$count_dv.'" data-remove="'.$count_dv.'" class=" remove_item_dichvu">x</a></td>
                                            </tr>';
                        $count_dv++;
                    }
                }
                $new_obj[0]->list_dich_vu=$list_dich_vu;
                $data['form'] = $new_obj[0];
                $data['tab2_class'] = 'default-tab current';
                $data['tab1_class'] = ' ';
                $insert = false;
            } else header('Location: ' . SITE_NAME . '/controller/admin/tour.php' . $danhmuc_id_get);
        } else {
            $data['tab1_class'] = 'default-tab current';
        }
    } else {
        $data['tab1_class'] = 'default-tab current';
    }
    $data['listfkey']['DanhMuc1Id'] = danhmuc_1_getByAll();
    $data['listfkey']['DanhMuc2Id'] = danhmuc_2_getByAll();
    $data['listfkey']['departure'] = departure_getByTop('', '', 'position asc');


    $list_user = returnCURL($array_check_noti, SITE_NAME_MANAGE . '/azbooking-list-dieu-hanh.html');
    $data['listfkey']['list_user'] = json_decode($list_user, true);
    if (isset($_GET["action_all"])) {
        if ($_GET["action_all"] == "ThemMoi") {
            $data['tab2_class'] = 'default-tab current';
            $data['tab1_class'] = ' ';
        } else {
            $List_tour = tour_getByAll();
            foreach ($List_tour as $tour) {
//                if(isset($_GET["check_".$tour->id])) tour_delete($tour);
            }
//            $array_send_manage['code_check_send_email']=_return_mc_encrypt('tungtv_az_mix_12345');
//            $array_send_manage['action']="delete";
//            $array_send_manage['list_tour']=$List_tour;
//            $list_noti= returnCURL($array_send_manage, SITE_NAME_MANAGE.'/controller/admin/tour_az.php');
            header('Location: ' . SITE_NAME . '/controller/admin/tour.php');
        }
    }


    $data['listfkey']['list_type_string'] = $list_danhmuc_dichvu;
    $array_send_manage = array();
    if (isset($_POST["DanhMuc1Id"]) && isset($_POST["DanhMuc2Id"]) && isset($_POST["name"]) && isset($_POST["name_url"]) && isset($_POST["count_down"]) && isset($_POST["code"]) && isset($_POST["img"]) && isset($_POST["price_tiep_thi"]) && isset($_POST["price_sales"]) && isset($_POST["price"]) && isset($_POST["price_2"]) && isset($_POST["price_3"]) && isset($_POST["price_4"]) && isset($_POST["price_5"]) && isset($_POST["price_6"]) && isset($_POST["durations"]) && isset($_POST["departure"]) && isset($_POST["departure_time"]) && isset($_POST["destination"]) && isset($_POST["vehicle"]) && isset($_POST["hotel"]) && isset($_POST["summary"]) && isset($_POST["highlights"]) && isset($_POST["schedule"]) && isset($_POST["price_list"]) && isset($_POST["content"]) && isset($_POST["list_img"]) && isset($_POST["title"]) && isset($_POST["keyword"]) && isset($_POST["description"]) && isset($_POST["inclusion"]) && isset($_POST["exclusion"])) {
        $name_dichvu = '';
        if (isset($_POST['name_dichvu'])) {
            $name_dichvu = $_POST['name_dichvu'];
            unset($_POST['name_dichvu']);
        }
        $type_dichvu = '';
        if (isset($_POST['type_dichvu'])) {
            $type_dichvu = $_POST['type_dichvu'];
            unset($_POST['type_dichvu']);
        }
        $price_dichvu = '';
        if (isset($_POST['price_dichvu'])) {
            $price_dichvu = $_POST['price_dichvu'];
            unset($_POST['price_dichvu']);
        }
        $soluong_dichvu = '';
        if (isset($_POST['soluong_dichvu'])) {
            $soluong_dichvu = $_POST['soluong_dichvu'];
            unset($_POST['soluong_dichvu']);
        }
        $thanhtien_dichvu = '';
        if (isset($_POST['thanhtien_dichvu'])) {
            $thanhtien_dichvu = $_POST['thanhtien_dichvu'];
            unset($_POST['thanhtien_dichvu']);
        }
        $ghichu_dichvu = '';
        if (isset($_POST['ghichu_dichvu'])) {
            $ghichu_dichvu = $_POST['ghichu_dichvu'];
            unset($_POST['ghichu_dichvu']);
        }
        $array = $_POST;
        if (!isset($array['id']))
            $array['id'] = '0';
        if (!isset($array['DanhMuc1Id']))
            $array['DanhMuc1Id'] = '0';
        if (!isset($array['DanhMuc2Id']))
            $array['DanhMuc2Id'] = '0';
        if (!isset($array['promotion']))
            $array['promotion'] = '0';
        if (!isset($array['packages']))
            $array['packages'] = '0';
        if (!isset($array['name']))
            $array['name'] = '0';
        if (!isset($array['name_url']))
            $array['name_url'] = '0';
        $array['name_url'] = LocDau($array['name']);
        if (!isset($array['count_down']))
            $array['count_down'] = '';
        if (!isset($array['code']))
            $array['code'] = '0';
        if (!isset($array['img']))
            $array['img'] = '0';
        if (!isset($array['price_tiep_thi']))
            $array['price_tiep_thi'] = '';
        if (!isset($array['price_sales']))
            $array['price_sales'] = '0';
        if (!isset($array['price']))
            $array['price'] = '0';
        if (!isset($array['price_2']))
            $array['price_2'] = '0';
        if (!isset($array['price_3']))
            $array['price_3'] = '0';
        if (!isset($array['price_4']))
            $array['price_4'] = '0';
        if (!isset($array['price_5']))
            $array['price_5'] = '0';
        if (!isset($array['price_6']))
            $array['price_6'] = '0';
        if (!isset($array['durations']))
            $array['durations'] = '0';
        if (!isset($array['departure']))
            $array['departure'] = '0';
        $departure = '';
        if (isset($_POST["departure"]) && $_POST["departure"] != '') {
            $departure = implode(',', $_POST["departure"]);
            $array['departure'] = $departure;
        }
        if (!isset($array['departure_time']))
            $array['departure_time'] = '0';
        if (!isset($array['destination']))
            $array['destination'] = '0';
        if (!isset($array['vehicle']))
            $array['vehicle'] = '0';
        if (!isset($array['hotel']))
            $array['hotel'] = '0';
        if (!isset($array['summary']))
            $array['summary'] = '0';
        if (!isset($array['highlights']))
            $array['highlights'] = '0';
        if (!isset($array['schedule']))
            $array['schedule'] = '0';
        if (!isset($array['price_list']))
            $array['price_list'] = '0';
        if (!isset($array['content']))
            $array['content'] = '0';
        if (!isset($array['list_img']))
            $array['list_img'] = '0';
        if (!isset($array['title']))
            $array['title'] = '0';
        if (!isset($array['keyword']))
            $array['keyword'] = '0';
        if (!isset($array['description']))
            $array['description'] = '0';
        if (!isset($array['inclusion']))
            $array['inclusion'] = '0';
        if (!isset($array['exclusion']))
            $array['exclusion'] = '0';
            if ($_POST['price'] == '') {
                $_POST['price']=0;
            }
        if ($_POST['price_2'] == '') {
            $_POST['price_2']=0;
        }
        if ($_POST['price_3'] == '') {
            $_POST['price_3']=0;
        }
        if ($_POST['price_4'] == '') {
            $_POST['price_4']=0;
        }

        $array['updated'] = date(DATETIME_FORMAT);
        $array_send_manage = $array;
        $array_send_manage['summary'] = '';
        $array_send_manage['highlights'] = '';
        $array_send_manage['schedule'] = '';
        $array_send_manage['price_list'] = '';
        $array_send_manage['content'] = '';
        $array_send_manage['inclusion'] = '';
        $array_send_manage['exclusion'] = '';
        $array_send_manage['name_dichvu'] = json_encode($name_dichvu);
        $array_send_manage['type_dichvu'] = json_encode($type_dichvu);
        $array_send_manage['price_dichvu'] = json_encode($price_dichvu);
        $array_send_manage['soluong_dichvu'] = json_encode($soluong_dichvu);
        $array_send_manage['thanhtien_dichvu'] = json_encode($thanhtien_dichvu);
        $array_send_manage['ghichu_dichvu'] = json_encode($ghichu_dichvu);
        $array_send_manage['code_check_send_email'] = _return_mc_encrypt('tungtv_az_mix_12345');
        $code_az_mix = _randomBooking('az', 'tour_count', 'code_az_mix');

        $new_obj = new tour($array);
        if ($insert) {
            $new_obj->code_az_mix = $code_az_mix;
            $array_send_manage['code_az_mix'] = $code_az_mix;
            $list_noti = returnCURL($array_send_manage, SITE_NAME_MANAGE . '/controller/admin/tour_az.php');
            if ($list_noti) {
                tour_insert($new_obj);

                $data_detail=tour_getByTop('1','code_az_mix="'.$code_az_mix.'"',1);
                if($data_detail){
                    _updateDanhSachBangGia($name_dichvu,$type_dichvu,$price_dichvu,$soluong_dichvu,$thanhtien_dichvu,$ghichu_dichvu, $data_detail[0]->id);
                }
            }
            header('Location: ' . SITE_NAME . '/controller/admin/tour.php' . $danhmuc_id_get);
        } else {
            $data_detail=tour_getById($_GET['id']);
            if($data_detail) {
                if ($data_detail[0]->code_az_mix == '') {
                    $new_obj->code_az_mix = $code_az_mix;
                    $array_send_manage['code_az_mix'] = $code_az_mix;
                }else{
                    $array_send_manage['code_az_mix'] = $data_detail[0]->code_az_mix;
                    $new_obj->code_az_mix = $data_detail[0]->code_az_mix;
                }
                $array_send_manage['id']= $data_detail[0]->id;
                $list_noti = returnCURL($array_send_manage, SITE_NAME_MANAGE . '/controller/admin/tour_az.php');
                if ($list_noti) {
                    $new_obj->id = $_GET["id"];
                    tour_update($new_obj);
                    list_bang_gia_tour_delete($_GET["id"]);
                    _updateDanhSachBangGia($name_dichvu,$type_dichvu,$price_dichvu,$soluong_dichvu,$thanhtien_dichvu,$ghichu_dichvu, $data_detail[0]->id);

                }
            }

            $insert = false;
            header('Location: ' . SITE_NAME . '/controller/admin/tour.php' . $danhmuc_id_get);
        }
    }
    $dk = '';
    $dk_count = '';
    if (isset($_GET['giatri']) && $_GET['giatri'] != '') {
        $key_timkiem = mb_strtolower(addslashes(strip_tags($_GET['giatri'])));
        $dk_count = 'name LIKE "%' . $key_timkiem . '%" or name_url LIKE "%' . $key_timkiem . '%" or code LIKE "%' . $key_timkiem . '%" or price_sales LIKE "%' . $key_timkiem . '%" or price LIKE "%' . $key_timkiem . '%" or durations LIKE "%' . $key_timkiem . '%"  or departure LIKE "%' . $key_timkiem . '%" or departure_time LIKE "%' . $key_timkiem . '%" or destination LIKE "%' . $key_timkiem . '%" or destination LIKE "%' . $key_timkiem . '%"';
        $dk = '(tour.name LIKE "%' . $key_timkiem . '%" or tour.name_url LIKE "%' . $key_timkiem . '%" or tour.code LIKE "%' . $key_timkiem . '%" or tour.price_sales LIKE "%' . $key_timkiem . '%" or tour.price LIKE "%' . $key_timkiem . '%" or tour.durations LIKE "%' . $key_timkiem . '%"  or tour.departure LIKE "%' . $key_timkiem . '%" or tour.departure_time LIKE "%' . $key_timkiem . '%" or tour.destination LIKE "%' . $key_timkiem . '%" or tour.destination LIKE "%' . $key_timkiem . '%")';
    }
    if (isset($_GET['DanhMuc1Id']) && $_GET['DanhMuc1Id'] != '') {
        $danhmuc_id = mb_strtolower(addslashes(strip_tags($_GET['DanhMuc1Id'])));
        if ($dk != '') {
            $dk .= ' (and tour.DanhMuc1Id=' . $danhmuc_id . ')';
            $dk_count .= ' and DanhMuc1Id=' . $danhmuc_id;
        } else {
            $dk .= '  tour.DanhMuc1Id=' . $danhmuc_id . '';
            $dk_count .= '  DanhMuc1Id=' . $danhmuc_id;
        }

    } else {
        if (isset($_GET['DanhMuc2Id']) && $_GET['DanhMuc2Id'] != '') {
            $danhmuc_id = mb_strtolower(addslashes(strip_tags($_GET['DanhMuc2Id'])));
            if ($dk != '') {
                $dk .= ' (and tour.DanhMuc2Id=' . $danhmuc_id . ')';
                $dk_count .= ' and DanhMuc2Id=' . $danhmuc_id;
            } else {
                $dk .= '  tour.DanhMuc2Id=' . $danhmuc_id . '';
                $dk_count .= '  DanhMuc2Id=' . $danhmuc_id;
            }

        }
    }
    $data['username'] = isset($_SESSION["UserName"]) ? $_SESSION["UserName"] : 'quản trị viên';
    $data['count_paging'] = tour_count($dk_count);
    $data['page'] = isset($_GET['page']) ? $_GET['page'] : '1';
    $data['table_body'] = tour_getByPagingReplace($data['page'], 20, 'id DESC', $dk);
    // gọi phương thức trong tầng view để hiển thị
    view_tour($data);
} else {
    header('location: ' . SITE_NAME);
}


function _randomBooking($code_module, $function_count, $field = 'code_booking')
{
    $rand_number = rand(1, 5);
    $user_id = '';
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    }
    if ($code_module == 'az') {
        $code = implode('', _getRandomNumbers(1, 1000, $rand_number));
        if (strlen($code) <= 3) {
            $code = $code . rand(1000, 10000);
        }
        $key = array("68", "86", "69", "99", "66", '88', '66', '55', '26', '28', '83', '39', '79', '456', '486', '456', '569', '686', '868', '656', '1618', '8888', '6666');
        $code = substr($code, rand(2, 3), rand(3, 4));
        $code = $code . $key[array_rand($key)];;
        $rand = $code_module . '_' . $code;
    } else {
        $rand = $code_module . '_' . (implode('', _getRandomNumbers(1, 99, $rand_number))) . $user_id;
    }
    $rand = $rand . '_' . date("Y-m-d") . '_' . date("h:i:sa");
    $data_booking = $function_count($field . '="' . $rand . '"');
    if ($data_booking > 0) {
        _randomBooking($code_module, $function_count, $field);
    } else {
        return $rand;
    }

}

function _getRandomNumbers($min, $max, $count)
{
    if ($count > (($max - $min) + 1)) {
        return false;
    }
    $values = range($min, $max);
    shuffle($values);
    return array_slice($values, 0, $count);
}

function _updateDanhSachBangGia($name_dichvu, $type_dichvu, $price_dichvu, $soluong_dichvu, $thanhtien_dichvu, $ghichu_dichvu, $id_tour)
{
    if ($name_dichvu && $type_dichvu && $price_dichvu && $soluong_dichvu && $thanhtien_dichvu && $ghichu_dichvu && $id_tour) {
        foreach ($name_dichvu as $key => $value) {
            $name = $value;
            $type = '';
            if (isset($type_dichvu[$key])) {
                $type = $type_dichvu[$key];
            }
            $price = 0;
            if (isset($price_dichvu[$key])) {
                $price = $price_dichvu[$key];
            }
            $soluong = 0;
            if (isset($soluong_dichvu[$key])) {
                $soluong = $soluong_dichvu[$key];
            }
            $thanhtien = '0 vnđ';
            if (isset($thanhtien_dichvu[$key])) {
                $thanhtien = $thanhtien_dichvu[$key];
            }
            $note = '';
            if (isset($ghichu_dichvu[$key])) {
                $note = $ghichu_dichvu[$key];
            }

            $dichvu = new tour_list_dichvu();
            $dichvu->name = $name;
            $dichvu->type = $type;
            $dichvu->price = $price;
            $dichvu->number = $soluong;
            $dichvu->total = $thanhtien;
            $dichvu->note = $note;
            $dichvu->tour_id=$id_tour;
            tour_list_dichvu_insert($dichvu);
        }
    }
}