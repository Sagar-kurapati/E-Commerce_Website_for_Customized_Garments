<?php
session_start();


$server_name = "localhost:3306";
$username = "root";
$password = "";
$db_name = "project";
$uid = $_SESSION["uid"];

$con = mysqli_connect($server_name, $username, $password, $db_name);
if (!$con) {
	die("Connection Not Found:" . mysqli_connect_error());
} else {
	
}
mysqli_select_db($con, 'project');

$quer = "SELECT * FROM addtocart WHERE cid=$uid";
$quer2 = "SELECT * FROM addtocart";
// $querr = "SELECT Product_image FROM product WHERE Product_id=5";

$result = $con->query($quer);
// $result1 = $con->query($querr);
$result2 = $con->query($quer2);

$row=mysqli_fetch_assoc($result2);
// $_SESSION['uid']=$row['User_id'];

// $sq = "SELECT COUNT(*) AS cartt FROM addtocart WHERE User_id='" . $uid . "';";
$sq = "SELECT sum(Product_price*Product_quantity) AS cartt FROM addtocart WHERE User_id='$uid' ";
$qresult = $con->query($sq);
if (mysqli_query($con, $sq)) {
	$r = mysqli_fetch_assoc($qresult);
	$qcount = $r['cartt'];
	$_SESSION['count'] = $qcount;
}

$total_amt = "SELECT sum(Product_price*Product_quantity) AS total FROM addtocart WHERE User_id='$uid'";
$totalamt = $con->query($total_amt);
if (mysqli_query($con, $total_amt)) {
	$r = mysqli_fetch_assoc($totalamt);
	$count = $r['total'];
	$_SESSION['totalcart'] = $count;
} else {
	echo "Error: " . $total_amt . "" . mysqli_error($conn);
}


$con->close();
?>


<!DOCTYPE html>
<html>

<head>
	<title>Shopping Cart UI</title>
	<link rel="stylesheet" type="text/css" href="css/style1.css">
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,900" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
	<script type="text/javascript" src="./custom.js"></script>

	<style>
		.cartb input{
			width:100px;
		}
		.card {
			display: flex;
		}

		.data {
			margin: 10%;
			display: flex;
			size: 10px;
		}

		.Name {
			margin-right: 20%;
			font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
		}

		.total {
			margin-right: 5%;
		
		}

		.container .noproducts {
			visibility: visible;
			width: 100%;
			display: flex;
			align-items: center;
			justify-content: center;
			border: 5px solid Red;
		}

		.maincart {

			width: 100%;
			border: 2.5px solid black;
		}

		.a {
			padding: 5%;
		}

		.container {
			display: flex;
			align-items: center;
			justify-content: center;

			width: 100%;
			height: 70vh;
		}

		.container h3 {

			text-align: center;

		}
		
		
	</style>
</head>

<body>

	<section>
		<div class="header">
			<nav id="navbar">
				<div id="logo" style="border:0px;">
					<a href="index.html"> <img src="Rglogo.jpg" style="border:6px solid white; border-radius:50%;"
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

	<section>
		<div class="CartContainer">

			<div class="Header1">
				<h3 class="Heading1">Shopping Cart</h3>
				<h5 class="Action1">Remove all</h5>
			</div>

			<?php
			$pids = [];
			// LOOP TILL END OF DATA
			while ($rows = $result->fetch_assoc()) {
				$pids[] = $rows['Product_id'];
				$pnames[]=$rows['Product_name'];
				$_SESSION['Product_id'] = $pids;
				$_SESSION['Product_name'] = $pnames;

				?>

				<!-- </form> -->

				<form action="" method="POST">
					<div class="Cart-Items">
						<div class="image">
							<!-- <img src="../images/iphone.png" alt="null" /> -->
							<img src="data:image/jpg;charset=utf8;base64,<?php echo ($rows['Product_image']); ?>"
								style="padding-top: 21px; width: 302px; height: 211px">
						</div>
						<div class="data">
							<label class="Name">
								<?php echo $rows['Product_name']; ?>
							</label>
							<label class="price" name="price" value="<?php echo $rows['Product_price']; ?>"></label>
							<!-- <label><?php echo $rows['c_category']; ?></label> -->
							<button type="submit" class="decrement updateQty">-</button>
							<input type="text" name="input-qty" class="input-qty" value=<?php echo $rows['Product_quantity']; ?>>
							<button type="submit" class="increment updateQty">+</button>
							<input type="number" name="total" class="total"
								value="<?php echo $rows['Product_price'] * $rows['Product_quantity'] ?>" disabled>
							<button type="submit" class="remove">Remove</button>
							<input type="hidden" name="cartidd" class="cartidd" value="<?php echo $rows['Cart_id'] ?>"
								disabled>
							<input type="hidden" name="useridd" class="useridd" value="<?php echo $rows['User_id'] ?>"
								disabled>

								
						</div>
					</div>
				</form>

				<?php

				 

			}
		

			?>
	</section>

	<div class="cartbottom">
		<h3 style="text-align:end;padding-right:10%;">Order Details</h3>
		<div class="totalamt" style="
	margin-left: 5%;
	width: 90%;
	height: 400px;
">

			<table>
				<tr class="order">

				</tr>
				<tr>
					<th style=" height: 40px; width:100%;text-align:center;"></th>
					<th style="text-align: center;"> </th>
				</tr>
				<tr>
					<td style="text-align:end;padding-right: 20px;">Subtotal :</td>
					<td>
						<?php echo $qcount; ?>
					</td>
					<!-- <td><input id="amt" class="amt" name="amt" value="" disabled/></td> -->
				</tr>
				<tr>
					<td style="text-align:end;padding-right: 20px;">
						Shipping Charges :
					</td>
					<td><label name="ship" value="100">100</label></td>

				</tr>
				<tr>
					<td style="text-align:end;padding-right: 20px;">Total :</td>
					<td><input id="amt" class="amt" name="amt" value="<?php echo $qcount + 100; ?>" disabled /></td>
				</tr>
				<tr>
				<td></td>
			
			<div class="cartb">
			
			<td style="text-align:start;padding-left: 10px;">
			<div class="cartb">
			
				<form action="http://localhost/dashboard/MYPROJECT/Checkout/Checkout.php" method="POST">

					<input type="submit" name="chkoutbtn" value="Checkout">

				</form>
				</div>
				</td>
				</tr>
				</table>


</body>

</html>