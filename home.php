<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | pBay</title>

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="img/logo/logo.png" />
</head>

<body class="body bg-secondary bg-opacity-10">

    <div class="container-fluid">

        <!-- header start -->

        <div class="row">

            <?php
            
            include "header.php";
            
            ?>

            <hr />

        </div>

        <!-- header end -->

        <!-- bodycontent start -->

        <div class="row">

            <div class="col-12 col-lg-6 mb-5 text-center">

                <img src="img/logo/logo.png" width="80px" height="80px">
                <span class="text-primary">වෙත</span>
                <p class="text-success fs-4">ඔබව සාදරයෙන් පිලිගන්නවා</p>
                <p class="text-dark">100%ක් ශ්‍රී ලාංකීය අපේම දෙයකි</p>
                <a class="col-5 btn btn-danger" href="#shoparea">Shop Now</a>

            </div>

            <div class="col-12 col-lg-6">

                <!-- carousel start -->

                <div class="col-12 d-flex justify-content-center">

                    <div id="carouselExampleIndicators" class="col-12 col-lg-8 carousel slide">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="img/banner/banner1.jpg" class="d-block" width="100%" height="100%">
                            </div>
                            <div class="carousel-item">
                                <img src="img/banner/banner2.jpg" class="d-block" width="100%" height="100%">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>

                <!-- carousel end -->

            </div>


        </div>

        <hr />

        <?php

        $category1_rs = Database::search("SELECT * FROM `category`");
        $category1_num = $category1_rs->num_rows;

        for ($y = 0; $y < $category1_num; $y++) {
            $category1_data = $category1_rs->fetch_assoc();
        ?>

            <!-- category name start -->

            <div class="row" id="shoparea">
                <div class="col-12 d-flex justify-content-center">
                    <h2 class="text-dark mt-1"><?php echo $category1_data["category_name"]; ?></h2>
                </div>

                <div class="col-12 d-flex justify-content-center">
                    <a href="#" class="mb-1 link-warning text-decoration-none fs-6">More &nbsp; &rarr;</a>
                </div>
            </div>

            <!-- category name end -->

            <hr />

            <!-- product card start -->

            <div class="row">
                <div class="col-12 mt-3 mb-3 d-flex justify-content-center">

                    <div class="col-8 col-md-12 col-lg-12">
                        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-3 gy-4 d-flex justify-content-center">

                            <?php

                            $product_rs = Database::search("SELECT * FROM `product` WHERE 
                            `category_cat_id`='" . $category1_data["cat_id"] . "' AND 
                            `status_status_id`='1' ORDER BY `datetime_added` DESC LIMIT 6 OFFSET 0");
                            $product_num = $product_rs->num_rows;

                            for ($z = 0; $z < $product_num; $z++) {
                                $product_data = $product_rs->fetch_assoc();

                            ?>

                                <div class="col-12 d-flex justify-content-center">
                                    <div class="col-12 card" id="card">

                                        <?php

                                        $image_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $product_data["id"] . "'");
                                        $image_data = $image_rs->fetch_assoc();

                                        ?>

                                        <a href="#"><img src="<?php echo $image_data["img_path"]; ?>" class="col-12"></a>
                                        <div class="card-body text-center ms-0 m-0">
                                            <p class="col-12 fs-6 fw-bold"><?php echo $product_data["title"]; ?></p>
                                            <span class="card-text text-primary fs-4 fw-bold">Rs. <?php echo $product_data["price"]; ?></span><br />

                                            <?php

                                            if ($product_data["qty"] > 0) {

                                            ?>

                                                <span class="card-text text-success fw-bold">In Stock</span><br />
                                                <span class="card-text"><?php echo $product_data["qty"]; ?> Stock Available</span><br />

                                                <hr />

                                                <div class="row mt-1 px-4">
                                                    <div class="col-12 p-1">
                                                        <button class="col-12 btn btn-success">Buy Now</button>
                                                    </div>
                                                    <div class="col-12 p-1">
                                                        <button class="col-12 btn btn-dark"><i class="bi bi-cart4" onclick="addCart(<?php echo $product_data['id']; ?>);"></i></button>
                                                    </div>
                                                </div>

                                            <?php } else { ?>

                                                <span class="card-text text-danger fw-bold">Out of Stock</span><br />
                                                <span class="card-text text-danger">0 Stock</span><br />

                                                <hr />

                                                <div class="row mt-1 px-4">
                                                    <div class="col-12 p-1">
                                                        <button class="col-12 btn btn-success disabled">Buy Now</button>
                                                    </div>
                                                    <div class="col-12 p-1">
                                                        <button class="col-12 btn btn-dark disabled"><i class="bi bi-cart4"></i></button>
                                                    </div>
                                                </div>

                                            <?php

                                            }
                                            
                                            ?>

                                        </div>
                                    </div>
                                </div>

                            <?php 
    
                            } 
    
                            ?>

                        </div>
                    </div>

                </div>
            </div>

            <hr />

        <?php 
    
        } 
    
        ?>

        <!-- product card end -->

        <!-- bodycontent end -->

        <!-- footer start -->

        <div class="row">

            <hr />

            <?php include "footer.php"; ?>

        </div>

        <!-- footer end -->

    </div>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>