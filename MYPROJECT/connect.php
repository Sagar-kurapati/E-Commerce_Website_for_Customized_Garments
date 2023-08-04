<?php

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
?>