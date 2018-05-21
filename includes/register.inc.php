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
		if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)){
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
						// Hashing the password
						$hashedPassword = password_hash($pwd, PASSWORD_DEFAULT);
						// Finally insert into database
						$sql = "INSERT INTO users (user_first, user_last, user_name, user_email, user_pwd) VALUES ('$first', '$last', '$uname', '$email', '$hashedPassword')";
						mysqli_query($conn, $sql);

						$sql = "SELECT user_id FROM users WHERE user_email='$email'";
						$uid = mysqli_query($conn, $sql);

						$_SESSION['uid'] = $uid;
						$_SESSION['first'] = $first;
						$_SESSION['last'] = $last;
						$_SESSION['uname'] = $uname;
						$_SESSION['email'] = $email;

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