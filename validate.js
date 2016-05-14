
$(document).ready(

function () {
	
	var flag = 0;
	$("#fname").after("<span hidden class=data1></span>");
	$("#fname").after("<span hidden class=error1>\tInvalid First Name</span>");
	$("#fname").after("<span hidden class=correct1></span>");
	
	$("#lname").after("<span hidden class=data4></span>");
	$("#lname").after("<span hidden class=error4>\tInvalid Last Name</span>");
	$("#lname").after("<span hidden class=correct4></span>");
	
	$("#uname").after("<span hidden class=data6></span>");
	$("#uname").after("<span hidden class=error6>\tInvalid User Name</span>");
	$("#uname").after("<span hidden class=error7>\tUser Name already exists</span>");
	$("#uname").after("<span hidden class=correct6></span>");
	
	$("#password").after("<span hidden class=data2></span>");
	$("#password").after("<span hidden class=error2>	Invalid Password</span>");
	$("#password").after("<span hidden class=correct2></span>");
	
	$("#email").after("<span hidden class=data3></span>");
	$("#email").after("<span hidden class=error3>	Invalid Email</span>");
	$("#email").after("<span hidden class=correct3></span>");
	
	
	function flagVal(flag) {
		if(flag > 0)
			return 1;
		else
			return 0;
	}
	
	function validate(regex, variable) {
		
		if(variable.length==0){
			 return 1;
		}
	else if (!regex.test(variable)) {
		   return 1;
        }
	
	else{
			flag = flagVal(flag);
			return flag;
		}
	}
	
	function finalFunc(flag) {
		//document.getElementById("validation").setAttribute("value", flag);
	}
	
	/////////////////////////////////////////////////////////////////
	$("#fname").focus(function(){
	
		$(".data1").text("	The first name must not be blank.");
		$(".data1").show();
		$(".correct1").hide();
		$(".error1").hide();
		
	});
	
	
	$("#fname").blur(function(){
		
		var firstname=$(this).val();
		if(firstname.length==0){
			$("error1").show();
			
		}
		
		$(".data1").hide();
		$(".data1").text('');
		
	});		
	
	$("#fname").change(function(){
		
	var firstname=$(this).val();
	//var regex = new RegExp("^[a-zA-Z0-9 ]+$");
		
		if(firstname.length==0){
			 $(".error1").show();
			 
		}
	
	else{
		 $(".error1").hide();
		$(".correct1").show();
			
		}

	});
	
	////////////////////////////////////////////////////////////////////
	$("#lname").focus(function(){	
	
		$(".data4").text("	The last name must not be blank.");
		$(".data4").show();
		$(".correct4").hide();
		$(".error4").hide();
		
	});
	
	$("#lname").blur(function(){
		
		var lastname=$(this).val();
		if(lastname.length==0){
			$("error4").show();
			
		}
		
		$(".data4").hide();
		$(".data4").text('');
		
		
	});		
	
	$("#lname").change(function(){
		
	var lastname=$(this).val();
	//var regex = new RegExp("^[a-zA-Z ]+$");
		
		if(lastname.length==0){
			 $(".error4").show();
			 
		}
	
	else{
		 $(".error4").hide();
			$(".correct4").show();
			
		}
	
		
	});
	/////////////////////////////////////////////////////////////////////////
	

        //when button is clicked  
        $('#submit').click(function(){  
        
			//flag = validate(new RegExp("^[a-zA-Z ]+$"), $("#fname").val());
			//flag = validate(new RegExp("^[a-zA-Z ]+$"), $("#lname").val());
			//flag = validate(new RegExp("^[a-zA-Z0-9_]+$"), $("#username").val());
			flag = validate(new RegExp("^[A-Z]+$"), $("#password").val());	   
			 
			 var username = $('#username').val();  
		
			//use ajax to run the check  
			//$.post("check_avail.php", { usrname: username },  
            $.ajax({url: "check_avail.php", data: {usrname: username}, type: 'POST', async: false
			}).done(function(response){  
                if(response == 1){  
                    // the username already exists in db  
						flag = 1;
						window.alert('Username value already exists');
						finalFunc(flag);	
                }else{  
                    //show that the username is available  
					$(".error7").hide();
					flag = flagVal(flag);
					window.alert('User successfully registered');
					finalFunc(flag);
				}  
				});  
		
        });  
  
  
	/////////////////////////////////////////////////////////////////////////////////////////
	
		$("#uname").focus(function(){	
	
		$(".data6").text("	The User name must not be blank.");
		$(".data6").show();
		$(".correct6").hide();
		$(".error6").hide();
		$(".error7").hide();
		
	});
	
	$("#uname").blur(function(){
		
		var uname1=$(this).val();
		if(uname1.length==0){
			$("error6").show();
			$(".error7").hide();
			
		}
		
		$(".data6").hide();
		$(".data6").text('');
		
		
	});		
	
	$("#uname").change(function(){
		
	var uname1=$(this).val();
	//var regex = new RegExp("^[a-zA-Z0-9_]+$");
		
		if(uname1.length==0){
			 $(".error6").show();
			 $(".error7").hide();
			 
		}
	
	else{
		 $(".error6").hide();
		 $(".error7").hide();
			$(".correct6").show();
			
		}
	
		
	});
	//////////////////////////////////////////////////////////////////

	$("#password").focus(function(){
	
	
		$(".data2").show();
		$(".data2").text("	The password can only contain capital letters.");
		$(".correct2").hide();
		$(".error2").hide();
		
	});
	
	$("#password").blur(function(){
		
		var pName=$(this).val();
		if(pName.length==0){
			$("error2").show();
			
		}
		
		$(".data2").hide();
		$(".data2").text('');
		
		
	});		
	
	$("#password").change(function(){
		
	var pName=$(this).val();
	var regex = new RegExp("^[A-Z]+$");
		
		if (pName.length == 0) {
           $(".error2").show();
		   $(".correct2").hide();
		   
        }
		else if (!regex.test(pName)) {
           $(".error2").show();
		   $(".correct2").hide();
		   
        }
		else{
			$(".correct2").show();
			$(".error2").hide();
			
		}
	
		
	});
	
	////////////////////////////////////////////////////////////
	
	$("#email").focus(function(){
	
	
		$(".data3").show();
		$(".data3").text("	Email address must contain an @ .");
		$(".correct3").hide();
		$(".error3").hide();
		
	});
	
	$("#email").blur(function(){
		
		var eName=$(this).val();
		if(eName.length==0){
			$("error3").show();
			
		}
		
		$(".data3").hide();
		$(".data3").text('');
		
		
	});		
	
	$("#email").change(function(){
		
var eName=$(this).val();
	
		
		if(eName.length==0){
			 $(".error3").show();
			 
		}
	else if (eName.indexOf("@")<0) {
           $(".error3").show();
		   	$(".correct3").hide();
			
        }
	
	else{
			$(".correct3").show();
			 $(".error3").hide();
			 
		}
	
		
	});
	
});


