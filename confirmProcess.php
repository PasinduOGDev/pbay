<?php

session_start();
include "connection.php";

if (isset ($_SESSION["u"])) {
    $email = $_SESSION["u"]["email"];

    $password_rs = Database::search("SELECT `password` FROM `user` WHERE `email`='".$email."'");
    $password_num = $password_rs->num_rows;

    if ($password_num == 1) {
        
        echo ('success');

    }

} else {

    echo ("failed");

}

?>