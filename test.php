<?php
	include 'includes/utility.inc.php';
	//echo $_SERVER['REMOTE_ADDR'];
/*
	$original = "Some of this text";

	$string = "Lets write some text to test";
	$keywords = explode(' ', $string);

	foreach ($keywords as $value) {
		$pattern = '/'.$value.'/';
		$replacement = '<span style="background-color: #ff6600; color: #ffffff;">'.$value.'</span>';
		$original = preg_replace($pattern, $replacement, $original);
	}

	echo '<p>'.$original.'</p>';*/

	$value = "difference between ac motor";
	$value = strtolower(trim($value));
	$noSpace = preg_replace('/\s+/', ' ', $value);
	$noCommon = removeCommonWords($noSpace);

	print_r($noCommon);

	$replace = str_replace(' ', '|', $noCommon);


?>