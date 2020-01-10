<?php 
	require "conect.php";
    $idUser = IdUser();
    $sql = "SELECT c.id, p.name, p.image, p.price, c.quantity from cart as c, products as p, users as u where c.idPro = p.id and c.idUser = ".$idUser;
    $resultCart = $db->query($sql)->fetch_all();

    $cart = array();
    for($i = 0; $i < count($resultCart); $i++){
        $pro = new Cart($resultCart[$i][0], $resultCart[$i][1], $resultCart[$i][2], $resultCart[$i][3], $resultCart[$i][4]);
        array_push($cart, $pro);
        break;
    }
    $total=0;
    var_dump($cart);
    if(isset($_POST["delete"])){
        $id = $_POST["delete"];
        $sql = "DELETE from cart where id= ".$id;
        $db->query($sql);
        header("location: viewCart.php");
    }
    if(isset($_POST["giam"])){
        $id = $_POST["giam"];
        $sql = 'UPDATE cart SET quantity = quantity - 1  WHERE id='.$id;
        $db->query($sql);
        header("location: viewCart.php");
    }
    if(isset($_POST["tang"])){
        $id = $_POST["tang"];
        $sql = 'UPDATE cart SET quantity = quantity + 1  WHERE id='.$id;
        $db->query($sql);
        header("location: viewCart.php");
    }
 ?>
 <!DOCTYPE html>
 <html>
 <head>
    <style type="text/css">
        .table img{
            height: 150px
        }
        .table{
        	margin-top: 30px;
        }
        input{
        	width: 30px;
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
    <header class="main-header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="http://localhost/phpFinal/index.php"><img src="images/logo.png" class="logo" alt=""></a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="http://localhost/phpFinal/index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">SHOP</a>
                            <ul class="dropdown-menu">
								<li><a href="shop.html">Sidebar</a></li>
								<li><a href="shop-detail.html">Detail</a></li>
                                <li><a href="cart.html">Cart</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="my-account.html">My Account</a></li>
                                <li><a href="wishlist.html">Wishlist</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#">Gallery</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menu">
							<a href="#">
								<i class="fa fa-shopping-bag"></i>
								<span class="badge"><?php echo count($cart) ?></span>
								<p>My Cart</p>
							</a>
						</li>
                    </ul>
                </div>
            </div>
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                  <ul class="cart-list">
                    <?php for ($i=0; $i < count($cart); $i++) { 
                    ?>
                        <li>
                            <a href="#" class="photo"><img src="<?php echo $cart[$i]->proImage ?>" class="cart-thumb" alt="" /></a>
                            <h6><a href="#"><?php echo $cart[$i]->proName ?></a></h6>
                            <p><span class="price"><?php echo "      ".$cart[$i]->proPrice*$cart[$i]->quantity ?></span></p>
                            <?php error_reporting(0); $total += $cart[$i]->proPrice ?>
                        </li>
                    <?php }?>
                    <li class="total">
                            <a href="#" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                            <span class="float-right"><strong>Total: </strong><?php echo $total."$" ?></span>
                    </li>
                    </ul>
                </li>
            </div>
        </nav>
    </header>
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-center">
                <img src="images/banner-01.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> Pokemon Coffe & Cake</strong></h1>
                            <br>
                            <p><a class="btn hvr-hover" href="#">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="images/banner-02.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> Pokemon Coffe & Cake</strong></h1>
                            <br>
                            <p><a class="btn hvr-hover" href="#">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="images/banner-03.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> Pokemon Coffe & Cake</strong></h1>
                            <br>
                            <p><a class="btn hvr-hover" href="#">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col-md-1">id</th>
            <th scope="col-md-2">Name product</th>
            <th scope="col-md-3">Image</th>
            <th scope="col-md-2">Price</th>
            <th scope="col-md-2">Quantity</th>
            <th scope="col-md-2">Option</th>
        </tr>
      </thead>
      <tbody>
        <?php for($i = 0; $i < count($cart); $i++) { ?>
            <tr>
            <th scope="row"><?php echo $cart[$i]->id?></th>
            <td><?php echo $cart[$i]->proName?></td>
            <td><img src="<?php echo $cart[$i]->proImage?>"></td>
            <td><?php echo $cart[$i]->proPrice."$"?></td>
            <td style="display: flex;">
              	<form method="post">
              		<button name="giam" value=<?php echo $cart[$i]->id?>>-</button>
              	</form> 
              	<input type="number" name="quantity" value=<?php echo $cart[$i]->quantity?>>
              	<form method="post>">
              		<button name="tang" value=<?php echo $cart[$i]->id?>>+</button></td>
                </form>
            </td>
            <td style="display: flex;">
                <form method="post">
                    <button class="btn btn-danger" name="delete" value="<?php echo $cart[$i]->id?>"><i class="fas fa-trash"></i></button>
                </form>
                <form method="post" action="">
                    <button class="btn btn-warning" name="order" value=<?php echo $cart[$i]->id?>><i class="fas fa-shopping-cart"></i></button>
                </form> 
            </td>
            </tr>
        <?php } ?>
      </tbody>
    </table>

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