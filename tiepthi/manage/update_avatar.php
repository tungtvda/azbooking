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
if(isset($_POST['avatar'])){
    $data_user=json_decode($_SESSION['user_token'],true);
    $data_user['avatar']=_returnPostParamSecurity('avatar');
    $_SESSION['user_token']=json_encode($data_user['avatar']);
    $_SESSION['user_token']=json_encode($data_user['avatar']);
    echo 1;
    exit;
}
echo 0;