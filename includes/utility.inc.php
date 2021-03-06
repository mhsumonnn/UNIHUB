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
			$url = 'category-view.php?catId='.$catId;

			echo '<a href="'.$url.'"><li class="list-group-item">'.$catName.'<span class="badge">'.$counter.'</span></li></a>';
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
	</ul>*/


	function onlineList($userID){
		include 'dbh.inc.php';

		echo '<div class="categories-area">
                <div class="categories-header">
                    <p>Active Users</p>
                </div>
                <ul class="list-group">';

		$userInfo = mysqli_query($conn, "SELECT * FROM users WHERE user_id != '$userID' AND user_active='1' ORDER BY user_first");

		while($userRow = mysqli_fetch_assoc($userInfo)){

			$userId = $userRow['user_id'];
			$userFirst = $userRow['user_first'];
			$userLast = $userRow['user_last'];
			$userName = $userFirst .' '. $userLast;

			$url = 'message.php?userId='.$userId;

			echo '<a href="'.$url.'"><li class="list-group-item">'.$userName.'<span class="chatcircle" style="float: right; width: 9px; height: 9px; background-color: #ADFF2F; border-radius: 50%; margin-top: 6px;"></span></li></a>';
		}

		echo '</ul> </div>';
	}




	function replyList($qusId){
		include 'dbh.inc.php';

		$result = mysqli_query($conn, "SELECT * FROM answer WHERE qus_id='$qusId'");

		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
				$image = 'uploads/profile-pic/'.$row['image'];
				$userid = $row['user_id'];

				$user = mysqli_query($conn, "SELECT user_first, user_last FROM users WHERE user_id='$userid'");
				$res = mysqli_fetch_assoc($user);
				$name = $res['user_first'] .' '. $res['user_last'];
				$nameLink = '<a href="user.php?userId='.$userid.'">'.$name.'</a>'; 

				echo '<hr class="content-line">
					<div class="media">
						<div class="media-left">
							<img src="'.$image.'" class="media-object" style="width:50px">
						</div>

						<div class="media-body">
							<h4 class="media-heading">'.$nameLink.' replied: </h4>
							<div class="qn-area">'.$row['ans_detail'].'</div>
						</div>
					</div>';

			}
		}

	}


	function reviewReplyList($revId){
		include 'dbh.inc.php';

		$result = mysqli_query($conn, "SELECT * FROM reviewreply WHERE review_id='$revId'");

		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
				$image = 'uploads/profile-pic/'.$row['image'];
				$userid = $row['user_id'];

				$user = mysqli_query($conn, "SELECT user_first, user_last FROM users WHERE user_id='$userid'");
				$res = mysqli_fetch_assoc($user);
				$name = $res['user_first'] .' '. $res['user_last'];
				$nameLink = '<a href="user.php?userId='.$userid.'">'.$name.'</a>'; 

				echo '<hr class="content-line">
					<div class="media">
						<div class="media-left">
							<img src="'.$image.'" class="media-object" style="width:50px">
						</div>

						<div class="media-body">
							<h4 class="media-heading">'.$nameLink.' replied: </h4>
							<div class="qn-area">'.$row['reply_detail'].'</div>
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



	function allQuestion(){
		include 'dbh.inc.php';

		$result = mysqli_query($conn, "SELECT * FROM question ORDER BY qus_id DESC");

		while($row = mysqli_fetch_assoc($result)){
			$qusId = $row['qus_id'];
			$catId = $row['cat_id'];
			$userId = $row['user_id'];
			$question = $row['question'];
			$postTime = $row['post_time'];
			$answered = $row['answered'];
			$view = $row['view'];
			$vote = $row['vote'];

			$userInfo = mysqli_query($conn, "SELECT user_first, user_last, image FROM users WHERE user_id='$userId'");
			$array = mysqli_fetch_assoc($userInfo);
			$userName = $array['user_first'] .' '. $array['user_last'];
			$nameLink = '<a href="user.php?userId='.$userId.'">'.$userName.'</a>'; 
			$image = 'uploads/profile-pic/'.$array['image'];
			$posted = postTime($postTime);

			$qusInfo = 'Answered '.$answered.' / Viewed '.$view;
			$url = 'question.php?qusId='.$qusId;

			echo '<div class="media">
					<div class="media-left">
						<img src="'.$image.'" class="media-object" style="width:60px">
					</div>
						   
					<div class="media-body">
						<h4 class="media-heading">'.$nameLink.' asked '.$posted.'</h4>
							<p class="qn-area"><span class="question">
							<a href="'.$url.'">Question: </span>'.$question.'</p></a>
							<p class="ans-time text-right">'.$qusInfo.' </p>
					</div>
						<hr class="content-line">
				</div>';			

		}
	}


	function answeredQuestion(){
		include 'dbh.inc.php';

		$result = mysqli_query($conn, "SELECT * FROM question WHERE answered != 0  ORDER BY qus_id DESC");

		while($row = mysqli_fetch_assoc($result)){
			$qusId = $row['qus_id'];
			$catId = $row['cat_id'];
			$userId = $row['user_id'];
			$question = $row['question'];
			$postTime = $row['post_time'];
			$answered = $row['answered'];
			$view = $row['view'];
			$vote = $row['vote'];

			$userInfo = mysqli_query($conn, "SELECT user_first, user_last, image FROM users WHERE user_id='$userId'");
			$array = mysqli_fetch_assoc($userInfo);
			$userName = $array['user_first'] .' '. $array['user_last'];
			$nameLink = '<a href="user.php?userId='.$userId.'">'.$userName.'</a>'; 
			$image = 'uploads/profile-pic/'.$array['image'];
			$posted = postTime($postTime);

			$qusInfo = 'Answered '.$answered.' / Viewed '.$view;
			$url = 'question.php?qusId='.$qusId;

			echo '<div class="media">
					<div class="media-left">
						<img src="'.$image.'" class="media-object" style="width:60px">
					</div>
						   
					<div class="media-body">
						<h4 class="media-heading">'.$nameLink.' asked '.$posted.'</h4>
							<p class="qn-area"><span class="question">
							<a href="'.$url.'">Question: </span>'.$question.'</p></a>
							<p class="ans-time text-right">'.$qusInfo.' </p>
					</div>
						<hr class="content-line">
				</div>';			

		}
	}



	function unansweredQuestion(){
		include 'dbh.inc.php';

		$result = mysqli_query($conn, "SELECT * FROM question WHERE answered = 0  ORDER BY qus_id DESC");

		while($row = mysqli_fetch_assoc($result)){
			$qusId = $row['qus_id'];
			$catId = $row['cat_id'];
			$userId = $row['user_id'];
			$question = $row['question'];
			$postTime = $row['post_time'];
			$answered = $row['answered'];
			$view = $row['view'];
			$vote = $row['vote'];

			$userInfo = mysqli_query($conn, "SELECT user_first, user_last, image FROM users WHERE user_id='$userId'");
			$array = mysqli_fetch_assoc($userInfo);
			$userName = $array['user_first'] .' '. $array['user_last'];
			$nameLink = '<a href="user.php?userId='.$userId.'">'.$userName.'</a>'; 
			$image = 'uploads/profile-pic/'.$array['image'];
			$posted = postTime($postTime);

			$qusInfo = 'Answered '.$answered.' / Viewed '.$view;
			$url = 'question.php?qusId='.$qusId;

			echo '<div class="media">
					<div class="media-left">
						<img src="'.$image.'" class="media-object" style="width:60px">
					</div>
						   
					<div class="media-body">
						<h4 class="media-heading">'.$nameLink.' asked '.$posted.'</h4>
							<p class="qn-area"><span class="question">
							<a href="'.$url.'">Question: </span>'.$question.'</p></a>
							<p class="ans-time text-right">'.$qusInfo.' </p>
					</div>
						<hr class="content-line">
				</div>';			

		}
	}







	function allCatQuestion($categoryId){
		include 'dbh.inc.php';

		$result = mysqli_query($conn, "SELECT * FROM question WHERE cat_id='$categoryId'  ORDER BY qus_id DESC");

		while($row = mysqli_fetch_assoc($result)){
			$qusId = $row['qus_id'];
			$catId = $row['cat_id'];
			$userId = $row['user_id'];
			$question = $row['question'];
			$postTime = $row['post_time'];
			$answered = $row['answered'];
			$view = $row['view'];
			$vote = $row['vote'];

			$userInfo = mysqli_query($conn, "SELECT user_first, user_last, image FROM users WHERE user_id='$userId'");
			$array = mysqli_fetch_assoc($userInfo);
			$userName = $array['user_first'] .' '. $array['user_last'];
			$nameLink = '<a href="user.php?userId='.$userId.'">'.$userName.'</a>'; 
			$image = 'uploads/profile-pic/'.$array['image'];
			$posted = postTime($postTime);

			$qusInfo = 'Answered '.$answered.' / Viewed '.$view;
			$url = 'question.php?qusId='.$qusId;

			echo '<div class="media">
					<div class="media-left">
						<img src="'.$image.'" class="media-object" style="width:60px">
					</div>
						   
					<div class="media-body">
						<h4 class="media-heading">'.$nameLink.' asked '.$posted.'</h4>
							<p class="qn-area"><span class="question">
							<a href="'.$url.'">Question: </span>'.$question.'</p></a>
							<p class="ans-time text-right">'.$qusInfo.' </p>
					</div>
						<hr class="content-line">
				</div>';			

		}
	}


	function answeredCatQuestion($categoryId){
		include 'dbh.inc.php';

		$result = mysqli_query($conn, "SELECT * FROM question WHERE answered != 0 AND cat_id='$categoryId'  ORDER BY qus_id DESC");

		while($row = mysqli_fetch_assoc($result)){
			$qusId = $row['qus_id'];
			$catId = $row['cat_id'];
			$userId = $row['user_id'];
			$question = $row['question'];
			$postTime = $row['post_time'];
			$answered = $row['answered'];
			$view = $row['view'];
			$vote = $row['vote'];

			$userInfo = mysqli_query($conn, "SELECT user_first, user_last, image FROM users WHERE user_id='$userId'");
			$array = mysqli_fetch_assoc($userInfo);
			$userName = $array['user_first'] .' '. $array['user_last'];
			$nameLink = '<a href="user.php?userId='.$userId.'">'.$userName.'</a>'; 
			$image = 'uploads/profile-pic/'.$array['image'];
			$posted = postTime($postTime);

			$qusInfo = 'Answered '.$answered.' / Viewed '.$view;
			$url = 'question.php?qusId='.$qusId;

			echo '<div class="media">
					<div class="media-left">
						<img src="'.$image.'" class="media-object" style="width:60px">
					</div>
						   
					<div class="media-body">
						<h4 class="media-heading">'.$nameLink.' asked '.$posted.'</h4>
							<p class="qn-area"><span class="question">
							<a href="'.$url.'">Question: </span>'.$question.'</p></a>
							<p class="ans-time text-right">'.$qusInfo.' </p>
					</div>
						<hr class="content-line">
				</div>';			

		}
	}



	function unansweredCatQuestion($categoryId){
		include 'dbh.inc.php';

		$result = mysqli_query($conn, "SELECT * FROM question WHERE answered = 0 AND cat_id='$categoryId'  ORDER BY qus_id DESC");

		while($row = mysqli_fetch_assoc($result)){
			$qusId = $row['qus_id'];
			$catId = $row['cat_id'];
			$userId = $row['user_id'];
			$question = $row['question'];
			$postTime = $row['post_time'];
			$answered = $row['answered'];
			$view = $row['view'];
			$vote = $row['vote'];

			$userInfo = mysqli_query($conn, "SELECT user_first, user_last, image FROM users WHERE user_id='$userId'");
			$array = mysqli_fetch_assoc($userInfo);
			$userName = $array['user_first'] .' '. $array['user_last'];
			$nameLink = '<a href="user.php?userId='.$userId.'">'.$userName.'</a>'; 
			$image = 'uploads/profile-pic/'.$array['image'];
			$posted = postTime($postTime);

			$qusInfo = 'Answered '.$answered.' / Viewed '.$view;
			$url = 'question.php?qusId='.$qusId;

			echo '<div class="media">
					<div class="media-left">
						<img src="'.$image.'" class="media-object" style="width:60px">
					</div>
						   
					<div class="media-body">
						<h4 class="media-heading">'.$nameLink.' asked '.$posted.'</h4>
							<p class="qn-area"><span class="question">
							<a href="'.$url.'">Question: </span>'.$question.'</p></a>
							<p class="ans-time text-right">'.$qusInfo.' </p>
					</div>
						<hr class="content-line">
				</div>';			

		}
	}


	function questionView($qusId){
		include 'dbh.inc.php';

		$result = mysqli_query($conn, "SELECT * FROM question WHERE qus_id='$qusId'");

		$row = mysqli_fetch_assoc($result);
		
		$qusId = $row['qus_id'];
		$catId = $row['cat_id'];
		$userId = $row['user_id'];
		$question = $row['question'];
		$postTime = $row['post_time'];
		$answered = $row['answered'];
		$view = $row['view'];
		$vote = $row['vote'];

		$userInfo = mysqli_query($conn, "SELECT user_first, user_last, image FROM users WHERE user_id='$userId'");
		$array = mysqli_fetch_assoc($userInfo);
		$userName = $array['user_first'] .' '. $array['user_last'];
		$nameLink = '<a href="user.php?userId='.$userId.'">'.$userName.'</a>'; 
		$image = 'uploads/profile-pic/'.$array['image'];
		$posted = postTime($postTime);

		$qusInfo = 'Answered '.$answered.' / Viewed '.$view;
		$url = 'question.php?qusId='.$qusId;

		echo '<div class="media">
				<div class="media-left">
					<img src="'.$image.'" class="media-object" style="width:60px">
				</div>
					   
				<div class="media-body">
					<h4 class="media-heading">'.$nameLink.' asked '.$posted.'</h4>
						<p class="qn-area"><span class="question">
						<a href="'.$url.'">Question: </span>'.$question.'</p></a>
						';

						if($_SESSION['uid'] == $userId)
							echo'
								<a href="edit-question.php?qusId='.$qusId.'" class="btn edit-profile-btn" style="float: right;" title="Edit This Question"><i class="fa fa-pencil" aria-hidden="true"></i></a>
								<a href="delete-question.php?qusId='.$qusId.'" class="btn edit-profile-btn" style="float: right; margin-right: 5px" title="Delete This Question"><i class="fa fa-trash-o" aria-hidden="true"></i></i></a>';
						
						echo '
							<a class="ans-time" style="float: right; padding: 12px 10px 0px 0px; text-decoration: none; font-size: 13px;">'.$qusInfo.' </a>
				</div>
					<hr class="content-line">
			</div>';			
	
	}



	function searchQusView($qusId, $keys){
		include 'dbh.inc.php';

		$result = mysqli_query($conn, "SELECT * FROM question WHERE qus_id='$qusId'");

		$row = mysqli_fetch_assoc($result);
		
		$qusId = $row['qus_id'];
		$catId = $row['cat_id'];
		$userId = $row['user_id'];
		$question = $row['question'];
		$postTime = $row['post_time'];
		$answered = $row['answered'];
		$view = $row['view'];
		$vote = $row['vote'];

		$keywords = explode(' ', $keys);
		foreach ($keywords as $value) {
			$pattern = '/'.$value.'/';
			$replacement = '<span style="background-color: #ff6600; color: #ffffff;">'.$value.'</span>';
			$question = preg_replace($pattern, $replacement, $question);
		}

		$userInfo = mysqli_query($conn, "SELECT user_first, user_last, image FROM users WHERE user_id='$userId'");
		$array = mysqli_fetch_assoc($userInfo);
		$userName = $array['user_first'] .' '. $array['user_last'];
		$nameLink = '<a href="user.php?userId='.$userId.'">'.$userName.'</a>'; 
		$image = 'uploads/profile-pic/'.$array['image'];
		$posted = postTime($postTime);

		$qusInfo = 'Answered '.$answered.' / Viewed '.$view;
		$url = 'question.php?qusId='.$qusId;

		echo '<div class="media">
				<div class="media-left">
					<img src="'.$image.'" class="media-object" style="width:60px">
				</div>
					   
				<div class="media-body">
					<h4 class="media-heading">'.$nameLink.' asked '.$posted.'</h4>
						<p class="qn-area"><span class="question">
						<a href="'.$url.'">Question: </span>'.$question.'</p></a>
						<p class="ans-time text-right">'.$qusInfo.' </p>
				</div>
					<hr class="content-line">
			</div>';			
	
	}


	function allReviews(){
		include 'dbh.inc.php';

		$result = mysqli_query($conn, "SELECT * FROM review ORDER BY rev_id DESC");

		while($row = mysqli_fetch_assoc($result)){
			$revId = $row['rev_id'];
			$userId = $row['user_id'];
			$title = $row['title'];
			$post = $row['post'];
			$postTime = $row['posttime'];
			$answered = $row['answered'];
			$view = $row['view'];

			$userInfo = mysqli_query($conn, "SELECT user_first, user_last, image FROM users WHERE user_id='$userId'");
			$array = mysqli_fetch_assoc($userInfo);
			$userName = $array['user_first'] .' '. $array['user_last'];
			$nameLink = '<a href="user.php?userId='.$userId.'">'.$userName.'</a>'; 
			$image = 'uploads/profile-pic/'.$array['image'];
			$posted = postTime($postTime);

			$qusInfo = 'Answered '.$answered.' / Viewed '.$view;
			$url = 'review-post.php?revId='.$revId;

			echo '<div class="media">
					<div class="media-left">
						<img src="'.$image.'" class="media-object" style="width:60px">
					</div>
						   
					<div class="media-body">
						<h4 class="media-heading">'.$nameLink.' asked '.$posted.'</h4>
							<p class="qn-area"><span class="question">
							<a href="'.$url.'">Question: </span>'.$title.'</p></a>
							<p class="ans-time text-right">'.$qusInfo.' </p>
					</div>
						<hr class="content-line">
				</div>';			

		}
	}

/*	<div class="media">
	     <div class="media-left">
	        <img src="assets/images/avatar_2.png" class="media-object" style="width:60px">
	     </div>
	     <div class="media-body"><!--==== MEDIA BODY START ====-->
	        <h4 class="media-heading">John Doe asked 1 Hour 20 Minute before</h4>
	        <p class="qn-area">
	           <a href="doc-review-specific-doc.html">What is document review? How is it done? What is the process of legal document review?
	        </p>
	        </a>
	        <p class="ans-time text-right">Answered 02 / Voted 01 / Viewed 16 </p>
	     </div>
	     <hr class="content-line">
	  </div>*/





	function removeCommonWords($input){
 
 	// EEEEEEK Stop words
	$commonWords = array('a','able','about','above','abroad','according','accordingly','across','actually','adj','after','afterwards','again','against','ago','ahead','ain\'t','all','allow','allows','almost','alone','along','alongside','already','also','although','always','am','amid','amidst','among','amongst','an','and','another','any','anybody','anyhow','anyone','anything','anyway','anyways','anywhere','apart','appear','appreciate','appropriate','are','aren\'t','around','as','a\'s','aside','ask','asking','associated','at','available','away','awfully','b','back','backward','backwards','be','became','because','become','becomes','becoming','been','before','beforehand','begin','behind','being','believe','below','beside','besides','best','better','between','beyond','both','brief','but','by','c','came','can','cannot','cant','can\'t','caption','cause','causes','certain','certainly','changes','clearly','c\'mon','co','co.','com','come','comes','concerning','consequently','consider','considering','contain','containing','contains','corresponding','could','couldn\'t','course','c\'s','currently','d','dare','daren\'t','definitely','described','despite','did','didn\'t','different','directly','do','does','doesn\'t','doing','done','don\'t','down','downwards','during','e','each','edu','eg','eight','eighty','either','else','elsewhere','end','ending','enough','entirely','especially','et','etc','even','ever','evermore','every','everybody','everyone','everything','everywhere','ex','exactly','example','except','f','fairly','far','farther','few','fewer','fifth','first','five','followed','following','follows','for','forever','former','formerly','forth','forward','found','four','from','further','furthermore','g','get','gets','getting','given','gives','go','goes','going','gone','got','gotten','greetings','h','had','hadn\'t','half','happens','hardly','has','hasn\'t','have','haven\'t','having','he','he\'d','he\'ll','hello','help','hence','her','here','hereafter','hereby','herein','here\'s','hereupon','hers','herself','he\'s','hi','him','himself','his','hither','hopefully','how','howbeit','however','hundred','i','i\'d','ie','if','ignored','i\'ll','i\'m','immediate','in','inasmuch','inc','inc.','indeed','indicate','indicated','indicates','inner','inside','insofar','instead','into','inward','is','isn\'t','it','it\'d','it\'ll','its','it\'s','itself','i\'ve','j','just','k','keep','keeps','kept','know','known','knows','l','last','lately','later','latter','latterly','least','less','lest','let','let\'s','like','liked','likely','likewise','little','look','looking','looks','low','lower','ltd','m','made','mainly','make','makes','many','may','maybe','mayn\'t','me','mean','meantime','meanwhile','merely','might','mightn\'t','mine','minus','miss','more','moreover','most','mostly','mr','mrs','much','must','mustn\'t','my','myself','n','name','namely','nd','near','nearly','necessary','need','needn\'t','needs','neither','never','neverf','neverless','nevertheless','new','next','nine','ninety','no','nobody','non','none','nonetheless','noone','no-one','nor','normally','not','nothing','notwithstanding','novel','now','nowhere','o','obviously','of','off','often','oh','ok','okay','old','on','once','one','ones','one\'s','only','onto','opposite','or','other','others','otherwise','ought','oughtn\'t','our','ours','ourselves','out','outside','over','overall','own','p','particular','particularly','past','per','perhaps','placed','please','plus','possible','presumably','probably','provided','provides','q','que','quite','qv','r','rather','rd','re','really','reasonably','recent','recently','regarding','regardless','regards','relatively','respectively','right','round','s','said','same','saw','say','saying','says','second','secondly','see','seeing','seem','seemed','seeming','seems','seen','self','selves','sensible','sent','serious','seriously','seven','several','shall','shan\'t','she','she\'d','she\'ll','she\'s','should','shouldn\'t','since','six','so','some','somebody','someday','somehow','someone','something','sometime','sometimes','somewhat','somewhere','soon','sorry','specified','specify','specifying','still','sub','such','sup','sure','t','take','taken','taking','tell','tends','th','than','thank','thanks','thanx','that','that\'ll','thats','that\'s','that\'ve','the','their','theirs','them','themselves','then','thence','there','thereafter','thereby','there\'d','therefore','therein','there\'ll','there\'re','theres','there\'s','thereupon','there\'ve','these','they','they\'d','they\'ll','they\'re','they\'ve','thing','things','think','third','thirty','this','thorough','thoroughly','those','though','three','through','throughout','thru','thus','till','to','together','too','took','toward','towards','tried','tries','truly','try','trying','t\'s','twice','two','u','un','under','underneath','undoing','unfortunately','unless','unlike','unlikely','until','unto','up','upon','upwards','us','use','used','useful','uses','using','usually','v','value','various','versus','very','via','viz','vs','w','want','wants','was','wasn\'t','way','we','we\'d','welcome','well','we\'ll','went','were','we\'re','weren\'t','we\'ve','what','whatever','what\'ll','what\'s','what\'ve','when','whence','whenever','where','whereafter','whereas','whereby','wherein','where\'s','whereupon','wherever','whether','which','whichever','while','whilst','whither','who','who\'d','whoever','whole','who\'ll','whom','whomever','who\'s','whose','why','will','willing','wish','with','within','without','wonder','won\'t','would','wouldn\'t','x','y','yes','yet','you','you\'d','you\'ll','your','you\'re','yours','yourself','yourselves','you\'ve','z','zero');
 
	return preg_replace('/\b('.implode('|',$commonWords).')(\s+)\b/','',$input);
}

?>