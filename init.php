<?php 
	session_start();
	include 'models/connection.php';
	include 'models/user.php';
	include 'models/tweet.php';
	include 'models/follow.php';
	include 'models/message.php';
  	global $pdo;
	$pdo = DatabaseConnection::getInstance('mysql:host=localhost;dbname=tweety','root','');
  	$getFromU = new User($pdo);
  	$getFromT = new Tweet($pdo);
    $getFromF = new Follow($pdo);
    $getFromM = new Message($pdo);
  
  	define('BASE_URL', 'http://localhost/twitter/');
 ?>  
