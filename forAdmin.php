<?php
	require "conect.php";
	// require "classProduct.php";
 //    require "classCustomer.php";
    //delete
    if(isset($_POST["delete"])){
        $id = $_POST["delete"];
        $sql = "DELETE from products where id= ".$id;
        $db->query($sql);
        header("location: forAdmin.php");
    }
    if(isset($_POST["add"])){
        $name = $_POST["nameProduct"];
        $type = $_POST["typeProduct"];
        $price = $_POST["priceProduct"];
        $image = $_POST["image"];
        $sql2 = "INSERT INTO products(name, type, price, image) VALUES ('".$name."', '".$type."', ".$price.", 'images/".$image."');";
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
        $sql = 'UPDATE products SET name = "'.$name.'",type="'.$type.'", price="'.$price.'",image= "images/'.$image.'"  WHERE id='.$id;
        $db->query($sql);
        header("location: forAdmin.php");
    } 
?>
<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
        img{
            width: 100px;
            height: 100px
        }
        .col-md-6{
            margin-bottom: 5px
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
                    <button name="add" class="btn btn-primary" >ADD</button>
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
        <?php for($i = 0; $i < count($products); $i++) { ?>
            <tr>
              <th scope="row"><?php echo $products[$i]->id?></th>
              <td><?php echo $products[$i]->name?></td>
              <td><img src="<?php echo $products[$i]->image?>"></td>
              <td><?php echo $products[$i]->type?></td>
              <td><?php echo "$".$products[$i]->price?></td>
              <td style="display: flex;">
                <form method="post">
                    <button class="btn btn-danger" name="delete" value="<?php echo $products[$i]->id?>"><i class="fas fa-trash"></i></button>
                </form>
                <form method="post" action="edit.php">
                    <button class="btn btn-warning" name="edit" value=<?php echo $products[$i]->id?>><i class="fas fa-edit"></i></button>
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
        <?php for($i = 0; $i < count($customer); $i++) { ?>
            <tr>
              <th scope="row"><?php echo $customer[$i]->id?></th>
              <td><?php echo $customer[$i]->name?></td>
              <td><?php echo $customer[$i]->phone?></td>
              <td><?php echo $customer[$i]->address?></td>
            </tr>
        <?php } ?>
      </tbody>
    </table>
     <footer>
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-top-box">
                            <h3>Business Time</h3>
                            <ul class="list-time">
                                <li>Monday - Friday: 08.00am to 05.00pm</li> <li>Saturday: 10.00am to 08.00pm</li> <li>Sunday: <span>Closed</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-top-box">
                            <h3>Social Media</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4>About Coffee Shop</h4>
                            <p>Pokemon coffee and cake is a cafe for Pokemon lovers and those who want to learn and find new things.</p>
                            <p>Come to our store</p>                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link">
                            <h4>Information</h4>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Customer Service</a></li>
                                <li><a href="#">Our Sitemap</a></li>
                                <li><a href="#">Terms &amp; Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Delivery Information</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Contact Us</h4>
                            <ul>
                                <li>
                                    <p><i class="fas fa-map-marker-alt"></i>Address: 101b-Le Huu Trac<br>Son tra,<br> Da Nang </p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+84 362027320">+84 362027320</a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope"></i>Email: <a href="mailto:maithinga1906@gmail.com">maithinga1906@gmail.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="footer-copyright">
        <p class="footer-company"><a href="#"></a> Design By :
            <a href="#">Web Developer</a></p>
    </div>
</body>
</html>