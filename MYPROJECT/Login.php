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


$quer="select * from userdata where username='$name' && password='$pass'";
$result=mysqli_query($con, $quer);
$num = mysqli_num_rows($result);
if($num==1)
{ 
    echo"Login successful";
    $row=mysqli_fetch_assoc($result);
    
        $_SESSION['uid']=$row['id'];
        header('location:http://localhost/dashboard/MYPROJECT/index1.php');
    
    
}
else{
  echo "Login failed";
}

?>