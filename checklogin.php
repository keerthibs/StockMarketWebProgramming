<?php

$host="localhost:8889"; 
$username="root"; 
$password="root"; 
$db_name="stock_mgmt"; 
$tbl_name="usr_table"; 

 session_start();

$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 

$conn = mysqli_connect("localhost", "root", "root");
 



 //if(!$conn){
   //                 echo "failed- DB server error";
     //               die("Connection failed: " . mysqli_connect_error());
       //         }




//else
//{
$sql="SELECT * FROM stock_mgmt.usr_table WHERE usr_name='$myusername' and usr_pass='$mypassword'";
$sql_trans= "SELECT * FROM stock_mgmt.trans_table WHERE usr_name='$myusername' ";


$result=mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);

if($count==1){

$_SESSION["user"] = $myusername;


header("location:login_success.php");
}


else {
echo "Wrong Username or Password";
}


//}



?>