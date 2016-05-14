<?php include("login1.php"); ?>

<!DOCTYPE  html> 
<html  lang="en"> 
<head> 
<script src="jquery-1.9.1.min.js"></script>
<script src="validate.js"></script>
<meta  charset="utf-8"> 
<meta  http-equiv="X-UA-Compatible"  content="IE=edge"> 
<meta  name="viewport"  content="width=device-width,  initial-scale=1"> 
<title>Share Market</title> 

<!--  Bootstrap  --> 

<link  href="css/bootstrap.min.css"  rel="stylesheet"> 

<!-- HTML5 Shim   and Respond.js  IE8 support  of  HTML5 elements  and media queries  --> 

<!--  WARNING:  Respond.js  doesn't  work  if  you  view  the  page  via  file://  --> 

<!--[if  lt  IE  9]> 

<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script> 

<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script> 

<![endif]--> 

<link rel ="stylesheet" href="pageStyle.css"></link>

</head> 

<body  data-spy="scroll"  data-target=".navbar-collapse"> 

	<div class ="navbar navbar-default navbar-fixed-top">

                     <div  class="navbar-header"> 

                                  <button class="navbar-toggle" data-toggle="collapse"  data-target=".navbar-collapse"> 

                                               <span  class="icon-bar"></span> 

                                               <span  class="icon-bar"></span> 

                                               <span  class="icon-bar"></span> 

                                  </button> 

                                  <a  class="navbar-brand">Share Market</a> 

                     </div> 


					

                     <div  class="collapse  navbar-collapse"> 

                                  <ul  class="nav  navbar-nav">       

                                            
											   
											   
                                  </ul> 

                                  <form  class="navbar-form  navbar-right" method="post"> 

                                               <div  class="form-group"> 

                                                            <input type="email" name ="loginemail" placeholder="Email" class="form-control" value = "thilak1818@gmail.com"/>

                                               </div> 

                                               <div  class="form-group"> 

                                                            <input  type="password" name ="loginpassword" placeholder="Password" class="form-control" value = "Thilakganesan"/> 

                                               </div> 
												<input type ="submit" class="btn  btn-success" name = "submit" value = "LogIn"/>
                                               
                                  </form>  

                     </div> 

        </div> 



<div  class="container  contentContainer"  id="topContainer"> 
        <div  class="row"> 

                     <div  class="col-md-6  col-md-offset-3"  id="topRow"> 

                     <h1  class="marginTop BgMatch">Share Market</h1> 

                     <p  class="lead BgMatch" >Buy/Sell shares with ease..</p> 
					<?php
						if($error)
						{
							echo '<div class ="alert alert-danger">'.$error.'</div>';
						}
						if($message)
						{
							echo '<div class ="alert alert-success">'.$message.'</div>';		
						}	
					?>
                     <p class="bold  marginTop label label-primary" >Please Sign up Below</p> 

                 
                     <form  class="marginTop" method = "post"> 
								<div  class="form-group col-xs-6"> 

											   <label for="fname" class="BgMatch">First Name</label>
                                               <input type="text" name ="fname" id="fname" class="form-control " placeholder="First Name"  value = "<?php echo addslashes($_POST['fname']); ?>"/> 
                                                 
                                  </div> 
								  <div  class="form-group col-xs-6"> 

											   <label for="lname" class="BgMatch">Last Name</label>
                                               <input type="text" name ="lname" id="lname" class="form-control " placeholder="Last Name"  value = "<?php echo addslashes($_POST['lname']); ?>"/> 
                                                 
                                  </div> 
								  <div  class="form-group"> 

											   <label for="name" class="BgMatch">User Name</label>
                                               <input type="text" name ="uname" id="uname" class="form-control " placeholder="Your  userName"  value = "<?php echo addslashes($_POST['uname']); ?>"/> 
                                                 
                                  </div> 
									<div  class="form-group"> 

											   <label for="name" class="BgMatch">Email</label>
                                               <input type="text" name ="email" id="email" class="form-control " placeholder="Your  email"  value = "<?php echo addslashes($_POST['email']); ?>"/> 
                                                 
                                  </div> 
								 <div  class="form-group"> 
								 <label for="pasword" class="BgMatch">Password</label>
                                 <input type="password" name ="password" id="password" class="form-control" placeholder="Your password" value = "<?php echo addslashes($_POST['password']); ?>" /> 
                                                 
                                  </div> 
								  <div  class="form-group col-md-6 col-md-offset-3" > 
									   <input type="submit" name ="submit" value ="signUp" class="btn btn-success btn-lg marginTop"  /> 

								  </div>
								  
                         

                     </form>
                     </div> 
					
        </div> 
</div> 

<!--  jQuery  (necessary  for  Bootstrap's  JavaScript  plugins)  --> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> 

<!-- Include all  compiled plugins (below), or include individual  files  as needed  --> 

<script  src="js/bootstrap.min.js"></script> 

<script> 

   $(".contentContainer").css("min-height",$(window).height()); 
   $(".tableConatiner").css("min-height",$(window).height()); 
  
</script> 

</body> 

</html>

	