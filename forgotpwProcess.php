<?php

require "connection.php";
require "SMTP.php";
require "Exception.php";
require "PHPMailer.php";

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_GET["e"])) {

    $email = $_GET["e"];

    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "'");
    $n = $rs->num_rows;

    if ($n == 1) {
        $vcode = uniqid();
        Database::iud("UPDATE `user` SET `verification_code`='" . $vcode . "' WHERE `email`='" . $email . "'");

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'eziosoftwaresolutions.sl@gmail.com';
        $mail->Password = 'qpqjoruwasaempkv';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('eziosoftwaresolutions.sl@gmail.com', 'Reset Password');
        $mail->addReplyTo('eziosoftwaresolutions.sl@gmail.com', 'Reset Password');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'pBay Forgot Password Verification';
        $bodyContent = '<div style="border: 1px solid black; text-align: center;">
    
        <img src="img/logo/logo.png" width="50px" style="text-align: center;">

        <div>
            <p style="font-family: sans-serif;">'.$email.',</p>
        </div>

        <div>
            <p style="font-family: sans-serif;">Thank you for using pBay Shopping Application</p>
        </div>

        <div>
            <h3 style="font-family: sans-serif;">Your Verification code is: ' . $vcode . ' </h3>
        </div>

        <div>
            <p style="font-family: sans-serif;">Thank your for using pBay...</p>
            <p style="font-family: sans-serif;">Copyright &copy; 2023 pBay&trade; All Rights Reserved.</p>
        </div>

    </div>';
        $mail->Body = $bodyContent;

        if (!$mail->send()) {
            echo 'Verification code sending failed';
        } else {
            echo 'success';
        }

    } else {
        echo "Invalid Email Address";
    }
}

?>