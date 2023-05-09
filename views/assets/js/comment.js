$(function(){
	$(document).on('click','.comment', function(){
		var comment 	= $('#commentField').val();
		var user_id     = $(this).data('user');
		var tweet_id    = $(this).data('tweet');
	    $counter        = $(this).find(".commentsCount");
		var count     = $counter.text();
		var button    = $(this) ;

		$.post('http://localhost/twitter/controller/ajax/comment.php', {comment:comment,tweet_id:tweet_id, user_id:user_id}, function(data){
			$('#comments').html(data);
			$('#commentField').val('');
		});
		// $.post('http://localhost/twitter/controller/ajax/popuptweets.php', {showPopup:tweet_id, user_id:user_id}, function(data){
		// 	$('.popupTweet').html(data);
		// 	$('.close-retweet-popup').click(function(){
		// 		$('.retweet-popup').hide();
		// 	})
		// });
	});
});
