<?php include 'header.php'?>

	<section class="registration-section-area"><!--====== REGISTRATION SECTION SECTION START ======-->
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="registration-content-area"><!--====== REGISTRATION CONTENT AREA START ======-->
						 <div class="registration-content-header text-center"> <!--====== REGISTRATION HEADER AREA START ======-->
							<p class="reg-text">Please Complete Your Details</p>
						</div>

						<?php

						if(isset($_GET['reg'])){
							$error = $_GET['reg'];

							if($error == 'empty'){
								echo '<div class="alert alert-danger text-center">
								  <strong>One or more input fields is empty.</strong>
								</div>';
							}
							else if($error == 'invalidchar'){
								echo '<div class="alert alert-danger text-center">
								  <strong>Real name must contain letters only.</strong>
								</div>';
							}
							else if($error == 'email'){
								echo '<div class="alert alert-danger text-center">
								  <strong>Please enter a real email.</strong>
								</div>';
							}
							else if($error == 'emailtaken'){
								echo '<div class="alert alert-danger text-center">
								  <strong>Entered Email is already registered. Try anoter one.</strong>
								</div>';
							}
							else if($error == 'usertaken'){
								echo '<div class="alert alert-danger text-center">
								  <strong>Sorry! Username is already taken.</strong>
								</div>';
							}
						}

						?>
						
						<div class="registration-form">
							<form action="includes/register.inc.php" method="POST" enctype="multipart/form-data">
								
							<div class="form-group">
									<div class="icon-input-btn"><i class="fas fa-user"></i><!--<button class="browse-btn">Browse...</button>-->
										<input type="file" name="image" placeholder="Upload Your Photo" class="form-control" autofocus required>
									</div>	
								</div>
								
								<div class="form-group">
									<div class="icon-input-btn"><i class="fas fa-user"></i>	
										<input type="text" name="first" placeholder="First Name" class="form-control" autofocus required>
									</div>	
								</div>

								<div class="form-group">
									<div class="icon-input-btn"><i class="fas fa-user"></i>	
										<input type="text" name="last" placeholder="Last Name" class="form-control" autofocus required>
									</div>	
								</div>
								
								<div class="form-group">
									<div class="icon-input-btn"><i class="fas fa-user"></i>
										<input type="text" name="uname" placeholder="Username" class="form-control" autofocus required>
									</div>	
								</div>
								
								<div class="form-group">
									<div class="icon-input-btn"><i class="fas fa-at"></i>
										<input type="text" name="email" placeholder="Email " class="form-control" autofocus required>
									</div>	
								</div>
								
								<div class="form-group">
									<div class="icon-input-btn"><i class="fas fa-unlock-alt"></i>	
										<input type="password" name="pwd" placeholder="Password " class="form-control" autofocus required>
									</div>										
								</div>

								<div class="complete-registration-button text-center"><!--====== REGISTRATION 3D BUTTON======-->
									<input type="submit" name="submit" class="btn btn-success btn-lg btn3d_regi">
								</div>
						   </form> 
					   </div><!--REGISTRATION FORM END-->
					</div><!--====== REGISTRATION CONTENT AREA END ======-->
				</div><!--====== col-md-9 div END======-->
			   
				<?php include 'rightbar.php'?>

			</div><!--====== row div END======-->
		</div><!--====== Container div END======-->
	</section><!--====== REGISTRATION SECTION SECTION END ======-->


<?php include 'footer.php';?>