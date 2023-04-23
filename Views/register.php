<?php 
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
    require "../controllers/signup.php";
    if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email']))
    {   

    }
    else
        $errMsg="Please fill all fields";
}   
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up Form</title>
</head>
<body>
	<h2>Sign Up</h2>
	<form action="signup.php" method="post">
		<label>Username:</label><br>
		<input type="text" name="username"><br>
		<label>Password:</label><br>
		<input type="password" name="password"><br>
		<label>Email:</label><br>
		<input type="email" name="email"><br>
		<input type="submit" value="Sign Up">
	</form>
</body>
</html>