<?php
					
					//connect to db
					//mysql_connect('localhost', 'root', 'root') or die(mysql_error());;
					//mysql_select_db('payroll_mgmt') or die(mysql_error());;
					$db = new PDO("mysql:dbname=stock_mgmt;host=localhost","root","root");
					
					//get the username
					
					$username = $_POST['usrname'];
					
					//query to select field username if thats equals the username we check
					$result = $db->query("select count(usr_name) from usr_table where usr_name = '$username'");
					$count = $result->fetch();
					
					//window.alert($result);
					//if number of rows fields is bigger than 0 then username already exists in the table
					
					if($count[0] > 0)
							echo 1;
					else
						echo 0;
					
?>