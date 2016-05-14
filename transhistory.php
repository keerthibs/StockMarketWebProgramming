
<?php 
session_start();
include("connection.php");

				
			$query = "SELECT * from trans_table where uname ='".$_SESSION['id']."'";
			
			$result = mysqli_query($link,$query);
			$results = mysqli_num_rows($result);
			
			if($results)
			{	
			
			echo "<div  class='container table-responsive'  id='tableContainer'><table class='table table-striped table-bordered table-hover '>
				<tr>
				<th>Transaction ID</th>
				<th>Stock Name</th>
				<th>Quantity</th>
				<th>Transaction Type</th>
				<th>Total Price</th>
				</tr>";

				while($row = mysqli_fetch_array($result))
				  {
				  echo "<tr>";
				  echo "<td>" . $row['trans_id'] . "</td>";
				  echo "<td>" . $row['stock_name'] . "</td>";
				  echo "<td>" . $row['quantity'] . "</td>";
				  echo "<td>" . $row['trans_type'] . "</td>";
				  echo "<td>" . $row['tot_price'] . "</td>";
				 
				 echo "</tr>";
				  }
				echo "</table>
				<div  class='pull-right'>
			</div></div>";
				
			}
			else{
				$error = '<div class ="alert alert-danger col-xs-8 col-xs-offset-2"><center>No Stock transactions found</center></div>';
				echo $error;
			}
			
		

	mysqli_close($link);
	
	

?>