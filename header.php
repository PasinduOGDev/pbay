<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body class="body">

    <div class="container-fluid">

        <div class="row bg-secondary bg-opacity-25">
            <div class="col-12">

                <ul class="nav">
                    <li class="nav-item mt-1 mt-lg-2">

                        <?php

                        require "connection.php";

                        session_start();

                        if (isset ($_SESSION["u"])) {

                            $data = $_SESSION["u"];

                            ?>

                        <li class="nav-item py-1 py-lg-0 mt-2 mt-lg-3">
                            <span class="text-dark fw-bold"><b class="text-success">Welcome </b>
                                <?php echo $data["fname"]; ?>
                            </span> |
                            <a class="fw-bold link-danger text-decoration-none" onclick="signout();" href="#">Sign Out</a>
                        </li>

                        <?php

                        } else {

                            ?>

                        <a class="nav-link link-dark text-dark fw-bold btn btn-outline-warning" aria-current="page"
                            href="index.php">Login or Register</a>

                        <?php

                        }

                        ?>


                    </li>
                    <li class="nav-item mt-1 mt-lg-2 dropdown">
                        <a class="nav-link link-dark fw-bold dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            My pBay
                        </a>
                        <ul class="dropdown-menu">

                            <?php

                            if (isset ($_SESSION["u"])) {

                                ?>

                                <li><a class="dropdown-item" href="#" onclick="userConfirm();">My Profile</a></li>
                                <li><a class="dropdown-item" href="#">My Sellings</a></li>
                                <li><a class="dropdown-item" href="#">My Products</a></li>
                                <li><a class="dropdown-item" href="#">Watchlist</a></li>
                                <li><a class="dropdown-item" href="#">Purchased History</a></li>
                                <li><a class="dropdown-item" href="#">Messages</a></li>

                                <?php

                            }

                            ?>

                            <li><a class="dropdown-item" href="#">Contact Admin</a></li>
                            <li><a class="dropdown-item fw-bold" href="#">Help and Contact</a></li>
                        </ul>
                    </li>

                    <?php

                    if (isset ($_SESSION["u"])) {

                        ?>

                        <li class="nav-item mt-1 mt-lg-2">
                            <a class="nav-link link-dark fw-bold btn btn-warning" aria-current="page" href="#">Sell</a>
                        </li>

                        <?php

                    }

                    ?>

                    <li class="nav-item ms-auto">
                        <a class="nav-link link-dark mt-sm-1" href="cart.php"><i
                                class='cart-icon bx bxs-cart-alt fs-1'></i></a>
                    </li>
                </ul>

            </div>
        </div>

        <div class="col-12 justify-content-center">
            <div class="row mb-3">

                <hr />

                <div class="offset-4 offset-lg-1 col-4 col-lg-1 mt-2 mt-lg-0 logo" style="height: 60px;"></div>

                <div class="col-12 col-lg-6">

                    <div class="input-group mb-2 mb-lg-3 mt-3">
                        <input type="text" class="form-control" placeholder="Search"
                            aria-label="Text input with dropdown button" />

                        <select class="form-select" style="max-width: 200px;">
                            <option value="0">All Categories</option>

                            <?php

                            $category_rs = Database::search("SELECT * FROM `category`");
                            $category_num = $category_rs->num_rows;

                            for ($x = 0; $x < $category_num; $x++) {
                                $category_data = $category_rs->fetch_assoc();
                                ?>

                                <option value="<?php echo $category_data["cat_id"]; ?>">
                                    <?php echo $category_data["category_name"]; ?>
                                </option>

                            <?php } ?>

                        </select>

                    </div>

                </div>

                <div class="col-12 col-lg-2 d-grid">
                    <button class="btn btn-dark mt-lg-3 mb-3" onclick="basicSearch(0);"><i
                            class="bi bi-search"></i></button>
                </div>

                <div class="col-12 col-lg-2 mt-lg-2 mt-lg-4 mb-3 text-center text-lg-start">
                    <a href="#" class="text-decoration-none link-dark fw-bold">Advanced</a>
                </div>

            </div>
        </div>

        <!-- modal start -->

        <div class="modal" tabindex="-1" id="confirmBox">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <h4 class="form-label text-danger"><i class="bi bi-shield-lock-fill"></i></h4>
                        <p id="textmodal">Enter Password to Verify</p>
                        <div class="col-12 input-group">
                            <input type="password" class="form-control" id="confirmPassword"
                                placeholder="Enter Your Password">
                            <button class="btn btn-light" id="confirmPwBtn" onclick="showPassword2();"><i
                                    class="bi bi-eye-fill"></i></button>
                        </div>
                        <div class="col-12 mt-2">
                            <a class="link-primary float-end" href="#">forgot password?</a>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                            onclick="userVerify();">Verify</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal end -->

        <!-- msg modal start -->

        <div class="modal" tabindex="-1" id="msgModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <h4 class="form-label" id="iconName"></h4>
                        <p id="textName"></p>
                    </div>
                    <div class="col-12 d-flex justify-content-center modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="msgbtn"
                            onclick="tryToConfirm();">Try Again</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- msg modal end -->

    </div>

    <script src="script.js"></script>
</body>

</html>