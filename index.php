<?php
	include 'init.php';
	if($getFromU->loggedIn() === true){
		header('Location: views/home.php');
	}

?>
<html>

<head>
    <title>Twitter</title>
    <meta charset="UTF-8" />
    <link rel="shortcut icon" type="image/x-icon" href="views/assets/images/bird.svg">
    <link rel="stylesheet" href="views/assets/css/style-complete.css" />
    <link rel="stylesheet" href="views/assets/css/style.css" />
    <link rel="stylesheet" href="views/assets/css/darkMode.css" />
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
    <?php header('Location: views/visitor.php');?>
    <script>
        window.onload = function() {
            var preloader = document.getElementsByClassName('preloader')[0];
            setTimeout(function() {
                preloader.style.display = 'none';
            }, 3000);
        };
    </script>
    <script src='views/assets/js/main.js'></script>
</body>
</html>