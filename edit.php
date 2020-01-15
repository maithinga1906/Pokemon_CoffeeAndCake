<?php

require_once("conect.php");

$id = $_POST["edit"];

$sql = "SELECT * from products where id =" . $id . ";";
$result = $db->query($sql)->fetch_all();

if (isset($_POST["close"])) {
    header("location: forAdmin.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        .main {
            align-items: center;
            justify-content: center;
            display: grid;
            border: 2px solid #3bff6c;
            width: 600px;
            padding: 20px;
            background-color: black;
            color: white;
        }

        body {
            align-items: center;
            justify-content: center;
            padding: 100px 350px;
            background-image: url("c.png");
            background-size: cover;
        }
    </style>
</head>

<body>
    <center>
        <h1>UPDATE PRODUCT</h1>
    </center>
    <form action="forAdmin.php" method="post" class="main">
        <input type="text" name="proname" placeholder="Name product" value=<?php echo $result[0][1] ?>>
        <br>
        <input type="text" name="protype" placeholder=" Type product" value=<?php echo $result[0][2] ?>>
        <br>
        <input type="text" name="proprice" placeholder="Price product" value=<?php echo $result[0][3] ?>>
        <br>
        <input type="file" class="fileToUpload" id="fileToUpload" name="image">
        <br>
        <div style="display: flex;">
            <button class="btn btn-warning col-md-6" name="edits" value=<?php echo $result[0][0] ?>>Edit</button>
            &ensp;
            <button class="btn btn-danger col-md-6" name="close">close</button>
        </div>
    </form>
</body>

</html>