<?php include 'header.php'?>

<?php

	if(isset($_POST['submit'])){
		include 'includes/dbh.inc.php';

		$catName = mysqli_real_escape_string($conn, $_POST['category']);

		if(mysqli_query($conn, "INSERT INTO category (cat_name) VALUES ('$catName')")){
			header('Location: create-category.php?info=success');
		}
	}

?>

<section class="main-section-area"><!--====== MAIN SECTION AREA START ======-->
	<div class="container">
		<div class="row">
			<div class="col-md-9">
 
				<div class="create-qn-area"><!--CREATE QN AREA START-->
					<div class="qn-content-header text-center">
							<p>Create Category</p>
					</div>


					<?php

						if(isset($_GET['info'])){
							$error = $_GET['info'];

							if($error == 'success'){
								echo '<div class="alert alert-info text-center">
								  <strong>Category has been created.</strong>
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
								if($_SESSION['uname'] == 'admin'){
									
									echo '<form action="" method="POST" role="form">';
									

									echo '
										<div class="msg-send">
											 <textarea id="subject" name="category" placeholder="Enter a Category name...." style="height:200px"></textarea>
										</div>

										<input type="submit" value="Create Category" name="submit">
									</form>';
								}

								else{
									echo '<h4 style="padding: 10%;">Please Sign In or <a href="register.php">Sign Up</a> to Update a question.</h4>';
								}

								?>
							</div><!--SELECT CATEGORIES END--> 
						</div><!--QN BODY HEADER END-->							
					</div><!--CREATE QN BODY END-->
				</div><!--CREATE QN AREA END--> 

			</div><!--====== col-md-9 div END ======-->
	
           
		<?php include 'rightbar.php';?>
		
        </div> <!--====== row div END ======-->
    </div> <!--CONTAINER DIV END-->
</section> <!--====== MAIN SECTION AREA END ======-->

<?php include 'footer.php'?>