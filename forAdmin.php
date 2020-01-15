<?php
require "conect.php";
// require "classProduct.php";
//    require "classCustomer.php";
//delete
if (isset($_POST["delete"])) {
    $id = $_POST["delete"];
    $sql = "DELETE from products where id= " . $id;
    $db->query($sql);
    header("location: forAdmin.php");
}
if (isset($_POST["add"])) {
    $name = $_POST["nameProduct"];
    $type = $_POST["typeProduct"];
    $price = $_POST["priceProduct"];
    $image = $_POST["image"];
    $sql2 = "INSERT INTO products(name, type, price, image) VALUES ('" . $name . "', '" . $type . "', " . $price . ", 'images/" . $image . "');";
    $db->query($sql2);
    header("location: forAdmin.php");
}
//update
if (isset($_POST["edits"])) {
    $id = $_POST['edits'];
    $name = $_POST['proname'];
    $type = $_POST['protype'];
    $price = $_POST['proprice'];
    $image = $_POST['image'];
    $sql = 'UPDATE products SET name = "' . $name . '",type="' . $type . '", price="' . $price . '",image= "images/' . $image . '"  WHERE id=' . $id;
    $db->query($sql);
    header("location: forAdmin.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <style type="text/css">
        img {
            width: 100px;
            height: 100px
        }

        .col-md-6 {
            margin-bottom: 5px
        }
        .box-img-hover img {
            height: 250px
        }
    </style>
    <title>Homepage</title>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <header class="main-header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="#"><img src="images/logo.png" class="logo" alt=""></a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">SHOP</a>
                            <ul class="dropdown-menu">
                                <li><a href="shop.html">Sidebar</a></li>
                                <li><a href="shop-detail.html">Detail</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="my-account.html">My Account</a></li>
                                <li><a href="wishlist.html">Wishlist</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#">Gallery</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <table class="table">
        <h1 style="margin-left: 20px">List product</h1>
        <form method="post">
            <div class="row" style="margin: 10px;;">
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="name product" name="nameProduct">
                </div>
                <div class="col-md-6">
                    <input type="file" class="fileToUpload" id="fileToUpload" name="image">
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="type product" name="typeProduct">
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="price product" name="priceProduct">
                </div>
                <div class="col-md-2">
                    <button name="add" class="btn btn-primary">ADD</button>
                </div>
            </div>
        </form>
        <br>
        <thead class="thead-dark">
            <tr>
                <th scope="col-md-1">id</th>
                <th scope="col-md-2">Name product</th>
                <th scope="col-md-3">Image</th>
                <th scope="col-md-2">Type</th>
                <th scope="col-md-2">Price</th>
                <th scope="col-md-2">Option</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($products); $i++) { ?>
                <tr>
                    <th scope="row"><?php echo $products[$i]->id ?></th>
                    <td><?php echo $products[$i]->name ?></td>
                    <td><img src="<?php echo $products[$i]->image ?>"></td>
                    <td><?php echo $products[$i]->type ?></td>
                    <td><?php echo "$" . $products[$i]->price ?></td>
                    <td style="display: flex;">
                        <form method="post">
                            <button class="btn btn-danger" name="delete" value="<?php echo $products[$i]->id ?>"><i class="fas fa-trash"></i></button>
                        </form>
                        <form method="post" action="edit.php">
                            <button class="btn btn-warning" name="edit" value=<?php echo $products[$i]->id ?>><i class="fas fa-edit"></i></button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <table class="table">
        <h1>List Customer</h1>
        <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Fullname</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($customer); $i++) { ?>
                <tr>
                    <th scope="row"><?php echo $customer[$i]->id ?></th>
                    <td><?php echo $customer[$i]->name ?></td>
                    <td><?php echo $customer[$i]->phone ?></td>
                    <td><?php echo $customer[$i]->address ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php require "footer.php"; ?>
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