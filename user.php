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
			$userPass = $row['user_pwd'];
			$userJoined = date("d F Y", strtotime($row['user_created']));
			$userActive = $row['user_active'];
			$userImage = 'uploads/profile-pic/'.$row['image'];

			$userEdit = 'user-edit.php?userId='.$userId;
			$userFullName = $userFirst.' '.$userLast;

			$userQus = mysqli_query($conn, "SELECT qus_id FROM question WHERE user_id = '$userId' ORDER BY qus_id DESC");

		}

	}

?>


<section class="main-section-area">
    <!--====== MAIN SECTION AREA START ======-->
    <div class="container">
        <div class="row">
            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="user-profile-area">
                        <div class="user-profile-header text-center">
                            <p class="user-profile-text">User Profile</p>


                    
                        </div>
                        <div class="panel-body">
                            <div class="box box-info">
                                <div class="box-body">
                                    <div class="col-sm-6">
                                        <div  align="center">
                                            <img alt="User Pic" src="<?php echo $userImage?>" id="profile-image1" class="img-thumbnail img-responsive"> 
                                            <?php if (isset($_SESSION['uid']) && !($userId == $_SESSION['uid'])):?>
                                                <div class="send-msg-body">
                                                    <a class="btn msg-btn" href="<?php echo 'message.php?userId='.$userId;?>">Message</a>
                                                </div>
                                            <?php endif;?>
                                        </div>
                                        <br>
                                    </div>
                                    <div class="col-sm-6">
                                        <table class="table table-user-information">
                                            <tbody>
                                                <tr>
                                                    <td>First Name :</td>
                                                    <td><strong><?php echo $userFirst?></strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Last Name :</td>
                                                    <td><strong><?php echo $userLast?></strong></td>
                                                </tr>
                                                <tr>
                                                    <td>User Name :</td>
                                                    <td><strong><?php echo $userName?></strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Date Of Joining :</td>
                                                    <td><strong><?php echo $userJoined?></strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Email :</td>
                                                    <td><strong><?php echo $userEmail?></strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        
                                        <?php
                                        	if(isset($_SESSION['uid']) && ($userId==$_SESSION['uid']))
                                        		echo '<div class="edit-profile-body">
			                                            <a href="'.$userEdit.'" class="btn edit-profile-btn">Edit Profile</a>
                                                        <a href="includes/logout.inc.php" class="btn edit-profile-btn">Logout</a>
			                                        </div>'; 
                                        ?>

                                        <!--======SEND MSG BODY END======--> 
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>
                        </div>
                    </div>
                </div>


                <div class="main-content-area">  <!--======MAIN CONTENT AREA START======-->
					<div class="main-content-header text-center">
						<ul class="nav nav-tabs nav-justified navtab">
							<li class="nav-item"><a class="nav-link active"><?php echo $userFullName?> Posted This Questions</a></li>
						</ul>
					</div>
                    
                    <?php
                        if(isset($_GET['del'])){
                            
                            $error = $_GET['del'];

                            if($error == 'success'){
                                echo '<div class="alert alert-danger text-center">
                                  <strong>Your question has been removed from Database</strong>
                                </div>';
                            }
                        }
                    ?>
			
					<div class="tab-content">
						
						<div class="all-qn-area"><!--====== ALL QN AREA START ======-->

							<?php
							    if(isset($_GET['userId']))
									if(mysqli_num_rows($userQus) == 0){
                                        
									}else{
										while($row = mysqli_fetch_assoc($userQus))
											questionView($row['qus_id']);
									}
								
							?>

				
						</div>


					</div>


				</div><!--======  MAIN CONTENT AREA END ======-->

            </div>
            
            <?php include 'rightbar.php';?>


        </div>
        <!--row div END-->
    </div>
    <!--container div END-->
</section>
<!--====== MAIN SECTION AREA END ======-->



<?php include 'footer.php'?>