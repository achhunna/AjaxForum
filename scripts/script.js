function isEmpty(str) {
    return (!str || 0 === str.length);
}

$(document).ready(function(){

	function showComment(){
		$.ajax({
			type:"post",
			url:"ajax.php",
			data:"action=showcomment",
			success:function(data){
				 $("#commentOutput").html(data);
			}
		});
	}
	function clearEntry(){
		$("#username").val("");
		$("#password").val("");
		$("#confirmPassword").val("");
		$("#output").html("");
	}
	function showAddUser(){
		$("#confirmDiv").show();
		$("#cancelButton").show();
		$("#createButton2").show();
		$("#createButton1").hide();
		$("#loginButton").hide();
		clearEntry();
	}
	function hideAddUser(){
		$("#confirmDiv").hide();
		$("#cancelButton").hide();
		$("#createButton2").hide();
		$("#createButton1").show();
		$("#loginButton").show();
		clearEntry();
	}
	function hideOptions(){
		$("#optionsTable").hide();
	}
	function showOptions(){
		$("#optionsTable").show();
	}
	
	//check session set to call setInterval
	$.ajax({
		type:"post",
		url:"ajax.php",
		data:"action=sessionCheck",
		success:function(data){
			if(data.length > 0){
				setInterval(function(){
					showComment();
				},1000);
				//alert(data);
			}
		}
	});
	
	$("#loginButton").click(function(){
		var username = $("#username").val();
		var password = $("#password").val();
		if(!(isEmpty(username)||isEmpty(password))){
			$("div#output").html("");
			$.ajax({
				type:"post",
				url:"ajax.php",
				data:"username=" + username + "&password=" + password + "&action=login",
				success:function(data){
					if(data == "Success"){
						window.location="feedback.php";
					}else{
						$("#output").html("Incorrect username/password.");
					}					
				}

			});
		}else{
			$("#output").html("Please enter username and password.");
		}
	});

	$("#createButton1").click(function(){
		showAddUser();
	});
	$("#cancelButton").click(function(){
		hideAddUser();
	});
	
	$("#createButton2").click(function(){	
		var username = $("#username").val();
		var password = $("#password").val();
		var confirmPassword = $("#confirmPassword").val();
		if(!(isEmpty(username)||isEmpty(password)||isEmpty(confirmPassword))&&(password == confirmPassword)){
			$.ajax({
				type:"post",
				url:"ajax.php",
				data:"username=" + username + "&password=" + password + "&action=adduser",
				success:function(data){
					hideAddUser();
					$("#output").html("user added.");
				}
			});
		}else if(!(password == confirmPassword)){
			$("div#output").html("Password not matching.");
		}else{
			$("div#output").html("Cannot create username/password.");		
		}
		
	});
	
	$("#postButton").click(function(){
		var user = $("#user").val();
		var message = $("#commentBox").val();
		$("#commentBox").val("");
		if(!isEmpty(message)){
			$.ajax({
				type:"post",
				url:"ajax.php",
				data:"user=" + user + "&message=" + message + "&action=addcomment",
				success:function(data){
					showComment();
				}

			});
		}
	});
	
	$("#logoutButton").click(function(){
		$.ajax({
			type:"post",
			url:"ajax.php",
			data:"action=logout",
			success:function(data){
				$("#commentOutput").html(data);
			}
		});
		location.reload();
		//window.history.back();
	});
	$("#loginButton2").click(function(){
		window.location.href = "index.php";
	});
	
	$("#optionsButton").click(function(){
		if(!($("#optionsTable").is(":visible"))){
			showOptions();
			$("#username").val($("#user").val());
		}else{
			hideOptions();
		}
	});
	
	$("#saveOptionsButton").click(function(){
		//alert("Save");
		var user = $("#username").val();
		var color = $("#colorSelect").val();
		$.ajax({
			type:"post",
			url:"ajax.php",
			data:"user=" + user + "&color=" + color + "&action=updateuser",
			success:function(data){
				hideOptions();
				$("#header").html(data);
			}
		});
	});
	
	//load default functions
	hideAddUser();
	hideOptions();
	
});