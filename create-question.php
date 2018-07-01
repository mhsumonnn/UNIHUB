<?php include 'header.php'?>


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
						   
					<div class="create-qn-body"><!--CREATE QN BODY START-->
						<div class="qn-body-header text-center"><!--QN BODY HEADER START-->
							<div class="select-categorie"><!--SELECT CATEGORIES START-->
								<form role="form">
									<select id="topic" name="topic"><!--TOPICS SELECT AREA-->
										<option value="select A Topic">Select A Topic</option>
										<option value="Programming">Programming</option>
										<option value="Networking">Networking</option>
										<option value="Discrete Mathematics">Discrete Mathematics</option>
										<option value="Database">Database</option>
										<option value="Operating System">Operating System</option>
										<option value="MATLAB">MATLAB</option>
										<option value="Computer Graphics">Computer Graphics</option>
										<option value="Image Processing">Image Processing</option>
									</select>
									<div class="msg-send"><!--MESSAGAE TEXT AREA-->
										 <textarea id="subject" name="subject" placeholder="Write your question here...." style="height:200px"></textarea>
									</div>
									<input type="submit" value="Submit"><!--SUBMIT BUTTON-->
								</form>
							</div><!--SELECT CATEGORIES END--> 
						</div><!--QN BODY HEADER END-->							
					</div><!--CREATE QN BODY END-->
				</div><!--CREATE QN AREA END-->          
			</div><!--col-md-9 div END-->
           
        <div class="col-md-3"> 
            
				<div class="login-area"> <!--====== LOG IN AREA START ======--> 
                   <div class="user-password">
						<form role="form"> 
							<div class="form-group">
									<div class="icon-input-btn"><i class="fas fa-user"></i>	
										<input type="text" class="form-control" name="InputName" id="InputName" placeholder="Username" required>
									</div>							
							</div>
					
							<div class="form-group">  
									<div class="icon-input-btn"><i class="fas fa-unlock-alt"></i>
										<input type="password" class="form-control" name="password" id="password" placeholder="Password" required>                  
									</div>
							</div> 
							
							</div>
							
							<div class="log_in-button text-center"><!--====== LOG IN BUTTON ======-->
								<input type="submit" name="submit"  id="submit" value="Log In" class="btn btn-success btn-lg btn3d_signup">
							</div>  
						</form>
					
				
                    <hr class="line"> <!--====== LOGIN AREA HORIZONTAL LINE ======-->  

                    <p class="sign_up_text text-center">Don’t Have an Account?</p>
           
                    <div class="sign_up-button text-center"><!--====== SIGNUP BUTTON START ======-->
                          <a href="register.html" button type="button" class="btn btn-success btn-lg btn3d_signup">Sign Up Here</button></a>
                    </div>   <!--====== SIGNUP BUTTON END ======-->
                </div> <!--====== LOG IN AREA END ======--> 
    
               
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