$(() => {
	$('.menu_deroulant').hide();
	$('.menu_bouton').click(() => { 				// ouvre et ferme le menu déroulant
		$('.menu_deroulant').slideToggle('fast');
	});

	$('.popup_font').hide();
	$('.ajout').click(() => { 						// ouvre le popup
		$('.popup_font').show();
	});
	$('.fen_fermer').click(() => { 					// ferme le popup
		$('.popup_font').hide();
	});
});