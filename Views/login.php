<?php 
if(isset($_POST['username']) && isset($_POST['password'])) {
    require_once "../controllers/signin.php";
    if(!empty($_POST['username']) && !empty($_POST['password']) )
    {   

    }
    else
        $errMsg="Please fill all fields";
}   
?>

<!DOCTYPE html>
    <head>
        <html lang="en">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Twitter Login Form Using HTML CSS</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="style2.css"/>
        <link rel="icon" type="image/x-icon" href="../images/twitter.png">
    </head>
    <body>
        <div class="container">
            <div class="box box-one">
                <i class="fab fa-twitter"><img src="https://img.icons8.com/color/50/000000/twitter--v1.png"/></i>
                <button>
                <img src="../images/google.png" width="19">
                <span>Sign in with Google</span>
                </button>
                <button>
                <img src="../images/apple.png" width="19">
                <span>Sign in with Apple</span>
                </button>
            </div>
            <h5>Or</h5><br><br>
            <div class="box box-two">
                <form action="login.php" method="post">
                    <input type="text" name="username" placeholder="Phone,email, or username"/><br><br>
                    <input type="password" name="password" placeholder="Password"/><br><br>
                    <button class="next-btn">Next</button><br>
                    <button>Forget password</button><br>
                </form>
            </div>
            <p>Don't have an account <a href="register.php">Sign Up</a></p>
        </div>
    </body>
</html>