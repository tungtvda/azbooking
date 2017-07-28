
<?php
if(!defined('DIR')) require_once '../../../../config.php';
require_once DIR.'/common/facebook/facebook.php';
require_once DIR.'/controller/default/public.php';
?>
<meta charset="UTF-8">
<?php
LoginWithFacebook(SITE_NAME.'/tiepthi/login/social/login_facebook/facebook.php');

//
function LoginWithFacebook($RerurnURL)//login với facebook
{

    $config=array();
    $config['appId']='487430091415856';
    $config['secret']='5d707964e534538158ab366a3d7e7883';
    $config['cookie']=true;
    $facebook=new Facebook($config);
    $user=$facebook->getUser();
    $LoginUrl= $facebook->getLoginUrl(array('scope'=>'email','redirect_uri' => $RerurnURL));
    if ($user)
    {
        $user_profile = $facebook->api('/me');
        print_r($user_profile);

    }
    else
    {
        echo "<script>window.location= '".$LoginUrl."';</script>";
    }

}