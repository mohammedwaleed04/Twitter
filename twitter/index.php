<?php
	include 'core/init.php';
	if($getFromU->loggedIn() === true){
	//	header('Location: home.php');
	}

?>
<html>

<head>
    <title>Twitter</title>
    <meta charset="UTF-8" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css"/>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="./assets/images/bird.svg">
    <link rel="stylesheet" href="assets/css/style-complete.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/font-awesome.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/js/popper.min.js" />
    <link rel="stylesheet" href="assets/js/bootstrap.min.js" />
    <script src="assets/js/jquery-3.1.1.min.js"></script>
</head>

<body>
    <!--
<div class="front-img">
	<img src="assets/images/background.jpg">
</div>	
-->
    <div class="preloader" id="preloader">
            <div id="loader"></div>
    </div>
    <?php include 'includes/login.php';?>
    <script>
        window.onload = function() {
            var preloader = document.getElementsByClassName('preloader')[0];
            setTimeout(function() {
                preloader.style.display = 'none';
            }, 3000);
        };
    </script>
</body>
</html>