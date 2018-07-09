<?php
include 'dbh.inc.php';

if(isset($_POST['submit']) && !empty($_POST['search'])){
	
	$value = strtolower(trim(mysqli_real_escape_string($conn, $_POST['search'])));
	$noSpace = preg_replace('/\s+/', ' ', $value);
	$noCommon = removeCommonWords($noSpace);
	$replace = str_replace(' ', '|', $noCommon);

	$sql = "SELECT * FROM question WHERE question REGEXP '".$replace."'";
	$result = mysqli_query($conn, $sql);
	print_r($result);
}


?>