$(document).ready(function(){

  $('.chatButton').on('click',function(e){
    e.preventDefault();
    $('.chatContent').slideToggle('slow');
  });

});
