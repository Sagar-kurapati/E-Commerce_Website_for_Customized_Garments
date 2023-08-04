<?php
session_start();

$server_name = "localhost:3306";
$username = "root";
$password = "";
$db_name = "myproject";

$con=mysqli_connect($server_name,$username,$password,$db_name);
if(!$con) {
    die("Connection Not Found:".mysqli_connect_error());
}
else{
    echo "Connection SuccessFull: ";
}
mysqli_select_db($con,'myproject');
$name = $_POST["username"];
$pass = $_POST["password"];
$email = $_POST["email"];
$mobilenumber = $_POST["mobilenumber"];

$quer="select * from userdata where username='$name' && password='$pass'";
$result=mysqli_query($con, $quer);
$num = mysqli_num_rows($result);
if($num==1){ 
    echo"Duplicate data";
}
else{
    $querr = "insert into userdata(username,password,email,mobilenumber) values('$name','$pass','$email','$mobilenumber')";
    mysqli_query($con, $querr);
    echo " Data Inserted SuccessFull: ";
    header('location:http://localhost/dashboard/MYPROJECT/Login.html');
}

?>