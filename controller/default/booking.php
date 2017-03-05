<?php

if (!defined('DIR')) require_once '../../config.php';
require_once DIR . '/model/tourService.php';
require_once DIR . '/model/booking_tourService.php';
require_once DIR . '/common/class.phpmailer.php';
require_once(DIR . "/common/Mail.php");
//require_once DIR.'/model/danhmuc_2Service.php';
$contact = "Liên hệ";
$id = checkPostParamSecurity('id');
$name_url = checkPostParamSecurity('name_url');
$date = checkPostParamSecurity('date');
$price = checkPostParamSecurity('price');
$number_adults = checkPostParamSecurity('number_adults');
$number_children = checkPostParamSecurity('number_children');
$number_children_5 = checkPostParamSecurity('number_children_5');
$total_input = checkPostParamSecurity('total_input');
$full_name = checkPostParamSecurity('full_name');
$email = checkPostParamSecurity('email');
$phone = checkPostParamSecurity('phone');
$address = checkPostParamSecurity('address');
$request = checkPostParamSecurity('request');


$dk = "id='$id' and name_url='$name_url'";
$data_tour = tour_getByTop(1, $dk, 'id desc');
if (count($data_tour) > 0) {
    $price = $data_tour[0]->price;
    $price_2 = $data_tour[0]->price_2;
    $price_3 = $data_tour[0]->price_3;
    $price_4 =$data_tour[0]->price_4;
    $price_5 = $data_tour[0]->price_5;
    $price_6 = $data_tour[0]->price_6;
    $code = $data_tour[0]->code;
    $total_price = 0;
    if ($price == '') {
        $price = 0;
    }
    if ($price_2 == '') {
        $price_2 = 0;
    }
    if ($price_3 == '') {
        $price_3 = 0;
    }
    if ($price_4 == '') {
        $price_4 = 0;
    }
    if ($price_5 == '') {
        $price_5 = 0;
    }
    if ($price_6 == '') {
        $price_6 = 0;
    }
    $price_number = 0;

    if ($number_adults == '' || $number_adults == 0) {
        $number_adults = 1;
    }
    if ($number_children == '') {
        $number_children = 0;
    }
    if ($number_children_5 == '') {
        $number_children_5 = 0;
    }
    if ($number_adults < ($number_children + $number_children_5)) {
        $total = $contact;
    } else {
        $total_member = $number_adults + $number_children + $number_children_5;
        $total = $total_member* $price;
        if ($total == 0) {
            $total = $contact;
        } else {
            $total = $total . 'vnđ';
        }
    }
    $new = new booking_tour();

    $new->tour_id = $id;
    $new->name_tour =  $data_tour[0]->name;
    $new->name_customer = $full_name;
    $new->language = '';
    $new->phone = $phone;
    $new->email = $email;
    $new->address = $address;
    $new->departure_day = $date;
    $new->adults = $number_adults;
    $new->children_5_10 = $number_children;
    $new->children_5 = $number_children_5;
    $new->price = $total_price;
    $new->total_price = $total;
    $new->request = $request;
    $new->status = 0;
    $new->created = date(DATETIME_FORMAT);
    booking_tour_insert($new);
    $link_web = SITE_NAME;
    $mes = 'Đặt tour thành công';

    $message = "";
    $subject = "Azbooking.vn – Thông báo đặt tour từ khách hàng";

    $message .= '<div style="float: left; width: 100%">

                            <p>Tên khách hàng: <span style="color: #132fff; font-weight: bold">' . $full_name . '</span>,</p>
                            <p>Email: <span style="color: #132fff; font-weight: bold">' . $email . '</span>,</p>
                            <p>Điện thoại: <span style="color: #132fff; font-weight: bold">' . $phone . '</span>,</p>
                            <p>Địa chỉ: <span style="color: #132fff; font-weight: bold">' . $address . '</span>,</p>
                            <p>Khởi hành: <span style="color: #132fff; font-weight: bold">' . $date . '</span>,</p>
                            <p>Ngày khởi hành: <span style="color: #132fff; font-weight: bold">' . _returnGetDateTime() . '</span>,</p>
                            <p>Tour: <span style="color: #132fff; font-weight: bold">' . $data_tour[0]->name . '</span>,</p>
                            <p>Mã tour: <span style="color: #132fff; font-weight: bold">' . $code . '</span>,</p>
                             <p>Giá: <span style="color: #132fff; font-weight: bold">' . $price . '</span>,</p>
                             <p>Người lớn: <span style="color: #132fff; font-weight: bold">' . $number_adults . '</span>,</p>
                             <p>Trẻ em: <span style="color: #132fff; font-weight: bold">' . $number_children . '</span>,</p>
                             <p>Trẻ em dưới 5 tuổi: <span style="color: #132fff; font-weight: bold">' . $number_children_5 . '</span>,</p>
                             <p>Tổng tiền: <span style="color: #132fff; font-weight: bold">' . $total . '</span>,</p>

                           <p>' . $request . '</p>
                        </div>';

    $message='<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    <title>Xác nhận đặt tour AZBOOKING</title>
</head>
<body>
<div style="width: 1000px;  margin:auto" class="site-content">
    <header style="position: relative;z-index: 999; background: white;text-align: center; padding: 10px 0 3px;" class="site-header">
        <div style="" class="container">
            <a href="http://azbooking.vn" class="branding">
                <img style="width: 20%"
                     src="http://azbooking.vn/view/admin/Themes/kcfinder/upload/images/cauhinh/logoazboong.vn.png"
                     alt="" class="logo">
            </a>
        </div>
    </header>

    <div style="float: left; width: 100%" class="hero">
        <div class="slides">
            <img style="width: 100%" src="http://azbooking.vn/email_template/images/slide-ve-may-bay-azbooking.jpg">
        </div>
    </div>

    <main class="main-content">
        <div class="fullwidth-block">
            <div style="width: 1000px;    margin-right: auto;
    margin-left: auto;
    padding-left: 15px;
    padding-right: 15px;" class="container" class="container">
                <h3 style="font-weight: 600;
  font-size: 18px;
  border-bottom: 3px solid #0091EA;
  color: #0091ea;
  line-height: 1.3em;
  margin-top: 0;
  line-height: 58px;
  z-index: 9;
  text-transform: uppercase;
  text-align: center;" class="title_index">Kính chào quý khách Trần Văn Tùng!</h3>
                <div style="float: left;width: 100%; padding-left: 10px; padding-right: 10px" class="col-xs-12 row">
                    <p style="font-weight: bold;line-height: 25px;"><span style="color: #0091ea;">AZBOOKING.VN</span> vừa nhận được yêu cầu
                        đặt tour <span style="color: #0091ea;">"tungtv"</span> của quý khách đặt ngày <span
                                style="color: #0091ea;">Tuesday December 27,2016</span>.
                        Chúng tôi sẽ gửi thông báo và liên hệ với quý khách trong thới gian sớm nhất, Xin cảm ơn!.</br>
                        Dưới đây là thông tin đặt tour:
                    </p>
                </div>
                <div class="row" style="float: left; width: 100%; display: inline">
                    <div class="col-md-6 col-sm-6 col-xs-12" style="float: left;width: 48%; padding-left: 10px; padding-right: 10px">
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
                                font-weight: bold;">Trần Văn Tùng</span></td>
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
                                font-weight: bold;">Trần Văn Tùng</span></td>
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
                                font-weight: bold;">Trần Văn Tùng</span></td>
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
                                font-weight: bold;">Trần Văn Tùng</span></td>
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
                                font-weight: bold;">Trần Văn Tùng</span></td>
                            </tr>

                        </table>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12" style="float: left;width: 48%; padding-left: 10px; padding-right: 10px">
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
                                border-top: 1px solid #ddd;"><span style=" color: #0091ea;
                                font-weight: bold;">Trần Văn Tùng</span></td>
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
                                font-weight: bold;">Trần Văn Tùng</span></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;">Đơn giá</td>
                                <td style="width: 70%;padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;"><span style=" color: #0091ea;
                                font-weight: bold;">Trần Văn Tùng</span></td>
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
                                font-weight: bold;">Trần Văn Tùng</span></td>
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
                             ">3 người lới | 1 trẻ em | 2 trẻ em dưới 5 tuổi</span></td>
                            </tr>
                        </table>

                        <div style="font-weight:bold;font-size16pxfloat: right; width: 95%;margin-top: 20px;margin-bottom: 30px ; border: 1px solid #ddd; padding: 10px">
                            Tổng tiền: <span style="color: red">12312312312 vnđ</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="fullwidth-block">
            <div style="    width: 1000px;    margin-right: auto;
    margin-left: auto;
    padding-left: 15px;
    padding-right: 15px;" class="container">
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
                        href="http://azbooking.vn/tour-du-lich-quoc-te/">Xem thêm...</a></h3>

                <div style="float: left; width: 100%" class="row">

                    <div style="width: 23%;float: left;padding-left: 10px; padding-right: 10px" class="col-md-3 col-sm-6">
                        <div style="    text-align: center;
    margin-bottom: 30px;" class="news">
                            <a href=""><img title="" alt="" style="    width: 100%;
    max-width: 100%;
    height: auto;
    margin-bottom: 20px;" class="news-image" src="http://azbooking.vn/email_template/images/family-7.jpg"></a>
                            <h3 title="" style="font-size: 1em;text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
    margin: 0 0 10px;" class="news-title"><a style="text-decoration: none;" href="#">laboris nisi ut aliquip asdfk asdfjklasd fkjasdfkl asdk asdfh kasdfh kasdf</a></h3>
                            <small class="date">
                                <ins><span class="amount" style="color: red; font-size: 14px; font-weight: bold">71.990.000 vnđ</span></ins> | <del><span class="amount" style="    color: #B1B1B1;">74.990.000 vnđ</span></del>
                            </small>
                            <p style="text-align: left">
                                Thời gian: 3 ngày 2 đêm
                            </p>
                            <p style="text-align: left" >
                                Khởi hành:
                            </p>
                        </div>
                    </div>
                    <div style="width: 23%;float: left;padding-left: 10px; padding-right: 10px" class="col-md-3 col-sm-6">
                        <div style="    text-align: center;
    margin-bottom: 30px;" class="news">
                            <a href=""><img title="" alt="" style="    width: 100%;
    max-width: 100%;
    height: auto;
    margin-bottom: 20px;" class="news-image" src="http://azbooking.vn/email_template/images/family-7.jpg"></a>
                            <h3 title="" style="font-size: 1em;text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
    margin: 0 0 10px;" class="news-title"><a style="text-decoration: none;" href="#">laboris nisi ut aliquip asdfk asdfjklasd fkjasdfkl asdk asdfh kasdfh kasdf</a></h3>
                            <small class="date">
                                <ins><span class="amount" style="color: red; font-size: 14px; font-weight: bold">71.990.000 vnđ</span></ins> | <del><span class="amount" style="    color: #B1B1B1;">74.990.000 vnđ</span></del>
                            </small>
                            <p style="text-align: left">
                                Thời gian: 3 ngày 2 đêm
                            </p>
                            <p style="text-align: left" >
                                Khởi hành:
                            </p>
                        </div>
                    </div>
                    <div style="width: 23%;float: left;padding-left: 10px; padding-right: 10px" class="col-md-3 col-sm-6">
                        <div style="    text-align: center;
    margin-bottom: 30px;" class="news">
                            <a href=""><img title="" alt="" style="    width: 100%;
    max-width: 100%;
    height: auto;
    margin-bottom: 20px;" class="news-image" src="http://azbooking.vn/email_template/images/family-7.jpg"></a>
                            <h3 title="" style="font-size: 1em;text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
    margin: 0 0 10px;" class="news-title"><a style="text-decoration: none;" href="#">laboris nisi ut aliquip asdfk asdfjklasd fkjasdfkl asdk asdfh kasdfh kasdf</a></h3>
                            <small class="date">
                                <ins><span class="amount" style="color: red; font-size: 14px; font-weight: bold">71.990.000 vnđ</span></ins> | <del><span class="amount" style="    color: #B1B1B1;">74.990.000 vnđ</span></del>
                            </small>
                            <p style="text-align: left">
                                Thời gian: 3 ngày 2 đêm
                            </p>
                            <p style="text-align: left" >
                                Khởi hành:
                            </p>
                        </div>
                    </div>
                    <div style="width: 23%;float: left;padding-left: 10px; padding-right: 10px" class="col-md-3 col-sm-6">
                        <div style="    text-align: center;
    margin-bottom: 30px;" class="news">
                            <a href=""><img title="" alt="" style="    width: 100%;
    max-width: 100%;
    height: auto;
    margin-bottom: 20px;" class="news-image" src="http://azbooking.vn/email_template/images/family-7.jpg"></a>
                            <h3 title="" style="font-size: 1em;text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
    margin: 0 0 10px;" class="news-title"><a style="text-decoration: none;" href="#">laboris nisi ut aliquip asdfk asdfjklasd fkjasdfkl asdk asdfh kasdfh kasdf</a></h3>
                            <small class="date">
                                <ins><span class="amount" style="color: red; font-size: 14px; font-weight: bold">71.990.000 vnđ</span></ins> | <del><span class="amount" style="    color: #B1B1B1;">74.990.000 vnđ</span></del>
                            </small>
                            <p style="text-align: left">
                                Thời gian: 3 ngày 2 đêm
                            </p>
                            <p style="text-align: left" >
                                Khởi hành:
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </main>

    <footer class="site-footer">
        <div style="    width: 1000px;    margin-right: auto;
    margin-left: auto;
    padding-left: 15px;
    padding-right: 15px;" class="container">
            <div class="row">
               <img style="width: 100%;" src="http://azbooking.vn/email_template/images/logo_footer.png">
            </div>
        </div>
    </footer>
</div>
</body>
</html>';

//    SendMail('hoangthuy@mixtourist.com.vn', $message, $subject);
    SendMail('tungtv.soict@gmail.com', $message, 'Azbooking.vn – Xác nhận đặt tour');
//    SendMail($email, $message, 'Azbooking.vn – Xác nhận đặt tour');
//    echo "<script>alert('$mes')</script>";
//
//    echo "<script>window.location.href='$link_web';</script>";
    echo 1;
} else {
    echo 0;
    exit;
}

