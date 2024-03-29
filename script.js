// change view start

function changeview() {

    var loginbox = document.getElementById("loginbox");
    var registerbox = document.getElementById("registerbox");

    loginbox.classList.toggle("d-none");
    registerbox.classList.toggle("d-none");

}

// change view end

// register start

// global variables
var regSuccessModal;
var textModal = document.getElementById("textmodal");
var iconModal = document.getElementById("iconModal");
var btnModal = document.getElementById("modalbtn");
var box = document.getElementById("regSuccessBox");
// global variables

function register() {

    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var pw = document.getElementById("pw");
    var cpw = document.getElementById("confirmpw");
    var mobile = document.getElementById("mobile");
    var gender = document.getElementById("gender");

    // for redirect to login
    var loginbox = document.getElementById("loginbox");
    var registerbox = document.getElementById("registerbox");
    // for redirect to login

    // for validation

    // main validate div
    var msg1 = document.getElementById("msg4");
    var msg_div1 = document.getElementById("msgdiv4");
    // main validate div

    // for validation

    var f = new FormData();

    f.append("fn", fname.value);
    f.append("ln", lname.value);
    f.append("e", email.value);
    f.append("p", pw.value);
    f.append("cp", cpw.value);
    f.append("m", mobile.value);
    f.append("g", gender.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "success") {
                regSuccessModal = new bootstrap.Modal(box);
                iconModal.innerHTML = '<i class="bi bi-check2-circle">';
                textModal.innerHTML = "Registration Successful";
                btnModal.innerHTML = "Continue to Sign in";
                btnModal.className = "btn btn-success"
                regSuccessModal.show();
                loginbox.classList.toggle("d-none");
                registerbox.classList.toggle("d-none");
            } else {

                // msg1.innerHTML = t;
                // msg1.className = "alert-div-alerted-danger";
                // msg_div1.className = "d-block";

                regSuccessModal = new bootstrap.Modal(box);
                iconModal.innerHTML = '<i class="bi bi-x-circle"></i>';
                textModal.innerHTML = t;
                btnModal.innerHTML = "OK";
                btnModal.className = "btn btn-danger"
                regSuccessModal.show();

            }
        }
    }

    r.open("POST", "registerProcess.php", true);
    r.send(f);

}

// register show password start

function newPassword() {
    var textfield = document.getElementById("pw");
    var button = document.getElementById("npwb");

    if (textfield.type == "password") {
        textfield.type = "text";
        button.innerHTML = '<i class="bi bi-eye-slash-fill"></i>';
    } else {
        textfield.type = "password";
        button.innerHTML = '<i class="bi bi-eye-fill"></i>';
    }
}

function confirmPassword() {
    var textfield = document.getElementById("confirmpw");
    var button = document.getElementById("cpwb");

    if (textfield.type == "password") {
        textfield.type = "text";
        button.innerHTML = '<i class="bi bi-eye-slash-fill"></i>';
    } else {
        textfield.type = "password";
        button.innerHTML = '<i class="bi bi-eye-fill"></i>';
    }
}

// register show password end

// register end

// login end

function login() {

    var email = document.getElementById("e");
    var pw = document.getElementById("p");
    var rememberme = document.getElementById("rememberme");

    // for validation
    var msg1 = document.getElementById("msg1");
    var msg_div1 = document.getElementById("msgdiv1");

    var msg2 = document.getElementById("msg2");
    var msg_div2 = document.getElementById("msgdiv2");

    var msg3 = document.getElementById("msg3");
    var msg_div3 = document.getElementById("msgdiv3");
    // for validation

    var f = new FormData();

    f.append("e", email.value);
    f.append("p", pw.value);
    f.append("r", rememberme.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "success") {
                msg_div2.className = "d-none";
                msg_div3.className = "d-none";
                // msg1.innerHTML = "Signed in! Redirecting...";
                // msg1.className = "alert-div-alerted-success";
                // msg_div1.className = "d-block";

                regSuccessModal = new bootstrap.Modal(box);
                iconModal.innerHTML = '<i class="bi bi-person-fill-check"></i>';
                iconModal.className = "text-success";
                textModal.innerHTML = "Signed in! Redirecting...";
                textModal.className = "text-success"
                btnModal.className = "d-none";
                regSuccessModal.show();
                window.location = "home.php";
            } else if (t == "failed") {
                msg_div2.className = "d-none";
                msg_div3.className = "d-none";
                regSuccessModal = new bootstrap.Modal(box);
                iconModal.innerHTML = '<i class="bi bi-x-circle"></i>';
                textModal.innerHTML = "Sign in failed! Please Check your Email or Password";
                btnModal.innerHTML = "OK";
                btnModal.className = "btn btn-danger"
                regSuccessModal.show();
            } else if (t == "Please enter your Email") {
                msg2.innerHTML = t;
                msg2.className = "alert-div-alerted-error";
                msg_div2.className = "d-block";
                msg_div3.className = "d-none";
            } else if (t == "Invalid Email") {
                msg2.innerHTML = t;
                msg2.className = "alert-div-alerted-error";
                msg_div2.className = "d-block";
                msg_div3.className = "d-none";
            } else if (t == "Please enter your Password") {
                msg_div2.className = "d-none";
                msg3.innerHTML = t;
                msg3.className = "alert-div-alerted-error";
                msg_div3.className = "d-block";
            } else if (t == "Password must contain 5 to 20 characters") {
                msg_div2.className = "d-none";
                msg3.innerHTML = t;
                msg3.className = "alert-div-alerted-error";
                msg_div3.className = "d-block";
            }
        }
    }

    r.open("POST", "loginProcess.php", true);
    r.send(f);

}

// login show password

function showPassword() {

    var textfield = document.getElementById("p");
    var button = document.getElementById("pwb");

    if (textfield.type == "password") {
        textfield.type = "text";
        button.innerHTML = '<i class="bi bi-eye-slash-fill"></i>';
    } else {
        textfield.type = "password";
        button.innerHTML = '<i class="bi bi-eye-fill"></i>';
    }

}

// login show password end

// forgot password

var forgotPasswordModal;

function forgotPassword() {

    var email = document.getElementById("e");
    var modal = document.getElementById("fpModal");

    // regSuccessModal = new bootstrap.Modal(box);
    // textModal.innerHTML = "Verification code has sent to your email. Please check your inbox";
    // btnModal.innerHTML = "Reset Now";
    // regSuccessModal.show();

    // forgotPasswordModal = new bootstrap.Modal(modal);
    // forgotPasswordModal.show();

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == 'success') {
                regSuccessModal = new bootstrap.Modal(box);
                textModal.innerHTML = "Verification code has sent to your email. Please check your inbox";
                btnModal.innerHTML = "Reset Now";
                regSuccessModal.show();
                forgotPasswordModal = new bootstrap.Modal(modal);
                forgotPasswordModal.show();
            } else {
                msg1.innerHTML = t;
                msg1.className = "alert-div-alerted-danger";
                msg_div1.className = "d-block";
            }
        }

        r.open("GET", "forgotpwProcess.php?e=" + email.value, true);
        r.send();

    }

}

// forgot password

// login end

// user confirmation

var userConfirmModal;

function userConfirm() {

    // var r = new XMLHttpRequest();

    // r.open("GET", "confirmModalProcess.php?")

    var modal = document.getElementById("confirmBox");
    userConfirmModal = new bootstrap.Modal(modal);
    userConfirmModal.show();

}

var msgModal;

function userVerify() {

    var cpassword = document.getElementById("confirmPassword");
    var modal = document.getElementById("confirmBox");
    var msg_modal = document.getElementById("msgModal");
    var btn = document.getElementById("msgbtn");

    // modal text

    var iconName = document.getElementById("iconName");
    var textName = document.getElementById("textName");

    // modal text

    userConfirmModal = new bootstrap.Modal(modal);
    msgModal = new bootstrap.Modal(msg_modal);

    var f = new FormData();

    f.append("cpw", cpassword.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == 'success') {

                window.location = "profile.php";

            } else {

                iconName.innerHTML = '<i class="bi bi-x-circle"></i>';
                iconName.className = 'text-danger';
                textName.innerHTML = 'Invalid Password';
                textName.className = 'text-danger';
                msgModal.show();

            }

            if (t == 'failed') {

                iconName.innerHTML = '<i class="bi bi-x-circle"></i>';
                iconName.className = 'text-danger';
                textName.innerHTML = 'Session Expired!. Please Log in again';
                textName.className = 'text-danger';
                btn.className = 'd-none';
                msgModal.show();
                
            }
        }
    }

    r.open("POST", "confirmProcess.php", true);
    r.send(f);

}

function tryToConfirm() {

    var modal = document.getElementById("confirmBox");
    userConfirmModal = new bootstrap.Modal(modal);
    userConfirmModal.show();

}

function showPassword2() {
    
    var textfield = document.getElementById("confirmPassword");
    var button  = document.getElementById("confirmPwBtn");

    if (textfield.type == "password") {
        
        textfield.type = "text";
        button.innerHTML = '<i class="bi bi-eye-slash-fill"></i>'

    } else {

        textfield.type = "password";
        button.innerHTML = '<i class="bi bi-eye-fill"></i>'

    }

}

// user confirmation

// signout start

function signout() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "home.php";
            }
        }
    };

    r.open("GET", "logoutProcess.php", true);
    r.send();

}

// signout end

// cart

// add product to cart

function addCart(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            alert(t);
        }
    }

    r.open("GET", "cartProcess.php?id=" + id, true);
    r.send();

}

// add product to cart

// cart