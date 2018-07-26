<?php include 'header.php';

require_once('includes/dbh.inc.php');

$uid = isset($_SESSION['uid'])?$_SESSION['uid']:null;
$recipient = mysqli_real_escape_string($conn, $_GET['userId']);

date_default_timezone_set("Asia/Dhaka");
$time = date("Y-m-d H:i:s");

$message = isset($_POST['message'])?$_POST['message']:'';

if($message != ""){
  $sql = "INSERT INTO chat (user, message, mtime, recipient) VALUES ('$uid', '$message', '$time', '$recipient')";
  $result = mysqli_query($conn, $sql);
}


$sql = "SELECT * FROM chat WHERE user='$uid' AND recipient='$recipient' ORDER BY mtime DESC";
$result = mysqli_query($conn, $sql);


?>


<section class="main-section-area">
    <!--====== MAIN SECTION AREA START ======-->
    <div class="container">
        <div class="row">
            <div class="col-md-9 ">

                <div class="messaging-area">
                    <div class="messaging-area-text-header text-center">
                        <p class="messaging-area-text">Messaging</p>

                    </div>

                    <div class="panel-body">
                        <div class="chat-box">

                          <?php
                            while($msg = mysqli_fetch_assoc($result)){
                              $cid = $msg['user'];
                              $photosql = mysqli_query($conn, "SELECT image FROM users WHERE user_id=".$cid);
                              $photorow = mysqli_fetch_row( $photosql );
                              $photo = 'uploads/profile-pic/'.$photorow[0];
                              if($cid != $uid){
                          ?>
                            <div class="single-chat-box">
                                <a href="#">
                                    <img src="<?php echo $photo; ?>" alt="profile pic" class="img-circle">
                                </a>
                                <p class="chat-spech">
                                  <?php echo $msg['message']; ?>
                                </p>
                            </div>
                            <?php
                          } else{
                            ?>
                            <div class="single-chat-box reply">
                                <a href="#">
                                    <img src="<?php echo $photo; ?>" alt="profile pic" class="img-circle">
                                </a>
                                <p class="chat-spech">
                                    <?php echo $msg['message']; ?>
                                </p>
                            </div>
                          <?php }} ?>
                        </div>

                        <div class="text-type-box">
                            <textarea name="text-type" id="text-type" cols="30" rows="10"></textarea>
                            <div class="send-file">
                                <button type="submit" id="button"><i class="fa fa-send"></i></button>
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

<!-- Chat JQuery -->
<script type="text/javascript">

function update()
{
    //$.post("message.php", {}, function(data){ $("chat_speech").val(data);});
    /*$.ajax({url: "message.php", success: function(result){
            $("body").html(result);
        }});*/



    $(".chat-box").load(location.href + " .chat-box");
    setTimeout('update()', 1000);
}

$(document).ready(

function()
    {
     update();

     $("#button").click(
      function()
      {
       $.post("message.php",
    { message: $("#text-type").val()},
    function(data){
    update();
    $("#text-type").val("");
    }
    );
      }
     );
    });


</script> 
