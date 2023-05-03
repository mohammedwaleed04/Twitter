$(function(){
	$(document).on('click','.comment', function(){
		// var comment = $('#commentField').val();
		var tweet_id    = $(this).data('tweet');
		var user_id     = $(this).data('user');
	    $counter        = $(this).find(".commentsCount");
	    $count          = $counter.text();
	    $button         = $(this);

		// $.post('http://localhost/twitter/core/ajax/retweet.php', {comment:comment,tweet_id:tweet_id}, function(data){
		// 	$('#comments').html(data);
		// 	$('#commentField').val('');
		// });
		$.post('http://localhost/twitter/core/ajax/retweet.php', {showPopup:tweet_id,user_id:user_id}, function(data){
			$('.popupTweet').html(data);
			$('.close-retweet-popup').click(function(){
				$('.retweet-popup').hide();
			})
		});
	});
});