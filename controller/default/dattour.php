<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:40 PM
 */
if (!defined('SITE_NAME')) {
    require_once '../../config.php';
}

require_once DIR . '/controller/default/public.php';
require_once DIR . '/common/paging.php';
require_once DIR . '/common/redict.php';
require_once DIR . '/model/tourService.php';
require_once DIR . '/model/booking_tourService.php';
require_once DIR . '/model/configService.php';
require_once DIR . '/model/danhmuc_1Service.php';
require_once DIR . '/model/danhmuc_2Service.php';
require_once DIR . '/common/class.phpmailer.php';
require_once(DIR . "/common/Mail.php");
if (!isset($_GET['id_booking'])) {
    redict(SITE_NAME);
}
$id = addslashes(strip_tags($_GET['id_booking']));
$id = _return_mc_decrypt($id);
$data['detail'] = tour_getById($id);
if (count($data['detail']) == 0) {
    redict(SITE_NAME);
}
if (isset($_POST['name_customer'])) {
    $name_customer_sub = $_POST['name_customer_sub'];
    $email_customer_sub = $_POST['email_customer'];
    $phone_customer_sub = $_POST['phone_customer'];
    $address_customer_sub = $_POST['address_customer'];
    $tuoi_customer_sub = $_POST['tuoi_customer'];
    $tuoi_number_customer_sub = $_POST['tuoi_number_customer'];
    $birthday_customer_sub = $_POST['birthday_customer'];
    $passport_customer_sub = '';
    $date_passport_customer_sub = '';


    $name_customer = _returnPostParamSecurity('name_customer');
    $email = _returnPostParamSecurity('email');
    $address = _returnPostParamSecurity('address');
    $phone = _returnPostParamSecurity('phone');
    $num_nguoi_lon = _returnPostParamSecurity('num_nguoi_lon');
    if ($num_nguoi_lon == 0) {
        $num_nguoi_lon = 1;
    }
    $num_tre_em_m1 = _returnPostParamSecurity('num_tre_em_m1');
    if ($num_tre_em_m1 == '') {
        $num_tre_em_m1 = 0;
    }
    $num_tre_em_m2 = _returnPostParamSecurity('num_tre_em_m2');
    if ($num_tre_em_m2 == '') {
        $num_tre_em_m2 = 0;
    }
    $num_tre_em_m3 = _returnPostParamSecurity('num_tre_em_m3');
    if ($num_tre_em_m3 == '') {
        $num_tre_em_m3 = 0;
    }
    $insert = true;
    $total_num_nguoi = $num_nguoi_lon + $num_tre_em_m1 + $num_tre_em_m2+$num_tre_em_m3;

    if ($data['detail'][0]->so_cho != 0 && $data['detail'][0]->so_cho != '') {
        if ($total_num_nguoi > $data['detail'][0]->so_cho) {
            $insert = false;
            echo "<script>alert('Số chỗ hiện tại không đủ cho '+$total_num_nguoi+' người')</script>";
        } else {
            $insert = true;
        }
    }
    $ngay_khoi_hanh = _returnPostParamSecurity('ngay_khoi_hanh');
    $httt = _returnPostParamSecurity('httt');

    $dieu_khoan = _returnPostParamSecurity('dieu_khoan');
    if ($dieu_khoan == 'on' || $dieu_khoan == 1) {
        $dieu_khoan = 1;
    }
    $note = _returnPostParamSecurity('note');
    $price = $data['detail'][0]->price;
    $price_2 = $data['detail'][0]->price_2;
    $price_3 = $data['detail'][0]->price_3;
    $price_4 = $data['detail'][0]->price_4;
    if ($price == 0 || $price == '') {
        $price = 'Liên hệ';
    }
    if ($price_2 == 0 || $price_2 == '') {
        $price_2 = $price;
    }
    if ($price_3 == 0 || $price_3 == '') {
        $price_3 = $price;
    }
    if ($price_4 == 0 || $price_4 == '') {
        $price_4 = $price;
    }

    $price_new = $price;
    $price_new_2 = $price_2;
    $price_new_3 = $price_3;
    $price_new_4 = $price_4;


    if ($name_customer != '' && $email != '' && $phone != '' && $num_nguoi_lon != '' && $httt != '' && $dieu_khoan != '' && $ngay_khoi_hanh != '' && $insert == true) {


        $string_info_booking = '';
        $price_number = $data['detail'][0]->price_number;
        $price_number_2 = $data['detail'][0]->price_number_2;
        $price_number_3 = $data['detail'][0]->price_number_3;
        $price_number_4 = $data['detail'][0]->price_number_4;

        $name_price='';
        $name_price_2='10-12 tuổi';
        $name_price_3='2-10 tuổi';
        $name_price_4='dưới 2 tuổi';
        if ($data['detail'][0]->name_price != '') {
            $name_price = $data['detail'][0]->name_price;
        }
        if ($data['detail'][0]->name_price_2 != '') {
            $name_price_2 = $data['detail'][0]->name_price_2;
        }
        if ($data['detail'][0]->name_price_3 != '') {
            $name_price_3 = $data['detail'][0]->name_price_3;
        }
        if ($data['detail'][0]->name_price_4 != '') {
            $name_price_4 = $data['detail'][0]->name_price_4;
        }

        $total = 0;
        $total_nguoi_lon = 0;
        $total_tre_em_m1 = 0;
        $total_tre_em_m2 = 0;
        $total_tre_em_m3 = 0;


        $name_customer_mahoa = _return_mc_encrypt($name_customer);
        $email_mahoa = _return_mc_encrypt($email);
        $phone_mahoa = _return_mc_encrypt($phone);
        $address_mahoa = _return_mc_encrypt($address);
        $num_nguoi_lon_mahoa = _return_mc_encrypt($num_nguoi_lon);
        $num_tre_em_m1_mahoa = _return_mc_encrypt($num_tre_em_m1);
        $num_tre_em_m2_mahoa = _return_mc_encrypt($num_tre_em_m2);
        $num_tre_em_m3_mahoa = _return_mc_encrypt($num_tre_em_m3);
        $httt_mahoa = _return_mc_encrypt($httt);
        $note_mahoa = _return_mc_encrypt($note);
        $nguontour_mahoa = _return_mc_encrypt($_SERVER['HTTP_HOST']);
        $name_tour_mahoa = _return_mc_encrypt($data['detail'][0]->name);
        $code_tour_mahoa = _return_mc_encrypt($data['detail'][0]->code);
        $id_tour_mahoa = _return_mc_encrypt($data['detail'][0]->id);
        $dieuhanh_id_mahoa = _return_mc_encrypt($data['detail'][0]->dieuhanh_id);
        $phuong_tien = _return_mc_encrypt($data['detail'][0]->vehicle);

        $name_price_mahoa = _return_mc_encrypt($name_price);
        $name_price_2_mahoa = _return_mc_encrypt($name_price_2);
        $name_price_3_mahoa = _return_mc_encrypt($name_price_3);
        $name_price_4_mahoa = _return_mc_encrypt($name_price_4);

        $price_mahoa = _return_mc_encrypt($data['detail'][0]->price);
        $price_2_mahoa = _return_mc_encrypt($data['detail'][0]->price_2);
        $price_3_mahoa = _return_mc_encrypt($data['detail'][0]->price_3);
        $price_4_mahoa = _return_mc_encrypt($data['detail'][0]->price_4);

        $name_customer_sub_mahoa = _return_mc_encrypt(json_encode($name_customer_sub));
        $email_customer_sub_mahoa = _return_mc_encrypt(json_encode($email_customer_sub));
        $phone_customer_sub_mahoa = _return_mc_encrypt(json_encode($phone_customer_sub));
        $address_customer_sub_mahoa = _return_mc_encrypt(json_encode($address_customer_sub));
        $tuoi_customer_sub_mahoa = _return_mc_encrypt(json_encode($tuoi_customer_sub));
        $tuoi_number_customer_sub_mahoa = _return_mc_encrypt(json_encode($tuoi_number_customer_sub));

        $birthday_customer_sub_mahoa = _return_mc_encrypt(json_encode($birthday_customer_sub));
        $passport_customer_sub_mahoa = _return_mc_encrypt(json_encode($passport_customer_sub));
        $date_passport_customer_sub_mahoa = _return_mc_encrypt(json_encode($date_passport_customer_sub));

        $price_new = $price;
        $price_new_2 = $price_2;
        $price_new_3 = $price_3;
        $total_nguoi_lon = $price_new;


        $check_total = 1;
        if ($num_nguoi_lon > 1 && $price != 'Liên hệ') {
//            $array_price_so_nguoi = returnArray_price($price_number, $array_price = array());
//            if (count($array_price_so_nguoi) > 0) {
//                $price_new = price_new($num_nguoi_lon, $array_price_so_nguoi, $price_new);
//                $total_nguoi_lon = $num_nguoi_lon * $price_new;
//            }
            $total_nguoi_lon = $num_nguoi_lon * $price_new;
        } else {
            if ($price == 'Liên hệ') {
                $total_nguoi_lon = 'Liên hệ';
                $check_total = 0;
            }
        }
        if ($num_tre_em_m1 > 1 && $price_2 != 'Liên hệ') {
            $total_tre_em = $num_tre_em * $num_tre_em_m1;
//            $array_price_so_nguoi_lon = returnArray_price($price_number_2, $array_price = array());
//            if (count($array_price_so_nguoi_lon) > 0) {
//                $price_new_2 = price_new($num_tre_em, $array_price_so_nguoi_lon, $price_new_2);
//                $total_tre_em = $num_tre_em * $price_new_2;
//            }
        } else {
            if ($num_tre_em_m1 == 0) {
                $total_tre_em_m1 = 0;
            } else {
                if ($num_tre_em_m1 == 1) {
                    if ($price_2 == 'Liên hệ') {
                        $total_tre_em_m1 = 'Liên hệ';
                        $check_total = 0;
                    }
                    $total_tre_em_m1 = $price_2;
                }

            }

        }

        if ($num_tre_em_m2 > 1 && $price_3 != 'Liên hệ') {
            $total_tre_em_m2 = $price_new_3 * $num_tre_em_m2;
//            $array_price_so_nguoi_lon = returnArray_price($price_number_3, $array_price = array());
//            if (count($array_price_so_nguoi_lon) > 0) {
//                $price_new_3 = price_new($num_tre_em_5, $array_price_so_nguoi_lon, $price_new_3);
//                $total_tre_em_5 = $price_new_3 * $num_tre_em_5;
//            }
        } else {
            if ($num_tre_em_m2 == 0) {
                $total_tre_em_m2 = 0;
            } else {
                if ($num_tre_em_m2 == 1) {
                    if ($price_3 == 'Liên hệ') {
                        $total_tre_em_m3 = 'Liên hệ';
                        $check_total = 0;
                    }
                    $total_tre_em_m2 = $price_3;
                }
            }

        }
        if ($num_tre_em_m3> 1 && $price_4 != 'Liên hệ') {
            $total_tre_em_m3 = $price_new_4 * $num_tre_em_m3;
        } else {
            if ($num_tre_em_m3 == 0) {
                $total_tre_em_m3 = 0;
            } else {
                if ($num_tre_em_m3 == 1) {
                    if ($price_4 == 'Liên hệ') {
                        $total_tre_em_m3 = 'Liên hệ';
                        $check_total = 0;
                    }
                    $total_tre_em_m3 = $price_3;
                }

            }

        }
        if ($check_total == 0) {
            $total = 'Liên hệ';
        } else {
            $total = $total_nguoi_lon + $total_tre_em_m1 + $total_tre_em_m2+ $total_tre_em_m3;
        }
        $price_new_mahoa = _return_mc_encrypt($price_new);
        $price_new_2_mahoa = _return_mc_encrypt($price_new_2);
        $price_new_3_mahoa = _return_mc_encrypt($price_new_3);
        $price_new_4_mahoa = _return_mc_encrypt($price_new_4);

        $name_price_mahoa = _return_mc_encrypt($name_price);
        $name_price_2_mahoa = _return_mc_encrypt($name_price_2);
        $name_price_3_mahoa = _return_mc_encrypt($name_price_3);
        $name_price_4_mahoa = _return_mc_encrypt($name_price_4);

        $price_tiep_thi_mahoa = _return_mc_encrypt($data['detail'][0]->price_tiep_thi);

        $string_info_booking .= "name_customer=" . $name_customer_mahoa;
        $string_info_booking .= "&email=" . $email_mahoa;
        $string_info_booking .= "&phone=" . $phone_mahoa;
        $string_info_booking .= "&address=" . $address_mahoa;

        $string_info_booking .= "&ngay_khoi_hanh=" . _return_mc_encrypt($ngay_khoi_hanh);

        $string_info_booking .= "&id_tour=" . $id_tour_mahoa;
        $string_info_booking .= "&dieuhanh_id=" . $dieuhanh_id_mahoa;
        $string_info_booking .= "&name_tour=" . $name_tour_mahoa;
        $string_info_booking .= "&code_tour=" . $code_tour_mahoa;
        $string_info_booking .= "&price_tiep_thi=" . $price_tiep_thi_mahoa;
        $string_info_booking .= "&ng_tour=" . $nguontour_mahoa;
        $string_info_booking .= "&phuong_tien=" . $phuong_tien;
        $string_info_booking .= "&n1=" . $num_nguoi_lon_mahoa;
        $string_info_booking .= "&n2=" . $num_tre_em_m1_mahoa;
        $string_info_booking .= "&n3=" . $num_tre_em_m2_mahoa;
        $string_info_booking .= "&n4=" . $num_tre_em_m3_mahoa;
        $string_info_booking .= "&po1=" . $price_mahoa;
        $string_info_booking .= "&po2=" . $price_2_mahoa;
        $string_info_booking .= "&po3=" . $price_3_mahoa;
        $string_info_booking .= "&po4=" . $price_4_mahoa;
        $string_info_booking .= "&pn1=" . $price_new_mahoa;
        $string_info_booking .= "&pn2=" . $price_new_2_mahoa;
        $string_info_booking .= "&pn3=" . $price_new_3_mahoa;
        $string_info_booking .= "&pn4=" . $price_new_4_mahoa;
        $string_info_booking .= "&httt=" . $httt_mahoa;
        $string_info_booking .= "&note=" . $note_mahoa;

        $string_info_booking .= "&name_customer_sub=" . $name_customer_sub_mahoa;
        $string_info_booking .= "&email_customer_sub=" . $email_customer_sub_mahoa;
        $string_info_booking .= "&phone_customer_sub=" . $phone_customer_sub_mahoa;
        $string_info_booking .= "&address_customer_sub=" . $address_customer_sub_mahoa;
        $string_info_booking .= "&tuoi_customer_sub=" . $tuoi_customer_sub_mahoa;
        $string_info_booking .= "&tuoi_number_customer_sub=" . $tuoi_number_customer_sub_mahoa;

        $string_info_booking .= "&birthday_customer_sub=" . $birthday_customer_sub_mahoa;
        $string_info_booking .= "&passport_customer_sub=" . $passport_customer_sub_mahoa;
        $string_info_booking .= "&date_passport_customer_sub=" . $date_passport_customer_sub_mahoa;

        $string_info_booking .= "&name_price=" . $name_price_mahoa;
        $string_info_booking .= "&name_price_2=" . $name_price_2_mahoa;
        $string_info_booking .= "&name_price_3=" . $name_price_3_mahoa;
        $string_info_booking .= "&name_price_4=" . $name_price_4_mahoa;

        $string_info_booking .= "&number=" . _return_mc_encrypt($price_number);
        $string_info_booking .= "&number_2=" . _return_mc_encrypt($price_number_2);
        $string_info_booking .= "&number_3=" . _return_mc_encrypt($price_number_3);
        $string_info_booking .= "&number_4=" . _return_mc_encrypt($price_number_4);
        $string_info_booking .= "&gen=" . _return_mc_encrypt(rand(1, 9) . '-tungtv');


        $string_info_booking .= "&tol=" . _return_mc_encrypt($total);

        if(isset($_GET['key'])){
            $string_info_booking .= "&key_user=" . _returnGetParamSecurity('key');
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, SITE_NAME_MANAGE."/booking-website/");
//        curl_setopt($ch, CURLOPT_URL,"http://localhost/manage_mix/booking-website/");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $string_info_booking);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($ch);
        curl_close($ch);
        print_r($res);
        exit;
        if ($res === 0) {
            echo "<script>alert('Đặt tour thất bại, bạn vui lòng thử lại')</script>";
        } else {
            $array_res=json_decode($res,true);
            $code_res=$array_res['code_booking'];
            $id_booking_res=$array_res['id_booking'];
            if ($data['detail'][0]->so_cho != 0 && $data['detail'][0]->so_cho != '') {
                $array_tour = (array)$data['detail'][0];
                $new_tour = new tour($array_tour);
                $new_tour->so_cho = $data['detail'][0]->so_cho - $total_num_nguoi;
                tour_update($new_tour);
            }
            $code_booking = $code_res;
            $new = new booking_tour();
            $new->code_booking = $code_booking;
            $new->tour_id = $data['detail'][0]->id;
            $new->name_tour = $data['detail'][0]->name;
            $new->name_customer = $name_customer;
            $new->language = '';
            $new->phone = $phone;
            $new->email = $email;
            $new->address = $address;
            $new->departure_day = date("Y-m-d", strtotime($ngay_khoi_hanh));
            $new->num_nguoi_lon = $num_nguoi_lon;
            $new->num_tre_em_m1 = $num_tre_em_m1;
            $new->num_tre_em_m2 = $num_tre_em_m2;
            $new->num_tre_em_m3 = $num_tre_em_m3;
            $new->price = $price_new;
            $new->price_2 = $price_new_2;
            $new->price_3 = $price_new_3;
            $new->price_4 = $price_new_4;
            $new->total_price = $total;
            $new->request = $note;
            $new->status = 0;
            $new->created = date(DATETIME_FORMAT);
            booking_tour_insert($new);
            $data_detail_booking = booking_tour_getByTop('1', 'code_booking="' . $code_booking . '"', 'id desc');
            if (count($data_detail_booking) > 0) {
                $link_chitiet_don_hang = SITE_NAME . '/don-hang?id_booking=' . _return_mc_encrypt($data_detail_booking[0]->id) . '&code_booking=' . _return_mc_encrypt($code_booking);
                $link_chitiet_don_hang_tiepthi = SITE_NAME . '/tiep-thi-lien-ket/don-hang/chi-tiet?id=' .$id_booking_res;
                $data_danhmuc_1_detail = danhmuc_1_getById($data['detail'][0]->DanhMuc1Id);
                $data_danhmuc_2_detail = danhmuc_2_getById($data['detail'][0]->DanhMuc2Id);
                $name_url_dm1_detail = '';
                if (count($data_danhmuc_1_detail) > 0) {
                    $name_url_dm1_detail = $data_danhmuc_1_detail[0]->name_url;
                }
                $name_url_dm2_detail = '';
                if (count($data_danhmuc_2_detail) > 0) {
                    $name_url_dm2_detail = $data_danhmuc_2_detail[0]->name_url;
                }
                $link_tour_list_detail = link_tourdetail_ajax($data['detail'][0], $name_url_dm1_detail, $name_url_dm2_detail);
                $logo = SITE_NAME . '/email_template/images/logoazboong.vn.png';
                $banner = SITE_NAME . '/email_template/images/banner.jpg';
                $footer = SITE_NAME . '/email_template/images/footer.png';
                $title = 'AZBOOKING.VN - GIÁ RẺ VÀ SẼ LUÔN NHƯ VẬY';
                $data_tour_sales = tour_getByTop(4, 'price_sales!="" ', 'id desc');
                $tour_string = '';
                if (count($data_tour_sales) > 0) {
                    foreach ($data_tour_sales as $row_tour) {
                        $name_list_tour = $row_tour->name;
                        $price_list = '';
                        if ($row_tour->price == 0 || $row_tour->price == '') {
                            $price_list = 'Liên hệ';
                        } else {
                            $price_list = number_format((int)$row_tour->price, 0, ",", ".") . ' vnđ';
                        }
                        $price_list_sales = number_format((int)$row_tour->price_sales, 0, ",", ".") . ' vnđ';
                        $durations = $row_tour->durations;
                        $data_danhmuc_1 = danhmuc_1_getById($row_tour->DanhMuc1Id);
                        $data_danhmuc_2 = danhmuc_2_getById($row_tour->DanhMuc2Id);
                        $name_url_dm1 = '';
                        if (count($data_danhmuc_1) > 0) {
                            $name_url_dm1 = $data_danhmuc_1[0]->name_url;
                        }
                        $name_url_dm2 = '';
                        if (count($data_danhmuc_2) > 0) {
                            $name_url_dm2 = $data_danhmuc_2[0]->name_url;
                        }
                        $link_tour_list = link_tourdetail_ajax($row_tour, $name_url_dm1, $name_url_dm2);
                        $img_list = _returnCheckLinkImg($row_tour->img);
                        $tour_string .= '<div style="width: 23%;float: left;padding-left: 10px; padding-right: 10px" class="col-md-3 col-sm-6">
                        <div style="    text-align: center;
    margin-bottom: 30px;" class="news">
                            <a href="' . $link_tour_list . '"><img title="' . $name_list_tour . '" alt="' . $name_list_tour . '" style="    width: 100%;
    max-width: 100%;
    height: 160px;
    margin-bottom: 20px;" class="news-image" src="' . $img_list . '"></a>
                            <h3 title="' . $name_list_tour . '" style="font-size: 1em;text-overflow: ellipsis; text-align: left;
    overflow: hidden;
    white-space: nowrap;
    margin: 0 0 10px;" class="news-title"><a style="text-decoration: none;" href="' . $link_tour_list . '">' . $name_list_tour . '</a></h3>
                            <small class="date">
                                <ins><span class="amount" style="color: red; font-size: 14px; font-weight: bold">' . $price_list . '</span></ins> | <del><span class="amount" style="    color: #B1B1B1;">' . $price_list_sales . '</span></del>
                            </small>
                            <p style="text-align: left">
                                Thời gian: ' . $durations . '
                            </p>
                        </div>
                    </div>';
                    }
                }

                $data_config = config_getByTop(1, '', '');
                if (count($data_config) > 0 && $data_config[0]->Logo != '') {
                    $logo =_returnCheckLinkImg($data_config[0]->Logo);
                    $banner =_returnCheckLinkImg($data_config[0]->banner_email);
                    $footer = _returnCheckLinkImg($data_config[0]->footer_email);
                    $title = SITE_NAME . $data_config[0]->Name;
                }
                if ($total == 0 || $total == 'Liên hệ') {
                    $total_format = 'Liên hệ';
                } else {
                    $total_format = number_format((int)$total, 0, ",", ".") . ' vnđ';
                }
                if ($price_new == 'Liên hệ') {
                    $price_new_format = 'Liên hệ';
                } else {
                    $price_new_format = number_format((int)$price_new, 0, ",", ".") . ' vnđ';
                }
                if ($price_new_2 == 'Liên hệ') {
                    $price_new_2_format = 'Liên hệ';
                } else {
                    $price_new_2_format = number_format((int)$price_new_2, 0, ",", ".") . ' vnđ';
                }
                if ($price_new_3 == 'Liên hệ') {
                    $price_new_3_format = 'Liên hệ';
                } else {
                    $price_new_3_format = number_format((int)$price_new_3, 0, ",", ".") . ' vnđ';
                }

                $data_tour[0] = $data['detail'][0];
                $message = "";
                $message_tiepthi = "";
                $subject = "Azbooking.vn – Thông báo đặt tour từ khách hàng";
                $message_tiepthi=$message .= '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    <title>' . $title . '</title>
</head>
<body>
<div style="width: 1000px;  margin:auto" class="site-content">
    <header style="position: relative;z-index: 999; background: white;text-align: center; padding: 10px 0 3px;" class="site-header">
        <div style=" text-align: center" >
            <a style=" text-align: center" href="' . SITE_NAME . '" >
                <img title="' . $title . '" style="width: 20%"
                     src="' . $logo . '"
                     alt="' . $title . '">
            </a>
        </div>
    </header>

    <div style="float: left; width: 100%" class="hero">
        <div class="slides">
            <img style="width: 100%" src="' . $banner . '">
        </div>
    </div>

    <main style="float: left; width: 100%" class="main-content">
        <div class="fullwidth-block">
            <div style="width: 100%;" class="container" class="container">';
                $message .= '<h3 style="font-weight: 600;
  font-size: 18px;
  border-bottom: 3px solid #0091EA;
  color: #0091ea;
  line-height: 1.3em;
  margin-top: 0;
  line-height: 58px;
  z-index: 9;
  text-transform: uppercase;
  text-align: center;" class="title_index">Kính chào quý khách ' . $name_customer . '!</h3>
                <div style="float: left;width: 100%;" class="col-xs-12 row">
                    <p style="font-weight: bold;line-height: 25px;"><span style="color: #0091ea;">AZBOOKING.VN</span>  vừa nhận được
                        đơn hàng <a href="' . $link_chitiet_don_hang . '" style="color: #0091ea;">"' . $code_booking . '"</a> của quý khách đặt ngày <span
                                style="color: #0091ea;">' . date('d-m-Y H:i:s', strtotime(_returnGetDateTime())) . '</span>.
                        Chúng tôi sẽ gửi thông báo và liên hệ với quý khách trong thới gian sớm nhất, Xin cảm ơn!.</br>
                    </p>
                </div>
                <p style="text-align: center;"><a href="' . $link_chitiet_don_hang . '" style="text-decoration: none;color: #ffffff; background-color: #f36f21;padding:10px 10px">"Thông tin đơn hàng"</a></p>';
                if(isset($array_res['user']['user_name'])&&$array_res['user']['user_name']!=''){
                    $message_tiepthi.='<h3 style="font-weight: 600;
  font-size: 18px;
  border-bottom: 3px solid #0091EA;
  color: #0091ea;
  line-height: 1.3em;
  margin-top: 0;
  line-height: 58px;
  z-index: 9;
  text-transform: uppercase;
  text-align: center;" class="title_index">Chào ' . $array_res['user']['user_name'] . '!</h3>
                <div style="float: left;width: 100%;" class="col-xs-12 row">
                    <p style="font-weight: bold;line-height: 25px;">Khách hàng <span style="color: #0091ea;">'.$name_customer.'</span>  vừa đặt
                        đơn hàng <a href="' . $link_chitiet_don_hang_tiepthi . '" style="color: #0091ea;">"' . $code_booking . '"</a> được gắn mã tiếp thị liên kết của bạn.
                        Bạn hãy truy cập thông tin đơn hàng để theo dõi tiến trình và nhận hoa hồng</br>
                    </p>
                </div>
                <p style="text-align: center;"><a href="' . $link_chitiet_don_hang_tiepthi . '" style="text-decoration: none;color: #ffffff; background-color: #f36f21;padding:10px 10px">"Thông tin đơn hàng"</a></p>';
                }

                $thongtin_dh='<p> Dưới đây là thông tin đặt tour:</p>
                <div class="row" style="float: left; width: 100%; display: inline">
                    <div class="col-md-6 col-sm-6 col-xs-12" style="float: left;width: 47%;padding-right: 10px;">
                        <h6 style="font-size: 16px;
    margin-top: 10px;
    margin-bottom: 10px;
    text-transform: uppercase;
    color: #544531;" class="section-title">Thông tin khách hàng</h6>
                        <table style="width: 100%">
                            <tr>
                                <td style="width: 30%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;">Tên khách hàng</td>
                                <td style="width: 70%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;"><span style=" color: #0091ea;
                                font-weight: bold;">' . $name_customer . '</span></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;">Email</td>
                                <td style="width: 70%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;"><span style=" color: #0091ea;
                                font-weight: bold;">' . $email . '</span></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;">Điện thoại</td>
                                <td style="width: 70%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;"><span style=" color: #0091ea;
                                font-weight: bold;">' . $phone . '</span></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;">Địa chỉ</td>
                                <td style="width: 70%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;"><span style=" color: #0091ea;
                                font-weight: bold;">' . $address . '</span></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;">Ngày đặt tour</td>
                                <td style="width: 70%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;"><span style=" color: #0091ea;
                                font-weight: bold;">' . date('d-m-Y H:i:s', strtotime(_returnGetDateTime())) . '</span></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;">Yêu cầu</td>
                                <td style="width: 70%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;"><span style=" color: #0091ea;
                                font-weight: bold;">' . $note . '</span></td>
                            </tr>

                        </table>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12" style="float: left;width: 47%; ">
                        <h6 style="font-size: 16px;
    margin-top: 10px;
    margin-bottom: 10px;
    text-transform: uppercase;
    color: #544531;" class="section-title">Thông tin đặt tour</h6>
                        <table style="width: 100%">
                            <tr>
                                <td style="width: 30%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;">Tour</td>
                                <td style="width: 70%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;"><a href="' . $link_tour_list_detail . '"><span style=" color: #0091ea;
                                font-weight: bold;">' . $data_tour[0]->name . '</span></a></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;">Mã tour</td>
                                <td style="width: 70%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;"><span style=" color: #0091ea;
                                font-weight: bold;">' . $data['detail'][0]->code . '</span></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;">Giá ' . $name_price . '</td>
                                <td style="width: 70%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;"><span style=" color: #0091ea;
                                font-weight: bold;">' . $price_new_format . '</span></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;">Giá ' . $name_price_2 . '</td>
                                <td style="width: 70%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;"><span style=" color: #0091ea;
                                font-weight: bold;">' . $price_new_2_format . '</span></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;">Giá ' . $name_price_3 . '</td>
                                <td style="width: 70%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;"><span style=" color: #0091ea;
                                font-weight: bold;">' . $price_new_3_format . '</span></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;">Ngày khởi hành</td>
                                <td style="width: 70%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;"><span style=" color: #0091ea;
                                font-weight: bold;">' . $ngay_khoi_hanh . '</span></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;">Số người</td>
                                <td style="width: 70%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;"><span style=" color: #0091ea; font-size: 12px;
                             ">' . $num_nguoi_lon . ' '.$name_price.' | ' . $num_tre_em . ' '.$name_price_2.' | ' . $num_tre_em_5 . ' '.$name_price_3.'</span></td>
                            </tr>
                        </table>

                        <div style="font-weight:bold;font-size16pxfloat: right; width: 95%;margin-top: 20px;margin-bottom: 30px ; border: 1px solid #ddd; padding: 10px">
                            Tổng tiền: <span style="color: red">' . $total_format . '</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="fullwidth-block">
            <div style="    width: 100%; " class="container">
                <h3 style="font-weight: 600;
  font-size: 18px;
  border-bottom: 3px solid #0091EA;
  color: #0091ea;
  line-height: 1.3em;
  margin-top: 0;
  line-height: 58px;
  z-index: 9;
  text-transform: uppercase;
  text-align: center;" class="title_index">Có thể bạn quan tâm <a
                        style="float: right; margin-top: 10px; color: red; font-weight: bold;font-size: 14px;"
                        href="' . SITE_NAME . '/tour-du-lich/">Xem thêm...</a></h3>

                <div style="float: left; width: 100%" class="row">

                   ' . $tour_string . '

                </div>
            </div>
        </div>

    </main>

    <footer class="site-footer">
        <div style="    width: 100%;" class="container">
            <div class="row">
               <img title="' . $title . '" style="width: 100%;" src="' . $footer . '">
            </div>
        </div>
    </footer>
</div>
</body>
</html>';
                $message .= $thongtin_dh;
                $message_tiepthi .= $thongtin_dh;
                SendMail(SEND_EMAIL, $message, $subject);
//                SendMail('tungtv.soict@gmail.com', $message, 'Azbooking.vn – Xác nhận đặt tour');
                if(isset($array_res['user']['user_email'])&&$array_res['user']['user_email']!=''){
                    SendMail($array_res['user']['user_email'], $message_tiepthi, 'Azbooking.vn – Thông báo đơn hàng tiếp thị liên kết');
                }
                SendMail($email, $message, 'Azbooking.vn – Xác nhận đặt tour');
                redict($link_chitiet_don_hang);
            }

        }

    }
}

$data['menu'] = menu_getByTop('', '', '');
$data['config'] = config_getByTop(1, '', '');
$active = '';
$date_now = _returnGetDateTime();

$data['tab_tour_title'] = 'active_tab_left';
$data['tab_khachsan_title'] = '';
$data['tab_tintuc_title'] = '';

$data['tab_tour'] = '';
$data['tab_khachsan'] = 'hidden';
$data['tab_tintuc'] = 'hidden';

$name = $data['menu'][15]->name;
$data['banner'] = array(
    'banner_img' => _returnCheckLinkImg($data['menu'][15]->img),
    'name' => $name,
    'url' => '<li><a href="' . SITE_NAME . '">Trang chủ</a></li><li><span>' . $name . '</span></li>'
);
$data['link_anh'] = _returnCheckLinkImg($data['menu'][15]->img);

$title = $data['menu'][15]->title;
$description = $data['menu'][15]->description;
$keyword = $data['menu'][15]->keyword;

$title = ($title) ? $title : 'Azbooking.vn';
$description = ($description) ? $description : 'Azbooking.vn';
$keywords = ($keyword) ? $keyword : 'Azbooking.vn';
show_header($title, $description, $keywords, $data);
show_menu($data, $active);
show_banner($data);
show_dattour($data);
//show_left_danhmuc($data);
show_footer($data);

function returnArray_price($price, $array_price_return = array())
{
    $array_check_item = array();
    if ($price != '') {
        $array_price = explode(',', $price);
        if (count($array_price) > 0) {
            foreach ($array_price as $row) {
                if ($row != '') {
                    $array_item = explode('-', $row);
                    if (count($array_item) > 0) {
                        if (isset($array_item[0]) && isset($array_item[1]) && $array_item[0] != '' && $array_item[1] != '') {
                            array_push($array_check_item, $array_item[0]);
                            $array_item = array(
                                '"' . $array_item[0] . '"' => $array_item[1]
                            );
                            $array_price_return = array_merge($array_price_return, $array_item);
                        }
                    }
                }
            }
        }
    }
    if (count($array_check_item) > 0) {
        $item_0 = array(
            '"0"' => $array_check_item
        );
        $array_price_return = array_merge($array_price_return, $item_0);
    }

    return $array_price_return;
}

function price_new($num_nguoi_lon, $array_price_so_nguoi, $price_new)
{
    if (isset($array_price_so_nguoi['"0"'])) {
        $array_key = $array_price_so_nguoi['"0"'];
        if (in_array($num_nguoi_lon, $array_key)) {
            if (isset($array_price_so_nguoi['"' . $num_nguoi_lon . '"'])) {
                $price_new = $array_price_so_nguoi['"' . $num_nguoi_lon . '"'];
            }
        } else {
            foreach ($array_key as $row_songuoi) {
                $check_lon_hon = strstr($row_songuoi, ">");
                if ($check_lon_hon != '') {
                    $number_lonhon = str_replace('>', '', $check_lon_hon);
                    if ($num_nguoi_lon >= $number_lonhon) {
                        $price_new = $array_price_so_nguoi['"' . $row_songuoi . '"'];
                    }
                }
            }

        }
    }
    return $price_new;
}

function link_tourdetail_ajax($app, $name_url = '', $name2_url = '')
{
    if ($app->tour_quoc_te == 0) {

        $link = '/tour-du-lich-trong-nuoc/';
    } else {
        $link = '/tour-du-lich-quoc-te/';
    }
    if ($name2_url == '') {
        return SITE_NAME . $link . $name_url . '/' . $app->name_url . '.html';
    } else {
        return SITE_NAME . $link . $name_url . '/' . $name2_url . '/' . $app->name_url . '.html';
    }

}

