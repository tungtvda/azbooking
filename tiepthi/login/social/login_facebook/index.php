<?php
if (!defined('DIR')) require_once '../../../../config.php';
require_once DIR . '/controller/default/public.php';
require_once DIR . '/common/redict.php';
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

if (! isset($accessToken)) {
    $permissions = array('public_profile','email'); // Optional permissions
    $loginUrl = $helper->getLoginUrl(SITE_NAME.'/tiep-thi-lien-ket/facebook/', $permissions);
    header("Location: ".$loginUrl);
  exit;
}

try {
  // Returns a `Facebook\FacebookResponse` object
  $fields = array('id', 'name', 'email','gender');
  $response = $fb->get('/me?fields='.implode(',', $fields).'', $accessToken);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  $mess='Graph returned an error: ' . $e->getMessage();
  redict(SITE_NAME.'/tiep-thi-lien-ket/thanh-vien/?type=error&mess='.$mess);
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  $mess= 'Facebook SDK returned an error: ' . $e->getMessage();
  redict(SITE_NAME.'/tiep-thi-lien-ket/thanh-vien/?type=error&mess='.$mess);
}

$user = $response->getGraphUser();
if(isset($user['id'])&&isset($user['name'])&&isset($user['email'])){
  if($user['id']!=''&&$user['name']!=''&&$user['email']!=''){
    $string_info_booking="id=".$user['id'];
    $string_info_booking.="&email=".$user['email'];
    $string_info_booking.="&name=".$user['name'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, SITE_NAME_MANAGE."/azbooking-login-facebook.html");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $string_info_booking);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($ch);
    curl_close($ch);
    $check_login=json_decode($res,true);
  }else{
    $mess='Đăng nhập facebook thất bại, bạn vui lòng thử lại hoặc đăng ký tài khoản của AZBOOKING.VN';
    redict(SITE_NAME.'/tiep-thi-lien-ket/thanh-vien/?type=error&mess='.$mess);
  }
}else{
  $mess='Đăng nhập facebook thất bại, bạn vui lòng thử lại hoặc đăng ký tài khoản của AZBOOKING.VN';
  redict(SITE_NAME.'/tiep-thi-lien-ket/thanh-vien/?type=error&mess='.$mess);
}

echo '<br />Faceook ID: ' . $user['id'];
echo '<br />Faceook Name: ' . $user['name'];
echo '<br />Faceook Email: ' . $user['email'];
?>