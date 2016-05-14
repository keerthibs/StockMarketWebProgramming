<?
session_start();
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

	<style>
		.insidecontent{
			margin-left:10px;
		}
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
			background-color:white;
			
		}
		.clearfloat{
			clear:both;
		}
		.marginleftsearch{
			margin-left:210px;
			margin-bottom:20px;
		}
		td{
			width:100px;
			height:100px;
			padding:15px;
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
		<div class ="container" id ="topContainer">
			<div id ="subContentContainer" class="subContainer1">
		
			 <div  class="row"> 
					<form  id="searchform" class="marginTop" method = "post"> 
						 <div id="searchFormMsg" style="display:none">
							 
							 </div>
                     <div  class="col-md-6  col-md-offset-3"  id="topRow"> 
							 
							 <label class="marginsearch"><span class="glyphicon glyphicon-search"></span>Search by Company name</label> 
							 <hr>
							 
							 <div  class="form-group col-xs-offset-3 col-xs-5 marginleft  "> 
													<label for="compname">Search Company</label>
													<input type="text"  id="compname" name ="compname" class="form-control" placeholder="eg: Apple Inc" value = "<?php echo addslashes($_POST['compname']); ?>" /> 
														 
										  </div> 
							 
										<div class="clearfloat"></div>
							<div class="col-xs-12"><input type="submit" name ="stocksearch" id ="stocksearch" value ="Search" class="btn btn-primary btn-md marginTop marginleftsearch"  /> </div>
					
                     </div> 
					
					 
			</div> 
							
			</form>	
			</div>
			
		
		</div>
		
		<div id="tableMsg" style="display:none"></div>

     <div id ="subContentContainer" class="subContainer2">
		
			 <div  class="row"> 
					
                     <div  class="col-md-9 col-md-offset-3"  id="seconddiv"> 
							
					</div>
			</div>
			</div>

      <!-- /END THE FEATURETTES -->


      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p></p>
      </footer>

  

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
	<script>
		
		//$("#topContainer").css("min-height",$(window).height());
		$(".subContainer2").css("min-height",$(window).height());
		$(".subContainer2").css("min-width","100%");
		
		$("#searchform").submit(function(event) {
			event.preventDefault();
			
			var $form = $(this);
			var dataser = $form.serialize();
			
				$.ajax({
					type:'POST',
					url: 'companydetails.php',
					data: dataser,
					cache: false,
					success:function(data){
							//alert(data);
							var str = data;
							var n = str.search("danger");
							
							if(n>0)
							{
								$("#searchFormMsg").html(data).show(1000);
							}else{
							$("#tableMsg").html(data).show(1000);
							
							 }
					}
					
				});
			});
$(document).ready(function(){
	$.ajax({
					type:'POST',
					url: 'companydetails.php',
					cache: false,
					success:function(data){
							//alert(data);
							var str = data;
							var n = str.search("danger");
							
							if(n>0)
							{
								$("#searchFormMsg").html(data).show(1000);
							}else{
							$("#tableMsg").html(data).show(1000);
							
							 }
					}
					
				});
	
});
			
$('body').on('click', '.clickeventclass', function (e) {
    
    e.preventDefault();
			var compId = $(this).attr('id');
			var compName = $(this).attr('title');
			//alert(compName);
			//alert(docId);
			
			//location.href = "doctorprofile.php?getdocId="+docId;
			$.ajax({
					type:'GET',
					url: 'http://finance.yahoo.com/d/quotes.csv?s='+compId+'&f=price',
					cache: false,
					success:function(data){
							
							var splittedData = data.split(",");
							
							var url = "checkout.php?prevDay="+splittedData[0]+"&PE="+splittedData[1]+"&EPS="+splittedData[4]+"&companyname="+compName;
							location.href = url;
							//alert(url);
							//Prev Day close,P/E,EPS
					}
					
				});
		
		
		return false; 
			
				
				
});
	</script>
	
	
  </body>
</html>
