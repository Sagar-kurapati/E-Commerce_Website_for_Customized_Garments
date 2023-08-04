<?php

session_start();

$server_name = "localhost:3306";
$username = "root";
$password = "";
$db_name = "myproject";
$db_two = "project";
$uid = $_SESSION['uid'];

$con = mysqli_connect($server_name, $username, $password, $db_name);
if (!$con) {
    die("Connection Not Found:" . mysqli_connect_error());
} else {


}

$conn = mysqli_connect($server_name, $username, $password, $db_two);
if (!$con) {
    die("Connection Not Found:" . mysqli_connect_error());
} else {


}

$quer = "SELECT * FROM userdata WHERE id=$uid";
$querr = "SELECT * FROM orders WHERE User_id=$uid";

$result = $con->query($quer);
$resultt = $conn->query($querr);

if (isset($_POST['submit-logout'])) {
    session_destroy();

    header('location:http://localhost/dashboard/MYPROJECT/Login.html');
}

// mysqli_select_db($con, 'myproject');
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
        #wrapper {
            margin-top: 10%;
            display: table;
            table-layout: fixed;
            width: 100%;
            height: 100vh;
        }


        .container2 {

            float: none;
            display: table-cell;
            vertical-align: middle;
            width: fit-content;
        }

        .container {
            max-width: 70rem;
            padding: 25vw 2rem 0;
            margin: 0 auto;
            height: 100vh;
        }

        .container p {
            font-size: 25px;
            font-family: "Times New Roman", Times, serif;

        }

        .bg {
            background-color: white;
            margin-top: 25px;
            padding: 30px;
        }

        .his {
            padding: 30px;

        }

        .his table {
            margin-top: 50px;
            border: solid 1px;

        }

        th,
        td {
            border-bottom: 1px solid #ddd;
        }
        .his input{
            margin-top: 2.5%;
            padding: 10px;
            float:right;
        }
    </style>

</head>

<body>
    <section>
        <div class="header">
            <nav id="navbar">
                <div id="logo" style="border:0px;">
                    <div clas="imglogo">
                        <a href="index.html"><img src="Rglogo.jpg" style="border:6px solid white; border-radius:50%;"
                                alt="RameshGarments.com"></a>
                    </div>
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
    <div id="wrapper">



        <div class="container2">
            <div class="check">
                <div class="container">
                    <h1>Account Details</h1>
                    <?php
                    // LOOP TILL END OF DATA
                    while ($rows = $result->fetch_assoc()) {
                        ?>

                        <div class="bg">

                            <p> Account Number :
                                <?php echo $uid ?>
                            </p>

                            <p>User name :
                                <?php echo $rows['username']; ?>
                            </p>
                            <p> User Email :
                                <?php echo $rows['email']; ?>
                            </p>
                            <p> User Phone :
                                <?php echo $rows['mobilenumber']; ?>
                            </p>
                        </div>
                        <div class="his">
                            <h1>Your order History :</h1>
                            <?php
                            // LOOP TILL END OF DATA
                            while ($rows = $resultt->fetch_assoc()) {
                                ?>
                                <table style="">
                                    <tr>
                                        <td>
                                            <p> Order ID :
                                        </td>
                                        <td>
                                            <?php echo $rows['order_id']; ?>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p> Billing Name :
                                        </td>
                                        <td>
                                            <?php echo $rows['name']; ?>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p> Products ID :
                                        </td>
                                        <td>
                                            <?php echo $rows['products']; ?>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p> Products Names :
                                        </td>
                                        <td>
                                            <?php echo $rows['product_name']; ?>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p> Total Amount :
                                        </td>
                                        <td>
                                            <?php echo $rows['totalamt']; ?>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p> Billing Address :
                                        </td>
                                        <td>
                                            <?php echo $rows['address']; ?>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p> Zip Code :
                                        </td>
                                        <td>
                                            <?php echo $rows['zipcode']; ?>
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            <?php } ?>

                            <form action="" method="post">
                                <input type="submit" name="submit-logout" value="LOGOUT">
                            </form>
                        </div>





                    <?php } ?>





</body>

</html>