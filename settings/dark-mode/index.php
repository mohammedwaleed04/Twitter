<?php
include '../../core/init.php';
// if (isset($_GET['dark_mode'])) {
//     $_SESSION['dark_mode'] = true;
//   } elseif (isset($_GET['light_mode'])) {
//     $_SESSION['dark_mode'] = false;
//   }
  
//   $darkMode = isset($_SESSION['dark_mode']) && $_SESSION['dark_mode'] === true;

if ( $getFromU->loggedIn() === false ) { ?>
    <head>
        <title>Display Settings - Twitter</title>
        <link rel='shortcut icon' type='image/x-icon' href='<?php echo BASE_URL; ?>assets/images/bird.svg'>
        <meta charset='UTF-8' />
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css' />
        <script src='https://code.jquery.com/jquery-1.10.2.js'></script>
        <link rel='stylesheet' href='<?php echo BASE_URL; ?>assets/css/font-awesome.css' />
        <link rel='stylesheet' href='<?php echo BASE_URL; ?>assets/css/bootstrap.css' />
        <link rel='stylesheet' href='<?php echo BASE_URL; ?>assets/css/style-complete.css' />
        <link rel='stylesheet' href='<?php echo BASE_URL; ?>assets/css/style.css' />
        <link rel='stylesheet' href='<?php echo BASE_URL; ?>assets/css/darkMode.css' />
        <script src='<?php echo BASE_URL; ?>assets/js/jquery-3.1.1.min.js'></script>
    </head>
    <body>
    <div class="grid-container">
    <div class="sidebar leftdark">
            <ul style="list-style:none;">
                <li><i class="fa fa-twitter" style="color:#50b7f5;font-size:10px;"></i></li>
                <?php if ( $getFromU->loggedIn() === false ) {
                    ?>
                <li><a href='<?php echo BASE_URL; ?>visitor.php'><i class="fa fa-home"></i><span>Explore</span></a></li>
                <li class="active_menu"><a href='<?php echo BASE_URL; ?>settings/dark-mode'><i class="fa fa-cog" style="color:#50b7f5;"></i><span style="color:#50b7f5;">Settings</span></a></li>
                <?php }?>
                <a href='<?php echo BASE_URL; ?>' style="text-decoration:none;"><li style="padding:10px 40px;"><button class="sidebar_tweet button" style="outline:none;">Login</button></li></a>
            </ul>
        </div>


<div class='main main-leftClass'>
    <p class='page_title mb-0' style='border-bottom:none;'><i class='fa fa-cog mr-4' style='color:#50b7f5;'></i>Settings</p>

    <div class='setting-head'>

        <div class='password-text active'>
            <a class='bold' href='<?php echo BASE_URL;?>settings/dark-mode'>Display</a>
        </div>
    </div>
    <div class='righter mt-4'>
        <div class='inner-righter'>
            <div class='acc'>
                <div class='acc-heading'>
                    <h4>Manage your background   <h6 id="DorL">   *(Dark or light)*</h6></h4>
                </div>
                <div class='acc-content'>
                <label id="dark-mode" class="darkkk" onclick="darkmode()"></label>
                </div>         
            </div>
        </div>
    </div>
</div>
    </div>
    <script src='<?php echo BASE_URL; ?>assets/js/main.js'></script>
                </body>

<?php } else {
$user_id = $_SESSION['user_id'];
$user    = $getFromU->userData( $user_id );
$notify  = $getFromM->getNotificationCount( $user_id );
?>

<html>
    <head>
        <title>Display Settings - Twitter</title>
        <link rel='shortcut icon' type='image/x-icon' href='<?php echo BASE_URL; ?>assets/images/bird.svg'>
        <link rel='stylesheet' href='<?php echo BASE_URL; ?>assets/css/darkMode.css' />
    </head>
    <body>
        <div class='grid-container'>

            <?php require '../../left-sidebar.php' ?>
            
            <div class='main main-leftClass'>
                <p class='page_title mb-0' style='border-bottom:none;'><i class='fa fa-cog mr-4' style='color:#50b7f5;'></i>Settings</p>

                <div class='setting-head'>
                    <div class='account-text'>
                        <a href='<?php echo BASE_URL?>settings/account'>Account</a>
                    </div>
                    <div class='password-text'>
                        <a href='<?php echo BASE_URL;?>settings/password'>Password</a>
                    </div>
                    <div class='password-text active'>
                        <a class='bold' href='<?php echo BASE_URL;?>settings/dark-mode'>Display</a>
                    </div>
                </div>
                <div class='righter mt-4'>
                    <div class='inner-righter'>
                        <div class='acc'>
                            <div class='acc-heading'>
                                <h4>Manage your background   <h6 id="DorL">   *(Dark or light)*</h6></h4>
                            </div>
                            <div class='acc-content'>
                                <!-- <div class="bg-color">
                                    <div style="min-height: 64px;text-align: center; align-items:center">
                                        <div role="radiogroup" style="display: flex; ">
                                            <div aria-hidden="true" style="cursor: pointer;">
                                                <input name="background_picker_3" type="radio" aria-label="Light">
                                                <span>Default</span>
                                            </div>
                                            <div aria-hidden="true" style="cursor: pointer; padding-left: 20px;">
                                                <input name="background_picker_3" type="radio" aria-label="Light">
                                                <span>Dark</span>
                                            </div>
                                        </div>
                                    </div>   
                                </div> -->
                              
                            <label id="dark-mode" class="darkkk" onclick="darkmode()"></label>
                            </div>         
                        </div>
                    </div>
                </div>
            </div>
            <!--CONTAINER_WRAP ENDS-->
            <?php require '../setting.php' ?>
    <script src='../../assets/js/main.js'></script>
    </body>
</html>
<?php }?>