<?php
session_start();
if (!isset($_SESSION["user_id"])) {
	header("location:index.php");
}
include_once("./includes/User.php");
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
		<div class="card mx-auto" style="width:800px;">
			<div class="card-header"><h4>User Profile</h4></div>
			<div class="card-body" style="background:#eee;">
				<small class="img-error"></small>
				<div class="row">
					<div class="col-md-4">
						<div class="card">
							<div class="card-body" id="preview_img">
								<img width="100%"  src="./users/user_<?php echo $_SESSION['user_id']; ?>/<?php echo $_SESSION['profile_pic']; ?>">
							</div>
							<div class="card-footer" style="position:relative;">
								<input type="file" name="profile_img" id="profile_img">
								<label for="profile_img" class="change_img" >Edit Profile Image</label>
							</div>
						</div>

					</div>
					<div class="col-md-8">
						<h5>User Profile Information</h5>
						<small class="user-info-error"></small>
						<?php 
							$user = new User();
							$row = $user->getUserDetails($_SESSION["user_id"]);
						?>
						<form id="update_user_info" onsubmit="return false">
							<div class="form-group">
								<div class="row edit-profile">
									<label class="col-sm-3">First Name</label>
									<div class="col-sm-6">
										<input type="text" name="ufname" id="ufname" class="form-control form-control-sm" value="<?php echo $row['fname']; ?>"/>
									</div>	
								</div>
								<div class="row edit-profile">
									<label class="col-sm-3">Last Name</label>
									<div class="col-sm-6">
										<input type="text" name="ulname" id="ulname" class="form-control form-control-sm" value="<?php echo $row['lname']; ?>"/>
									</div>	
								</div>
								<div class="row edit-profile">
									<label class="col-sm-3">Email</label>
									<div class="col-sm-6">
										<input type="text" name="email" id="email" class="form-control form-control-sm" value="<?php echo $row['email']; ?>"/>
									</div>	
								</div>
								<div class="row edit-profile">
									<label class="col-sm-3">Gander</label>
									<div class="col-sm-6">
										<select name="gander" id="gander" class="form-control form-control-sm" id="gander" name="gander">
											<option value="">Choose Gender</option>
											<option value="m">Male</option>
											<option value="f">Female</option>

							          		
							          		
							          	</select>
									</div>	
								</div>
								<div class="row">
									<div class="col-sm-9">
										<button class="btn btn-success"  type="submit" id="update_profile" >Update Profile Information</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
	</div>

</body>
</html>