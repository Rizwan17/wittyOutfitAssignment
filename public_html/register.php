<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>WittyOutfit Register</title>
	<script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css"/>
	<script type="text/javascript" src="./js/bootstrap.min.js"></script>
	<!-- My Custom jquery code -->
	<script type="text/javascript" src="./js/main.js"></script>
 </head>
<body>
<div class="overlay"><div class="loader"></div></div>
	<!-- Navbar -->
	<?php include_once("./templates/header.php"); ?>
	<br/><br/>
	<div class="container">
		<div class="card mx-auto" style="width: 30rem;">
	        <div class="card-header">Register</div>
		      <div class="card-body">
		        <form id="register_form" onsubmit="return false" autocomplete="off">
		          <div class="form-group">
		          	<div class="row">
		          		<div class="col-sm-6">
		          			<label for="username">Full Name</label>
				            <input type="text" name="fname" class="form-control" id="fname" placeholder="Enter Username">
				            <small id="fn_error" class="form-text text-muted"></small>
		          		</div>
		          		<div class="col-sm-6">
		          			<label for="username">Last Name</label>
				            <input type="text" name="lname" class="form-control" id="lname" placeholder="Enter Username">
				            <small id="ln_error" class="form-text text-muted"></small>
		          		</div>
		          	</div>
		            
		          </div>
		          <div class="form-group">
		            <label for="email">Email address</label>
		            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
		            <small id="e_error" class="form-text text-muted"></small>
		          </div>
		          <div class="form-group">
		            <label for="password1">Password</label>
		            <input type="password" name="password1" class="form-control"  id="password1" placeholder="Password">
		            <small id="p1_error" class="form-text text-muted"></small>
		          </div>
		          <div class="form-group">
		            <label for="password2">Re-enter Password</label>
		            <input type="password" name="password2" class="form-control"  id="password2" placeholder="Password">
		            <small id="p2_error" class="form-text text-muted"></small>
		          </div>
		          <div class="form-group">
		          	<label>Gender</label>
		          	<select class="form-control" id="gander" name="gander">
		          		<option value="">Choose Gender</option>
		          		<option value="m">Male</option>
		          		<option value="f">Female</option>
		          	</select>
		          	<small id="g_error" class="form-text text-muted"></small>
		          </div>
		          <button type="submit" name="user_register" class="btn btn-primary"><span class="fa fa-user"></span>&nbsp;Register</button>
		          <span><a href="index.php">Login</a></span>
		        </form>
		      </div>
	      <div class="card-footer text-muted">
	        
	      </div>
	    </div>
	</div>

</body>
</html>