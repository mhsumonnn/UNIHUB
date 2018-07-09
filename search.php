<?php include 'header.php'?>

<?php

if(isset($_POST['submit']) && !empty($_POST['search'])){

	$value = strtolower(trim(mysqli_real_escape_string($conn, $_POST['search'])));
	$noSpace = preg_replace('/\s+/', ' ', $value);
	$noCommon = removeCommonWords($noSpace);
	$replace = str_replace(' ', '|', $noCommon);

	$sql = "SELECT qus_id, answered FROM question WHERE question REGEXP '".$replace."' ORDER BY qus_id DESC";

}

else{
	header('Location: index.php');
	exit();
}


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
 
				<div class="main-content-area">  <!--======MAIN CONTENT AREA START======-->
					<div class="main-content-header text-center">
						<ul class="nav nav-tabs nav-justified navtab">
							<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#all" role="tab">All</a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#answered" role="tab">Answered</a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#unanswered" role="tab">Unanswered</a></li>
						</ul>
					</div>


					<div class="tab-content">
						
						<div class="all-qn-area tab-pane fade in active" id="all" role="tabpanel"><!--====== ALL QN AREA START ======-->
							
							<?php
								$result = mysqli_query($conn, $sql);
								while($row = mysqli_fetch_assoc($result))
									searchQusView($row['qus_id'], $noCommon);
							?>

				
						</div>


	    
						<div class="all-qn-area tab-pane fade" id="answered" role="tabpanel"><!--====== Answered QN AREA START ======-->


							<?php 
								$result = mysqli_query($conn, $sql);
								while($row = mysqli_fetch_assoc($result)){
									if($row['answered'] != 0)
										searchQusView($row['qus_id'], $noCommon);
								}
							?>
	
				
						</div>


	    
						<div class="all-qn-area tab-pane fade" id="unanswered" role="tabpanel"><!--====== Unanswered QN AREA START ======-->
							
							<?php 
								$result = mysqli_query($conn, $sql);
								while($row = mysqli_fetch_assoc($result)){
									if($row['answered'] == 0)
										searchQusView($row['qus_id'], $noCommon);
								}
							?>

				
						</div>
					</div>


				</div><!--======  MAIN CONTENT AREA END ======-->
			</div><!--====== col-md-9 div END ======-->
	
           
		<?php include 'rightbar.php';?>
		
        </div> <!--====== row div END ======-->
    </div> <!--CONTAINER DIV END-->
</section><!--====== MAIN SECTION AREA END ======-->

<?php include 'footer.php'?>