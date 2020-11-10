$(document).ready(function(){

  $('.chat_button2').on('click',function(e){
    e.preventDefault();
    $('.chat_content').slideToggle('slow');
  });

  $('.chat_button').on('click',function(e){
    e.preventDefault();
    $('.chat_content').slideToggle('slow');
  });

});
