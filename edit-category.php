<?php include 'header.php'?>

<?php
	if(isset($_GET['catId']) && isset($_SESSION['uid'])){
		$catId = mysqli_real_escape_string($conn, $_GET['catId']);

		$res = mysqli_query($conn, "SELECT cat_name FROM category WHERE cat_id = '$catId'");
		

		if(mysqli_num_rows($res) == 1){
			$row = mysqli_fetch_assoc($res);
			$catName = $row['cat_name'];
		}
			
	}
?>

<section class="main-section-area"><!--====== MAIN SECTION AREA START ======-->
	<div class="container">
		<div class="row">
			<div class="col-md-9">
 
				<div class="create-qn-area"><!--CREATE QN AREA START-->
					<div class="qn-content-header text-center">
							<p>Category Edit</p>
					</div>


					<?php

						if(isset($_GET['cat'])){
							$error = $_GET['cat'];

							if($error == 'update'){
								echo '<div class="alert alert-info text-center">
								  <strong>Category is Updaetd.</strong>
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
									
									echo '<form action="includes/editcat.inc.php" method="POST" role="form">';
									

									echo '
										<div class="msg-send">
											 <textarea id="subject" name="category" placeholder="Update your question here...." style="height:200px">'.$catName.'</textarea>
										</div>
										<input type="hidden" name = "catId" value="'.$catId.'">
										<input type="submit" value="Update Category" name="submit">
									</form>';
								}

								else{
									echo '<h4 style="padding: 10%;">Please Sign In or <a href="register.php">Sign Up</a> to Update a category.</h4>';
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