<?php
session_start();
?>


<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>UNIHUB</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--=== Bootstrap ===-->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!--=== Fontawesome icon ===-->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <!--=== Main Css ===-->
        <link rel="stylesheet" href="style.css">
        <!--=== Responsive Css ===-->
        <link rel="stylesheet" href="assets/css/responsive.css">
        
		<script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
	
		
    </head>
	
	
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!--===============================================================================-->
        

    <header class="header-area"> <!--====== Header Start ======-->
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="logo"> <!--====== LOGO HERE ======-->
                        <a href="index.php"><img src="assets/images/logo.png" alt="LOGO HERE"></a>
                    </div>
                </div>
                
                <div class="col-md-10">
                    <nav class="menu"><!--====== MENU HERE ======-->
                        <ul>
                           <li><a href="doc-review.html">DOC REVIEW</a></li>
                           <?php 
                                if(isset($_SESSION['uid']))
                                    echo '<li><a href="includes/logout.inc.php">LOGOUT</a></li>';
                           ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header><!--====== Header End ======-->