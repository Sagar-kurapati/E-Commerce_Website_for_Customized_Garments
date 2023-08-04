<?php
$server_name = "localhost:3306";
$username = "root";
$password = "";
$db_name = "project";


$con = mysqli_connect($server_name, $username, $password, $db_name);
if (!$con) {
    die("Connection Not Found:" . mysqli_connect_error());
} else {
}
mysqli_select_db($con, 'project');





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
            margin-top: 589px;
            ;
        }

        .card {


            padding-bottom: 15px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            text-align: center;
            font-family: arial;
            margin-left: 10%;
            margin-right: 5%;
            margin-bottom: 26px;
            max-width: 80%;
            justify-content: center;
            background-color: white;
            box-shadow: 10px 10px 5px #aaaaaa;
            transition: transform .2s;

        }

        .card:hover {
            /* -ms-transform: scale(1.5); IE 9
            -webkit-transform: scale(1.5); Safari 3-8  */
            transform: scale(1.1);

        }

        .Name {
            margin-left: 30px;
            margin-left: 30px;
            font-size: 50px;
            font-style: italic;
            font-weight: lighter;
        }

        .price {
            font-size: 22px;
            margin-left: 30px;
        }

        .cart {
            margin-top: 10px;
            margin-left: 35 px;
        }

        .detail-1 {
            margin-left: 5px;
            margin-right: 5px;
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
    </style>


</head>

<body>
    <section>
        <div class="header">
            <nav id="navbar">
                <div id="logo">
                    <a href="index.html"> <img src="./Rglogo.jpg" style="border:6px solid white; border-radius:50%;"
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
    </section>

    <section id="product">

        <form method="POST">
            <Center>
                <h1 class="Name">Select Cloth Type :</h1>
            </Center>

            <div class="card">

                <img src="./pics/Cotton_Fabric.jpg" alt="Denim Jeans"
                    style="padding-top: 21px; width: 500px; height: 211px;">
                <h1>Cotton</h1>
                <p class="detail"></p>
                <input id="inp" type="button" value="Select" onclick="location.href='types/pattern.php';" />
            </div>
            <div class="card">

                <img src="./pics/Nylon_Fabric.jpg" alt="Denim Jeans"
                    style="padding-top: 21px; width: 500px; height: 211px;">
                <h1>Nylon</h1>
                <p class="detail"></p>
                <input id="inp" type="button" value="Select" onclick="location.href='types/pattern.php';" />
            </div>
        </form>
    </section>

</body>

</html>