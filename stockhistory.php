<?php 
session_start();
include("connection.php");
/*
if(!$_SESSION['id'] AND !$_SESSION['pid']){
	header("Location:index.php?access=unauthorized");
}
*/
//echo $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Share Market</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- <link rel="stylesheet" href="bootstrap-datetimepicker-master/build/css/bootstrap-datetimepicker.min.css" />-->
	<style>
		.navbar{
			padding:20px;
			
		}
		#myCarousel{
			margin-top:-20px;
			
		}
		#plus{
			width:50px;
			height:50px;
		}
		.blackfont{
			color:grey;
			
		}
		.carousel-caption {
			
			
			width:500px;
			margin-bottom:150px;
			margin-left:500px;
			
			
			color:#404040;
		}
		.slide2{
			margin-bottom:150px;
			color:white;
		}
		.glyphicon-plus-sign{
			font-size:1.5em;
			
			color:#55a8b8;
			margin-top:-10px;
		}
		.alignbrand{
			 color:#5F5A55;
			font-size:2em;
		}
		.rightnav{
			color:#55a8b8;
			font-weight:bold;
			font-size:1.1em;
			
		}
		.rightnav:hover{
			color:#117E9E;
		}
		#topContainer{
			background-color:#F5F5F5;
			background-size:cover;
			margin-top:-20px;
			
		}
		.navbar{
			background-color:white;
		}
		
		.subContainer1{
			
		
			/*border-right: 1px solid black;
			border-top:0px;
			border-left:0px;
			border-bottom:0px;
			
			*/
			position:relative;
			
			height:250px;
			margin-left:95px;
			background-color:#EBF4F6
			
		}
		
		.pullleft{
			margin-left:-14px;
			
		}
		.marginleftspeciality{
			margin-left:110px;
		}
		.marginsearch{
			margin-top:30px;
			margin-left:130px;
			margin-right:10px;
		}
		
		.subContainer2{
			
		
			margin-top:15px;
			margin-left:95px;
			background-color:#EBF4F6
			
		}
		.clearfloat{
			clear:both;
		}
		.marginleftsearch{
			margin-left:210px;
			margin-bottom:20px;
			
		}
		.simpleimg{
			margin_left:-40px;
		}
		.imgcontainer{
			width:200px;
			height:200px;
			margin-top:25px;
			margin-left:40px;
			background-color:white;
			
			border-radius:5px;
		}
		
		.upload-file-container{
			width:105px;
			
			margin-left:33px;
		}
		#piclabel{
			margin-top:60px;
			margin-left:27px;
		}
		#contentCont
		{
			background-color:white;
			width:500px;
			height:200px;
			margin-top:-214px;
			border-radius:5px;
			background-color:#EBF4F6;
			
		}
		.histlabel{
			padding-Top:20px;
			margin-left:450px;
		}
		#dataTable{
			margin-left:100px;
		}
	</style>
  </head>
<!-- NAVBAR
================================================== -->
  <body>
    
     
        <nav class="navbar navbar-default navbar-static-top" role="navigation">
          
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#"><span class="alignbrand">Share Market</span></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse ">
              <ul class="nav navbar-nav pull-right ">
			 
                <li><a href="index.php?logout=1"><span class="rightnav">Log out</span></a></li>
              
              </ul>
            </div>
			
        </nav>
		<div id ="subContentContainer" class="subContainer1">
		
				<div  class="row">
					<div class="imgcontainer form-group">
						
							<center><img style='width:200px;height:200px'src="images/icon_1.png"></center>
						 
						
					</div>
					
				</div>
				<div id="nametag" style="display:none;"></div>
			 </div>
			 <div class="clearfloat"></div>	
         	<div id ="subContentContainer2" class="subContainer2">
				<div class="histlabel"><h1 class="lead" ><span class="glyphicon glyphicon-calendar"></span> STOCK HISTORY</h1></div>
					<div id ="transhist" style="display:none;"></div>
			 </div>
			 	
      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy;  <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

  

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!-- <script src="jquery-handsontable-master/jquery-handsontable-master/dist/jquery.handsontable.full.js"></script> -->

	<!-- <link rel="stylesheet" media="screen" href="jquery-handsontable-master/jquery-handsontable-master/dist/jquery.handsontable.full.css"> -->
	<script type="text/javascript" src="moment-develop/moment.js"></script>
	
	<script>
		
		//$("#topContainer").css("min-height",$(window).height());
		$(document).ready(function(){
		$(".subContainer1").css("max-width",$(window).width()-200);
		$(".subContainer2").css("min-height",$(window).height());
		$(".subContainer2").css("max-width",$(window).width()-180);

  
  $(window).load(function(){
			 
			 
   			 $.ajax({
					type:'POST',
					url: 'nametag.php',
					cache: false,
					success:function(data){
							//alert(data);
							$("#nametag").html(data).show(1000);	
							/*	$('html,body').animate({
							scrollTop: $(".avail").offset().top+100},3500);*/
							}
					
				});
				
				 $.ajax({
					type:'POST',
					url: 'transhistory.php',
					cache: false,
					success:function(data){
							//alert(data);
							$("#transhist").html(data).show(1000);	
							/*	$('html,body').animate({
							scrollTop: $(".avail").offset().top+100},3500);*/
							}
					
				});
				
				
			});	
		});
	</script>
	
	
  </body>
</html>
