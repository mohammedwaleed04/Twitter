<?php
include '../../init.php';
// if(isset($_GET['step']) === true && empty($_GET['step']) === false){
// include '../core/init.php';
// if (isset($_SESSION['user_id']) === false) {
//   header('Location: ../index.php');
// }

$user_id = $_SESSION['user_id'];
$user = $getFromU->userData($user_id);
// $step = $_GET['step'];

if(isset($_POST['next'])){
  $username = $getFromU->checkInput($_POST['username']);

  if (!empty($username)) {
    if(strlen($username) > 20){
      $error = "Username must be between in 6-20 characters";
    }else if(!preg_match('/^[a-zA-Z0-9]{6,}$/', $username)){
      $error = 'Username must be longer than 6 alphanumeric characters without any spaces';
    } else if($getFromU->checkUsername($username) === true){
      $error = "Username is already taken!";
    }else{
      $getFromU->update('users', $user_id, array('username' => $username));
	  header('Location: login.php');
    }
  }else{
    $error = "Please enter your username to choose";
  }
}
  ?>
  <!doctype html>
  <html>
  	<head>
  		<title>twitter</title>
  		<meta charset="UTF-8" />
		<link rel="shortcut icon" type="image/x-icon" href="../assets/images/bird.svg">
   		<link rel="stylesheet" href="../assets/css/style-complete.css"/>
  	</head>
  	<!--Helvetica Neue-->
  <body>
  <div class="wrapper">
  <!-- nav wrapper -->
  <div class="nav-wrapper">

  	<div class="nav-container">
  		<div class="nav-second">
  			<ul>
  				<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"style="color:white;"></i></a></li>
  			</ul>
  		</div><!-- nav second ends-->
  	</div><!-- nav container ends -->

  </div><!-- nav wrapper end -->

  <!---Inner wrapper-->
  <div class="inner-wrapper">
  	<!-- main container -->
  	<div class="main-container">
  		<!-- step wrapper-->

   		<div class="step-wrapper">
  		    <div class="step-container">
  				<form method="post" autocomplete="off">
  					<h2>Choose a Username</h2>
  					<h4>Don't worry, you can always change it later.</h4>
  					<div class="form-group">
  						<input class="form-control"type="text" name="username" placeholder="Username" style="font-size: 16px;"/>
  					</div>
  					<div>
  						<ul>
  						  <li><?php if (isset($error)){echo $error;} ?></li>
  						</ul>
  					</div>
  					<div>
  						<input type="submit" name="next" value="Next"/>
  					</div>
  				 </form>
  			</div>
  		</div>
  	</div><!-- main container end -->
  </div><!-- inner wrapper ends-->
  </div><!-- ends wrapper -->
  </body>
  </html>
  <?php
// }
?>
