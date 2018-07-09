<?php
include 'header.php';
include 'includes/dbh.inc.php';
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
				
				<div class="create-qn-area"><!--CREATE QN AREA START-->
					<div class="qn-content-header text-center">
							<p>Create A Question</p>
					</div>


					<?php

						if(isset($_GET['qus'])){
							$error = $_GET['qus'];

							if($error == 'notSelected'){
								echo '<div class="alert alert-danger text-center">
								  <strong>Please select a category.</strong>
								</div>';
							}
							else if($error == 'emptyField'){
								echo '<div class="alert alert-danger text-center">
								  <strong>Question area must not be empty.</strong>
								</div>';
							}
							else if($error == 'shortLength'){
								echo '<div class="alert alert-danger text-center">
								  <strong>Question is too short.</strong>
								</div>';
							}
							else if($error == 'qusExists'){
								echo '<div class="alert alert-danger text-center">
								  <strong>Question already exists.</strong>
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
									
									echo '<form action="includes/question.inc.php" method="POST" role="form">
									<select id="topic" name="category">
									<option>Select A Category</option>';
									
									$sql = "SELECT cat_name from category";
									$result = mysqli_query($conn, $sql);

									while($row = mysqli_fetch_array($result)){
										echo '<option value="'.$row['cat_name'].'" name="'.$row['cat_name'].'">'.$row['cat_name'].'</option>';
									}

									echo '</select>
									<div class="msg-send">
										 <textarea id="subject" name="question" placeholder="Write your question here...." style="height:200px"></textarea>
									</div>
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