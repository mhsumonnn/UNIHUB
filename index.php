<?php include 'header.php'?>

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
							
							<?php allQuestion()?>

				
						</div>


	    
						<div class="all-qn-area tab-pane fade" id="answered" role="tabpanel"><!--====== Answered QN AREA START ======-->


							<?php answeredQuestion()?>
	
				
						</div>


	    
						<div class="all-qn-area tab-pane fade" id="unanswered" role="tabpanel"><!--====== Unanswered QN AREA START ======-->
							
							<?php unansweredQuestion()?>

				
						</div>
					</div>


				</div><!--======  MAIN CONTENT AREA END ======-->
			</div><!--====== col-md-9 div END ======-->
	
           
		<?php include 'rightbar.php';?>
		
        </div> <!--====== row div END ======-->
    </div> <!--CONTAINER DIV END-->
</section><!--====== MAIN SECTION AREA END ======-->

<?php include 'footer.php'?>