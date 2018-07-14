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

/*	echo "user_pwd : " . $row['user_pwd'] . '<br>';
	echo "pwd : ". $pwd;

	if(password_verify($pwd, $row['user_pwd']))
		echo " true";
	else
		echo "false";

	echo "$first : " . $row['user_first'] . '<br>';
	echo "$last : " . $row['user_last'] . '<br>';
	echo "$email : " . $row['user_email'] . '<br>';
	echo "$uname : " . $row['user_name'] . '<br>';*/


	if($first != $row['user_first'] || $last != $row['user_last']){
		if(!preg_match("/^[a-zA-Z ]*$/", $first) || !preg_match("/^[a-zA-Z ]*$/", $last)){
			header('Location: ../user-edit.php?userId='.$userId.'&reg=invalidchar');
			exit();
		}
	}


	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header('Location: ../user-edit.php?userId='.$userId.'&reg=email');
		exit();
	}
	else if($email != $row['user_email']){
		$res = mysqli_query($conn, "SELECT * FROM users WHERE user_email = '$email'");

		if(mysqli_num_rows($res) != 0){
			header('Location: ../user-edit.php?userId='.$userId.'&reg=emailtaken');
			exit();
		}
	}


	if($uname != $row['user_name']){
		$res = mysqli_query($conn, "SELECT * FROM users WHERE user_name = '$uname'");

		if(mysqli_num_rows($res) != 0){
			header('Location: ../user-edit.php?userId='.$userId.'&reg=usertaken');
			exit();
		}
	}



	if(!password_verify($pwd, $row['user_pwd'])){
		header('Location: ../user-edit.php?userId='.$userId.'&reg=passerr');
		exit();
	}
	else if(password_verify($pwd, $row['user_pwd'])){

		$pwd = password_hash($pwd, PASSWORD_DEFAULT);

		if(!empty($newPWD) && !empty($confirmPWD)){
			if($newPWD == $confirmPWD){
				$pwd = password_hash($newPWD, PASSWORD_DEFAULT);
			}
			else{
				header("Location: ../index.php?login=passmatcherr");
				exit();
			}
		}


		$sql = "UPDATE users SET user_first = '$first', user_last = '$last', user_name = '$uname', user_email = '$email', user_pwd = '$pwd' WHERE user_id = '$userId'";

		mysqli_query($conn, $sql);


		$_SESSION['uid'] = $userId;
		$_SESSION['first'] = $first;
		$_SESSION['last'] = $last;
		$_SESSION['uname'] = $uname;
		$_SESSION['email'] = $email;
		$_SESSION['image'] = $image;

		header('Location: ../user-edit.php?userId='.$userId.'&reg=success');
		exit();

	}


	/*if(empty($first) || empty($last) || empty($uname) || empty($email) || empty($pwd)){
		// Check if any field is empty
		header('Location: ../user-edit.php?userId='.$userId.'&reg=empty');
		exit();
	}

	if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)){
		header('Location: ../user-edit.php?userId='.$userId.'&reg=invalidchar');
		exit();
	}
	else if($first != $row['user_first'] || $last != $row['user_last']){
		$first = $row['user_first'];
		$last = $row['user_last'];
	}


	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header('Location: ../user-edit.php?userId='.$userId.'&reg=email');
		exit();
	}
	else if($email != $row['user_email']){
		$res = mysqli_query($conn, "SELECT * FROM users WHERE user_email = '$email'");

		if(mysqli_num_rows($res) != 0)
			header('Location: ../user-edit.php?userId='.$userId.'&reg=emailtaken');
			exit();
	}



	if($uname != $row['user_name']){
		$res = mysqli_query($conn, "SELECT * FROM users WHERE user_name = '$uname'");

		if(mysqli_num_rows($res) != 0){
			header('Location: ../user-edit.php?userId='.$userId.'&reg=usertaken');
			exit();
		}
	}*/

	

/*	if(!password_verify($pwd, $row['user_pwd'])){
		header('Location: ../user-edit.php?userId='.$userId.'&reg=passerr');
		exit();
	}
	else if(password_verify($pwd, $row['user_pwd'])){

		if (isset($newPWD) && isset($confirmPWD) && ($newPWD != $confirmPWD)) {
			header("Location: ../index.php?login=passmatcherr");
			exit();
		}
		else if(!empty($newPWD) && !empty($confirmPWD) && ($newPWD == $confirmPWD)){
			$pwd = password_hash($newPWD, PASSWORD_DEFAULT);
		}

		// Path to store the uploaded image
		$image = $uname.'.'.strtolower(end(explode('.', $_FILES['image']['name'])));
		$target = "../uploads/profile-pic/".$image;
		move_uploaded_file($_FILES['image']['tmp_name'], $target);

		$pwd = password_hash($pwd, PASSWORD_DEFAULT);

		$sql = "UPDATE users SET user_first = '$first', user_last = '$last', user_name = '$uname', user_email = '$email', user_pwd = '$pwd' WHERE user_id = '$userId'";

		mysqli_query($conn, $sql);


		$_SESSION['uid'] = $userId;
		$_SESSION['first'] = $first;
		$_SESSION['last'] = $last;
		$_SESSION['uname'] = $uname;
		$_SESSION['email'] = $email;
		$_SESSION['image'] = $image;

		header('Location: ../user-edit.php?userId='.$userId.'&reg=success');
		exit();

	}*/
}

else{
	header('Location: ../user-edit.php?userId='.$userId.'didnotsubmit');
	exit();
}

/*if (isset($_POST['submit'])){

	include_once 'dbh.inc.php';

	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$uname = mysqli_real_escape_string($conn, $_POST['uname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	$newPWD = mysqli_real_escape_string($conn, $_POST['newPWD']);
	$confirmPWD = mysqli_real_escape_string($conn, $_POST['confirmPWD']);
	$userId = mysqli_real_escape_string($conn, $_POST['userId']);

	if(empty($first) || empty($last) || empty($uname) || empty($email) || empty($pwd)){
		// Check if any field is empty
		header('Location: ../user-edit.php?userId='.$userId.'&reg=empty');
		exit();
	} else {
		// Check if names has valid character
		if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)){
			header('Location: ../user-edit.php?userId='.$userId.'&reg=invalidchar');
			exit();
		} else {
			// Check if valid email is entered
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				header('Location: ../user-edit.php?userId='.$userId.'&reg=email');
				exit();

			} else {
				// Check if email is registered
				$sql = "SELECT * FROM users WHERE user_email='$email'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				if($resultCheck > 0){
					header('Location: ../user-edit.php?userId='.$userId.'&reg=emailtaken');
					exit();
				} else {
					// Check if username is taken
					$sql = "SELECT * FROM users WHERE user_name='$uname'";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);

					if($resultCheck > 0){
						header('Location: ../user-edit.php?userId='.$userId.'&reg=usertaken');
						exit();
					} else {
						$userId = $_SESSION['uid'];
						$result = mysqli_query($conn, "SELECT user_pwd FROM users WHERE user_name='$userId'");
						$row = mysqli_fetch_assoc($result);
						$passwordCheck = password_verify($pwd, $row['user_pwd']);

						if($passwordCheck == false){
							header('Location: ../user-edit.php?userId='.$userId.'&reg=passerror');
							exit();
						} else {
							if((!empty($newPWD) && !empty($confirmPWD)) && ((strcmp($newPWD, $confirmPWD)) == 0)){
								
								$pwd = password_hash($newPWD, PASSWORD_DEFAULT);

							}

							// Path to store the uploaded image
							$image = $uname.'.'.strtolower(end(explode('.', $_FILES['image']['name'])));
							$target = "../uploads/profile-pic/".$image;
							move_uploaded_file($_FILES['image']['tmp_name'], $target);

							$sql = "UPDATE users SET user_first = '$first', user_last = '$last', user_name = '$uname', user_email = '$email', user_pwd = '$pwd', image = '$image' WHERE user_id = '$userId'";

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

							header('Location: ../user-edit.php?userId='.$userId.'&reg=success');
							exit();
						}
					}
				}
			}
		}
	}
} else {
	header('Location: ../user-edit.php?userId='.$userId.'&reg=error');
	exit();
}*/

?>