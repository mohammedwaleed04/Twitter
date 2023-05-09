<?php
include '../../init.php';
// if ($SERVER['REQUEST_METHOD'] == "GET" && realpath(__FILE_) == realpath($_SERVER['SCRIPT_FILENAME'])) {
// 	header('Location: ../index.php');
// }
if(isset($_POST['reset'])){
	$email = $_POST['email'];
    $question = $_POST['sQuestion'];
    $password = $_POST['password'];
	$error = '';

	if(empty($email) or empty($password) or empty($question)){
		$error = 'All fields are required';
	}else {
		$email = $getFromU->checkInput($email);
        $question = $getFromU->checkInput($question);
        $password = $getFromU->checkInput($password);
		if(!($getFromU->checkEmail($email))) {
            $error = 'Invalid Email';
        }
        else if(!($getFromU->checkQuestion($question))) {
            $error = 'Security Question Answer is wrong';
        }
        else if(strlen($password) < 5){
			$error = 'Password is too short';
		}
        else {
            $user_id = $getFromU->userIdbyEmail($email);
            $password = md5($password);
            $getFromU->update('users', $user_id, array('password' => $password));
            header('Location: login.php');
        }
	}
}
?>

<head>
    <title>Twitter Reset Password</title>
    <meta charset="UTF-8" />
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/bird.svg">
    <link rel="stylesheet" href="../assets/css/style-complete.css" />
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link rel="stylesheet" href="../assets/css/darkMode.css" />
	<link rel="stylesheet" href="../assets/css/style1.css">
    <link rel="stylesheet" href="../assets/css/style2.css"/>
</head>
<body>
        <div class="container" style="height:95%">
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
                    <input type="text" name="email" placeholder="Email"/><br><br>
                    <input type="text" name="sQuestion" placeholder="Security Question"/><br><br>
                    <input type="password" name="password" placeholder="New Password"/><br><br>
                    <input class="new-btn m-auto mt-5" type="submit" name="reset" Value="Reset Password"><br>
                </form>
            </div><br>
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
<script src='<?php echo BASE_URL; ?>../assets/js/main.js'></script>