<?php
    // Start a session
    session_start();

    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "twitterdb";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    mysqli_close($conn);
?>