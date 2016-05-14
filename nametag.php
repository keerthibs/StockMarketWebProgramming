
<?php 
session_start();
include("connection.php");
		
			//echo $_SESSION['id'];
			$query = "select * from users where uname = '".$_SESSION['id']."'";
														
			
			$result = mysqli_query($link,$query);
			$results = mysqli_num_rows($result);
			
			if($results)
			{	
			
			
					
				$count =0;
				while($row1 = mysqli_fetch_array($result))
				  {
				  
				  echo "<div  class='container col-md-6  col-md-offset-3'  id='contentCont'> <h1 class='lead' >Mr. ".$row1['fname']."</h1>
               
                                        <p>EMAIL:". $row1['email']."</p>

								<a href='stocksearch.php' class='pull-right btn btn-primary btn-sm' >click here to sell/Buy stocks</a>
                               
                       ";
				  
				  
				  
				  }
				 
				
			}
			
			
		
		//}
	mysqli_close($link);
	
	

?>