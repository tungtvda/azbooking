<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:40 PM
 */
if(!defined('SITE_NAME'))
{
    require_once '../../config.php';
}

require_once DIR.'/controller/default/public.php';
require_once DIR . '/common/class.phpmailer.php';
require_once(DIR . "/common/Mail.php");
$data['menu']=menu_getByTop('','','');
$data['config']=config_getByTop(1,'','');
if (isset($_POST['name'])) {

    $ten=addslashes(strip_tags($_POST['name']));
    $email=addslashes(strip_tags($_POST['email']));
    $dienthoai=addslashes(strip_tags($_POST['phone']));
    $title=addslashes(strip_tags($_POST['title']));
    $noidung=addslashes(strip_tags($_POST['content']));
    if($ten==""||$email==""||$dienthoai=="")
    {
        echo 0;
        exit;
    }
    else
    {
        $new = new contact();
        $new->name_kh=$ten;
        $new->email=$email;
        $new->phone=$dienthoai;
        $new->address='';
        $new->content=$noidung;
        $new->title=$title;
        $new->status=0;
        $new->created=date(DATETIME_FORMAT);
        contact_insert($new);
        $link_web=SITE_NAME;
        $subject = "Azbooking.vn thông báo liên hệ từ khách hàng";
        $message='';
        $message .='<div style="float: left; width: 100%">

                            <p>Tên khách hàng: <span style="color: #132fff; font-weight: bold">'.$ten.'</span>,</p>
                            <p>Email: <span style="color: #132fff; font-weight: bold">'.$email.'</span>,</p>
                            <p>Số điện thoại: <span style="color: #132fff; font-weight: bold">'.$dienthoai.'</span>,</p>

                            <p>Ngày gửi: <span style="color: #132fff; font-weight: bold">'.date(DATETIME_FORMAT).'</span>,</p>
                            <p>Tiêu đề: '.$title.'</p>
                            <p>'.$noidung.'</p>


                        </div>';
        SendMail(SEND_EMAIL, $message, $subject);
//        SendMail('tungtv.soict@gmail.com', $message, $subject);
        echo 1;
        exit;
//        echo "<script>alert('Azbooking.vn cảm ơn quý khách đã gửi liên hệ đến chúng tôi, Azbooking.vn sẽ liên hệ với bạn sớm nhất, xin cảm ơn!')</script>";
//
//        echo "<script>window.location.href='$link_web';</script>";

    }
}else{
    echo 0;
}