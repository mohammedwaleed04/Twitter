<?php
include '../../init.php';
// if ($SERVER['REQUEST_METHOD'] == "GET" && realpath(__FILE_) == realpath($_SERVER['SCRIPT_FILENAME'])) {
// 	header('Location: ../index.php');
// }
if(isset($_POST['signup'])){
	$screenName = $_POST['screenName'];
	$email = $_POST['email'];
	$password = $_POST['password'];
    $question = $_POST['sQuestion'];
	$error = '';

	if(empty($screenName) or empty($password) or empty($email) or empty($question)){
		$error = 'All fields are required';
	}else {
		$email = $getFromU->checkInput($email);
		$screenName = $getFromU->checkInput($screenName);
        $question = $getFromU->checkInput($question);
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
				$user_id = $getFromU->create('users', array('username' => $screenName, 'email' => $email, 'password' => md5($password) , 'screenName' => $screenName, 'profileImage' => 'assets/images/defaultProfileImage.png', 'profileCover' => 'assets/images/defaultCoverImage.png', 'created_at' => date("F Y"), 'securityQuestion' => $question));
				$_SESSION['user_id'] = $user_id;
				header('Location: signup.php');
			}
		}
	}
}
?>

<head>
    <title>Twitter Sign Up</title>
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
                <?php
      if(isset($error)){
            echo '<div class="alert alert-danger" role="alert"style="width: 300px; margin:20px auto;text-align:center;">
              '.$error.'
            </div>';
      }
    ?>
            </div><br><br><br>
            <div class="box box-two">
                <form method="post">
                    <input type="text" name="screenName" placeholder="Full Name"/><br><br>
                    <input type="email" name="email" placeholder="Email"/><br><br>
					<input type="password" name="password" placeholder="Password"/><br><br>
                    <label for="sQuestion">What's your favourite color?</label>
                    <input type="text" name="sQuestion" placeholder="Security Question"/><br><br>
                    <input class="new-btn m-auto mt-5" type="submit" name="signup" Value="Signup"><br><br>
                </form>
            </div><br><br><br>
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
<script src='../assets/js/main.js'></script>
