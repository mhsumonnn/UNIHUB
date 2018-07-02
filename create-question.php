<?php
include 'header.php';
include 'includes/dbh.inc.php';
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
									echo '<h4 style="padding: 10%;">Please Login or <a href="register.php">Sign Up</a> to Create a question.</h4>';
								}

								?>
							</div><!--SELECT CATEGORIES END--> 
						</div><!--QN BODY HEADER END-->							
					</div><!--CREATE QN BODY END-->
				</div><!--CREATE QN AREA END-->          
			</div><!--col-md-9 div END-->
           
        <div class="col-md-3"> 
            
			<?php

            if(!isset($_SESSION['uid'])){
            	echo '<div class="login-area"> <!--====== LOG IN AREA START ======--> 
		                   <div class="user-password">
								<form action="includes/login.inc.php" method="POST">
									<div class="form-group">
										<div class="icon-input-btn"><i class="fas fa-user"></i>	
											<input type="text" class="form-control" name="uname" id="InputName" placeholder="Email/Username" required>
										</div>							
									</div>
							
									<div class="form-group">  
										<div class="icon-input-btn"><i class="fas fa-unlock-alt"></i>
											<input type="password" class="form-control" name="pwd" id="password" placeholder="Password" required>                  
										</div>
									</div> 
									
									</div>
									
									<div class="log_in-button text-center"><!--====== LOG IN BUTTON ======-->
										<input type="submit" name="submit" class="btn btn-success btn-lg btn3d_signup">
									</div>  
								</form>
							
						
		                    <hr class="line"> <!--====== LOGIN AREA HORIZONTAL LINE ======-->  

		                    <p class="sign_up_text text-center">Don’t Have an Account?</p>
		           
		                    <div class="sign_up-button text-center"><!--====== SIGNUP BUTTON START ======-->
		                          <a href="register.php" button type="button" class="btn btn-success btn-lg btn3d_signup">Sign Up Here</button></a>
		                    </div>   <!--====== SIGNUP BUTTON END ======-->
		                </div> <!--====== LOG IN AREA END ======--> ';
            }

            ?>
    
               
            <div class="categories-area"><!--====== CATEGORIES AREA START ======-->
                <div class="categories-header"><!--====== CATEGORIES AREA HEADER ======-->
                    <p>Categories</p>
                </div>
                <ul class="list-group"><!--====== CATEGORIES LIST ======-->
                    <a href="#"><li class="list-group-item">Programming<span class="badge">10</span></li></a>
                    <a href="#"><li class="list-group-item">Networking<span class="badge">30</span></li></a>                       
                    <a href="#"><li class="list-group-item">Discrete Mathematics<span class="badge">3</span></li></a>
                    <a href="#"><li class="list-group-item">Database<span class="badge">14</span></li></a>
					<a href="#"><li class="list-group-item">Operating System<span class="badge">6</span></li></a>
                    <a href="#"><li class="list-group-item">MATLAB<span class="badge">26</span></li></a>
					<a href="#"><li class="list-group-item">Computer Graphics<span class="badge">12</span></li></a>
					<a href="#"><li class="list-group-item">Image Processing<span class="badge">4</span></li></a>
				</ul>
            </div>  <!--====== CATEGORIES AREA END ======-->	
        </div>  <!--====== col-md-3 div END ======-->
        </div><!--row div END-->
    </div><!--Container div END-->
</section><!--====== MAIN SECTION AREA END ======-->


<?php include 'footer.php'?>