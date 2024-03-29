<?php

require "connection.php";

$fname = $_POST["fn"];
$lname = $_POST["ln"];
$email = $_POST["e"];
$pw = $_POST["p"];
$confirmpw = $_POST["cp"];
$mobile = $_POST["m"];
$gender = $_POST["g"];

if (empty($fname)) {
    echo  "Please enter your First Name";
} else if (strlen($fname) > 50) {
    echo ("First Name must contain LOWER THAN 100 characters");
} else if (empty($lname)) {
    echo "Please enter your Last Name or Surname";
} else if (strlen($lname) > 50) {
    echo ("Surname must contain LOWER THAN 100 characters");
} else if (empty($email)) {
    echo "Please enter an Email";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Please enter a Valid Email";
} else if (strlen($email) > 100) {
    echo ("Email must contain LOWER THAN 100 characters");
} else if (empty($pw)) {
    echo "Please enter a Password";
} else if (strlen($pw) < 5 || strlen($pw) > 20) {
    echo ("Password must contain 5 to 20 characters");
} else if (empty($confirmpw)) {
    echo "Please confirm your Password";
} else if ($pw != $confirmpw) {
    echo "Password did not match";
} else if (!preg_match("/[0-9]/", $pw)) {
    echo "Password must contain a Number";
} else if (!preg_match("/[a-z]/", $pw)) {
    echo "Password must contain a Letter";
} else if (!preg_match("/[!,@,#,$,%,&,*]/", $pw)) {
    echo "Password must contain a Special character";
} else if (empty($mobile)) {
    echo "Please enter a Mobile Number";
} else if (!preg_match("/07[0,1,2,4,5,6,7,8][0-9]/", $mobile)) {
    echo "Please enter a valid Mobile Number";
} else if (strlen($mobile) != 10) {
    echo "Mobile Number must contain 10 characters";
} else if (empty($gender)) {
    echo "Please Select your Gender";
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' OR 
    `mobile`='" . $mobile . "'");
    $n = $rs->num_rows;

    if ($n > 0) {
        echo ("User with the same email address or mobile number already exists");
    } else {

        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        Database::iud("INSERT INTO `user` (`fname`,`lname`,`email`,`password`,`mobile`,`joined_date`,`gender_gender_id`,`status_status_id`)
        VALUES ('" . $fname . "','" . $lname . "','" . $email . "','" . $pw . "','" . $mobile . "',
        '" . $date . "','".$gender."','1')");

        echo ("success");
    }
}
