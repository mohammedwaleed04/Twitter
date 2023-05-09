$(function(){
	$(document).on('click', '.button_edit_tweet', function(){
		var tweet_id = $(this).data('tweet');
		var textareaValue = document.getElementById("my_textarea").value;
		console.log(textareaValue);
		// var status = $(this).data('status');

		$.post('http://localhost/twitter/controller/ajax/addTweet.php', {tweet_id:tweet_id, status:textareaValue}, function(data){
			$('.popupTweet').html(data);
		});
	});
});