<?php include 'header.php'?>

<?php
    if(isset($_SESSION['uid']) && isset($_GET['userId'])){

        include 'includes/dbh.inc.php';

        $message = mysqli_real_escape_string($conn, (isset($_POST['message'])?$_POST['message']:''));
        $userId = mysqli_real_escape_string($conn, $_SESSION['uid']);
        $recipient = mysqli_real_escape_string($conn, $_GET['userId']);

        $photo = mysqli_query($conn, "SELECT image FROM users WHERE user_id=".$recipient);
        $photorow = mysqli_fetch_assoc($photo);
        $recipientImage = 'uploads/profile-pic/'.$photorow['image'];
        $userImage = 'uploads/profile-pic/'.$_SESSION['image'];

        date_default_timezone_set("Asia/Dhaka");
        $time = date("Y-m-d H:i:s");

        if($message != ""){
            $sql = "INSERT INTO chat (user, message, mtime, recipient) VALUES ('$userId', '$message', '$time', '$recipient')";
            $result = mysqli_query($conn, $sql);
        }

        $sql = "SELECT * FROM chat WHERE (user='$userId' OR user='$recipient') AND (recipient='$recipient' OR recipient='$userId') ORDER BY mtime DESC";
        $result = mysqli_query($conn, $sql);

    }
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
                        <form action="" method="post">
                            <div class="chat-box">
                                
                                <?php
                                    while($row = mysqli_fetch_assoc($result)){

                                        if($row['user'] == $recipient){
                                            echo '<div class="single-chat-box">
                                    <a href="#">
                                        <img src="'.$recipientImage.'" alt="profile pic" class="img-circle">
                                    </a>
                                    <p class="chat-spech">'.$row['message'].'
                                    </p>
                                </div>';
                                        }

                                        else if($row['user'] == $userId){
                                            echo '
                                <div class="single-chat-box reply">
                                    <a href="#">
                                        <img src="'.$userImage.'" alt="profile pic" class="img-circle">
                                    </a>
                                    <p class="chat-spech">'.$row['message'].'
                                    </p>
                                </div>';
                                        }

                                    }
                                ?>
                                
                            </div>
                            <div class="text-type-box">
                                <textarea name="message" id="text-type" cols="30" rows="10"></textarea>
                                <div class="send-file">
                                    <button type="submit"><i class="fa fa-send"></i></button>
                                </div>
                            </div>
                        </form>
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