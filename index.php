<?php
// session_start();
require_once "conect.php";

$total = 0;
if (isset($_POST["lg"])) {
    $username = $_POST["user"];
    $pass = $_POST["pass"];
    login($username, $pass);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style type="text/css">
        .box-img-hover img {
            height: 250px
        }
    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pokemon Coffe & Cake</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/custom.css">
</head>

<body>
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="custom-select-box">
                        admin
                    </div>
                    <div class="right-phone-box">
                        <p>Call VN :- <a href="#"> +84 362 027 320</a></p>
                    </div>
                    <div class="our-link">
                        <ul>
                            <li><a href="#"><i class="fa fa-user s_color"></i> My Account</a></li>
                            <li><a href="#"><i class="fas fa-location-arrow"></i> Our location</a></li>
                            <li><a href="#"><i class="fas fa-headset"></i> Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <form class="login-box" method="post">
                        <p><a style="color: white" href="" class="" data-toggle="modal" data-target="#loginForm">Login</a></p>
                    </form>
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                <li>
                                    <i class="fab fa-opencart"></i> 20% off coffee
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 50% - 80% off cake
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 10%! ice
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 50%! Shop Now
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 10%! Shop Vegetables
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 50% - 80% off on
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require "header.php"; ?>
    <div class="box-add-products">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="offer-box-products">
                        <img class="img-fluid" src="images/add-img-01.jpg" alt="" />
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="offer-box-products">
                        <img class="img-fluid" src="images/add-img-02.jpg" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Drink & Cake</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button class="active" data-filter="*">All</button>
                            <button data-filter=".top-featured">Top featured</button>
                            <button data-filter=".best-seller">Best seller</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row special-list">
                <?php
                for ($i = 0; $i < count($products); $i++) {
                ?>
                    <div class="col-lg-3 col-md-6 special-grid best-seller">
                        <div class="products-single fix">
                            <div class="box-img-hover">
                                <img src="<?php echo $products[$i]->image ?>" class="img-fluid" alt="Image">
                                <div class="mask-icon" method="post">

                                    <form method="post" action="detail.php">
                                        <button name="detail" value=<?php echo $products[$i]->id ?>><i class="fas fa-eye"></i></button>
                                    </form>
                                    <!-- <form action="" method="post">
                                    <a class="cart" href="" value =<?php echo $products[$i]->id ?>>Add to Cart</a>
                                </form> -->

                                </div>
                            </div>
                            <div class="why-text">
                                <h4><?php echo $products[$i]->name ?></h4>
                                <h5><?php echo $products[$i]->price ?></h5>
                            </div>
                        </div>
                    </div> <?php } ?>
            </div>
        </div>
    </div>
    </div>
    <?php require "footer.php" ?>
    <div class="modal fade" id="loginForm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><img src="login.png"></h4>
                </div>
                <form method="POST">
                    <div class="modal-body">
                        <input type="text" class="form-control" name="user" placeholder="Username"><br>
                        <input type="password" class="form-control" name="pass" placeholder="Password"><br>
                        <p style="margin-left: 320px; margin-bottom: 0px;"><a href="signUp.php">Create a new account</a>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button name="lg" type="submit" class="btn btn-danger" style="margin: auto;">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/inewsticker.js"></script>
    <script src="js/bootsnav.js."></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/baguetteBox.min.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>