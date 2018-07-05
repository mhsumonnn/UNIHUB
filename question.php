<?php include 'header.php'; ?>

<?php

	$qusID = mysqli_real_escape_string($conn, $_GET['qusId']);

	$sql = "SELECT cat_id, user_id, question, post_time, answered, view, vote FROM question WHERE qus_id='$qusID'";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) == 1){
		$row = mysqli_fetch_array($result);

		$cat_id = $row['cat_id'];
		$user_id = $row['user_id'];
		$question = $row['question'];
		$post_time = $row['post_time'];
		$answered = $row['answered'];
		$view = $row['view'];
		$vote = $row['vote'];

		$userFind  = mysqli_query($conn, "SELECT user_first, user_last, image FROM users WHERE user_id = '$user_id'");
		if(mysqli_num_rows($userFind) == 1){
			$row = mysqli_fetch_array($userFind);
			$fullName = $row['user_first'] .' '. $row['user_last'];
			$propic = 'uploads/profile-pic/'.$row['image'];
		}

		$qusInfo = 'Answered '.$answered.' / Viewed '.$view;
	}
?>

<section class="main-section-area"><!--====== MAIN SECTION AREA START ======-->
    <div class="container">
        <div class="row">
			<div class="col-md-9">
				<div class="input-group search-box"><!--====== SEARCH BOX ======-->
					<div class="search">
						<input type="text" class="searchTerm" placeholder="Search Content Here.....">
						<input type="submit" name="submit" value="Search" class="searchButton">
					</div>
				</div>
 
    			<div class="main-content-area"><!--======MAIN CONTENT AREA START======-->
               		<div class="main-content-header text-center">
                    	<p class="qn-ans">Question With Answers</p>
               		</div>
    
					<div class="all-ans-area"><!--====== ALL ANSWER AREA START ======-->
						<div class="media"> <!--====== MEDIA START ======-->
							<div class="media-left">
								<img src="<?php echo $propic?>" class="media-object" style="width:60px">
							</div>
					   
							<div class="media-body"><!--====== MEDIA BODY START ======-->
								<h4 class="media-heading"><?php echo $fullName;?> asked <?php echo postTime($post_time)?></h4>
								<p class="qn-area"><span class="question">Question:</span> <?php echo $question?> </p>
					   
					   			<p class="ans-time text-right"><?php echo $qusInfo;?></p>
					   			
					   			<!-- All replies of this question -->
								<?php replyList($qusID)?>

							</div><!--====== MEDIA BODY END ======-->

							<hr class="content-line"> <!--====== HORIZONTAL LINE======-->
						 
						</div><!--====== MEDIA END ======-->				   
					</div><!--====== ALL ANSWER AREA END ======-->  
		
					<div class="reply-ans-area text-center">
						<form action = "includes/reply.inc.php" method="POST" role="form">
							<textarea name="reply-ans" placeholder="Type Your Answer...." style="height:200px"></textarea>
								<br>
							<input type="hidden" name="qusId" value='<?php echo $qusID?>'>
							<input type="submit" name="submit" value="Reply">	
						</form>	
					</div>
				
    			</div><!--======MAIN CONTENT AREA END======-->   
    		</div><!--col-md-9 div END-->
           
        	<?php include 'rightbar.php'?>
        
        </div><!--row div END-->
    </div><!--container div END-->
</section><!--====== MAIN SECTION AREA END ======-->

<?php include 'footer.php'?>