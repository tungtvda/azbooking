
<?php
require_once 'facebook/facebook.php';
?>
<meta charset="UTF-8">
<?php
LoginWithFacebook('http://azbooking.vn/common/facebook.php');
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
    }
    else
    {
        echo "<script>window.location= '".$LoginUrl."';</script>";
    }

}