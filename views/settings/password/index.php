<?php 
	include '../../../init.php';
	$user_id = $_SESSION['user_id'];
	$user    = $getFromU->userData($user_id);
	$notify  = $getFromM->getNotificationCount($user_id);

 	if($getFromU->loggedIn() === false){
		header('Location: index.php');
	}

	if(isset($_POST['submit'])){
		$currentPwd  = $_POST['currentPwd'];
		$newPassword = $_POST['newPassword'];
		$rePassword  = $_POST['rePassword'];
		$error       = array();

		if(!empty($currentPwd) && !empty($newPassword) && !empty($rePassword)){
			if($getFromU->checkPassword($currentPwd) === true){
				if(strlen($newPassword) < 6){
					$error['newPassword'] = "Password is too short";
				}else if($newPassword != $rePassword){
					$error['rePassword'] = "Password does not match";
				}else{
					$getFromU->update('users', $user_id, array('password' => md5($newPassword)));
//					header('Location:'.$user->username);
					header('Location:'.BASE_URL.'settings/password');
				}
			}else{
				$error['currentPwd'] = "Password does not match";
			}
		}else{
			$error['fields']  = "Please fill all the fields";
		}
	}
?>
<html>
	<head>
		<title>Password Settings - Twitter</title>
		<link rel='shortcut icon' type='image/x-icon'  href='<?php echo BASE_URL; ?>../../views/assets/images/bird.svg'>
		<link rel='stylesheet' href='<?php echo BASE_URL;?>views/assets/css/darkMode.css' />
        <link rel='stylesheet' href='<?php echo BASE_URL;?>views/assets/css/style.css' />
        <link rel='stylesheet' href='<?php echo BASE_URL;?>views/assets/css/style1.css' /> 
        <link rel='stylesheet' href='<?php echo BASE_URL;?>views/assets/css/bootstrap.css' /> 
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel = 'stylesheet' href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css'/>
	</head>
	<body>
		<div class="grid-container">

		<?php require '../../left-sidebar.php' ?>
		
		<div class="main main-leftClass">
			<p class="page_title mb-0"style="border-bottom:none;"><i class="fa fa-cog mr-4" style="color:#50b7f5;"></i>Settings</p>
			
			<div class="setting-head">
			<div class="account-text">
					<a href="<?php echo BASE_URL;?>views/settings/account">Account</a>
				</div>
				<div class="password-text active">
					<a class="bold" href="<?php echo BASE_URL;?>views/settings/password">Password</a>
				</div>
				<div class='account-text'>
						<a href='<?php echo BASE_URL;?>views/settings/dark-mode'>Display</a>
				</div>
			</div>
			
			<div class="righter mt-4">
				<div class="inner-righter">
					<div class="acc">
						<div class="acc-heading">
							<h5>Change your password or recover your current one</h5>
						</div>
						<div class="acc-content">
						<form method="POST">
							<div class="acc-wrap">
								<label class="ml-3" for="">Current Password</label>
								<div class="form-group col-auto">
									<input class="form-control" type="password" name="currentPwd"/>
									<span>
									<?php if(isset($error['currentPwd'])){echo $error['currentPwd'];}?>
									</span>
								</div>
							</div>

							<div class="acc-wrap">
								<label class="ml-3" for="">New Password</label>
								<div class="form-group col-auto">
									<input class="form-control" type="password" name="newPassword"/>
									<span>
										<?php if(isset($error['newPassword'])){echo $error['newPassword'];}?>
									</span>
								</div>
							</div>
							
							<div class="acc-wrap">
								<label class="ml-3" for="">Verify Password</label>
								<div class="form-group col-auto">
									<input class="form-control" type="password" name="rePassword"/>
									<span>
										<?php if(isset($error['rePassword'])){echo $error['rePassword'];}?>
									</span>
								</div>
							</div>
							
							<div class="acc-wrap">
								<div class="acc-right mt-3">
									<button class="new-btn"type="Submit" name="submit" value="Save changes"style="outline:none;">Save</button>
								</div>
								<div class="settings-error">
									<?php if(isset($error['fields'])){echo $error['fields'];}?>
								</div>	
							</div>
						</form>
						</div>
					</div>
				</div>	
			</div>
		</div>        
		<?php require '../setting.php' ?>
		
		<script src='../../assets/js/main.js'></script>
	</body>
</html>