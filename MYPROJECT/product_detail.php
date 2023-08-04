<?php
session_start();
$productid = $_SESSION['value'];

$server_name = "localhost:3306";
$username = "root";
$password = "";
$db_name = "project";
$uid = $_SESSION['uid'];

$con = mysqli_connect($server_name, $username, $password, $db_name);
if (!$con) {
    die("Connection Not Found:" . mysqli_connect_error());
} else {
    echo "Connection SuccessFull: ";
}
mysqli_select_db($con, 'project');


$quer = "SELECT * FROM product WHERE Product_id='$productid'";
$querr = "SELECT * FROM product LIMIT 5";

$result = $con->query($quer);
$result1 = $con->query($querr);


if (isset($_POST['addtocart'])) {

    $pid = $_POST['atc'];
    $pimage = $_POST['pimage'];
    $pname = $_POST['pname'];
    $price = $_POST['pprice'];
    $qty = $_POST['pqty'];
    $uid = $_SESSION['uid'];

    $sql = "INSERT INTO addtocart (Product_id,Product_image,Product_name,Product_Price,Product_quantity,User_id)
    VALUES('$pid','$pimage','$pname','$price','$qty','$uid')";



    if (mysqli_query($con, $sql)) {
        echo "New Details Entry inserted successfully !";
        header('location:http://localhost/dashboard/MYPROJECT/index1.php');
    } else {
        echo "Error" . $sql . "" . mysqli_error($con);
    }


}

if (isset($_POST['view'])) {

    echo $_POST['atc'];
    $_SESSION["value"] = $_POST['atc'];
    header('location:http://localhost/dashboard/MYPROJECT/product_detail.php');

}
$con->close();




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customized Garments for Men | RameshGarments.com </title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        #product {

            Display: flex;

        }

        #productdetail {
            padding-top: 37%;
            Display: flex;
            border: 1px solid black;
        }

        .card {

            padding-top: 100px;
            padding-left: 50px;
            font-family: arial;

        }

        .cardx {

            padding-top: 10px;
            padding-left: 50px;
            font-family: arial;
            border: solid #000 1px;
            background-color: white;
            box-shadow: 10px 10px 5px #aaaaaa;
            transition: transform .2s;
        }

        .cardx:hover {
            /* -ms-transform: scale(1.5); IE 9
            -webkit-transform: scale(1.5); Safari 3-8  */
            transform: scale(1.1);

        }

        .footer {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="header">
        <nav id="navbar">
            <div id="logo" style="border:0px;">
                <a href="index.php"><img src="Rglogo.jpg" style="border:6px solid white; border-radius:50%;"
                        alt="RameshGarments.com"></a>
            </div>
            <ul>
                <li class="item"><a href="index1.php">Home</a></li>
                <li class="item"><a href="Allproducts.php"> Products</a></li>
                <li class="item"><a href="new.php">Customized</a></li>
                <li class="item"><a href="Cart.php">Cart</a></li>
                <li class="item"><a href="profile.php">Profile</a></li>
            </ul>
        </nav>
        <section id="Home">
            <h1 class="h-primary">Welcome to our store</h1>
            <p>
                Get a wonder experience of customizing your clothes<br>
                According to your choice. With the perfect<br>
                Material and patterns
            </p>
            <a href="new.php"> <button class="btn">Create Shirt</button></a>

        </section>
    </div>



    <section id="productdetail">
        <?php
        // LOOP TILL END OF DATA
        while ($rows = $result->fetch_assoc()) {
            ?>
            <form action="" method="POST" style="display: flex;">
                <section>
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($rows['Product_image']); ?>"
                        alt="Denim Jeans" style="width:600px ;height:300px">
                </section>
                <div class="card">
                    <h1>
                        <?php echo $rows['Product_name']; ?>
                    </h1>
                    <p class="price">
                        <?php echo $rows['Product_price']; ?>
                    </p>
                    <p class="detail-1">
                        <?php echo $rows['Product_Detail']; ?>
                    </p>
                    <p><input type="submit" name="addtocart" value="Add to Cart "></p>
                    <!-- <p class="cart"><input type="hidden" name="view" value="view "></p> -->
                    <p><input type="hidden" name="atc" value=<?php echo $rows['Product_id']; ?>></p>

                    <!-- <p ><input type="hidden" name="atc" value=<?php echo $rows['Product_id']; ?>></p> -->
                    <p><input type="hidden" name="pimage" value=<?php echo base64_encode($rows['Product_image']); ?>></p>
                    <p><input type="hidden" name="pname" value=<?php echo $rows['Product_name']; ?>></p>
                    <p><input type="hidden" name="pprice" value=<?php echo $rows['Product_price']; ?>></p>
                    <p><input type="hidden" name="pqty" value=1></p>


                </div>
                <input type="hidden" name="sid" value=<?php echo $rows['Product_id']; ?> </form>

                <?php
        }
        ?>

    </section>
    <!-- <Related products> -->
    <center>
        <h1>Related products :</h1>
    </center>

    <section id="product">
        <?php
        // LOOP TILL END OF DATA
        while ($rows = $result1->fetch_assoc()) {
            ?>
            <form action="" method="POST" style="display: flex;">

                <div class="cardx">

                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($rows['Product_image']); ?>"
                        alt="Denim Jeans" style="width:200px ;height:120px">

                    <h1>
                        <?php echo $rows['Product_name']; ?>
                    </h1>
                    <p class="price">
                        <?php echo $rows['Product_price']; ?>
                    </p>
                    <p class="detail-1">
                        <?php echo $rows['Product_Detail']; ?>
                    </p>
                    <p><input type="submit" name="addtocart" value="Add to Cart "></p>
                    <p class="cart"><input type="submit" name="view" value="view "></p>

                    <p><input type="hidden" name="atc" value=<?php echo $rows['Product_id']; ?>></p>
                    <p><input type="hidden" name="pimage" value=<?php echo base64_encode($rows['Product_image']); ?>></p>
                    <p><input type="hidden" name="pname" value=<?php echo $rows['Product_name']; ?>></p>
                    <p><input type="hidden" name="pprice" value=<?php echo $rows['Product_price']; ?>></p>
                    <p><input type="hidden" name="pqty" value=1></p>


                    <!-- <?php $_SESSION["id"] = $rows['Product_id'] ?> -->

                </div>


            </form>

            <?php
        }
        ?>
    </section>



    <!---------single product detail------------>
    <!-- 
<div class="smallcontainer singleproduct">
    <div class="smallcontainer" style="
    margin-top: 568px;
    margin-bottom: -200px;
    margin-left: -200px;
">
    <div class="row">
        <div class="col2">
            <img src="tshirt.png" style="
    /* height: 100px; */
    /* width: 100px; */
    /* margin: 182px; */
">
            
        </div>
        <div class="col2">
            <p>Home /Product</p>
            <h1>White printed  t-shirt </h1>
            <h4>$50.00</h4>
            <select>
                <option></option>
                <option >Small</option>
                <option>Medium</option>
                <option>Large</option>
                <option>Xl</option>
            </select>
            
            <input type="number" value="1">
            <a href="" class="btn">Add To Cart</a>
            <h3>Product Detail</h3>
            <p> Aadsjndkjsbdjbidbjdvbivibvbdbhdsjbvwihbhvbdjviabvvncbvbfkjn dfhbvbvdn,n vhfbvlfdn</p>
        </div>
    </div>
</div>
    
</div> -->
    <!-----featured products-->
    <!-- <div id="productsall">
    <div class="products" style="padding-top:33%;">
    <h2  class ="title" 
    >Related Products</h2>
         <div class="row">
            <div class="col5">
                <a href="product detail.html"><img src="tshirt.png"></a>
                <a href="product detail.html"><h4>white printed T-shirt</h4></a> 
            <p>$50.00</p>
            </div>
            <div class="col5">
                <a href="product detail.html"><img src="tshirt.png"></a>
                <a href="product detail.html"><h4>white printed T-shirt</h4></a> 
            <p>$50.00</p>
            </div><div class="col5">
                <a href="product detail.html"><img src="tshirt.png"></a>
                <a href="product detail.html"><h4>white printed T-shirt</h4></a>
            <p>$50.00</p>
            </div><div class="col5">
                <a href="product detail.html"><img src="tshirt.png"></a>
                <a href="product detail.html"><h4>white printed T-shirt</h4></a>
            <p>$50.00</p>
            </div>
     
            </div> 
    
        </div>
    </div>
</div>
 -->





    <!--  ---foooter----- -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col1">
                    <h3>Download Our app</h3>
                    <p>Download our app from ios or android mobile phone
                        from <br><b>Playstore</b> and <b>App Store</b>
                    </p>
                </div>
                <div class="footer-col2">
                    <img src="Rglogo.jpg" alt="123" style="height: 100px;">
                    <p>Our Purpose is to sustainably make the plesure and benefits of garments accessaible to many</p>
                </div>
                <div class="footer-col3">
                    <h3>Useful Links</h3>
                    <ul>
                        <li>coupons</li>
                        <li>blogs</li>
                        <li>return policy</li>
                        <li>join us</li>
                    </ul>
                </div>
                <div class="footer-col4">
                    <h3>Follow Us</h3>
                    <ul>
                        <li>FaceBook</li>
                        <li>Instragram</li>
                        <li>twitter</li>
                    </ul>
                </div>

            </div>
        </div>
    </div> -->






</body>

</html>