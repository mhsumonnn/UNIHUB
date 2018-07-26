<?php 
	session_start();

	if(isset($_POST['submit'])){

		include 'dbh.inc.php';

		date_default_timezone_set("Asia/Dhaka");

		$revId = $_POST['revId'];
		$userId = $_SESSION['uid'];
		$replyText = $_POST['reply-ans'];
		$replyTime = date("Y-m-d H:i:s");
		$image = $_SESSION['image'];

		$sql = "INSERT INTO reviewreply (review_id, user_id, reply_detail, reply_time, image) VALUES ('$revId', '$userId', '$replyText', '$replyTime', '$image')";
		mysqli_query($conn, $sql);


		$result = mysqli_query($conn, "SELECT * FROM reviewreply WHERE review_id=$revId");
		$total = mysqli_num_rows($result);
		
		$ansSql = "UPDATE review SET answered = $total WHERE rev_id = $revId";
		mysqli_query($conn, $ansSql);

		header('Location: ../review-post.php?revId='.$revId);
		exit();
	}
?>