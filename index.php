<?php

require "connection.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pBay</title>

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet' />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <link rel="icon" href="img/logo/logo.png" />
</head>

<body class="body bg-dark bg-opacity-75">

    <div class="container-fluid">

        <div class="col-12 d-flex justify-content-center my-5">

            <div class="col-12 col-lg-8 h-100 card" id="loginbox">
                <div class="card-body">

                    <div class="row">

                        <div class="col-5 d-none d-md-block d-lg-block" id="background1"></div>

                        <div class="col-12 col-md-7 col-lg-7">

                            <div class="row">
                                <div class="col-12 d-flex justify-content-center">
                                    <img src="img/logo/header.png" width="50px">
                                </div>
                            </div>

                            <div class="col-12 mb-2 d-flex justify-content-center d-grid">
                                <h3 class="fw-bold">Sign in</h3>
                            </div>

                            <div class="col-12 d-none mt-3 mb-2" id="msgdiv1">
                                <div class="alert-div-alerted-error" role="alert" id="msg1"></div>
                            </div>

                            <hr />

                            <?php

                            $email = "";
                            $pw = "";

                            if (isset($_COOKIE["email"])) {
                                $email = $_COOKIE["email"];
                            }

                            if (isset($_COOKIE["password"])) {
                                $pw = $_COOKIE["password"];
                            }

                            ?>

                            <div class="row g-4">

                                <div class="col-12">
                                    <label class="form-label fw-bold">Email Address</label>
                                    <input autocomplete="off" class="form-control" type="email" id="e" placeholder="Email Address" value="<?php echo $email; ?>">
                                    <div class="col-12 d-none" id="msgdiv2">
                                        <div class="alert-div-alerted-error" role="alert" id="msg2"></div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-bold">Password</label>
                                    <div class="input-group flex-nowrap">
                                        <input autocomplete="off" type="password" class="form-control" id="p" placeholder="Password" value="<?php echo $pw; ?>">
                                        <a class="input-group-text" id="pwb" onclick="showPassword();"><i class="bi bi-eye-fill"></i></a>
                                    </div>
                                    <div class="col-12 d-none" id="msgdiv3">
                                        <div class="alert-div-alerted-error" role="alert" id="msg3"></div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 form-check">
                                    <input type="checkbox" class="form-check-input" id="rememberme">
                                    <label class="form-check-label">Remember me</label>
                                </div>

                                <div class="col-12 col-md-6 d-flex justify-content-md-end">
                                    <a class="link-primary fw-bold" onclick="forgotPassword();" href="#">forgotten password?</a>
                                </div>

                                <div class="col-12 mt-4 d-flex justify-content-center">
                                    <button onclick="login();" class="col-8 btn btn-outline-primary fw-bold">Sign in</button>
                                </div>

                                <div class="col-12 text-center mt-1">
                                    <span class="fw-bold">New to pBay?</span>
                                    <a href="#" onclick="changeview();" class="link-danger fw-bold">Register Now</a>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-12 col-lg-10 h-100 d-none card" id="registerbox">
                <div class="card-body">

                    <div class="row">

                        <div class="col-4 d-none d-md-block" id="background2"></div>

                        <div class="col-12 col-md-8">

                            <div class="row">
                                <div class="col-12 d-flex justify-content-center">
                                    <img src="img/logo/header.png" width="50px">
                                </div>
                            </div>

                            <div class="col-12 mb-2 d-flex justify-content-center d-grid">
                                <h3 class="fw-bold">Create a New Account</h3>
                            </div>

                            <hr />

                            <div class="row g-4">

                                <div class="col-12 d-none mt-3 mb-2" id="msgdiv4">
                                    <div class="alert-div-alerted-error" role="alert" id="msg4"></div>
                                </div>

                                <div class="col-6">
                                    <label class="form-label fw-bold">First Name</label>
                                    <input class="form-control" type="text" placeholder="First Name" id="fname">
                                    <div class="col-12 d-none mt-3 mb-2" id="msgdiv5">
                                        <div class="alert-div-alerted-error" role="alert" id="msg5"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label class="form-label fw-bold">Last Name</label>
                                    <input class="form-control" type="text" placeholder="Last Name" id="lname">
                                    <div class="col-12 d-none mt-3 mb-2" id="msgdiv6">
                                        <div class="alert-div-alerted-error" role="alert" id="msg6"></div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-bold">Email Address</label>
                                    <input class="form-control" type="email" placeholder="Email Address" id="email">
                                    <div class="col-12 d-none mt-3 mb-2" id="msgdiv7">
                                        <div class="alert-div-alerted-error" role="alert" id="msg7"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label class="form-label fw-bold">Enter New Password</label>
                                    <div class="input-group flex-nowrap">
                                        <input type="password" class="form-control" id="pw" placeholder="Enter Password">
                                        <a class="input-group-text" id="npwb" onclick="newPassword();"><i class="bi bi-eye-fill"></i></a>
                                    </div>
                                    <div class="col-12 d-none mt-3 mb-2" id="msgdiv8">
                                        <div class="alert-div-alerted-error" role="alert" id="msg8"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label class="form-label fw-bold">Confirm New Password</label>
                                    <div class="input-group flex-nowrap">
                                        <input type="password" class="form-control" id="confirmpw" placeholder="Confirm Password">
                                        <a class="input-group-text" id="cpwb" onclick="confirmPassword();"><i class="bi bi-eye-fill"></i></a>
                                    </div>
                                    <div class="col-12 d-none mt-3 mb-2" id="msgdiv9">
                                        <div class="alert-div-alerted-error" role="alert" id="msg9"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label class="form-label fw-bold">Mobile Number</label>
                                    <input class="form-control" type="text" id="mobile" placeholder="Mobile Number">
                                    <div class="col-12 d-none mt-3 mb-2" id="msgdiv10">
                                        <div class="alert-div-alerted-error" role="alert" id="msg10"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label class="form-label fw-bold">Gender</label>
                                    <select class="form-select" id="gender">
                                        <option value="0">Select your Gender</option>

                                        <?php

                                        $gender_rs = Database::search("SELECT * FROM `gender`");
                                        $gender_num = $gender_rs->num_rows;

                                        for ($x = 0; $x < $gender_num; $x++) {
                                            $gender_data = $gender_rs->fetch_assoc();

                                        ?>

                                            <option value="<?php echo $gender_data["gender_id"]; ?>"><?php echo $gender_data["gender_name"]; ?></option>

                                        <?php

                                        }

                                        ?>

                                    </select>
                                    <div class="col-12 d-none mt-3 mb-2" id="msgdiv11">
                                        <div class="alert-div-alerted-error" role="alert" id="msg11"></div>
                                    </div>
                                </div>

                                <div class="col-12 mt-4 d-flex justify-content-center">
                                    <button onclick="register();" class="col-8 btn btn-outline-danger fw-bold">Register</button>
                                </div>

                                <div class="col-12 text-center mt-1">
                                    <span class="fw-bold">Already have a pBay Account?</span>
                                    <a href="#" onclick="changeview();" class="link-primary fw-bold">Sign in</a>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- forgot password modal -->

        <div class="modal" tabindex="-1" id="fpModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Forgot Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row g-3">

                            <div class="col-6">
                                <label class="form-label">New Password</label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" id="np" />
                                    <button class="btn btn-outline-secondary" type="button" id="npb" onclick="showPassword4();">Show</button>
                                </div>
                            </div>

                            <div class="col-6">
                                <label class="form-label">Re-type Password</label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" id="rnp" />
                                    <button class="btn btn-outline-secondary" type="button" id="rnpb" onclick="showPassword5();">Show</button>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Verification Code</label>
                                <input type="text" class="form-control" id="vc" />
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="resetPassword();">Reset</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- forgot password modal -->

        <!-- registered msg box -->

        <div class="modal" tabindex="-1" id="regSuccessBox">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <h4 class="form-label" id="iconModal"></i></h4>
                        <p id="textmodal">Registration Success!</p>
                    </div>
                    <div class="col-12 d-flex justify-content-center modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="modalbtn"></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- registered msg box -->

        <div class="row">

            <?php include "footer.php"; ?>

        </div>

    </div>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>