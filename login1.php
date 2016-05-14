<?php
	session_start();
	include("connection.php"); 
	

	if($_GET['logout'] == 1 AND $_SESSION['id'])
	{
		
		date_default_timezone_set('America/Chicago');
		$currdatetime= date('F j Y h:i:s A');
		$query = "UPDATE `users` SET `lastlogin` ='".$currdatetime."' WHERE id ='".$_SESSION['id']."'";
		mysqli_query($link,$query);
		session_destroy();
		$message = "You have been logged out.Have a nice day!";
	}
	
	if($_GET['access'] == "unauthorized"){
		$error = "Unauthorized access.Kindly login to continue";
	}
	
			
	if($_POST['submit'] == "signUp"){
	
	
		if(!$_POST['email']){
		
			$error .="</br>Please enter your email";
		}
		else
		{
			if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) $error .= "</br>please enter a valid email";
		}
		
		
	
		if(!$_POST['password'])
		{
			$error .="</br>Please enter your password";
			
		}else
		{
			if(strlen($_POST['password'])<8) $error .="</br>Please enter a password with atleast 8 characters";
			if(!preg_match('`[A-Z]`',$_POST['password'])) $error .="</br>please enter a password with capital letter ";
		}
	
		
		if(!$_POST['fname']){
		
			$error .="</br>Please enter your first name";
		}
		if(!$_POST['lname']){
		
			$error .="</br>Please enter your last name";
		}
		if(!$_POST['uname']){
		
			$error .="</br>Please enter your user name";
		}
		if($error) {
			$error = "There were error(s) in your  signup details :".$error;
		}
		else{
			
			//SQL injection possible if user uses command ');SELECT * from users;
			
			$query = "SELECT * from `users` where `uname` ='".mysqli_real_escape_string($link,$_POST['uname'])."'";
			$result = mysqli_query($link,$query);
			$results = mysqli_num_rows($result);
			
			if($results)
			{
				$error = "That email address is already registered .Do you want to login?";
			}
			else{
				
				//$query="INSERT INTO `users`(`email`,`password`) VALUES('".mysqli_real_escape_string($link,$_POST['email'])."','".md5(md5($_POST['email'].$_POST['password']))."')";
				$query1 = "INSERT INTO `users` (`fname`, `lname`, `uname`, `password`, `type`, `email`) VALUES ('".mysqli_real_escape_string($link,$_POST['fname'])."','".mysqli_real_escape_string($link,$_POST['lname'])."','".mysqli_real_escape_string($link,$_POST['uname'])."','".md5(md5($_POST['email'].$_POST['password']))."',".mysqli_real_escape_string($link,true).",'".mysqli_real_escape_string($link,$_POST['email'])."')"; 
				$result = mysqli_query($link,$query1);
				//echo $query1;
				//echo "You have been signed up";
				//echo "\nResult: ".$result;
				if(!$result){
					//echo "Error :"mysqli_error($link);
					$_SESSION['id'] = $_POST['uname'];
					//echo "MySQL error  ";
				
				}
				
				header("Location:stockhistory.php");
			}
		}
		
		
	}
	 if($_POST['submit'] == "LogIn"){
			
			$query = "SELECT * from `users` WHERE `email` = '".mysqli_real_escape_string($link,$_POST['loginemail'])."' AND `password`= '".md5(md5($_POST['loginemail'].$_POST['loginpassword']))."' LIMIT 1";
			$result = mysqli_query($link,$query);
			$row=mysqli_fetch_array($result);
			if($row){
				$_SESSION['id'] = $row['uname'];
				
				//Redirect to logged in page 
				header("Location:stockhistory.php");
			}else{
				$error = " we could not find a user with that username and password";
				
			}
			
		}
	mysqli_close($link);
?>