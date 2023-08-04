<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customized Garments for Men | RameshGarments.com </title>
    <link rel="stylesheet" href="../css/style.css">
</head>
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

<body>
    <section>
        <div class="header">
            <nav id="navbar">
                <div id="logo">
                    <a href="index.html"> <img src="../Rglogo.jpg" style="border:6px solid white; border-radius:50%;"
                            alt="RameshGarments.com"></a>
                </div>
                <ul>
                    <li class="item"><a href="../index1.php">Home</a></li>
                    <li class="item"><a href="../Allproducts.php"> Products</a></li>
                    <li class="item"><a href="../customization.php">Customized</a></li>
                    <li class="item"><a href="../Cart.php">Cart</a></li>
                    <li class="item"><a href="../profile.php">Profile</a></li>

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


    <!------------customization----------------->

    <section id="product">

        <form method="POST">
            <Center>
                <h1 class="Name">Select Desgin Type :</h1>
            </Center>

            <div class="card">

                <img src="../pics/2.jfif" alt="Denim Jeans" style="padding-top: 21px; width: 500px; height: 211px;">
                <h1>Anime</h1>
                <p class="detail"></p>
                <input id="inp" type="button" value="Select" onclick="location.href='./Anime.php';" />
            </div>
            <div class="card">

                <img src="../pics/1.jfif" alt="Denim Jeans" style="padding-top: 21px; width: 500px; height: 211px;">
                <h1>Normal</h1>
                <p class="detail"></p>
                <input id="inp" type="button" value="Select" onclick="location.href='./normal.php';" />
            </div>
        </form>
    </section>


    <!-----foooter------->
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
                    <img src="../Rglogo.jpg" alt="123" style="height: 100px;">
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