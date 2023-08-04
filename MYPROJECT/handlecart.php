<?php
session_start();

$server_name="localhost:3306";
$username="root";
$password="";
$db_name="project";

$conn=mysqli_connect($server_name,$username,$password,$db_name);
if(!$conn)
{
    die("Connection Failed:".mysqli_connect_errorr());

}
if(isset($_POST['scope'])){

    $scope=$_POST['scope'];
    switch($scope)
    {
        case "update":

            $prod_id=$_POST['prod_id'];
            $userid=$_POST['userid'];
            $prod_qty=$_POST['prod_qty'];

            $existing="SELECT * FROM addtocart WHERE User_id='$userid' AND Cart_id='$prod_id' ";
            $existing_run = mysqli_query($conn,$existing);

            if(mysqli_num_rows($existing_run)>0)
            {
                $update_query="UPDATE addtocart set Product_quantity='$prod_qty' WHERE User_id='$userid' AND Cart_id='$prod_id'";
                $update_run=mysqli_query($conn,$update_query);
                if($update_run){
                 
                }else{
                    echo 500;
                }
            }
            else{
                echo "something went wrong";

            }


            break;
            case "delete":

                $prod_id=$_POST['prod_id'];
                $userid=$_POST['userid'];
                $sqll="DELETE FROM `addtocart` WHERE User_id='$userid' AND Cart_id='$prod_id' ";
                $re=$conn->query($sqll);
    
                if (mysqli_query($conn, $sqll)) 
                {
          
                }
                else{
                    echo "something went wrong";   
                }
                break;

            default:
            echo 500;
    }
}


?>