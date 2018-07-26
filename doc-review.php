<?php include 'header.php'?>


<section class="main-section-area">
   <!--====== MAIN SECTION AREA START ======-->
   <div class="container">
      <div class="row">
         <div class="col-md-9">

            <div class="main-content-area"><!--======MAIN CONTENT AREA START======-->
               <div class="main-content-header text-center">
                  <p class="doc-request-text">Document Review</p>
               </div>

               <div class="request-doc-review-area"><!--======REQUEST DOC REVIEW AREA START======-->       
                  
                  <?php echo allReviews()?>

               </div> <!--======REQUEST DOC REVIEW AREA START======-->           
            </div> <!--======MAIN CONTENT AREA END======-->  
         </div> <!--col-md-9 div END-->
         
		<?php include 'doc-rightbar.php';?>

      </div> <!--row div END-->
   </div> <!--container div END-->
</section> <!--====== MAIN SECTION AREA END ======-->


<?php include 'footer.php'?>