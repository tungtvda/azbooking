<?php
if (!defined('DIR')) require_once '../../../../config.php';
require_once DIR . '/controller/default/public.php';
require_once DIR . '/common/redict.php';
$data['config'] = config_getByTop(1, '', '');
// form send email
$title='Đăng ký - AZBOOKING.VN';
$logo = SITE_NAME . '/email_template/images/logoazboong.vn.png';
$banner = SITE_NAME . '/email_template/images/banner.jpg';
$footer = SITE_NAME . '/email_template/images/footer.png';
$title = 'AZBOOKING.VN - GIÁ RẺ VÀ SẼ LUÔN NHƯ VẬY';
$data_tour_sales = tour_getByTop(4, 'price_sales!="" ', 'id desc');
if (count($data['config']) > 0 && $data['config'][0]->Logo != '') {
  $logo = _returnCheckLinkImg($data['config'][0]->Logo);
  $banner = _returnCheckLinkImg($data['config'][0]->banner_email);
  $footer = _returnCheckLinkImg($data['config'][0]->footer_email);
  $title = $data['config'][0]->Name;
}
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
$name_customer = '[username_dangky]';
$link_dangky = '[link_dangky]';
$content_email=' <h3 style="font-weight: 600;
  font-size: 18px;
  border-bottom: 3px solid #0091EA;
  color: #0091ea;
  line-height: 1.3em;
  margin-top: 0;
  line-height: 58px;
  z-index: 9;
  text-transform: uppercase;
  text-align: center;" class="title_index">XÁC THỰC TÀI KHOẢN</h3>
                <div style="float: left;width: 100%;" class="col-xs-12 row">
                <p>Chào bạn, <b>'.$name_customer.'</b></p>
                <p>Cảm ơn bạn đã đăng ký tài khoản <span style="color: #0091ea;">AZBOOKING.VN</span>. Bạn đã sẵn sàng đăng nhập và tạo chiến dịch tiếp thị liên kết cho riêng mình.</p>
                 <p >Link đăng nhập: <a style="color: #0091ea;" href="' .SITE_NAME.'/tiep-thi-lien-ket/thanh-vien/">' .SITE_NAME.'/tiep-thi-lien-ket/thanh-vien/</a></p>
                 <p >Tên đăng nhập: <a style="color: #0091ea;" >[user_email]</a></p>
                 <p >Mật khẩu: <a style="color: #0091ea;" >[user_password]</a></p>
                <p>Trân trọng !</p>
                </div>';
$message_dangky = '<!DOCTYPE html>
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
            <div style="width: 100%;" class="container" class="container">
               '.$content_email.'
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
$message_dangky=_return_mc_encrypt($message_dangky,'','');

require_once 'Facebook/autoload.php';
$fb = new Facebook\Facebook ([
  'app_id' => '487430091415856',
  'app_secret' => '5d707964e534538158ab366a3d7e7883',
  'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getRedirectLoginHelper();

try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
$key_id_1='';
$key_id_2='';
if(isset($_GET['key_id']) && $_GET['key_id']!=''){
  $string_info_booking.="&key_id=".$_GET['key_id'];
  $key_id_1='?key_id='.$_GET['key_id'];
  $key_id_2='&key_id='.$_GET['key_id'];
}
if (! isset($accessToken)) {
    $permissions = array('public_profile','email'); // Optional permissions
    $loginUrl = $helper->getLoginUrl(SITE_NAME.'/tiep-thi-lien-ket/facebook/'.$key_id_1, $permissions);
    header("Location: ".$loginUrl);
  exit;
}

try {
  // Returns a `Facebook\FacebookResponse` object
  $fields = array('id', 'name', 'email','gender');
  $response = $fb->get('/me?fields='.implode(',', $fields).'', $accessToken);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  $mess='Graph returned an error: ' . $e->getMessage();
  redict(SITE_NAME.'/tiep-thi-lien-ket/thanh-vien/?type=error&mess='.$mess.$key_id_2);
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  $mess= 'Facebook SDK returned an error: ' . $e->getMessage();
  redict(SITE_NAME.'/tiep-thi-lien-ket/thanh-vien/?type=error&mess='.$mess.$key_id_2);
}

$user = $response->getGraphUser();
if(isset($user['id'])&&isset($user['name'])&&isset($user['email'])){
  if($user['id']!=''&&$user['name']!=''&&$user['email']!=''){
    $string_info_booking="id=".$user['id'];
    $string_info_booking.="&email=".$user['email'];
    $string_info_booking.="&name=".$user['name'];
    $string_info_booking.="&mail_create=".$message_dangky;
    if(isset($_GET['key_id']) && $_GET['key_id']!=''){
      $string_info_booking.="&key_id=".$_GET['key_id'];
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, SITE_NAME_MANAGE."/azbooking-login-facebook.html");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $string_info_booking);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($ch);
    curl_close($ch);
    $check_login=json_decode($res,true);
    if(isset($check_login['success'])&&$check_login['success']==1){
        $_SESSION['user_token']=json_encode($check_login['user_sec']);
        redict(SITE_NAME.'/tiep-thi-lien-ket/');
    }else{
        redict(SITE_NAME.'/tiep-thi-lien-ket/thanh-vien/?type=error&mess='.$check_login['mess']);
    }
  }else{
    $mess='Đăng nhập facebook thất bại, bạn vui lòng thử lại hoặc đăng ký tài khoản của AZBOOKING.VN';
    redict(SITE_NAME.'/tiep-thi-lien-ket/thanh-vien/?type=error&mess='.$mess);
  }
}else{
  $mess='Đăng nhập facebook thất bại, bạn vui lòng thử lại hoặc đăng ký tài khoản của AZBOOKING.VN';
  redict(SITE_NAME.'/tiep-thi-lien-ket/thanh-vien/?type=error&mess='.$mess);
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
?>