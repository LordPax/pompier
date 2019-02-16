$(function(){
	$('.menu_deroulant').hide();
	$('.menu_bouton').click(function(){
		$('.menu_deroulant').slideToggle('fast');
	});
});