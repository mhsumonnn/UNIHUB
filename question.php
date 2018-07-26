<?php include 'header.php'; ?>

<?php

	mysqli_query($conn, "UPDATE question SET ");

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
		$view = $row['view'] + 1;
		$vote = $row['vote'];

		// Updating page view per page load
		mysqli_query($conn, "UPDATE question SET view = '$view' WHERE qus_id = '$qusID'");

		$userFind  = mysqli_query($conn, "SELECT user_id, user_first, user_last, image FROM users WHERE user_id = '$user_id'");
		if(mysqli_num_rows($userFind) == 1){
			$row = mysqli_fetch_array($userFind);
			$fullName = $row['user_first'] .' '. $row['user_last'];
			$propic = 'uploads/profile-pic/'.$row['image'];
			$userprofile = 'user.php?userId='.$row['user_id'];
		}

		$qusInfo = 'Answered '.$answered.' / Viewed '.$view;
	}
?>

<section class="main-section-area"><!--====== MAIN SECTION AREA START ======-->
    <div class="container">
        <div class="row">
			<div class="col-md-9">
					<div class="input-group search-box"><!--====== SEARCH BOX ======-->
						<form class="search" action="search.php" method="POST">
							<input type="text" name="search" class="searchTerm" placeholder="Search Content Here.....">
							<input type="submit" name="submit" value="Search" class="searchButton">
						</form>
					</div>
 
    			<div class="main-content-area"><!--======MAIN CONTENT AREA START======-->
               		<div class="main-content-header text-center">
                    	<p class="qn-ans">Question With Answers</p>
               		</div>

               		<?php
               			if(isset($_GET['qus'])){
               				$error = $_GET['qus'];

               				if($error = 'update'){
               					echo '<div class="alert alert-danger text-center">
								  <strong>Question has been updated.</strong>
								</div>';
               				}
               			}
               		?>
    
					<div class="all-ans-area"><!--====== ALL ANSWER AREA START ======-->
						<div class="media"> <!--====== MEDIA START ======-->
							<div class="media-left">
								<img src="<?php echo $propic?>" class="media-object" style="width:60px">
							</div>
					   
							<div class="media-body"><!--====== MEDIA BODY START ======-->
								<h4 class="media-heading"><a href="<?php echo $userprofile;?>"><?php echo $fullName;?></a> asked <?php echo postTime($post_time)?></h4>
								<p class="qn-area"><span class="question">Question:</span> <?php echo $question?> </p>
					   
					   			
					   			
					   			<div class="reply-ans-time">

					   				<p class="ans-time-reply text-center"><?php echo $qusInfo;?></p>

					   				<a href="#replysection"><input type="submit" value="Reply"></a>

								</div>
							
								</br>
					   			
					   			<!-- All replies of this question -->
								<?php replyList($qusID)?>

							</div><!--====== MEDIA BODY END ======-->

							<hr class="content-line"> <!--====== HORIZONTAL LINE======-->
						 
						</div><!--====== MEDIA END ======-->				   
					</div><!--====== ALL ANSWER AREA END ======-->  
					<div id="replysection"></div>
					<?php
						if(isset($_SESSION['uid'])){
							echo '<div class="reply-ans-area text-center">
									<form action = "includes/reply.inc.php" method="POST" role="form">
										<textarea class="tinymce" name="reply-ans" placeholder="Type Your Answer...." style="height:200px"></textarea>
											<br>
										<input type="hidden" name="qusId" value='.$qusID.'>
										<input type="submit" name="submit" value="Reply">	
									</form>	
								</div>';
						}
						else{
							echo '<div class="text-center" style="padding-bottom: 10px">
			                    	<p class="qn-ans">Please Sign In or <a href="register.php">Sign Up</a> to Create a question.</p>
			               		</div>';
						}
					?>
				
    			</div><!--======MAIN CONTENT AREA END======-->   
    		</div><!--col-md-9 div END-->
           
        	<?php include 'rightbar.php'?>
        
        </div><!--row div END-->
    </div><!--container div END-->
</section><!--====== MAIN SECTION AREA END ======-->

<?php include 'footer.php'?>