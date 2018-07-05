<?php 
session_start();

if(isset($_POST['submit'])){

	include 'dbh.inc.php';

	date_default_timezone_set("Asia/Dhaka");

	$qusId = $_POST['qusId'];
	$userId = $_SESSION['uid'];
	$replyText = $_POST['reply-ans'];
	$replyTime = date("Y-m-d H:i:s");
	$image = $_SESSION['image'];
	$likes = 0;

	$sql = "INSERT INTO answer (qus_id, user_id, ans_detail, ans_time, image, likes) VALUES ('$qusId', '$userId', '$replyText', '$replyTime', '$image', '$likes')";


	mysqli_query($conn, $sql);

	/*if(mysqli_query($conn, $sql)){

		$result = mysqli_query($conn, "SELECT * FROM answer WHERE qus_id='$qusId'");
		$total = mysqli_num_rows($result);
		
		mysqli_query($conn, "UPDATE qustion SET answered = '$total' WHERE qus_id = '$qusId'");
	}*/

	header('Location: ../question.php?qusId='.$qusId);
	exit();
}

?>