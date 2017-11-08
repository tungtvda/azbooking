<?php
/**
 * Created by PhpStorm.
 * User: HPcom
 * Date: 11/8/2017
 * Time: 8:01 PM
 */

// using SendGrid's PHP Library
// https://github.com/sendgrid/sendgrid-php
require 'common/sendgrid/vendor/autoload.php';
$sendgrid = new SendGrid("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");
$email    = new SendGrid\Email();

$email->addTo("tungtv.soict@gmail.com")
    ->setFrom("tungtv.soict@gmail.com")
    ->setSubject("Sending with SendGrid is Fun")
    ->setHtml("and easy to do anywhere, even with PHP");

for($i=1;$i<50;$i++){
    $sendgrid->send($email);
}
