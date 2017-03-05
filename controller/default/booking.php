<?php

if (!defined('DIR')) require_once '../../config.php';
require_once DIR . '/model/tourService.php';
require_once DIR . '/model/booking_tourService.php';
require_once DIR . '/model/configService.php';
require_once DIR . '/model/danhmuc_1Service.php';
require_once DIR . '/model/danhmuc_2Service.php';
require_once DIR . '/common/class.phpmailer.php';
require_once(DIR . "/common/Mail.php");
//require_once DIR.'/model/danhmuc_2Service.php';
$logo=SITE_NAME.'/email_template/images/logoazboong.vn.png';
$banner=SITE_NAME.'/email_template/images/banner.jpg';
$footer=SITE_NAME.'/email_template/images/footer.png';
$title='AZBOOKING.VN - GIÁ RẺ VÀ SẼ LUÔN NHƯ VẬY';
$data_config=config_getByTop(1,'','');
if(count($data_config)>0&&$data_config[0]->Logo!=''){
    $logo=SITE_NAME.$data_config[0]->Logo;
    $banner=SITE_NAME.$data_config[0]->banner_email;
    $footer=SITE_NAME.$data_config[0]->footer_email;
    $title=SITE_NAME.$data_config[0]->name;
}
$data_tour_sales=tour_getByTop(4,'price_sales!="" ','id desc');
$tour_string='';
if(count($data_tour_sales)>0){
    foreach($data_tour_sales as $row_tour){
        $name_list_tour=$row_tour->name;
        $price_list='';
        if($row_tour->price==0||$row_tour->price==''){
            $price_list='Liên hệ';
        }
        else{
            $price_list=number_format((int)$row_tour->price,0,",",".").' vnđ';
        }
        $price_list_sales=number_format((int)$row_tour->price_sales,0,",",".").' vnđ';
        $durations=$row_tour->durations;
        $data_danhmuc_1=danhmuc_1_getById($row_tour->DanhMuc1Id);
        $data_danhmuc_2=danhmuc_2_getById($row_tour->DanhMuc2Id);
        $name_url_dm1='';
        if(count($data_danhmuc_1)>0){
            $name_url_dm1=$data_danhmuc_1[0]->name_url;
        }
        $name_url_dm2='';
        if(count($data_danhmuc_2)>0){
            $name_url_dm2=$data_danhmuc_2[0]->name_url;
        }
        $link_tour_list=link_tourdetail_ajax($row_tour,$name_url_dm1,$name_url_dm2);
        $img_list=SITE_NAME.$row_tour->img;
        $tour_string.='<div style="width: 23%;float: left;padding-left: 10px; padding-right: 10px" class="col-md-3 col-sm-6">
                        <div style="    text-align: center;
    margin-bottom: 30px;" class="news">
                            <a href="'.$link_tour_list.'"><img title="'.$name_list_tour.'" alt="'.$name_list_tour.'" style="    width: 100%;
    max-width: 100%;
    height: 160px;
    margin-bottom: 20px;" class="news-image" src="'.$img_list.'"></a>
                            <h3 title="'.$name_list_tour.'" style="font-size: 1em;text-overflow: ellipsis; text-align: left;
    overflow: hidden;
    white-space: nowrap;
    margin: 0 0 10px;" class="news-title"><a style="text-decoration: none;" href="'.$link_tour_list.'">'.$name_list_tour.'</a></h3>
                            <small class="date">
                                <ins><span class="amount" style="color: red; font-size: 14px; font-weight: bold">'.$price_list.'</span></ins> | <del><span class="amount" style="    color: #B1B1B1;">'.$price_list_sales.'</span></del>
                            </small>
                            <p style="text-align: left">
                                Thời gian: '.$durations.'
                            </p>
                        </div>
                    </div>';
    }
}
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
            $total = number_format((int)$total,0,",",".").' vnđ';
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
    $new->price = $price;
    $new->total_price = $total;
    $new->request = $request;
    $new->status = 0;
    $new->created = date(DATETIME_FORMAT);
    booking_tour_insert($new);
    $link_web = SITE_NAME;
    $mes = 'Đặt tour thành công';
    if($price!=0&&$price!='Liên hệ'&&$price!='liên hệ'){
        $price =number_format((int)$price,0,",",".").' vnđ';
    }
    else{
        $price='Liên hệ';
    }
    $data_danhmuc_1_detail=danhmuc_1_getById($data_tour[0]->DanhMuc1Id);
    $data_danhmuc_2_detail=danhmuc_2_getById($data_tour[0]->DanhMuc2Id);
    $name_url_dm1_detail='';
    if(count($data_danhmuc_1_detail)>0){
        $name_url_dm1_detail=$data_danhmuc_1_detail[0]->name_url;
    }
    $name_url_dm2_detail='';
    if(count($data_danhmuc_2_detail)>0){
        $name_url_dm2_detail=$data_danhmuc_2_detail[0]->name_url;
    }
    $link_tour_list_detail=link_tourdetail_ajax($data_tour[0],$name_url_dm1_detail,$name_url_dm2_detail);
    $message = "";
    $subject = "Azbooking.vn – Thông báo đặt tour từ khách hàng";
    $message.='<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    <title>'.$title.'</title>
</head>
<body>
<div style="width: 1000px;  margin:auto" class="site-content">
    <header style="position: relative;z-index: 999; background: white;text-align: center; padding: 10px 0 3px;" class="site-header">
        <div style=" text-align: center" >
            <a style=" text-align: center" href="'.SITE_NAME.'" >
                <img title="'.$title.'" style="width: 20%"
                     src="'.$logo.'"
                     alt="'.$title.'">
            </a>
        </div>
    </header>

    <div style="float: left; width: 100%" class="hero">
        <div class="slides">
            <img style="width: 100%" src="'.$banner.'">
        </div>
    </div>

    <main style="float: left; width: 100%" class="main-content">
        <div class="fullwidth-block">
            <div style="width: 100%;" class="container" class="container">
                <h3 style="font-weight: 600;
  font-size: 18px;
  border-bottom: 3px solid #0091EA;
  color: #0091ea;
  line-height: 1.3em;
  margin-top: 0;
  line-height: 58px;
  z-index: 9;
  text-transform: uppercase;
  text-align: center;" class="title_index">Kính chào quý khách ' . $full_name . '!</h3>
                <div style="float: left;width: 100%;" class="col-xs-12 row">
                    <p style="font-weight: bold;line-height: 25px;"><span style="color: #0091ea;">AZBOOKING.VN</span> vừa nhận được yêu cầu
                        đặt tour <span style="color: #0091ea;">"' . $data_tour[0]->name . '"</span> của quý khách đặt ngày <span
                                style="color: #0091ea;">' . date('d-m-Y H:i:s', strtotime(_returnGetDateTime())) . '</span>.
                        Chúng tôi sẽ gửi thông báo và liên hệ với quý khách trong thới gian sớm nhất, Xin cảm ơn!.</br>
                        Dưới đây là thông tin đặt tour:
                    </p>
                </div>
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
                                font-weight: bold;">' . $full_name . '</span></td>
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
                                border-top: 1px solid #ddd;"><a href="'.$link_tour_list_detail.'"><span style=" color: #0091ea;
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
                                font-weight: bold;">' . $code . '</span></td>
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
                                font-weight: bold;">' . $price . '</span></td>
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
                                font-weight: bold;">'.date('d-m-Y', strtotime($date)).'</span></td>
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
                             ">' . $number_adults . ' người lới | ' . $number_children . ' trẻ em | ' . $number_children_5 . ' trẻ em dưới 5 tuổi</span></td>
                            </tr>
                        </table>

                        <div style="font-weight:bold;font-size16pxfloat: right; width: 95%;margin-top: 20px;margin-bottom: 30px ; border: 1px solid #ddd; padding: 10px">
                            Tổng tiền: <span style="color: red">'.$total.'</span>
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
                        href="'.SITE_NAME.'/tour-du-lich-quoc-te/">Xem thêm...</a></h3>

                <div style="float: left; width: 100%" class="row">

                   '.$tour_string.'

                </div>
            </div>
        </div>

    </main>

    <footer class="site-footer">
        <div style="    width: 100%;" class="container">
            <div class="row">
               <img title="'.$title.'" style="width: 100%;" src="'.$footer.'">
            </div>
        </div>
    </footer>
</div>
</body>
</html>';
    SendMail('info@mixtourist.com.vn', $message, $subject);
//    SendMail('hoangthuy@mixtourist.com.vn', $message, $subject);
//    SendMail('tungtv.soict@gmail.com', $message, 'Azbooking.vn – Xác nhận đặt tour');
    SendMail($email, $message, 'Azbooking.vn – Xác nhận đặt tour');
//    echo "<script>alert('$mes')</script>";
//
//    echo "<script>window.location.href='$link_web';</script>";
    echo 1;
} else {
    echo 0;
    exit;
}

function link_tourdetail_ajax($app,$name_url='',$name2_url='')
{
    if($app->tour_quoc_te==0){

        $link='/tour-du-lich-trong-nuoc/';
    }else{
        $link='/tour-du-lich-quoc-te/';
    }
    if($name2_url==''){
        return SITE_NAME.$link.$name_url.'/'.$app->name_url.'.html';
    }
    else{
        return SITE_NAME.$link.$name_url.'/'.$name2_url.'/'.$app->name_url.'.html';
    }

}