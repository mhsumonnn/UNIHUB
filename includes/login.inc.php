<?php

session_start();

if(isset($_POST['submit'])){

	include_once 'dbh.inc.php';

	$uname = mysqli_real_escape_string($conn, $_POST['uname']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	if(empty($uname) || empty($pwd)){
		header("Location: ../index.php?login=empty");
		exit();
	} else {
		$sql = "SELECT * FROM users WHERE user_name='$uname' OR user_email='$uname'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);

		if($resultCheck < 1){
			header("Location: ../index.php?login=exists");
			exit();
		} else {
			if($row = mysqli_fetch_assoc($result)) {
				// Password Checking
				$hashedPwdCheck = password_verify($pwd, $row['user_pwd']);

				if($hashedPwdCheck == false) {
					header("Location: ../index.php?login=passerr");
					exit();
				} elseif($hashedPwdCheck == true) {
					// Login the user
					$_SESSION['uid'] = $row['user_id'];
					$_SESSION['first'] = $row['user_first'];
					$_SESSION['last'] = $row['user_last'];
					$_SESSION['uname'] = $row['user_name'];
					$_SESSION['email'] = $row['user_email'];
					$_SESSION['image'] = $row['image'];

					$userId = $_SESSION['uid'];
					mysqli_query($conn, "UPDATE users SET user_active = '1' WHERE user_id = '$userId'");

					if($_SESSION['uname'] == 'admin'){
						header("Location: ../adminpage.php");
						exit();
					}
					else{
						header("Location: ../index.php?login=success");
						exit();
					}
				}
			}
		}
	}
} else {
	header("Location: ../index.php?login=error");
	exit();
}

?>