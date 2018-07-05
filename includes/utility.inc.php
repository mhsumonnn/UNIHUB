<?php

	session_start();
	include 'dbh.inc.php';
	


	//echo postTime('2016-09-07 03:33:00');
	
	function postTime($postTime){

		date_default_timezone_set("Asia/Dhaka");

		$currentDateTime = new DateTime(date('Y-m-d H:i:s', time()));
		$postDateTime = new DateTime($postTime);

		$interval = $postDateTime->diff($currentDateTime);

		//print_r($interval);
		//echo $interval->Days;

		if($interval->y == 0 && $interval->m == 0 && $interval->d == 0 && $interval->h == 0 && $interval->i == 0){
			$str = ' Just Now';
			return $str;
		}
		else if($interval->y == 0 && $interval->m == 0 && $interval->d == 0 && $interval->h == 0){
			$str = $interval->i . ' Minutes before';
			return $str;
		}
		else if($interval->y == 0 && $interval->m == 0 && $interval->d == 0){
			$str = $interval->h .' Hours '. $interval->i . ' Minutes before';
			return $str;
		}
		else if($interval->y == 0 && $interval->m == 0){
			$str = $interval->d .' Days '. $interval->h .' Hours '. $interval->i . ' Minutes before';
			return $str;
		}
		else if($interval->y == 0){
			$str = $interval->m .' Months '. $interval->d .' Days '. $interval->h .' Hours '. $interval->i . ' Minutes before';
			return $str;
		}
		else if($interval->y > 0){
			$str = $interval->y.' Years '. $interval->m .' Months '. $interval->d .' Days '. $interval->h .' Hours '. $interval->i . ' Minutes before';
			return $str;
		}
		else{
			$str = '';
			return $str;
		}
	}


	/*echo $interval->Days.' Days total<br>';
	echo $interval->y.' Years<br>';
	echo $interval->m.' Months<br>';
	echo $interval->d.' Days<br>';
	echo $interval->h.' Hours<br>';
	echo $interval->i.' Minutes<br>';
	echo $interval->s.' seconds<br>';*/


	function categoryList(){
		include 'dbh.inc.php';
		echo '<ul class="list-group">';

		$catInfo = mysqli_query($conn, "SELECT * FROM category");

		while($catRow = mysqli_fetch_assoc($catInfo)){
			
			$catId = $catRow['cat_id'];
			$catName = $catRow['cat_name'];

			$catQus = mysqli_query($conn, "SELECT cat_id FROM question WHERE cat_id='$catId'");
			$counter = mysqli_num_rows($catQus);

			echo '<a href="#"><li class="list-group-item">'.$catName.'<span class="badge">'.$counter.'</span></li></a>';
		}

		echo '</ul>';
	}

/*	<ul class="list-group"><!--====== CATEGORIES LIST ======-->
        <a href="#"><li class="list-group-item">Programming<span class="badge">10</span></li></a>
        <a href="#"><li class="list-group-item">Networking<span class="badge">30</span></li></a>   
        <a href="#"><li class="list-group-item">Discrete Mathematics<span class="badge">3</span></li></a>
        <a href="#"><li class="list-group-item">Database<span class="badge">14</span></li></a>
		<a href="#"><li class="list-group-item">Operating System<span class="badge">6</span></li></a>
        <a href="#"><li class="list-group-item">MATLAB<span class="badge">26</span></li></a>
		<a href="#"><li class="list-group-item">Computer Graphics<span class="badge">12</span></li></a>
		<a href="#"><li class="list-group-item">Image Processing<span class="badge">4</span></li></a>
	</ul>*/


	function replyList($qusId){
		include 'dbh.inc.php';

		$result = mysqli_query($conn, "SELECT * FROM answer WHERE qus_id='$qusId'");

		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
				$image = 'uploads/profile-pic/'.$row['image'];
				echo '<hr class="content-line">
					<div class="media">
						<div class="media-left">
							<img src="'.$image.'" class="media-object" style="width:60px">
						</div>
						<div class="media-body">
							<p class="qn-area"><span class="question">Answer:</span> '.$row['ans_detail'].'</p>
						</div>
					</div>';

			}
		}

	}

	/*<hr class="content-line">

	<div class="media">
		<div class="media-left">
			<img src="assets/images/avatar_2.png" class="media-object" style="width:60px">
		</div>
		<div class="media-body">
			<p class="qn-area"><span class="question">Answer:</span> Low level languages are closer to the hardware’s native binary language.High Level languages are flexible to read, edit, debug, understand etc but Low Level Languages are not so easy to handle.</p>
		</div>
	</div> */
	

?>