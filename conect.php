<?php
	session_start();
	
	$server = "localhost";
	$user = "root";
	$password = "";
	$dbName = "finalProject";
	$db = new mysqli($server, $user, "",$dbName);
	global $db;
	require "classProduct.php";
    require "classCart.php";
    require "classUser.php";
    require "classCustomer.php";


    function login($username, $password){
		global $db;
		$sql = "SELECT * from users";
		$result = $db->query($sql)->fetch_all();
		$check=false;
		for ($i=0; $i < count($result); $i++) {
		if ($username == $result[$i][2] && $password==$result[$i][3]&& $result[$i][4] == "admin"){
		$check=true;
		header("location: forAdmin.php");
		break;
		}
		else if ($username == $result[$i][2] && $password==$result[$i][3] && $result[$i][4] == "user"){
		$check=true;
		header("location: afterLogin.php");
		$_SESSION["user"] = $username;
		$_SESSION["pass"] = $password;
		echo $_SESSION["user"];
		break;
		}
		}
	}
    function IdUser(){
        global $db;
        $sql = "SELECT id from users where username ='".$_SESSION["user"]."' and pass='".$_SESSION["pass"]."';";
        $result = $db->query($sql)->fetch_assoc();
        return $result['id'];
        echo $sql;
	    }
	    $sql = "SELECT * from products";
	    $result = $db->query($sql)->fetch_all();
	    $products = array();
		for($i = 0; $i < count($result); $i++){
			$pro = new Product($result[$i][0], $result[$i][1], $result[$i][2], $result[$i][3], $result[$i][4]);
			array_push($products, $pro);
		}
		$sql1 = "SELECT * from customer";
	    $result1 = $db->query($sql1)->fetch_all();
	    $customer = array();
		for($i = 0; $i < count($result1); $i++){
			$pro = new Customer($result1[$i][0], $result1[$i][1], $result1[$i][2], $result1[$i][3]);
			array_push($customer, $pro);
		}
		$sql2 = "SELECT * from users";
	    $result2 = $db->query($sql2)->fetch_all();
	    $users = array();
	    for($i=0;$i<count($result2); $i++){
	    $u1 = new User($result2[$i][0], $result2[$i][1], $result2[$i][2], $result2[$i][3], $result2[$i][4]);
	    array_push($users, $u1);
	}

    function addToCart($idPro, $idUser){
    	global $db;
		$check = false;
		$sql = "SELECT * FROM cart where idUser=".IdUser().";";
		$result = $db->query($sql)->fetch_all();
		for ($i=0; $i < count($result); $i++) {
			if($idPro == $result[$i][1]){
				$sql1 = "UPDATE cart set quantity = ".($result[$i][2]+1)." where idPro = ".$result[$i][1] ;
				$check = true;
				$db->query($sql1);
				//echo $sql1;
			}
		}
		if($check == false){
			$sql2 = "INSERT INTO cart(idPro, quantity, idUser) VALUES($idPro, 1, $idUser)";
			$db->query($sql2);
			//echo $sql2;
		}
    }

    // function getCart(){
    // 	global $db;
    // 	$sql = "SELECT c.id, p.name, p.image, p.price, c.quantity from cart as c, products as p, users as u where c.idPro = p.id and c.idUser = ".IdUser();
    // 	echo $sql."</br>";
    // 	$resultCart = $db->query($sql)->fetch_all();
    // 	var_dump($resultCart);
    // }
   
?>