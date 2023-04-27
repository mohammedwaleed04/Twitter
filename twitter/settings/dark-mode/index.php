<?php
include '../../core/init.php';
$user_id = $_SESSION['user_id'];
$user    = $getFromU->userData( $user_id );
$notify  = $getFromM->getNotificationCount( $user_id );

if ( $getFromU->loggedIn() === false ) {
    header( 'Location: index.php' );
}
?>

<html>
    <head>
        <title>Display Settings - Twitter</title>
        <link rel='shortcut icon' type='image/x-icon' href='<?php echo BASE_URL; ?>assets/images/bird.svg'>
    </head>
    <body>
        <div class='grid-container'>

            <?php require '../../left-sidebar.php' ?>
            
            <div class='main'>
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
                                <h5>Manage your background</h5>
                            </div>
                            <div class='acc-content'>
                                <div class="bg-color">
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
                                </div>
                            </div>         
                        </div>
                    </div>
                </div>
            </div>
            <!--CONTAINER_WRAP ENDS-->
            <?php require '../setting.php' ?>
    </body>
</html>