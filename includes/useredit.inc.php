<?php

session_start();


if(isset($_POST['submit'])){
	include 'dbh.inc.php';

	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$uname = mysqli_real_escape_string($conn, $_POST['uname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	$newPWD = mysqli_real_escape_string($conn, $_POST['newPWD']);
	$confirmPWD = mysqli_real_escape_string($conn, $_POST['confirmPWD']);
	$userId = mysqli_real_escape_string($conn, $_POST['userId']);



	$result = mysqli_query($conn, "SELECT * FROM users WHERE user_id = '$userId'");
	$row = mysqli_fetch_assoc($result);


	if($first != $row['user_first'] || $last != $row['user_last']){
		if(!preg_match("/^[a-zA-Z ]*$/", $first) || !preg_match("/^[a-zA-Z ]*$/", $last)){
			header('Location: ../user-edit.php?userId='.$userId.'&edit=invalidchar');
			exit();
		}
	}


	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header('Location: ../user-edit.php?userId='.$userId.'&edit=email');
		exit();
	}
	else if($email != $row['user_email']){
		$res = mysqli_query($conn, "SELECT * FROM users WHERE user_email = '$email'");

		if(mysqli_num_rows($res) != 0){
			header('Location: ../user-edit.php?userId='.$userId.'&edit=emailtaken');
			exit();
		}
	}


	if($uname != $row['user_name']){
		$res = mysqli_query($conn, "SELECT * FROM users WHERE user_name = '$uname'");

		if(mysqli_num_rows($res) != 0){
			header('Location: ../user-edit.php?userId='.$userId.'&edit=usertaken');
			exit();
		}
	}



	if(!password_verify($pwd, $row['user_pwd'])){
		header('Location: ../user-edit.php?userId='.$userId.'&edit=passerr');
		exit();
	}
	else if(password_verify($pwd, $row['user_pwd'])){

		$pwd = password_hash($pwd, PASSWORD_DEFAULT);

		if(!empty($newPWD) && !empty($confirmPWD)){
			if($newPWD == $confirmPWD){
				$pwd = password_hash($newPWD, PASSWORD_DEFAULT);
			}
			else{
				header('Location: ../user-edit.php?userId='.$userId.'&edit=notmatched');
				exit();
			}
		}

		if(isset($_POST['imageSubmit'])){
			echo "image submitted";
		}

		$sql = "UPDATE users SET user_first = '$first', user_last = '$last', user_name = '$uname', user_email = '$email', user_pwd = '$pwd' WHERE user_id = '$userId'";

		mysqli_query($conn, $sql);


		$_SESSION['uid'] = $userId;
		$_SESSION['first'] = $first;
		$_SESSION['last'] = $last;
		$_SESSION['uname'] = $uname;
		$_SESSION['email'] = $email;
		$_SESSION['image'] = $image;

		header('Location: ../user-edit.php?userId='.$userId.'&edit=success');
		exit();

	}
}

else{
	header('Location: ../user-edit.php?userId='.$userId);
	exit();
}


?>