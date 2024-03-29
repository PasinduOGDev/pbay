<?php

session_start();

require "connection.php";

$email = $_POST["e"];
$pw = $_POST["p"];
$rememberme = $_POST["r"];

if(empty($email)){
    echo ("Please enter your Email");
}else if(strlen($email) > 100){
    echo ("Email must contain LOWER THAN 100 characters");
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo ("Invalid Email");
}else if(empty($pw)){
    echo ("Please enter your Password");
}else if(strlen($pw) < 5 || strlen($pw) > 20){
    echo ("Password must contain 5 to 20 characters");
}else{

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' AND 
    `password`='".$pw."'");
    $n = $rs->num_rows;

    if($n == 1){

        echo ("success");
        $d = $rs->fetch_assoc();
        $_SESSION["u"] = $d;

        if($rememberme == "true"){

            setcookie("email",$email,time()+(60*60*24*365));
            setcookie("password",$pw,time()+(60*60*24*365));

        }else{

            setcookie("email","",-1);
            setcookie("password","",-1);

        }


    }else{

        echo ("failed");

    }

     
}

?>