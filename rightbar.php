        <div class="col-md-3"> 
            <div class="create-questions-area text-right"> <!--====== CREATE QUESTION AREA START ======--> 
                <p>Want to know something?</p>
                <div class="create-account-button text-center">
                   <a href="create-question.php" button type="button" class="btn btn-success btn-lg btn3d">Create a Question Here</button></a>
                </div>
            </div><!--====== CREATE QUESTION AREA END ======--> 
               
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

				<?php categoryList();?>

            </div>  <!--====== CATEGORIES AREA END ======-->


			<?php 
				if(isset($_SESSION['uid']))
					onlineList($_SESSION['uid']);
			?>

			
        </div>  <!--====== col-md-3 div END ======-->