<html>
	<head>
		<script src="jquery-1.9.1.min.js"></script>
		<script src="validate.js"></script>
		<meta charset="utf-8">
		<link rel="stylesheet" href="validate.css">
		<title>Sign Up</title>
		<?php
				session_start();
				if($_SERVER['REQUEST_METHOD'] == 'POST') {
					$db = new PDO("mysql:dbname=stock_mgmt;host=localhost","root","root");
					$fname=$_POST['fname'];
					$mname=$_POST['mname'];
					$lname=$_POST['lname'];
					$email=$_POST['email'];
					$username=$_POST['username'];
					$password=$_POST['password'];
					
					if($_POST['validation'] == 0){	
						$query = $db->prepare("insert into usr_table (usr_first,usr_middle,usr_last,usr_email,usr_name,usr_pass) 
										   values (:fn, :mn, :ln, :mail, :user , :pass)");
						$query->bindParam(':fn', $fname);
						$query->bindParam(':mn', $mname);
						$query->bindParam(':ln', $lname);
						$query->bindParam(':mail', $email);
						$query->bindParam(':user', $username);
						$query->bindParam(':pass', $password);
						$query->execute();
						
						header('location:index.php');
					}
					else {
						header('location:signup.php');
					}
				session_destroy();
				}
			?>
	</head>
	<body onload="myFunction()">
	<?php
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);
	?>
		<table cellspacing="15px" border="0px">
			<form method="POST">
			<input type="hidden" name="validation" value="validation" id="validation">
				<tr>
				<td><label for="fname">First Name:</label></td>
				<td><input type="text" name="fname" id="fname"></td>
			</tr>
				<tr>
				<td><label for="mname">Middle Name:</label></td>
				<td><input type="text" name="mname" id="mname"></td>
			</tr>
				<tr>
				<td><label for="lname">Last Name:</label></td>
				<td><input type="text" name="lname" id="lname"></td>
			</tr>
			<tr>
				<td><label for="email">Email:</label></td>
				<td><input type="email" name="email"></td>
			</tr>
				<tr>
				<td><label for="username">Username:</label></td>
				<td><input type="text" name="username" id="username"></td>
				
			</tr>
			<tr>
				<td><label for="password">Password:</label></td>
				<td><input type="password" name="password" id="password"></td>
			</tr>
			<tr>
				<td><input type="submit" name="Sign Up" id="submit"></td>
			</tr>
			</form>
		</table>
	</body>
	
</html>