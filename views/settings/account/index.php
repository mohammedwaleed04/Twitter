<?php
include '../../../init.php';
$user_id = $_SESSION['user_id'];
$user    = $getFromU->userData( $user_id );
$notify  = $getFromM->getNotificationCount( $user_id );

if ( $getFromU->loggedIn() === false ) {
    header( 'Location: visitor.php' );
}

if ( isset( $_POST['submit'] ) ) {
    $username  = $_POST['username'];
    $error     = array();

    if ( !empty( $username )) {
        if ( preg_match( '/[^a-zA-Z0-9\!]/', $username ) ) {
            $error['username']  = 'Only characters and numbers allowed';
        }if ( $user->username != $username and $getFromU->checkUsername( $username ) === true ) {
            $error['username'] = 'Username is not available';
        }
            else {
            $getFromU->update( 'users', $user_id, array( 'username' => $username));
            header( 'Location:'.BASE_URL.'settings/account' );
        }
    } else {
        $error['fields']  = 'Please fill all the fields';
    }
}
if (isset($_POST['deactivate']) && !empty($_POST['deactivate'])) {
    $getFromU->delete('users', array( 'user_id' => $user_id));
    header('Location: ../../includes/logout.php');
}
?>
<html>
<head>
    <title>Accounts Settings - Twitter</title>
    <link rel='shortcut icon' type='image/x-icon'  href='<?php echo BASE_URL; ?>../../views/assets/images/bird.svg'>
    <link rel='stylesheet' href='<?php echo BASE_URL;?>views/assets/css/darkMode.css' />
    <link rel='stylesheet' href='<?php echo BASE_URL;?>views/assets/css/style.css' />
    <link rel='stylesheet' href='<?php echo BASE_URL;?>views/assets/css/style1.css' /> 
    <link rel='stylesheet' href='<?php echo BASE_URL;?>views/assets/css/bootstrap.css' /> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <link rel = 'stylesheet' href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css'/>
    
</head>
<body>
    <div class='grid-container'>

        <?php require '../../left-sidebar.php' ?>

        <div class="main main-leftClass">
            <p class='page_title mb-0' style='border-bottom:none;'><i class='fa fa-cog mr-4' style='color:#50b7f5;'></i>Settings</p>

            <div class='setting-head'>
                <div class='account-text active'>
                    <a class='bold' href='<?php echo BASE_URL;?>views/settings/account'>Account</a>
                </div>
                <div class='password-text'>
                    <a href='<?php echo BASE_URL;?>views/settings/password'>Password</a>
                </div>
                <div class='password-text'>
                    <a href='<?php echo BASE_URL;?>views/settings/dark-mode'>Display</a>
                </div>
            </div>

            <div class='righter mt-4'>
                <div class='inner-righter'>
                    <div class='acc'>
                        <div class='acc-heading'>
                            <h5>Change your basic account settings</h5>
                        </div>
                        <div class='acc-content'>
                            <form id='account-form' method='POST'>
                                <div class='acc-wrap'>
                                    <label class='ml-3' for=''>Username</label>
                                    <div class='form-group col-auto'>
                                        <input class='form-control' type='text' name='username' value="<?php echo $user->username;?>" />
                                        <span>
                                            <?php if ( isset( $error['username'] ) ) {
    echo $error['username'];
}
?>
                                        </span>
                                    </div>
                                </div>

                                


                                <div class='acc-wrap'>
                                    <div class='acc-right mt-3'>
                                        <button class='new-btn' type='Submit' id='save' name='submit' value='Save changes'>Save</button>
                                    </div>
                                    <div class='settings-error'>
                                        <?php if ( isset( $error['fields'] ) ) {
                                            echo $error['fields'];
                                        }
                                        ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>




            
            <div class='righter mt-4'>
                <div class='inner-righter'>
                    <div class='acc'>
                        <div class='acc-heading'>
                            <h5>Deactivate your account</h5>
                        </div>
                        <div class='acc-content'>
                            <form id='account-form' method='POST'>
                                <div class='acc-wrap'>
                                    <!-- <label class='ml-3' for=''>Username</label> -->
                                    <div class='form-group col-auto'>
                                   <!-- <input class='form-control' type='text' name='username' value="<?php echo $user->username;?>" /> -->
                                    </div>
                                </div>
                                <div class='acc-wrap'>
                                    <div class='acc-right mt-3'>
                                        <input class='new-btn' type='Submit'  name='deactivate' value='Deactivate'>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--RIGHTER ENDS-->
        </div>
        <!--CONTAINER_WRAP ENDS-->
        <?php require '../setting.php' ?>

</body>
</html>