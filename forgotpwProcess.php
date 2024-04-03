<?php

include "connection.php";

include "SMTP.php";
include "Exception.php";
include "PHPMailer.php";

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_GET["e"])) {

    $email = $_GET["e"];

    $rs = Database::search("SELECT*FROM `user` WHERE `email`='" . $email . "'");
    $n = $rs->num_rows;

    if ($n == 1) {

        $code = rand(111111, 999999);
        Database::iud("UPDATE `user` SET `verification_code`='" . $code . "' WHERE `email`='" . $email . "'");

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'pasinduogdev@gmail.com';
        $mail->Password = 'ksplmqjinrleotkp';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('pasinduogdev@gmail.com', 'Reset Password');
        $mail->addReplyTo('pasinduogdev@gmail.com', 'Reset Password');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'pBay Forgot password Verification Code';
        $bodyContent = '<div style="text-align: start;">

        <div style="margin-top: 25px;">
            <span style="font-family: sans-serif;">Hi '.$email.',</span>
            <h5 style="font-family: sans-serif;">Thank you for using pBay&trade; Shopping Application</h5>
        </div>

        <div style="border: 1px solid black; padding: 10px;">
            <h5 style="font-family: sans-serif;">Verification code: '.$code.' </h5>
            <h5 style="font-family: sans-serif; color: gray;">(Attention: Please do not share with anyone)</h5>
        </div>

        <div style="margin-top: 25px;">
            <h6 style="font-family: sans-serif;">Thank your for using pBay...</h6>
            <h6 style="font-family: sans-serif;">Copyright &copy; 2023 pBay&trade; All Rights Reserved.</h6>
        </div>

    </div>';
        $mail->Body = $bodyContent;

        if (!$mail->send()) {
            echo 'Verification code sending failed.';
        } else {
            echo 'Success';
        }

    } else {
        echo "Invalid Email Address";
    }

} else {
    echo ("Please enter your Email Address in Email Field.");
}

?>