
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Doctor Finder</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

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
			
		
			
			position:relative;
			
			height:250px;
			padding:25px;
			margin-left:300px;
			margin-right:300px;
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
		
		table{
		display:block;
		height:300px;
		width:1000px;
		overflow:auto;
		}
		.marginforcontent{
		margin-left:20px;
		}
		.coutContainer  { 

                background-color:#EBF4F6; 

                width:500px; 

                background-size:cover; 
				margin-top:20px;
				
				
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
		#scroll{
			background-color:#EBF4F6;
		}
		.histlabel{
			padding-Top:20px;
			margin-left:450px;
		}
		#dataTable{
			margin-left:100px;
		}
		.marginTop{
			margin-top:20px;
		}

	</style>
  </head>
<!-- NAVBAR
================================================== -->


	<?php
	session_start();
	if($_GET['prevDay']){
		$prevDay = $_GET['prevDay'];
		
	}
	if($_GET['PE']){
		$PE = $_GET['PE'];
	
	}
	if($_GET['EPS']){
		$EPS = $_GET['EPS'];
	
	}
	if($_GET['companyname']){
		$Comp = $_GET['companyname'];
	
	}

	include("connection.php");
	
?>
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

	<form  id="calculateform" class="marginTop" method = "post"> 
		<div style="margin-bottom:20px" id ="subContentContainer" class="subContainer1">
		
			<h2 style="text-align:center" ><span class="label label-primary"><? echo $Comp ?></span></h2>
			<h3 style="text-align:center">Share Price:<? echo $prevDay ?></h3>
			<h3 style="text-align:center">P/E Ratio :<? echo $PE  ?></h3>
			<h3 style="text-align:center">EPS : <? echo $EPS ?></h3>
			
				
				
		</div>
			
	<div   style="margin:10px"  id="resultMsg"> 
     
     
	</div>

		 <div  class="container form-group col-xs-offset-4 col-xs-5"> 
				<label for="noofshares">No of shares : </label>
				<input type="text"  id="noofshares" name ="noofshares" class="form-control" /> 
								 
		</div> 
		<div class="col-xs-offset-4 col-xs-5"><input type="submit" name ="update" id ="update" value ="Buy" class="btn btn-primary btn-lg marginTop marginleftsearch"  /> </div>
					
	</form>
 <!--
 <a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</a>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	 
	<script>
		
		//$("#topContainer").css("min-height",$(window).height());
		$(document).ready(function(){
		$(".subContainer1").css("max-width",$(window).width()-200);
		$(".subContainer2").css("min-height",$(window).height());
		$(".subContainer2").css("max-width",$(window).width()-215);
		$("#scroll").css("min-height",$(window).height());
		$(".coutContainer").css("min-height",$(window).height()); 
		$(".coutContainer").css("min-width",$(window).width()-200);
		
		$("#update").click(function(event) {
				event.preventDefault();
				alert("clicked");
				var $form = $(this);
				var dataser = $form.serialize();
				var sharePrice = <? echo $prevDay ?>;
				var qty = $("#noofshares").val();
				var amt = qty*sharePrice;
				var company = "<?echo $Comp ?>";
				company = company.trim();
				var url = "calcandupdate.php?calculatedAmt="+amt+"&qty="+qty+"&company="+company;
				alert(url);
					$.ajax({
						type:'GET',
						url: url,
						cache: false,
						success:function(data){
								alert(data);
								$("#resultMsg").html(data).show(1000);
						}
        });
	
	
});
		});

		

	</script>
	
	
  </body>
</html>
