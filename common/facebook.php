
<?php
require_once 'facebook/facebook.php';
?>
<meta charset="UTF-8">
<?php
LoginWithFacebook('http://tourdulichtrungquoc.net/common/facebook.php');
//
function LoginWithFacebook($RerurnURL)//login với facebook
{

    $config=array();
    $config['appId']='1484117075216071';
    $config['secret']='5f41d2f02d08e4b418fa89df803c16a8';
    $config['cookie']=true;
    $facebook=new Facebook($config);
    $user=$facebook->getUser();
    print_r($user);
    exit;
//    $LoginUrl= $facebook->getLoginUrl(array('scope'=>'email','redirect_uri' => $RerurnURL));
//    if ($user)
//    {
//        $user_profile = $facebook->api('/me');
//        print_r($user_profile);
//
//    }
//    else
//    {
//        echo "<script>window.location= '".$LoginUrl."';</script>";
//    }

}