<?php 

session_start();
	
if (isset($_POST['submit'])){

	include_once 'dbh.inc.php';

	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$uname = mysqli_real_escape_string($conn, $_POST['uname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	if(empty($first) || empty($last) || empty($uname) || empty($email) || empty($pwd)){
		// Check if any field is empty
		header("Location: ../register.php?reg=empty");
		exit();
	} else {
		// Check if names has valid character
		if(!preg_match("/^[a-zA-Z ]*$/", $first) || !preg_match("/^[a-zA-Z ]*$/", $last)){
			header("Location: ../register.php?reg=invalidchar");
			exit();
		} else {
			// Check if valid email is entered
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				header("Location: ../register.php?reg=email");
				exit();

			} else {
				// Check if email is registered
				$sql = "SELECT * FROM users WHERE user_email='$email'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				if($resultCheck > 0){
					header("Location: ../register.php?reg=emailtaken");
					exit();
				} else {
					// Check if username is taken
					$sql = "SELECT * FROM users WHERE user_name='$uname'";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);

					if($resultCheck > 0){
						header("Location: ../register.php?reg=usertaken");
						exit();
					} else {

						// Path to store the uploaded image
						$image = $uname.'.'.strtolower(end(explode('.', $_FILES['image']['name'])));
						$target = "../uploads/profile-pic/".$image;
						move_uploaded_file($_FILES['image']['tmp_name'], $target);

						// Hashing the password
						$hashedPassword = password_hash($pwd, PASSWORD_DEFAULT);
						// User creation date
						date_default_timezone_set("Asia/Dhaka");
						$dateTime = date("Y-m-d H:i:s");
						// Finally insert into database
						$sql = "INSERT INTO users (user_first, user_last, user_name, user_email, user_pwd, user_created, image) VALUES ('$first', '$last', '$uname', '$email', '$hashedPassword', '$dateTime', '$image')";
						mysqli_query($conn, $sql);

						// Fetch user information for session data
						$sql = "SELECT user_id FROM users WHERE user_email='$email'";
						$result = mysqli_query($conn, $sql);
						$row = $result->fetch_assoc();
						$uid = $row['user_id'];

						$_SESSION['uid'] = $uid;
						$_SESSION['first'] = $first;
						$_SESSION['last'] = $last;
						$_SESSION['uname'] = $uname;
						$_SESSION['email'] = $email;
						$_SESSION['image'] = $image;

						mysqli_query($conn, "UPDATE users SET user_active = '1' WHERE user_id = '$uid'");

						header("Location: ../index.php?reg=success");
						exit();
					}
				}
			}
		}
	}
} else {
	header("Location: ../register.php?reg=error");
	exit();
}

?>