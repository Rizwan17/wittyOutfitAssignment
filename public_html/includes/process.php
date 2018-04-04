<?php
session_start();
include_once("User.php");

if (isset($_POST["fname"], $_POST["lname"]) && $_SERVER["REQUEST_METHOD"] === "POST") {
	$user = new User();
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$email = $_POST["email"];
	$pass1 = $_POST["password1"];
	$pass2 = $_POST["password2"];
	$gander = $_POST["gander"];
	echo $user->createUserAccount($fname,$lname,$email,$pass1,$gander);
	exit();
}

if (isset($_POST["log_email"],$_POST["log_password"]) && $_SERVER["REQUEST_METHOD"] === "POST") {
	$user = new User();
	echo $user->userLogin($_POST["log_email"],$_POST["log_password"]);
	exit();
}

if (isset($_FILES["profile_img"]["name"]) && $_SERVER["REQUEST_METHOD"] === "POST") {
	$user = new User();
	$profile_pic = $_FILES["profile_img"]["name"];
	if (isset($_SESSION["user_id"])) {
		$result = $user->updateProfileImageName($_SESSION["user_id"],$profile_pic);
		if ($result === "IMAGE_SET") {
			if (!file_exists("../users/user_".$_SESSION["user_id"])) {
				mkdir("../users/user_".$_SESSION["user_id"]);
			}
			if(move_uploaded_file($_FILES["profile_img"]["tmp_name"], "../users/user_".$_SESSION["user_id"]."/".$profile_pic)){
				echo "<img width='100%' height='130' src='./users/user_".$_SESSION["user_id"]."/".$profile_pic."'>";
				exit();
			}
		}
	}
	exit();
}

if (isset($_POST["ufname"],$_POST["ulname"]) && $_SERVER["REQUEST_METHOD"] === "POST") {
	$fname = $_POST["ufname"];
	$lname = $_POST["ulname"];
	$email = $_POST["email"];
	$gander = $_POST["gander"];

	if (isset($_SESSION["user_id"])) {
		$user = new User();
		echo $user->updateUserDetails($_SESSION["user_id"],$fname,$lname,$email,$gander);
	}
}

?>