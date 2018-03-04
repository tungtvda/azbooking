<?php
define("APPID","487430091415856");
define("SECRET","5d707964e534538158ab366a3d7e7883");

require 'facebook/facebook.php';

$facebook = new Facebook(array(
  'appId'  => APPID,
  'secret' => SECRET,
));


?>
