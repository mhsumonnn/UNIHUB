<?php

if(isset($_POST['qusId']) && isset($_POST['question'])){
	include 'dbh.inc.php';

	$qusId = mysqli_real_escape_string($conn, $_POST['qusId']);
	$question = mysqli_real_escape_string($conn, $_POST['question']);

	if(mysqli_query($conn, "UPDATE question SET question = '$question' WHERE qus_id = '$qusId'")){
		header('Location: ../question.php?qusId='.$qusId.'&qus=update');
		exit();
	}
}

?>