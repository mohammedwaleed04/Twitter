<?php
include '../../init.php';
 
// if ($_SERVER['REQUEST_METHOD'] == "GET" && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
//   header('Location: ../../index.php');
// }

if(isset($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($email) or !empty($password)) {
      $email = $getFromU->checkInput($email);
      $password = $getFromU->checkInput($password);

      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errorMsg = "Invalid format";
      }else {
        if($getFromU->login($email, $password) === false){
          $errorMsg = "The email or password is incorrect!";
        }
      }
    }else {
      $errorMsg = "Please enter username and password!";
    }
}
?>
<head>
    <title>Twitter Login</title>
    <meta charset="UTF-8" />
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/bird.svg">
    <link rel="stylesheet" href="../assets/css/style-complete.css" />
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link rel="stylesheet" href="../assets/css/darkMode.css" />
	  <link rel="stylesheet" href="../assets/css/style1.css">
    <link rel="stylesheet" href="../assets/css/style2.css"/>
</head>
    <body>
        <div class="container">
            <div class="box box-one">
                <i class="fab"><img src="https://img.icons8.com/color/50/000000/twitter--v1.png"/></i>
                <button>
                <img src="../users/Google.png" width="19">
                <span>Sign in with Google</span>
                </button>
                <button>
                <img src="../users/apple.png" width="19">
                <span>Sign in with Apple</span>
                </button>
            </div>
            <h5>Or</h5><br><br>
            <div class="box box-two">
            <?php 
              if (isset($errorMsg))
              {
                  ?>
                      <div class="alert alert-danger" role="alert"><?php echo $errorMsg ?></div>
                  <?php
              }
            ?>
                <form method="post">
                    <input type="text" name="email" placeholder="Phone,email, or username"/><br><br>
                    <input type="password" name="password" placeholder="Password"/><br><br>
                    <button type="submit" class="next-btn">Next</button><br>
                </form>
                <a href="forgot.php" style="text-decoration:none;"><button>Forget password</button></a><br><br>
            </div><br><br>
            <p>Don't have an account <a href="signup-form.php">Sign Up</a></p>
        </div>
        <script src='../assets/js/main.js'></script>
    </body>
</html>