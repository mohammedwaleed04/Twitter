$(function(){
  var regex = /[#|@](\w+)$/ig;

  $(document).on('keyup','.status', function(){
    var content = $.trim($(this).val());
    var text = content.match(regex);
    var max = 280;

    $('#count').text(max - content.length);
    
    if(content.length >= max){
      $('#count').css('color','#f00');
    }else{
      $('#count').css('color','#1DA1F2');
    }
  });
});
