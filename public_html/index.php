<?php
session_start();
if (isset($_SESSION["user_id"])) {
	header("location:profile.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>WittyOutfit Login</title>
	<script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css"/>
	<script type="text/javascript" src="./js/bootstrap.min.js"></script>
	<!-- My Custom jquery code -->
	<script type="text/javascript" src="./js/main.js"></script>
	<!-- My Custom Css Loader -->
	<link rel="stylesheet" type="text/css" href="./css/style.css"/>
	
 </head>
<body>
<div class="overlay"><div class="loader"></div></div>
	<!-- Navbar -->
	<?php include_once("./templates/header.php"); ?>
	<br/><br/>
	<div class="container">
		<?php
			if (isset($_GET["msg"]) && $_GET["msg"] === "success") :
				?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
					  You are registered Successfully Now you can login..!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>
				<?php
			endif;
		?>
	</div>
	<div class="container">
		<div class="card mx-auto" style="width: 20rem;">
		  <div class="card-header">
		  	<h4>Login</h4>
		  </div>
		  <div class="card-body">
		    <form id="form_login" onsubmit="return false">
			  <div class="form-group">
			    <label for="log_email">Email address</label>
			    <input type="email" class="form-control" name="log_email" id="log_email" placeholder="Enter email">
			    <small id="e_error" class="form-text text-muted"></small>
			  </div>
			  <div class="form-group">
			    <label for="log_password">Password</label>
			    <input type="password" class="form-control" name="log_password" id="log_password" placeholder="Password">
			  	<small id="p_error" class="form-text text-muted"></small>
			  </div>
			  <button type="submit" class="btn btn-primary"><i class="fa fa-lock">&nbsp;</i>Login</button>
			  <span><a href="register.php">Register</a></span>
			</form>
		    
		  </div>
		  <div class="card-footer"><a href="#">Forget Password ?</a></div>
		</div>
	</div>

</body>
</html>