<html>
<h2> Online stock trading account</h2>

</html>
<?php
session_start();
$current_usr= $_SESSION["user"];
echo  " Wecome: $current_usr  <br>" ;

$apple_price= rand(98,105);
$ibm_price= rand(145,155);
$fb_price= rand(100,111);

$_SESSION["fb"] = $fb_price;
$_SESSION["ap"] = $apple_price;
$_SESSION["ibm"] = $ibm_price;

//echo $_SESSION["fb"];

echo "<br>Current Stock Price | Apple price : $ $apple_price";
echo " | IBM Price: $ $ibm_price";
echo " | Facebook Price:$ $fb_price";




$host="localhost:8889"; 
$username="root"; 
$password="root"; 
$db_name="Myproject"; 
$tbl_name="usr_table"; 

$conn1 = mysqli_connect("localhost", "root", "root");
 
 
//$sql1="SELECT * FROM Myproject.usr_table WHERE usr_name='$current_usr' ";
$sql_trans= "SELECT * FROM stock_mgmt.trans_table WHERE usr_name='$current_usr' ";


echo "<br><br>Previous Transaction";

$result_trans=mysqli_query($conn1,$sql_trans);

if ($result_trans->num_rows > 0) {
    // output data of each row
    while($row = $result_trans->fetch_assoc()) {
        echo "  <br> <br>Stockname : " . $row["stock_name"]. " | Type : " . $row["trans_type"]. " | Quantity: " . $row["quantity"]. "  |  Price Total : " . $row["total_price"]. "";
      $fiirstname =$row["usr_first"];


    }
} else {
    echo " <br>0 results";
}




?>

<html>
<form border=1 action="trans_success.php" method="post">
	<br>
	<fieldset>
    <legend>Make new transaction:</legend>
Transaction Type  :<select name="type">
<option value="Buy">Buy</option>
<option value="Sell">Sell</option></select>

Select Stock  :<select name="stk_name">
<option value="Apple">Apple</option>
<option value="Facebook">Facebook</option>
<option value="IBM">IBM</option>
</select>
Number of Stocks: <input type="text" name="stk_quant">

<input type="submit" name="submit" value="Checkout">
</fieldset>
</form>

</html>
<?php
if(isset($_GET['submit']))
{
    $name=$_GET['name'];
    $c=mysql_connect("localhost","root","");
    mysql_select_db("test");
    $ins=mysql_query("insert into option (name) values ('$name')",$c);
    if($ins)
    {
        echo "<br>".$name."inserted";
    }
    else
    {
        echo mysql_error();
    }
}
?>
