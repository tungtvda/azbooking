<?php
/**
 * Created by PhpStorm.
 * User: HPcom
 * Date: 6/26/2017
 * Time: 7:53 PM
 */

//if (!defined('DIR')) require_once '../../config.php';
//require_once DIR . '/controller/default/public.php';

//if(isset($_SESSION['user_token'])){
//    print_r($_SESSION['user_token']);
//}
//echo "</br>";

if(isset($_COOKIE['user_token'])){
    print_r(json_decode($_COOKIE['user_token'],true));
}