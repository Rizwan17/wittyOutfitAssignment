<?php
/**
* User Class for account creation and login pupose
*/
class User
{
	
	private $con;

	function __construct()
	{
		include_once("db.php");
		$db = new Database();
		$this->con = $db->connect();
	}

	//User is already registered or not
	private function emailExists($email){
		$pre_stmt = $this->con->prepare("SELECT user_id FROM users WHERE email = ? ");
		$pre_stmt->bind_param("s",$email);
		$pre_stmt->execute() or die($this->con->error);
		$result = $pre_stmt->get_result();
		if($result->num_rows > 0){
			return 1;
		}else{
			return 0;
		}
	}

	public function createUserAccount($fname,$lname,$email,$password,$gander){
		//To protect your application from sql attack 
		//Here i am using prepares statment
		if ($this->emailExists($email)) {
			return "EMAIL_ALREADY_EXISTS";
		}else{
			$pass_hash = password_hash($password,PASSWORD_BCRYPT,["cost"=>8]);
			$date = date("Y-m-d H:i:s");
			$status = "1";
			$pre_stmt = $this->con->prepare("INSERT INTO `users`(`fname`, `lname`, `email`, `password`, `gander`, `register_date`, `last_login`, `status`) VALUES (?,?,?,?,?,?,?,?)");
			$pre_stmt->bind_param("ssssssss",$fname,$lname,$email,$pass_hash,$gander,$date,$date,$status);
			$result = $pre_stmt->execute() or die($this->con->error);
			if ($result) {
				return $this->con->insert_id;
			}else{
				return "SOME_ERROR";
			}
		}
			
	}

	public function userLogin($email,$password){
		$pre_stmt = $this->con->prepare("SELECT user_id,fname,profile_pic,password,last_login FROM users WHERE email = ?");
		$pre_stmt->bind_param("s",$email);
		$pre_stmt->execute() or die($this->con->error);
		$result = $pre_stmt->get_result();

		if ($result->num_rows < 1) {
			return "NOT_REGISTERD";
		}else{
			$row = $result->fetch_assoc();
			if (password_verify($password,$row["password"])) {
				$_SESSION["user_id"] = $row["user_id"];
				$_SESSION["fname"] = $row["fname"];
				$_SESSION["last_login"] = $row["last_login"];
				$_SESSION["profile_pic"] = $row["profile_pic"];

				//Here we are updating user last login time when he is performing login
				$last_login = date("Y-m-d h:m:s");
				$pre_stmt = $this->con->prepare("UPDATE users SET last_login = ? WHERE email = ?");
				$pre_stmt->bind_param("ss",$last_login,$email);
				$result = $pre_stmt->execute() or die($this->con->error);
				if ($result) {
					return 1;
				}else{
					return 0;
				}

			}else{
				return "PASSWORD_NOT_MATCHED";
			}
		}
	}

    public function updateProfileImageName($user_id,$profile_pic)
	{
		$pre_stmt = $this->con->prepare("UPDATE users SET profile_pic = ? WHERE user_id = ?");
		$pre_stmt->bind_param("si",$profile_pic,$user_id);
		$result = $pre_stmt->execute() or die($this->con->error);
		$_SESSION["profile_pic"] = $profile_pic;
		if ($result) {
			return "IMAGE_SET";
		}
		return 0;

	}

	public function getUserDetails($user_id){
		$pre_stmt = $this->con->prepare("SELECT fname,lname,email,gander FROM users WHERE user_id = ? LIMIT 1");
		$pre_stmt->bind_param("i",$user_id);
		$pre_stmt->execute();
		$result = $pre_stmt->get_result() or die($this->con->error);
		return $result->fetch_assoc();
	}

	public function updateUserDetails($user_id,$fname,$lname,$email,$gander){
		$pre_stmt = $this->con->prepare("UPDATE users SET fname = ?, lname = ?, email = ?, gander = ? WHERE user_id = ? LIMIT 1");
		$pre_stmt->bind_param("ssssi",$fname,$lname,$email,$gander,$user_id);
		$result = $pre_stmt->execute() or die($this->con->error);
		if ($result) {
			return "USER_UPDATED";
		}
		
	}


}

//$user = new User();
//echo $user->createUserAccount("Test","rizwan1@gmail.com","1234567890","Admin");

//echo $user->userLogin("rizwan1@gmail.com","1234567890");

//echo $_SESSION["username"];


?>