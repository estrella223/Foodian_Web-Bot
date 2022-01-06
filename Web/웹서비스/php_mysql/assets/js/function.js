// Code By Webdevtrick ( https://webdevtrick.com )
var fActive;

function filterColor(color){
  if(fActive != color){
    $('#red, #blue, #green').filter('.'+color).slideDown();
    $('#red, #blue, #green').filter(':not(.'+color+')').slideUp();
    fActive = color;
		$('button').removeClass("is-active");
  }
}

$('.s-red').click(function(){ filterColor('red'); $(this).addClass("is-active"); });
$('.s-blue').click(function(){ filterColor('blue'); $(this).addClass("is-active"); });
$('.s-green').click(function(){ filterColor('green'); $(this).addClass("is-active"); });

$('.s-all').click(function(){
  $('#red, #blue, #green').slideDown();
  fActive = 'all';
	$(this).addClass("is-active");
});