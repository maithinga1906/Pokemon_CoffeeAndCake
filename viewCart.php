<?php
require_once "conect.php";
$idUser = IdUser();
$sql = "SELECT c.id, p.name, p.image, p.price, c.quantity from cart as c, products as p where c.idPro = p.id and c.idUser = ". $idUser;
$resultCart = $db->query($sql)->fetch_all();

$cart = array();
//echo count($resultCart);
for ($i = 0; $i < count($resultCart); $i++) {
    $pro = new Cart($resultCart[$i][0], $resultCart[$i][1], $resultCart[$i][2], $resultCart[$i][3], $resultCart[$i][4]);
    array_push($cart, $pro);
    // break;
}
//$total = 0;
//var_dump($cart);
if (isset($_POST["delete"])) {
    $id = $_POST["delete"];
    $sql = "DELETE from cart where id= " . $id;
    $db->query($sql);
    header("location: viewCart.php");
}

if (isset($_POST["edit"])) {
    $id = $_POST["edit"];
    echo $id;
    $quantity = $_POST["quantity"];
    $sql = 'UPDATE cart SET quantity ='.$quantity.' WHERE id = '.$id;
    echo $sql;
    $db->query($sql);
    header("location: viewCart.php");
}

?>
<!DOCTYPE html>
<html>

<head>
    <style type="text/css">
        .table img {
            height: 150px
        }

        .table {
            margin-top: 30px;
        }

        .table input {
            width: 30px;
        }
        .order{
            display: flex;
            justify-content: space-between;
            width: 300px;
            margin-bottom: 30px;
            border: 1px solid black;
            border-radius: 3px;
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
                        <p><a style="color: white" href="index.php" class="" data-toggle="modal" data-target="#loginForm">Logout</a></p>
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
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col-md-1">id</th>
                <th scope="col-md-2">Name product</th>
                <th scope="col-md-3">Image</th>
                <th scope="col-md-1">Price</th>
                <th scope="col-md-3">Quantity</th>
                <th scope="col-md-2">Option</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($cart); $i++) { ?>
                <tr>
                    <td scope="row"><?php echo $cart[$i]->id ?></td>
                    <td><?php echo $cart[$i]->proName ?></td>
                    <td><img src="<?php echo $cart[$i]->proImage ?>"></td>
                    <td><?php echo $cart[$i]->proPrice." $" ?></td>
                    <td >
                        <form method="post">
                            <input type="number" min="0" name="quantity" value=<?php echo $cart[$i]->quantity?>>
                            <button name="edit" value=<?php echo $cart[$i]->id ?>>Edit</button>
                        </form>
                    </td>
                    <td style="display: flex;">
                        <form method="post">
                            <button class="btn btn-danger" name="delete" value="<?php echo $cart[$i]->id ?>"><i class="fas fa-trash"></i></button>
                        </form>
                        <form method="post" action="">
                            <button class="btn btn-warning" name="order" value=<?php echo $cart[$i]->id ?>><i class="fas fa-shopping-cart"></i></button>
                        </form>
                    </td>
                </tr>

                <?php 
                    $total += ($cart[$i]->proPrice * ($cart[$i]->quantity-1));
                 } ?>
        </tbody>
    </table>
    <center>
        <div class="order">
            <p>Total: <b><?php echo $total." $" ?></b></p>
            <form method="post">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginForm">Order</button>            
            </form>
        </div>
    </center>
    <div class="modal fade" id="loginForm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><img src="login.png"></h4>
                </div>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col-md-1">id</th>
                            <th scope="col-md-2">Name product</th>
                            <th scope="col-md-3">Image</th>
                            <th scope="col-md-1">Price</th>
                            <th scope="col-md-3">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < count($cart); $i++) { ?>
                            <tr>
                                <td scope="row"><?php echo $cart[$i]->id ?></td>
                                <td><?php echo $cart[$i]->proName ?></td>
                                <td><img src="<?php echo $cart[$i]->proImage ?>"></td>
                                <td><?php echo $cart[$i]->proPrice." $" ?></td>
                                <td >
                                    <form method="post">
                                        <input type="text" name="quantity" value=<?php echo $cart[$i]->quantity?>>
                                    </form>
                                </td>
                            </tr>

                            <?php 
                                $total += ($cart[$i]->proPrice * ($cart[$i]->quantity-1));
                             } ?>
                    </tbody>
                </table>
                <div>
                    <h2>Customer Infomation</h2>
                    <form method="post">
                        <input type="text" name="nameCus" class="form-control" placeholder="Name Customer"><br>
                        <input type="text" name="phone" class="form-control" placeholder="Phone"><br>
                        <input type="text" name="address" class="form-control" placeholder="Address"><br>
                    </form>
                </div>
                <center><button name="buy" type="button" class="btn btn-danger" style="width: 100px" >Buy</button></center>
                
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