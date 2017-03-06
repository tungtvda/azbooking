<?php

/**
 * @author vdbkpro
 * @copyright 2013
 */

require_once('class.phpmailer.php');  
function SendMail($Sendto,$Body,$Subject)
{
    $mail = new PHPMailer();
    $mail->CharSet = "UTF-8";

    $mail->IsSMTP();

    $mail->SMTPDebug = 0;

    $mail->Debugoutput = "html";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->SMTPSecure = "tls";
    $mail->SMTPAuth = true;
    $mail->Username = 'manage.system.mixtourist@gmail.com';
    $mail->Password = 'ttulgbiqnksxueze';
    $mail->SetFrom('info@mixtourist.com.vn', 'Azbooking.vn');
    $mail->AddReplyTo('info@mixtourist.com.vn', "");
    $mail->AddAddress($Sendto,'test');
    $mail->Subject = "" . $Subject . "";
    $mail->MsgHTML("" . $Body . "");
    $mail->AltBody = "" . $Subject . "";

    if (!$mail->Send()) {

    } else {

    }
}  
?>