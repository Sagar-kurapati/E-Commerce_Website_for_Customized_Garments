<?php
session_start();
$DATA = implode(", ", $_SESSION['Product_id']);
$DATA2 = implode(", ", $_SESSION['Product_name']);



$server_name = "localhost:3306";
$username = "root";
$password = "";
$db_name = "project";
$uid = $_SESSION['uid'];
$cid = $_SESSION['uid'];

$con = mysqli_connect($server_name, $username, $password, $db_name);
if (!$con) {
	die("Connection Not Found:" . mysqli_connect_error());
} else {


}
mysqli_select_db($con, 'project');

if (isset($_POST['go'])) {

	$Name = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$address = $_POST['address'];
	$zipcode = $_POST['zipcode'];
	$city = $_POST['city'];
	$totalamt = $_SESSION['count'] + 100;



	$sql = "INSERT INTO `orders`(`name`, `lastname`, `address`, `zipcode`, `city`,`products`,`product_name`,`totalamt`,User_id,cid) VALUES ('$Name','$lastname','$address','$zipcode','$city','$DATA','$DATA2','$totalamt',$uid,$cid)";


	if (mysqli_query($con, $sql)) {
		echo "New Details Entry inserted successfully !";
		header('location:http://localhost/dashboard/MYPROJECT/index1.php');
	} else {
		echo "Error" . $sql . "" . mysqli_error($con);
	}


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
	<link rel="stylesheet" href="../css/style.css">

</head>
<style>
	/*shipping page css*/
	hr {
		height: 1px;
		width: 100%;
		/* background-color: var(--color-light-gray); */
		border: 0;
		margin: 2rem 0;
	}

	.container {
		max-width: 70rem;
		padding: 5vw 2rem 0;
		margin: 0 auto;
		height: 100vh;
	}

	.form {
		background-color: white;
		display: grid;
		grid-gap: 1rem;
	}

	.field {
		width: 100%;
		display: flex;
		flex-direction: column;
		border: 1px solid var(--color-lighter-gray);
		padding: .5rem;
		border-radius: .25rem;
	}

	.field__label {
		color: var(--color-gray);
		font-size: 0.6rem;
		font-weight: 300;
		text-transform: uppercase;
		margin-bottom: 0.25rem
	}

	.field__input {
		padding: 0;
		margin: 0;
		border: 0;
		outline: 0;
		font-weight: bold;
		font-size: 1rem;
		width: 100%;
		-webkit-appearance: none;
		appearance: none;
		background-color: transparent;
	}

	.field:focus-within {
		border-color: #000;
	}

	.fields {
		display: grid;
		grid-gap: 1rem;
	}

	.fields--2 {
		grid-template-columns: 1fr 1fr;
	}

	.fields--3 {
		grid-template-columns: 1fr 1fr 1fr;
	}

	.button {
		background-color: #000;
		text-transform: uppercase;
		font-size: 0.8rem;
		font-weight: 600;
		display: block;
		color: #fff;
		width: 100%;
		padding: 1rem;
		border-radius: 0.25rem;
		border: 0;
		cursor: pointer;
		outline: 0;
	}

	.button:focus-visible {
		background-color: #333;
	}



	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;


	}

	#wrapper {
		margin-top: 10%;
		display: table;
		table-layout: fixed;
		width: 100%;
		height: 100vh;
	}

	.container1 {
		margin-top: 20%;
		background-color: white;
		float: none;
		display: table-cell;
		vertical-align: middle;
		width: 33.333%;
	}

	.container2 {

		float: none;
		display: table-cell;
		vertical-align: middle;
		width: fit-content;
	}

	input,
	select {
		border: none;
		padding: 2%;
		box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
		margin-top: 2%;
	}

	input:focus,
	select:focus {
		outline: none;
	}
</style>

<body>
	<section>
		<div class="header">
			<nav id="navbar">
				<div id="logo" style="border:0px;">
					<div clas="imglogo">
						<a href="index.html"><img src="../Rglogo.jpg" style="border:6px solid white; border-radius:50%;"
								alt="RameshGarments.com"></a>
					</div>
				</div>
				<ul>
					<li class="item"><a href="../index1.php">Home</a></li>
					<li class="item"><a href="../Allproducts.php"> Products</a></li>
					<li class="item"><a href="../customization.php">Customized</a></li>
					<li class="item"><a href="../Cart.html">Cart</a></li>
					<li class="item"><a href="../profile.php">Profile</a></li>
				</ul>
			</nav>


		</div>
	</section>

	<div id="wrapper">



		<div class="container2">
			<div class="check">
				<div class="container">
					<h1>Shipping</h1>
					<p>Please enter your shipping details.</p>
					<hr />
					<form class="input" action="" method="post">
						<div class="form">

							<div class="fields fields--2">
								<label class="field">
									<span class="field__label" for="firstname">First name</span>
									<input type="text" name="firstname" id="firstname" />
								</label>
								<label class="field">
									<span class="field__label" for="lastname">Last name</span>
									<input type="text" name="lastname" id="lastname" />
								</label>
							</div>
							<label class="field">
								<span class="field__label" for="address">Address</span>
								<input type="text" name="address" id="address" />
							</label>
							<label class="field">
								<span class="field__label" for="country">Country</span>
								<select id="country">
									<option value=""></option>
									<option name="india" value="india">India</option>
								</select>
							</label>
							<div class="fields fields--3">
								<label class="field">
									<span class="field__label" for="zipcode">Zip code</span>
									<input type="text" name="zipcode" id="zipcode" />
								</label>
								<label class="field">
									<span class="field__label" for="city">City</span>
									<input type="text" name="city" id="city" />
								</label>
								<label class="field">
									<span class="field__label" for="state">State</span>
									<select id="state">
										<option value=""></option>
										<option name="Maharashtra" value="">Maharashtra</option>
									</select>
								</label>
							</div>
						</div>
						<p class="cart"><input type="submit" name="go" value="Confirm Order "></p>
					</form>




				</div>
			</div>



</body>
<html>