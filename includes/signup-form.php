<?php
include '../core/init.php';
// if ($SERVER['REQUEST_METHOD'] == "GET" && realpath(__FILE_) == realpath($_SERVER['SCRIPT_FILENAME'])) {
// 	header('Location: ../index.php');
// }
if(isset($_POST['signup'])){
	$screenName = $_POST['screenName'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$error = '';

	if(empty($screenName) or empty($password) or empty($email)){
		$error = 'All fields are required';
	}else {
		$email = $getFromU->checkInput($email);
		$screenName = $getFromU->checkInput($screenName);
		$password = $getFromU->checkInput($password);

		if(!filter_var($email)) {
			$error = 'Invalid email format';
		}else if(strlen($screenName) > 20){
			$error = 'Name must be between in 6-20 characters';
		}else if(strlen($password) < 5){
			$error = 'Password is too short';
		}else {
			if($getFromU->checkEmail($email) === true){
				$error = 'Email is already in use';
			}else {
				$user_id = $getFromU->create('users', array('username' => $screenName, 'email' => $email, 'password' => md5($password) , 'screenName' => $screenName, 'profileImage' => 'assets/images/defaultProfileImage.png', 'profileCover' => 'assets/images/defaultCoverImage.png', 'created_at' => date("F Y")));
				$_SESSION['user_id'] = $user_id;
				header('Location: signup.php');
			}
		}
	}
}
?>
<!--
<form method="post">
<div class="signup-div">
	<h3>Sign up </h3>
	<ul>
		<li>
		    <input type="text" name="screenName" placeholder="Full Name"/>
		</li>
		<li>
		    <input type="email" name="email" placeholder="Email"/>
		</li>
		<li>
			<input type="password" name="password" placeholder="Password"/>
		</li>
		<li>
			<input type="submit" name="signup" Value="Signup for Twitter">
		</li>
		
	</ul>

</div>
</form>
-->
<head>
    <title>Twitter Sign Up</title>
    <meta charset="UTF-8" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css"/>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="./assets/images/bird.svg">
    <link rel="stylesheet" href="../assets/css/style-complete.css" />
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link rel="stylesheet" href="../assets/css/font-awesome.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/js/popper.min.js" />
    <link rel="stylesheet" href="../assets/js/bootstrap.min.js" />
	<link rel="stylesheet" href="../assets/css/style1.css">
    <link rel="stylesheet" href="../assets/css/style2.css"/>
    <script src="../assets/js/jquery-3.1.1.min.js"></script>
</head>
<body>
        <div class="container" style="height:80%">
            <div class="box box-one">
                <i class="fab"><img src="https://img.icons8.com/color/50/000000/twitter--v1.png"/></i>
                <?php
      if(isset($error)){
            echo '<div class="alert alert-danger" role="alert"style="width: 300px; margin:20px auto;text-align:center;">
              '.$error.'
            </div>';
      }
    ?>
            </div>
            <div class="box box-two">
                <form method="post">
                    <input type="text" name="screenName" placeholder="Full Name"/><br><br>
                    <input type="email" name="email" placeholder="Email"/><br><br>
					<input type="password" name="password" placeholder="Password"/><br><br>
                    <input class="new-btn m-auto mt-5" type="submit" name="signup" Value="Signup"><br>
                </form>
            </div><br>
            <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
    </body>
<script type="text/javascript">
        setTimeout(function() {
            // Closing the alert 
            $('#alert').alert('close');
        }, 3500);
</script>
</form>
<script type="text/javascript">
        setTimeout(function() {
            // Closing the alert 
            $('#alert').alert('close');
        }, 3500);
</script>