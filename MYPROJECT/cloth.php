<?php
$server_name = "localhost:3306";
$username = "root";
$password = "";
$db_name = "project";

$con=mysqli_connect($server_name,$username,$password,$db_name);
if(!$con) {
    die("Connection Not Found:".mysqli_connect_error());
}
else{
    echo "Connection SuccessFull: ";
}
mysqli_select_db($con,'project');


$quer="SELECT * FROM product";



$result = $con->query($quer);
$con->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">

#product{
    padding-top: 35%;

}

 .card {
  padding-right:15px;
  padding-bottom:15px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  text-align: center;
  font-family: arial;
  margin-left:5%;
  margin-right:5%;
  margin-bottom: 26px;

}
.cart{
    margin-top: 10px;
    margin-left: 30px;
}

.price {

  font-size: 22px;
  margin-left:5%;
  margin-right:5%;
}

.card button {

  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
}

.btn-1{
        border: 2px solid black ;
    color: black;
    font-size: 1.2rem;
    border-radius: 7px;
    transition: 0.5s;
    padding-inline-start: 5px;
    padding-inline-end: 5px;
 }

.btn-1:hover{
    background: olive;
    color: white;
}

    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customized Garments for Men | RameshGarments.com </title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="header">
    <nav id="navbar">
        <div id="logo">
            <a href="index.html"><img src="profile.jpeg" alt="RameshGarments.com"></a>
        </div>
        <ul>
            <li class="item"><a href="index1.php">Home</a></li>
            <li class="item"><a href="Allproducts.php"> Products</a></li>
            <li class="item"><a href="#">Customized</a></li>
            <li class="item"><a href="cart.html">Cart</a></li>
            <li class="item"><a herf="#">Services</a></li>
            <li class="item"><a href="accounts.html">Profile</a></li>
            
        </ul>
    </nav>
    <section id="Home">
        <h1 class="h-primary">Welcome to our store</h1>
        <p>
       Get a wonder experience of customizing your clothes<br>
        According to your choice. With the perfect<br>
        Material and patterns
        </p>
        <a href="customization.html"> <button class="btn">Create Shirt</button></a>
    
    </section>
</div>

<section id="product" >

    <form action="" method="POST">
    <?php
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
            ?>
    <div class="card">

    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($rows['Product_image']); ?>" alt="Denim Jeans" style="padding-top: 21px; width: 500px; height: 211px;">
    <h1><?php echo $rows['Product_name'];?></h1>
    <p class="price"><?php echo $rows['Product_price'];?></p>
    <p class="detail"><?php echo $rows['Product_Detail'];?></p>
    <p class="cart"><input type="submit" value="Add to Cart "></p>
    <p><input type="hidden" name="atc" value=<?php echo $rows['Product_id'];?>></p>
    </div>
    </form>
    <?php
                }
            ?>
         
</section>




<!-- ----cloth select----
<div class="smallcontainer singleproduct">
    <div class="smallcontainer" style="
    margin-top: 400px;
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
            <B>Cloth</B>
            <h1>Cloth Name </h1>
            <h4>$50.00</h4> 
            <input type="number" value="1">
            <br>
            <br>
            <a href="" class="btn-1">Select</a>
            <br>
            <br>
            <h3>Cloth  Detail</h3>
            <p> Aadsjndkjsbdjbidbjdvbivibvbdbhdsjbvwihbhvbdjviabvvncbvbfkjn dfhbvbvdn,n vhfbvlfdn</p>
            <br>
            <br>
            <h3>
            <a href="">Select design</a>
        </h3>
        </div>
    </div>
</div>
</div> -->

<!-----foooter------->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col1">
                <h3>Download Our app</h3>
                <p>Download our app from ios or android  mobile phone
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
</div>
 



    

</body>
</html>