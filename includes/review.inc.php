<?php
session_start();

if(isset($_POST['submit'])){
	include 'dbh.inc.php';

	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$post = mysqli_real_escape_string($conn, $_POST['post']);

	if(empty($title)){
		// Check if question field is empty
		header("Location: ../create-review.php?rev=emptyTitle");
		exit();

	} else if(strlen($title) < 8){
		// Check if the question length is less than 8
		header("Location: ../create-review.php?rev=shortTitle");
		exit();

	} else if(empty($post)){

		header("Location: ../create-review.php?rev=emptyPost");
		exit();

	} else if(strlen($post) < 100){

		header("Location: ../create-review.php?rev=shortPost");
		exit();

	} else{

		$userId = $_SESSION['uid'];
		date_default_timezone_set("Asia/Dhaka");
		$postTime = date("Y-m-d H:i:s");
		$answered = 0;
		$view = 0;

		$sql = "INSERT INTO review (user_id, title, post, posttime, answered, view) VALUES ('$userId', '$title', '$post', '$postTime', '$answered', '$view')";

		mysqli_query($conn, $sql);

		$result = mysqli_query($conn, "SELECT rev_id FROM review WHERE user_id = '$userId'");
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);
			header('Location: ../review-post.php?revId='.$row['rev_id']); // Returing post id
			exit();
		}
	}
}

else{
	header("Location: ../create-review.php?rev=error");
	exit();
}

?>