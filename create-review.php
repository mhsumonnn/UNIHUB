<?php
include 'header.php';
include 'includes/dbh.inc.php';
?>


<section class="main-section-area"> <!--====== MAIN SECTION AREA START ======-->
    <div class="container">
        <div class="row">
            <div class="col-md-9">
				
				<div class="create-qn-area"><!--CREATE QN AREA START-->
					<div class="qn-content-header text-center">
							<p>Create A Question</p>
					</div>


					<?php

						if(isset($_GET['rev'])){
							$error = $_GET['rev'];

							if($error == 'emptyTitle'){
								echo '<div class="alert alert-danger text-center">
								  <strong>Please enter a title.</strong>
								</div>';
							}
							else if($error == 'shortTitle'){
								echo '<div class="alert alert-danger text-center">
								  <strong>Title lenght is too short.</strong>
								</div>';
							}
							else if($error == 'emptyPost'){
								echo '<div class="alert alert-danger text-center">
								  <strong>Please write the post in detail.</strong>
								</div>';
							}
							else if($error == 'shortPost'){
								echo '<div class="alert alert-danger text-center">
								  <strong>Post is too short. Please write in detail</strong>
								</div>';
							}
							else if($error == 'error'){
								echo '<div class="alert alert-danger text-center">
								  <strong>Something went wrong.Please try again.</strong>
								</div>';
							}
						}

					?>

						   
					<div class="create-qn-body"><!--CREATE QN BODY START-->
						<div class="qn-body-header text-center"><!--QN BODY HEADER START-->
							<div class="select-categorie"><!--SELECT CATEGORIES START-->
								<?php
								if(isset($_SESSION['uid'])){
									
									echo '<form action="includes/review.inc.php" method="POST" role="form">
											<div class="msg-send">
												 <textarea id="subject" name="title" placeholder="Write your review title here...." style="height:100px;"></textarea>
											</div>
											<div class="msg-send">
												 <textarea class="tinymce" name="post"></textarea>
											</div>
											<br>
											<input type="submit" value="Submit" name="submit">
										</form>';
								}

								else{
									echo '<h4 style="padding: 10%;">Please Sign In or <a href="register.php">Sign Up</a> to Create a question.</h4>';
								}

								?>
							</div><!--SELECT CATEGORIES END--> 
						</div><!--QN BODY HEADER END-->							
					</div><!--CREATE QN BODY END-->
				</div><!--CREATE QN AREA END-->          
			</div><!--col-md-9 div END-->
           
        <?php include 'rightbar.php'?>
        
        </div><!--row div END-->
    </div><!--Container div END-->
</section><!--====== MAIN SECTION AREA END ======-->


<?php include 'footer.php'?>