<?php

session_start();
include 'dbh.inc.php';

$userId = $_SESSION['uid'];
mysqli_query($conn, "UPDATE users SET user_active = '0' WHERE user_id = '$userId'") or die(mysqli_error($conn));

session_unset();
session_destroy();

header("Location: ../index.php");

?>