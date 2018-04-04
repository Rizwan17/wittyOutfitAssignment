$(document).ready(function(){
		
	var DOMAIN = "http://localhost/wittyOutfitAssignment/public_html";

	/* Send User Registration Ajax Request to the PHP Script after jquery Validation */
	$("#register_form").on("submit",function(){
		var status = false;
		var fname = $("#fname");
		var lname = $("#lname");
		var email = $("#email");
		var pass1 = $("#password1");
		var pass2 = $("#password2");
		var gander = $("#gander");
		//Regular Expression for email validation
		var e_patt = new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);
		var name_patt = new RegExp(/^[A-Za-z ]+$/);
		if(fname.val() === "" || fname.val().length < 3){
			fname.addClass("border-danger");
			$("#fn_error").html("<span class='text-danger'>empty</span>");
			status = false;
		}else if(!name_patt.test(fname.val())){
			fname.addClass("border-danger");
			$("#fn_error").html("<span class='text-danger'>First Name can contain only A-Za-z</span>");
			status = false;
		}else{
			fname.removeClass("border-danger");
			$("#fn_error").html("");
			status = true;
		}
		if(lname.val() === "" || lname.val().length < 3){
			lname.addClass("border-danger");
			$("#ln_error").html("<span class='text-danger'>empty</span>");
			status = false;
		}else if(!name_patt.test(lname.val())){
			lname.addClass("border-danger");
			$("#ln_error").html("<span class='text-danger'>Last Name can contain only A-Za-z</span>");
			status = false;
		}else{
			lname.removeClass("border-danger");
			$("#ln_error").html("");
			status = true;
		}
		if(!e_patt.test(email.val())){
			email.addClass("border-danger");
			$("#e_error").html("<span class='text-danger'>Please Enter Valid Email Address</span>");
			status = false;
		}else{
			email.removeClass("border-danger");
			$("#e_error").html("");
			status = true;
		}
		if(pass1.val() === "" || pass1.val().length < 9){
			pass1.addClass("border-danger");
			$("#p1_error").html("<span class='text-danger'>Please Enter more than 9 digit password</span>");
			status = false;
		}else{
			pass1.removeClass("border-danger");
			$("#p1_error").html("");
			status = true;
		}
		if(pass2.val() === "" || pass2.val().length < 9){
			pass2.addClass("border-danger");
			$("#p2_error").html("<span class='text-danger'>Please Enter more than 9 digit password</span>");
			status = false;
		}else{
			pass2.removeClass("border-danger");
			$("#p2_error").html("");
			status = true;
		}
		if(gander.val() === ""){
			gander.addClass("border-danger");
			$("#g_error").html("<span class='text-danger'>Select Your Gender</span>");
			status = false;
		}else{
			gander.removeClass("border-danger");
			$("#g_error").html("");
			status = true;
		}
		if ((pass1.val() === pass2.val()) && status) {
			$(".overlay").show();
			$.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				data : $("#register_form").serialize(),
				success : function(response){
					if (response === "EMAIL_ALREADY_EXISTS") {
						$(".overlay").hide();
						alert("It seems like your email is already used");
					}else if(response === "SOME_ERROR"){
						$(".overlay").hide();
						alert("Something Wrong");
					}else{
						$(".overlay").hide();
						window.location.href = encodeURI(DOMAIN+"/index.php?msg=success");
					}
				}
			})
		}else{
			pass2.addClass("border-danger");
			$("#p2_error").html("<span class='text-danger'>Password is not matched</span>");
			status = true;
		}
	})

	/*Send Users Credential using Ajax Request to PHP Script for Login*/
	$("#form_login").on("submit",function(){
		var email = $("#log_email");
		var pass = $("#log_password");
		var status = false;
		if (email.val() === "") {
			email.addClass("border-danger");
			$("#e_error").html("<span class='text-danger'>Please Enter Email Address</span>");
			status = false;
		}else{
			email.removeClass("border-danger");
			$("#e_error").html("");
			status = true;
		}
		if (pass.val() === "") {
			pass.addClass("border-danger");
			$("#p_error").html("<span class='text-danger'>Please Enter Password</span>");
			status = false;
		}else{
			pass.removeClass("border-danger");
			$("#p_error").html("");
			status = true;
		}
		if (status) {
			$(".overlay").show();
			$.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				data : $("#form_login").serialize(),
				success : function(response){
					if (response == "NOT_REGISTERD") {
						$(".overlay").hide();
						email.addClass("border-danger");
						$("#e_error").html("<span class='text-danger'>It seems like you are not registered</span>");
					}else if(response == "PASSWORD_NOT_MATCHED"){
						$(".overlay").hide();
						pass.addClass("border-danger");
						$("#p_error").html("<span class='text-danger'>Please Enter Correct Password</span>");
						status = false;
					}else if(response == 1){
						$(".overlay").hide();
						console.log(response);
						window.location.href = DOMAIN+"/profile.php";
					}else{
						alert(response);
					}
				}
			})
		}
	})

	/* Upload Profile Image */
	$("#profile_img").change(function(event){
		event.preventDefault();

		var p = $(this).prop('files')[0];
		var form = new FormData();

		form.append("profile_img",p);

		var extension = p.name.split(".").pop();

		if ($.inArray(extension, ["jpg","jpeg","png","JPG","JPEG","PNG"]) === -1) {
			$(".img-error").html("<span class='text-danger'>Invalid Image type (Only jpg, jpeg, png)</span>");
		}else if(p.size > (1024 * 1024)){//2MB
			$(".img-error").html("<span class='text-danger'>Image size must be less than 2MB</span>");
		}else{
			$(".img-error").html("");
			$(".overlay").show();
			$.ajax({
				url 		: DOMAIN+"/includes/process.php",
				method  	: "POST",
				data 		: form,
				contentType : false,
				cache 		: false,
				processData : false,
				success 	: function(response){
					$(".overlay").hide();
					if (response == "ERROR") {
						alert(response);
					}else{
						$("#preview_img").html(response);
					}
				}


			})
		}

		

	});

	/*  Update User Information using Ajax */
	$("#update_user_info").on("submit",function(){
		var status = false;
		var fname = $("#ufname");
		var lname = $("#ulname");
		var email = $("#email");
		var gander = $("#gander");
		//Regular Expression for email validation
		var e_patt = new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);
		
		if(fname.val() === "" || fname.val().length < 3){
			fname.addClass("border-danger");
			$(".user-info-error").html("<span class='text-danger'>Empty First Name</span>");
		}else if(lname.val() === "" || lname.val().length < 3){
			lname.addClass("border-danger");
			$(".user-info-error").html("<span class='text-danger'>Empty Last Name</span>");
		}else if(!e_patt.test(email.val())){
			email.addClass("border-danger");
			$(".user-info-error").html("<span class='text-danger'>Invalid Email Address</span>");
		}else{
			$(".user-info-error").html("");
			$(".overlay").show();
			$.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				data : $("#update_user_info").serialize(),
				success : function(response){
					$(".overlay").hide();
					if (response === "USER_UPDATED") {
						$(".user-info-error").html("<span class='text-success'>User details Updated Successfully..!</span>");
					}
				}
			});
		}


	});

});