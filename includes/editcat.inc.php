<?php

if(isset($_POST['catId']) && isset($_POST['category'])){
	include 'dbh.inc.php';

	$catId = mysqli_real_escape_string($conn, $_POST['catId']);
	$category = mysqli_real_escape_string($conn, $_POST['category']);

	if(mysqli_query($conn, "UPDATE category SET cat_name = '$category' WHERE cat_id = '$catId'")){
		header('Location: ../edit-category.php?catId='.$catId.'&cat=update');
		exit();
	}
}

?>