<?php
ob_start();

include("facebook_constants.php");

$users = $facebook->getUser();

if ($users!="") {	
  try {

//	  $ch = curl_init();
//	  curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/v2.12/'.$users.'?access_token');
//	  curl_setopt($ch, CURLOPT_POST, 0);
//	  curl_setopt($ch, CURLOPT_POSTFIELDS, '');
//	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//	  $res = curl_exec($ch);
//	  print_r($res);

//    $user_profile = $facebook->api('/'.$users);
    $user_profile = $facebook->api('/'.$users.'?fields=id,first_name,last_name,picture,email');
	  print_r($user_profile);
	  exit;
	$logoutUrl = $facebook->getLogoutUrl();

	$fuserid=$user_profile["id"];
	$fusername=$user_profile["username"];

	$newtoken=base64_encode($fuserid."::".$fusername);

//	$msql = mysql_query("SELECT * FROM registration WHERE passcode='".$fuserid."'" );
//
//	if(mysql_num_rows($msql)>0){
//		$sqlrow=mysql_fetch_object($msql);
//		header('Location:my_connected_minds.php');
//	}
//	else{
//		header('Location:register_fb.php?token='.$newtoken);
//		exit;
//	}

  } catch (FacebookApiException $e) {
    $users = null;
  }
}
?>