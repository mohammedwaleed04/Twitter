<?php 
	include '../../init.php';
	
	if(isset($_POST['showpopup']) && !empty($_POST['showpopup'])){
		$tweetID = $_POST['showpopup'];
		$user_id = @$_SESSION['user_id'];
		$tweet   = $getFromT->tweetPopup($tweetID);
		$user    = $getFromU->userData($user_id);
		$likes   = $getFromT->likes($user_id, $tweetID);
		$retweet = $getFromT->checkRetweet($tweetID,$user_id);
		$comments = $getFromT->comments($tweetID);
   	}
?>
<div class="tweet-show-popup-wrap">
<input type="checkbox" id="tweet-show-popup-wrap">
<div class="wrap4">
	<label for="tweet-show-popup-wrap">
		<div class="tweet-show-popup-box-cut">
			<i class="fa fa-times" aria-hidden="true"></i>
		</div>
	</label>
	<div class="tweet-show-popup-box">
	<div class="tweet-show-popup-inner">
		<div class="tweet-show-popup-head">
			<div class="tweet-show-popup-head-left">
				<div class="tweet-show-popup-img">
					<img src="<?php echo BASE_URL.'views/'.$tweet->profileImage;?>"/>
				</div>
				<div class="tweet-show-popup-name">
					<div class="t-s-p-n">
						<a href="<?php echo BASE_URL.$tweet->username;?>">
							<?php echo $tweet->screenName;?>
						</a>
					</div>
					<div class="t-s-p-n-b">
						<a href="<?php echo BASE_URL.$tweet->username;?>">
							@<?php echo $tweet->username;?>
						</a>
					</div>
				</div>
			</div>
			<div class="tweet-show-popup-head-right">
			<?php echo $getFromF->followBtn($tweet->tweetBy, $user_id, $user_id);?>
 			</div>
		</div>
		<div class="tweet-show-popup-tweet-wrap">
			<div class="tweet-show-popup-tweet">
				<?php 
				if(isset($_POST['flag']) && !empty($_POST['flag'])) {?>
						<textarea maxlength='280' id='my_textarea' rows='3' cols='100%' style="font-size:17px;"><?php echo $getFromT->getTweetLinks($tweet->status); ?></textarea>
						<div class='hash-box'>
							<ul>
							</ul>
						</div>
						<div class='tweet_icons-wrapper'>
							<div class='t-fo-left tweet_icons-add'>
								<ul>
									<input type='file' name='file' id='file' />
									<li>
										<label for='file'><i class='fa fa-image' aria-hidden='true'></i></label>
									</li>
									<span class='tweet-error'><?php if ( isset( $error ) ) {
										echo $error;
									} else if ( isset( $imgError ) ) {
										echo '<br>' . $imgError;
									}
									?></span>
								</ul>
							</div>
							<?php if (isset($_SESSION['errors_tweet'])) { 
								foreach($_SESSION['errors_tweet'] as $t) {?>
									<div class="alert alert-danger">
										<span class="item2-pair"> <?php echo $t; ?> </span>
									</div>
								<?php } } unset($_SESSION['errors_tweet']); ?>
							<div class='t-fo-right'>
							<?php echo '<button class="button_edit_tweet" type="submit" name="tweet" style="outline:none;" data-tweet='.$tweet->tweetID.' >Tweet</button>' ?>
							</div>
				<?php 
				}
				else 
					echo $getFromT->getTweetLinks($tweet->status);
				?>
			</div>
			<div class="tweet-show-popup-tweet-ifram mb-0">
			<?php 
				if(!empty($tweet->tweetImage)){
  			    	echo '<img src="'.$tweet->tweetImage.'"/>'; 
  				}
  			?>	
			</div>
		</div>
		<div class="tweet-show-popup-footer-wrap">
			<div class="tweet-show-popup-retweet-like">
				<div class="tweet-show-popup-retweet-left">
					<div class="tweet-retweet-count-wrap">
						<div class="tweet-retweet-count-head">
							RETWEET
						</div>
						<div class="tweet-retweet-count-body">
							<?php echo $tweet->retweetCount;?>
						</div>
					</div>
					<div class="tweet-like-count-wrap">
						<div class="tweet-like-count-head">
							LIKES
						</div>
						<div class="tweet-like-count-body">
							<?php echo $tweet->likesCount;?>
						</div>
					</div>
				</div>
				<div class="tweet-show-popup-retweet-right">
				 
				</div>
			</div>
<!--
			<div class="tweet-show-popup-time">
				<span><?php echo $getFromU->timeAgo($tweet->postedOn);?></span>
			</div>
-->
			<div class="tweet-show-popup-footer-menu mb-0">
				<?php 
				// echo ($tweet->tweetBy === $user_id) ? "equal " : "not equal ";
				// echo ($retweet['retweetBy'] === $user_id) ? "equal " : "not equal ";
					echo '<ul> 
						'.(($getFromU->loggedIn()) ?   '
							<li><button><i class="fa fa-share" aria-hidden="true"></i></button></li>	
							<li>'.(((isset($retweet['retweetID'])) ? $tweet->tweetID === $retweet['retweetID'] OR $user_id === $retweet['retweetBy'] : '') ? '<button class="retweeted" data-tweet="'.$tweet->tweetID.'" data-user="'.$tweet->tweetBy.'"><i class="fa fa-retweet" aria-hidden="true"></i><span class="retweetsCount">'.(($tweet->retweetCount > 0) ? $tweet->retweetCount : '').'</span></button>' : '<button class="retweet" data-tweet="'.$tweet->tweetID.'" data-user="'.$tweet->tweetBy.'"><i class="fa fa-retweet" aria-hidden="true"></i><span class="retweetsCount">'.(($tweet->retweetCount > 0) ? $tweet->retweetCount : '').'</span></button>').'</li>
							<li>'.(((isset($likes['likeOn'])) ? $likes['likeOn'] == $tweet->tweetID : '') ? '<button class="unlike-btn" data-tweet="'.$tweet->tweetID.'" data-user="'.$tweet->tweetBy.'"><i class="fa fa-heart" aria-hidden="true"></i><span class="likesCounter">'.(($tweet->likesCount > 0) ? $tweet->likesCount : '' ).'</span></button>' : '<button class="like-btn" data-tweet="'.$tweet->tweetID.'" data-user="'.$tweet->tweetBy.'"><i class="fa fa-heart-o" aria-hidden="true"></i><span class="likesCounter">'.(($tweet->likesCount > 0) ? $tweet->likesCount : '').'</span></button>').'</li>
							'.(($tweet->tweetBy === $user_id || $retweet['retweetBy'] === $user_id) ? ' 
							<li>
								<a href="#" class="more"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
								<ul> 
								  <li><label class="deleteTweet" data-tweet="'.$tweet->tweetID.'">Delete Tweet</label></li>
								  <li><label class="editTweet" 	data-flag="true" data-user="'.$tweet->tweetBy.'" data-tweet="'.$tweet->tweetID.'">Edit Tweet</label></li>
								</ul>
							</li>' : '').'
						' : '
							<li><button><i class="fa fa-share" aria-hidden="true"></i></button></li>	
							<li><button><i class="fa fa-retweet" aria-hidden="true"></i></button></li>	
							<li><button><i class="fa fa-heart-o" aria-hidden="true"></i></button></li>	
						').'
						</ul>';
				?>
			</div>
		</div>
	</div><!--tweet-show-popup-inner end-->
	<?php if($getFromU->loggedIn() === true){?>
 	<div class="tweet-show-popup-footer-input-wrap">
		<div class="tweet-show-popup-footer-input-inner">
			<div class="tweet-show-popup-footer-input-left">
				<img src="<?php echo BASE_URL.'views/'.$user->profileImage;?>"/>
			</div>
			<div class="tweet-show-popup-footer-input-right">
				<input id="commentField" type="text" name="comment" placeholder="Reply to @<?php echo $tweet->username;?>">
			</div>
		</div>
		<div class="tweet-footer">
		 	<div class="t-fo-left">
		 		<ul>
		 			<li>
		 				<!-- <label for="t-show-file"><i class="fa fa-camera" aria-hidden="true"></i></label>
		 				<input type="file" id="t-show-file"> -->
		 			</li>
		 		</ul>
		 	</div>
		 	<div class="t-fo-right">
 		 		<?php echo '<input type="submit" class="comment" value="Comment" data-tweet='.$tweet->tweetID.' data-user="'.$tweet->tweetBy.'">' ?>
 		 		<script type="text/javascript" src="<?php echo BASE_URL;?>views/assets/js/comment.js"></script>
 		 		<script type="text/javascript" src="<?php echo BASE_URL;?>views/assets/js/follow.js"></script>
 		 		<script type="text/javascript" src="<?php echo BASE_URL;?>views/assets/js/editTweet.js"></script>
  		 	</div>
		 </div>
	</div><!--tweet-show-popup-footer-input-wrap end-->
	<?php }

	require('../../views/popupComments.php')
	?>

<!--tweet-show-popup-box ends-->
</div>
</div>