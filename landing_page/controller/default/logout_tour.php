<?php
if (!defined('SITE_NAME')) {
    require_once '../../config.php';
}
session_start();
session_destroy();
header('location:'.SITE_NAME);
?>
