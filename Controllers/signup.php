<?php
    require '../controllers/DBController.php';

    // Get input values from the sign-up form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the new user into the database
    $sql = "insert into user (username, password, email) values ('$username', '$hashed_password', '$email')";
    $result = mysqli_query($conn, $sql);
    if ($result) 
        echo "User created successfully";
    else 
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
?>