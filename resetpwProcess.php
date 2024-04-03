<?php

include "connection.php";

$email = $_POST["e"];
$new_password = $_POST["np"];
$new_password_confirm = $_POST["cp"];
$verify_code = $_POST["vc"];

if (empty($new_password)) {
    echo "Please enter a new password";
} else if (strlen($new_password) < 5 || strlen($new_password) > 20) {
    echo "Password must be between 5 to 20 characters";
} else if (!preg_match("/[0-9]/", $new_password)) {
    echo "Password must contain a Number";
} else if (!preg_match("/[a-z]/", $new_password)) {
    echo "Password must contain a Letter";
} else if (!preg_match("/[!,@,#,$,%,&,*]/", $new_password)) {
    echo "Password must contain a Special character";
} else if (empty($new_password_confirm)) {
    echo "Please confirm your password";
} else if ($new_password != $new_password_confirm) {
    echo "Passwords did not match";
} else if (empty($verify_code)) {
    echo "Please enter your verification code sent to your email";
} else if (strlen($verify_code) > 6) {
    echo "Verification code must have 6 characters";
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' AND `verification_code`='" . $verify_code . "'");
    $num = $rs->num_rows;

    if ($num == 1) {

        Database::iud("UPDATE `user` SET `password`='" . $new_password . "' WHERE `email`='" . $email . "'");

        echo "success";

    } else {

        echo "Invalid Email or Verification Failed.";

    }

}

?>