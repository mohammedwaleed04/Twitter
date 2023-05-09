<?php 
	include '../../init.php';
 	if(isset($_POST) && !empty($_POST)){
		$status     = $getFromU->checkInput($_POST['status']);
		$tweetImage = '';
		// echo print_r($_POST);
		$user_id  = $_SESSION['user_id'];

		if(!empty($status) or !empty($_FILES['file']['name'][0])){

			if(!empty($_FILES['file']['name'][0])){
				$tweetImage = $getFromU->uploadImage($_FILES['file']);
			}

			if(strlen($status) > 280){
				$error  = "The text of your tweet is too long";
			}

			// echo json_encode($_POST['tweet_id']);
			if(isset($_POST['tweet_id']) && !empty($_POST['tweet_id'])){
				$tweet_id = $_POST['tweet_id'];
				$getFromT->editTweet($tweet_id, $status);
				// $getFromU->update('tweets', $user_id, array('status' => $status));
			}
			
			else {
			$tweet_id = $getFromU->create('tweets', array('status' => $status, 'tweetBy' => $user_id, 'tweetImage' => $tweetImage, 'postedOn' => date('Y-m-d H:i:s')));

			preg_match_all("/#+([a-zA-Z0-9_]+)/i", $status, $hashtag);

			if(!empty($hashtag)){
				$getFromT->addTrend($status);
			}
			$getFromT->addMention($status, $user_id, $tweet_id);

			$result['success'] = "Your Tweet has been posted";
			echo json_encode($result);	
		}
		// echo json_encode($tweet_id);
		// echo json_encode($status);
		}else {
			$error = "Please type or choose image to tweet";
		}

		if(isset($error)){
			$result['error'] = $error;
			echo json_encode($result);
		}
	}

?>