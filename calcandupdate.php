<?php 
session_start();
include("connection.php");


	echo "In here".$SESSION['id'];
   	$Tracker;
		$calcAmt = (float)$_GET['calculatedAmt'];
		$qtyInt = (int)$_GET['qty'];
		$cinMessage = "";
		echo $cinMessage.$SESSION['id'];
		
		$query = "INSERT INTO `trans_table` (`uname`, `tot_price`, `quantity`, `stock_name`, `trans_type`) VALUES 
		('".$SESSION['id']."',".$calcAmt.",".$qtyInt.",'".$_GET['company']."','bought'"; 
		if(!mysqli_query($link,$query))
				{
				$error = mysqli_error($link);
				$Tracker .= 'Purchase failed'+$error;
				
				}
				else{
				
				$Tracker .=  '</br>Purchase confirmed';
				
				}
    
	if($Tracker){
	$cinMessage = '<div class ="alert alert-info col-md-6  col-md-offset-3">Summary:'.$Tracker.'</div>';
	echo $cinMessage;
	}
	
				

/*else{
	
	$cinMessage = '<div  class="col-md-6  col-md-offset-3"><div class ="alert alert-danger">Amount not calculated</div></div>';
	echo $cinMessage;
}*/

mysqli_close($link);

?>