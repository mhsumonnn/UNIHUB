<?php
	
	date_default_timezone_set("Asia/Dhaka");
	$post_time = '2018-07-04 16:19:22';

	$currentDateTime = new DateTime(date('Y-m-d H:i:s', time()));
	$postDateTime = new DateTime($post_time);

	echo date('Y-m-d H:i:s');

	$interval = $postDateTime->diff($currentDateTime);

	//print_r($interval);
	
/*	echo $interval->days.' days total<br>';
	echo $interval->y.' years<br>';
	echo $interval->m.' months<br>';
	echo $interval->d.' days<br>';
	echo $interval->h.' hours<br>';
	echo $interval->i.' minutes<br>';
	echo $interval->s.' seconds<br>';*/

	//echo $interval->format('%Y years %m months %d days %H hours %i minutes %s seconds');

?>