<?php

session_start();

if(isset($_GET['qusId']) && isset($_SESSION['uid'])){

	include 'includes/dbh.inc.php';

	$qusId = mysqli_real_escape_string($conn, $_GET['qusId']);
	$userId = $_SESSION['uid'];

	mysqli_query($conn, "DELETE FROM answer WHERE qus_id = '$qusId'");
	mysqli_query($conn, "DELETE FROM question WHERE qus_id = '$qusId'");

	header('Location: user.php?userId='.$userId.'&del=success');
	exit();
}

?>