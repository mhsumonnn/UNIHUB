<?php include 'header.php'?>

<?php
	
	if(isset($_GET['userId']) && !empty($_GET['userId'])){
		
		$userId = $_GET['userId'];

		$sql = "SELECT * FROM users WHERE user_id='$userId'";
		$result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result) == 0){
			header('Location: index.php');
			exit();
		}

		else if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$userId = $row['user_id'];
			$userFirst = $row['user_first'];
			$userLast = $row['user_last'];
			$userName = $row['user_name'];
			$userEmail = $row['user_email'];
			$userImage = 'uploads/profile-pic/'.$row['image'];

		}

	}

?>


<section class="main-section-area">
   <!--====== MAIN SECTION AREA START ======-->
   <div class="container">
      <div class="row">
         <div class="col-md-9 ">
            <div class="panel panel-default">
               <div class="edit-user-profile-area">

                  <div class="edit-user-profile-header text-center">
                     <p class="edit-user-profile-text">Edit Profile</p>
                  </div>

                  <?php

					if(isset($_GET['edit'])){
						$error = $_GET['edit'];

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
						else if($error == 'passerr'){
							echo '<div class="alert alert-danger text-center">
							  <strong>Wrong password entered.</strong>
							</div>';
						}

						else if($error == 'notmatched'){
							echo '<div class="alert alert-danger text-center">
							  <strong>New passwords did not matched.</strong>
							</div>';
						}
					}

					?>

                  <div class="panel-body">
                     <div class="box box-info">
                        <div class="box-body">
                           <div class="col-md-4 col-sm-6 col-xs-12">
                              <div class="text-center">
                                <form action="includes/useredit.inc.php" method="POST" role="form" enctype="multipart/form-data">
                                 	<img alt="User Pic" src="<?php echo $userImage;?>" id="profile-image2" class="img-thumbnail img-responsive"> 
                                 	<input id="profile-image-upload" name="image" class="hidden" type="file">
                                 	<input id="imageForm" type="submit" name="imageSubmit" style="display: none">
                                </form>
                              </div>
                              <br>
                           </div>
                           <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
                              <form class="form-horizontal" action="includes/useredit.inc.php" method="POST"  role="form">
                                 <div class="form-group">
                                    <label class="col-lg-3 control-label">First name:</label>
                                    <div class="col-lg-8">
                                       <input class="form-control" name="first" value="<?php echo $userFirst;?>" type="text" placeholder="First Name" required>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="col-lg-3 control-label">Last name:</label>
                                    <div class="col-lg-8">
                                       <input class="form-control" name="last" value="<?php echo $userLast;?>" type="text" placeholder="Last Name" required>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="col-lg-3 control-label">Email:</label>
                                    <div class="col-lg-8">
                                       <input class="form-control" name="email" value="<?php echo $userEmail;?>" type="text" placeholder="Email" required>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="col-md-3 control-label">Username:</label>
                                    <div class="col-md-8">
                                       <input class="form-control" name="uname" value="<?php echo $userName;?>" type="text" placeholder="Username" required>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="col-md-3 control-label">Password:</label>
                                    <div class="col-md-8">
                                       <input class="form-control" name="pwd" value="" type="password"  placeholder="Current password to save changes" required>
                                    </div>
                                 </div>

                                 <div class="form-group">
                                    <label class="col-md-3 control-label">New Password:</label>
                                    <div class="col-md-8">
                                       <input class="form-control" name="newPWD" value="" type="password" placeholder="Enter new password">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="col-md-3 control-label">Confirm password:</label>
                                    <div class="col-md-8">
                                       <input class="form-control" name="confirmPWD" value="" type="password" placeholder="Confirm Password">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-8">
                                       <input type="hidden" name="userId" value="<?php echo $userId;?>">
                                       <input class="btn save-chg-btn" name="submit" value="Save Changes" type="submit" onclick="submit()">
                                       <span></span>
                                       <input class="btn cancle-btn" id="textForm" value="Reset" type="reset">
                                    </div>
                                 </div>
                              </form>
                           </div>
                           <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
         <?php include 'rightbar.php';?>

      </div>
      <!--row div END-->
   </div>
   <!--container div END-->
</section>
<!--====== MAIN SECTION AREA END ======-->

<?php include 'footer.php'?>