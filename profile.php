<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile | pBay</title>

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet' />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <link rel="icon" href="img/logo/logo.png" />
</head>

<body class="body">

    <!-- header start -->

    <?php

    session_start();

    include "connection.php";

    if (condition) {
        # code...
    }

    ?>

    <!-- header end -->

    <div class="container-fluid mt-3">

        <div class="row mb-2">
            <div class="col-12">

                <div class="row">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-decoration-none fw-bold" href="home.php">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">My Profile</li>
                        </ol>
                    </nav>
                </div>

                <div class="container">
                    <div class="row bg-dark p-2 mt-2 mb-5" style="border-radius: 10px;">
                        <div class="col-12 text-center">
                            <h4 class="text-warning mt-2 fw-bold">
                                <span><i class="bi bi-person-circle"></i></span>
                                <span class="px-1">My Profile</span>
                            </h4>
                        </div>
                    </div>

                </div>

                <!-- content -->

                <div class="row">
                    <div class="col-12">

                        <div class="row p-3">

                            <div class="col-12 col-lg-3 card p-4 text-center">

                                <div class="col-12 mt-lg-5">
                                    <img src="img/user.png" class="col-4 col-lg-8" width="100%" height="100%">
                                </div>

                                <div class="col-12 mt-4">
                                    <h4 class="fw-bold">Pasindu Madhuwantha</h4>
                                </div>

                                <div class="col-12 mt-2">
                                    <button class="col-5 col-md-10 btn btn-primary">Change Image</button>
                                </div>

                            </div>

                            <div class="col-12 col-lg-6 card bg-dark bg-opacity-10 p-4">

                                <div class="row g-4">

                                    <div class="col-6">
                                        <label class="form-label">First Name</label>
                                        <input type="text" class="form-control">
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label">Surname</label>
                                        <input type="text" class="form-control">
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" class="form-control">
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Your Password</label>
                                        <input type="password" class="form-control">
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label">Mobile</label>
                                        <input type="text" class="form-control">
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label">Gender</label>
                                        <input type="text" class="form-control">
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Address Line 1</label>
                                        <input type="text" class="form-control">
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Address Line 2</label>
                                        <input type="text" class="form-control">
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label">District</label>
                                        <select class="form-select">
                                            <option value="0">Select District</option>
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label">Province</label>
                                        <select class="form-select">
                                            <option value="0">Select Province</option>
                                        </select>
                                    </div>

                                    <div class="col-12 mt-5 text-center">
                                        <button class="col-8 btn btn-success">Update Profile</button>
                                    </div>

                                </div>

                            </div>

                            <div class="col-12 col-lg-3 card p-4 text-center">

                                <h6 class="mt-lg-5 fw-bold">Display Ads</h6>

                            </div>

                        </div>

                    </div>
                </div>

                <!-- content -->

            </div>
        </div>

        <div class="row">

            <?php include "footer.php"; ?>

        </div>

    </div>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>