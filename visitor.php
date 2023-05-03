<?php
include 'core/init.php';

if ( $getFromU->loggedIn() === true ) {
    header( 'Location: '.BASE_URL.'home.php' );
}
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Home - Twitter</title>
    <meta charset='UTF-8' />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="./assets/images/bird.svg">
    <link rel = 'stylesheet' href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css'/>
    
    <link rel='stylesheet' href='<?php echo BASE_URL; ?>assets/css/style-complete.css' />
    <link rel='stylesheet' href='<?php echo BASE_URL; ?>assets/css/style.css' />
    <link rel='stylesheet' href='<?php echo BASE_URL; ?>assets/css/font-awesome.css' />
    <link rel='stylesheet' href='<?php echo BASE_URL; ?>assets/css/bootstrap.css' />
    <link rel='stylesheet' href='<?php echo BASE_URL; ?>assets/css/darkMode.css' />
    <script src='<?php echo BASE_URL; ?>assets/js/jquery-3.1.1.min.js'></script>

    <script src = 'https://code.jquery.com/jquery-3.2.1.min.js'></script>


</head>

<body>

    <div class="grid-container">
        <div class="sidebar leftdark">
            <ul style="list-style:none;">
                <li><i class="fa fa-twitter" style="color:#50b7f5;font-size:10px;"></i></li>
                <?php if ( $getFromU->loggedIn() === false ) {
                    ?>
                <li class="active_menu"><a href='<?php echo BASE_URL; ?>visitor.php'><i class="fa fa-home" style="color:#50b7f5;"></i><span style="color:#50b7f5;">Explore</span></a></li>
                <li><a href='<?php echo BASE_URL; ?>settings/dark-mode'><i class="fa fa-cog"></i><span>Settings</span></a></li>
                <?php }?>
                <a href='<?php echo BASE_URL; ?>includes/login.php' style="text-decoration:none;"><li style="padding:10px 40px;"><button class="sidebar_tweet button" style="outline:none;">Login</button></li></a>
            </ul>
        </div>

        <div class="main main-leftClass">
            <div class=''>
                <div class=''>
                    <p class="page_title mb-0">Explore</p>
                </div>
                <!--Tweet SHOW WRAPPER-->
                <div class='tweets'>
                    <?php $getFromT->tweetsVisitor();
                    ?>
                </div>
                <!--TWEETS SHOW WRAPPER-->

                <div class='loading-div'>
                    <img id='loader' src='assets/images/loading.svg' style='display: none;' />
                </div>
                <div class='popupTweet'></div>
                <!--Tweet END WRAPER-->

            </div><!-- in left wrap-->
        </div><!-- in center end -->
    </div>

    <script type='text/javascript' src='<?php echo BASE_URL; ?>assets/js/follow.js'></script>

    <script src='<?php echo BASE_URL; ?>assets/js/jquery-3.1.1.min.js'></script>
    <script src='<?php echo BASE_URL; ?>assets/js/popper.min.js'></script>
    <script src='<?php echo BASE_URL; ?>assets/js/bootstrap.min.js'></script>
    <script src='<?php echo BASE_URL; ?>assets/js/main.js'></script>
</body>

</html>
