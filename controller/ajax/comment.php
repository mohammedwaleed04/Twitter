<?php 
	include '../../init.php';
 
	if(isset($_POST['comment']) && !empty($_POST['comment'])){
		$comment  = $getFromU->checkInput($_POST['comment']);
		$user_id  = $_SESSION['user_id'];
    	$tweetID = $_POST['tweet_id'];
		$user    = $getFromU->userData($user_id);
		$tweet   = $getFromT->tweetPopup($tweetID);
    	$get_id  = $_POST['user_id'];
    	$getFromT->addComment($user_id, $tweetID, $get_id, $comment);
		$comments = $getFromT->comments($tweetID);
	}
	require('../../views/popupComments.php');
	
?>