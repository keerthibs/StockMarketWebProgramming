<?php

session_start();
$current_usr= $_SESSION["user"];

$fb_price1= $_SESSION["fb"];

$ap_price1= $_SESSION["ap"];

$ibm_price1= $_SESSION["ibm"];

//echo "$fb_price1";

 $type=$_POST['type'];
$stk=$_POST['stk_name'];
 $quant=$_POST['stk_quant'];
 //$stk_price= $quant*;

if ($stk=="Apple")
	{$stok_price= $ap_price1;}

if ($stk=="Facebook")
	{$stok_price= $fb_price1;}

if ($stk=="IBM")
	{$stok_price= $ibm_price1;}




$total_price1= $quant*$stok_price;


 



$conn2 = mysqli_connect("localhost", "root", "root");



$sql1="INSERT INTO stock_mgmt.trans_table (`trans_id`, `usr_name`, `stock_name`, `quantity`, `trans_type`, `total_price`) VALUES (NULL, '$current_usr', '$stk', '$quant', '$type', '$total_price1')";



if (mysqli_query($conn2,$sql1))
    {
        echo "<br>Congrats!!!Your Transaction is complete";
    }
    else
    {
        echo mysql_error();
    }

echo "<br><br>Stock Price for this Transaction: $stok_price  <br>";
echo "<br> Total Price for transaction: $total_price1 <br>";
?>
<html><br>
<a href="login_success.php">Make Anaother Transaction</a>

</html>



