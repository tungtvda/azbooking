<?php
if (!defined('DIR')) require_once '../../../../../config.php';
require_once DIR . '/controller/default/public.php';
require_once DIR . '/common/redict.php';
include("facebook_constants.php");
$users = $facebook->getUser();
$key_url='';
if(isset($_GET['key_id']) && $_GET['key_id']!=''){
	$key_url='&key_id=dang-ky';
}
$mess='';

if ($users!="") {
  try {
	  $user = $facebook->api('/'.$users.'?fields=id,first_name,last_name,picture,email');

	  $full_name='';
	  if(isset($user['first_name']) && $user['first_name']!=''){
		  $full_name=$user['first_name'];
	  }
	  if(isset($user['last_name']) && $user['last_name']!=''){
		  if($full_name){
			  $full_name.=' '.$user['last_name'];
		  }else{
			  $full_name=$user['last_name'];
		  }

	  }

	  if(isset($user['email'])){
		  if($user['email']!=''){
			  if($full_name==''){
				  $full_name=$user['email'];
			  }
			  $avatar='';
			  if(isset($user['picture']['data']['url'])){
				  if($user['picture']['data']['url']!='' && strlen($user['picture']['data']['url'])<=255){
					  $avatar=$user['picture']['data']['url'];
				  }
			  }
			  $string_info_booking="id=".$user['id'];
			  $string_info_booking.="&email=".$user['email'];
			  $string_info_booking.="&name=".$full_name;
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
				  redict(SITE_NAME.'/tiep-thi-lien-ket/thanh-vien/?type=error&mess='.$check_login['mess'].$key_url);
			  }
		  }else{
			  $mess='Đăng nhập facebook thất bại, bạn vui lòng thử lại hoặc đăng ký tài khoản của AZBOOKING.VN';
			  redict(SITE_NAME.'/tiep-thi-lien-ket/thanh-vien/?type=error&mess='.$mess.$key_url);
		  }
	  }else{
		  $mess='Đăng nhập facebook thất bại, hệ thống không thể lấy được email của bạn, bạn hãy để email ở chế độ công khai';
		  redict(SITE_NAME.'/tiep-thi-lien-ket/thanh-vien/?type=error&mess='.$mess.$key_url);
	  }
	$logoutUrl = $facebook->getLogoutUrl();
  } catch (FacebookApiException $e) {
	  $mess='Đăng nhập facebook thất bại, bạn hãy thử lại hoặc đăng ký tài khoản trên hệ thống AZBOOKING.VN';
	  redict(SITE_NAME.'/tiep-thi-lien-ket/thanh-vien/?type=error&mess='.$mess.$key_url);
  }
}else{
	$mess='Đăng nhập facebook thất bại, bạn hãy thử lại hoặc đăng ký tài khoản trên hệ thống AZBOOKING.VN';
	redict(SITE_NAME.'/tiep-thi-lien-ket/thanh-vien/?type=error&mess='.$mess.$key_url);
}
?>