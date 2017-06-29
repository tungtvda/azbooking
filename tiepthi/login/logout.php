<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 6/29/2017
 * Time: 2:05 PM
 */
if (!defined('DIR')) require_once '../../config.php';
require_once DIR . '/common/redict.php';
if(isset($_COOKIE['user_token'])){
    setcookie('user_token', 'value', time() - (86400 * 30),'/', "",  0); // 86400 = 1 day
}
if(isset($_SESSION['user_token'])){
    unset($_SESSION['user_token']);
}

redict(SITE_NAME);