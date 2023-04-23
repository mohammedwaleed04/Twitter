<?php
    require_once'../controllers/DBController.php';
  
    // Get input values from the login form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "select * from user where username='$username'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // User exists, verify password
        //array show rows(id, uname, pass, name)
        $row = mysqli_fetch_assoc($result);
        if($row['username'] === $username && $row['password'] === $password){
        //or
        // if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['name'] = $name;
            header("Location: home.php");
            exit();
        } else {
            echo "Invalid password";
        }
    } else 
        echo "User not found";
    mysqli_close($conn);
?>