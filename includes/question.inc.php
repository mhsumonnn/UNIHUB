<?php

session_start();

if(isset($_POST['submit'])){

	include_once 'dbh.inc.php';
	$catName = $_POST['category'];
	$question = $_POST['question'];

	if($catName == 'Select A Category'){

		header("Location: ../create-question.php?qus=notSelected");
		exit;

	} else if(empty($question)){

		header("Location: ../create-question.php?qus=emptyField");
		exit;

	} else if(strlen($question) < 8){

		header("Location: ../create-question.php?qus=shortLength");
		exit;

	}

	else{

		$result = mysqli_query($conn, "SELECT cat_id FROM category WHERE cat_name='$catName'");
		$row = $result->fetch_assoc();
		$catID = $row['cat_id'];

		$user_id = $_SESSION['uid'];
		$answered = 0;
		$view = 0;
		$vote = 0;

		$sql = "INSERT INTO question (cat_id, user_id, question, answered, view, vote) VALUES ('$catID', '$user_id', '$question', '$answered', '$view', '$vote')";

		mysqli_query($conn, $sql);

		header("Location: ../index.php");
		exit();
	}
}

?>