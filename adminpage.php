<?php include 'header.php'?>

<?php
	include 'includes/dbh.inc.php';

	$userRes = mysqli_query($conn, "SELECT * FROM users");
	$totalUser = mysqli_num_rows($userRes);

	$catRes = mysqli_query($conn, "SELECT * FROM category");
	$totalCat = mysqli_num_rows($catRes);

	$qusRes = mysqli_query($conn, "SELECT * FROM question");
	$totalQus = mysqli_num_rows($qusRes);

	$ansRes = mysqli_query($conn, "SELECT * FROM answer");
	$totalAns = mysqli_num_rows($ansRes);


	$last5Res = mysqli_query($conn, "SELECT * FROM users ORDER BY user_id DESC LIMIT 5");

	$catRes = mysqli_query($conn, "SELECT * FROM category");

?>

<section class="main-section-area">
   <!--====== MAIN SECTION AREA START ======-->

   <div class="container">
      <div class="row">
         <div class="col-md-3">
            <div class="dash-board">
               <div class="list-group">
                  <a href="includes/savedatabase.inc.php" class="list-group-item"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>Backup Database</a>
                 <!--  <a href="#" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Create Category</a> -->
                  <a href="create-category.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Create Category</a>
                  <a href="#" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> View All Users</a>
               </div>
            </div>
         </div>
         <div class="col-md-9">
            <div class="panel panel-default">
               <div class="panel-heading overview-heading">
                  <h3 class="panel-title text-center">Website Overview</h3>
               </div>
               <div class="panel-body">
                  <div class="col-md-3">
                     <div class="well dash-box">
                        <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $totalUser?></h2>
                        <h4>Users</h4>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="well dash-box">
                        <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> <?php echo $totalCat?></h2>
                        <h4>Categories</h4>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="well dash-box">
                        <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> <?php echo $totalQus?></h2>
                        <h4>Questions</h4>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="well dash-box">
                        <h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> <?php echo $totalAns?></h2>
                        <h4>Answers</h4>
                     </div>
                  </div>
               </div>
            </div>

            <div class="panel panel-default">
               <div class="panel-heading overview-heading">
                  <h3 class="panel-title text-center">Category List</h3>
               </div>
               <div class="panel-body">
                  <table class="table table-striped table-hover">

                  	<?php
                  		if(mysqli_num_rows($catRes) > 0){
                  			while ($row = mysqli_fetch_assoc($catRes)) {

                  				$catId = $row['cat_id'];
                  				$catName = $row['cat_name'];

                  				echo '<tr>
				                        <th width="20%">'.$catId.'</th>
				                        <th width="60%">'.$catName.'</th>
				                        <th width="20%"><a href="edit-category.php?catId='.$catId.'" class="btn edit-profile-btn" style="float: right;" title="Edit This Question"><i class="fa fa-pencil" aria-hidden="true"></i></a>
								<a href="delete-category.php?catId='.$catId.'" class="btn edit-profile-btn" style="float: right; margin-right: 5px" title="Delete This Question"><i class="fa fa-trash-o" aria-hidden="true"></i></i></a></th>
				                     </tr>';

                  			}
                  		}
                  	?>
                     

                  </table>

                <a href="create-category.php" class="btn btn-success" style="float:right;"> Create Category </a>

               </div>
            </div>

                        <div class="panel panel-default">
               <div class="panel-heading overview-heading">
                  <h3 class="panel-title text-center">Last Added Users</h3>
               </div>
               <div class="panel-body">
                  <table class="table table-striped table-hover">

                  	<?php
                  		if(mysqli_num_rows($last5Res) > 0){
                  			while ($row = mysqli_fetch_assoc($last5Res)) {
                  				$fullName = $row['user_first'] .' '. $row['user_last'];
                  				echo '<tr>
				                        <th>'.$fullName.'</th>
				                        <th>'.$row['user_email'].'</th>
				                        <th>'.$row['user_created'].'</th>
				                     </tr>';
                  			}
                  		}
                  	?>
                     

                  </table>
				
				      <form action="usercrystalreport.php" method="post">  
                          <input type="submit" name="generate_pdf" style="float:right;" class="btn btn-success" value="Generate PDF" />  
                  </form> 

               </div>
            </div>

            
         </div>
         <!--col-md-9 div END-->
      </div>
      <!--row div END-->
   </div>
   <!--container div END-->
</section>
<!--====== MAIN SECTION AREA END ======-->

<?php include 'footer.php'?>