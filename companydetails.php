
<?php 
session_start();
include("connection.php");
			
			$query = "select * from `stocks`";
						;							
			if($_POST['compname']){
				$query = $query.' where `stock_name` LIKE '."'%".mysqli_real_escape_string($link,$_POST['compname'])."%'";
			}
	
			
			$result = mysqli_query($link,$query);
			$results = mysqli_num_rows($result);
			
			if($results)
			{	
			
			echo "<div  class='container table-responsive'  id='tableContainer'><table> ";
				
					
				$count =0;
				$countflag=0;
				while($row = mysqli_fetch_array($result))
				 {
				 
				  $img = $row['img_link'];
				  
				  if($count%3==0) {
				  if($count!=0){
				  echo "</tr>";
				   }
				  }
				  if($count%3==0){
				  echo "<tr>";
				  }
				  
				  echo "<td><center><img style='width:150px;height:175px'src='".$img."'></center></td>";
				  
				  echo "<div id='insidecontent'><td style='width:200px; height:100px;'>" . $row['stock_name'].
				  "<br><input type='button' title='".$row['stock_name']."'  name ='coutbtn' id ='".$row['stock_abbr']."' value ='Buy/Sell' class='clickeventclass btn btn-success btn-sm marginTop'/></td></div>";
				  
				  
				  if($results == 1){
					  echo "</tr>";
					
				  }
				   $count++;
				  }
				 if($results>3){
					echo "</tr>";
				 }
				echo "</table>
				</div>";
			}
			else{
				$error = '<div class ="alert alert-danger">No company found </div>';
				echo $error;
			}
			
		
		
	mysqli_close($link);
	
	

?>