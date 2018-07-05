<?php

session_start();

if(isset($_POST['submit'])){

	include 'dbh.inc.php';

	$catName = mysqli_real_escape_string($conn, $_POST['category']);
	$question = mysqli_real_escape_string($conn, $_POST['question']);

	if($catName == 'Select A Category'){
		// Check if Category is Selected
		header("Location: ../create-question.php?qus=notSelected");
		exit();

	} else if(empty($question)){
		// Check if question field is empty
		header("Location: ../create-question.php?qus=emptyField");
		exit();

	} else if(strlen($question) < 8){
		// Check if the question length is less than 8
		header("Location: ../create-question.php?qus=shortLength");
		exit();
	}

	else{
		// Check if qustion already exists
		$result = mysqli_query($conn, "SELECT question from question");
		$check = 0;
		while($row = mysqli_fetch_array($result)){
			if($row['question'] == $question)
				$check = 1;
		}

		if($check == 1){
			header("Location: ../create-question.php?qus=qusExists");
			exit();
		}

		else{

			$result = mysqli_query($conn, "SELECT cat_id FROM category WHERE cat_name='$catName'");
			$row = $result->fetch_assoc();
			$catID = $row['cat_id'];

			$user_id = $_SESSION['uid'];
			$answered = 0;
			$view = 0;
			$vote = 0;

			date_default_timezone_set("Asia/Dhaka");
			$postTime = date("Y-m-d H:i:s");

			$sql = "INSERT INTO question (cat_id, user_id, question, post_time, answered, view, vote) VALUES ('$catID', '$user_id', '$question', '$postTime', '$answered', '$view', '$vote')";

			mysqli_query($conn, $sql); // Create question and insert into question table

			$result = mysqli_query($conn, "SELECT qus_id FROM question WHERE question='$question'");

			if(mysqli_num_rows($result) == 1){
				$row = mysqli_fetch_array($result);
				header('Location: ../question.php?qusId='.$row['qus_id']); // Returing question id
				exit();
			}

			else{
				header("Location: ../create-question.php?qus=error");
			    exit();
			}
		}
	}
}

?>