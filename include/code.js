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

	$('#verif_btn1').click(() => { 						// ouvre le popup
		$('.popup_font').show();
		$('.fen_titre').html('Anomalie');
	});

	$('#verif_btn2').click(() => { 						// ouvre le popup
		$('.popup_font').show();
		$('.fen_titre').html('Absent');
	});

	$('#verif_btn').click(() => {
		let idUser = $('.idUser').val(); 			// prend l'id de l'utilisateur
		let idMat = parseInt($('.idMat').val(), 10);// prend l'id du matériel en question
		$.post('../include/verifMat.php', {
			idUser : idUser, 						// envoie l'id de l'utilisateur au fichier spésifier au dessus
			idMat : idMat 				// idem mais pour l'id d matériel
		}, (res) => {
			$('.verif_mat').html(res); 				// envoie dans la balise "verif_mat" le résultat obtenu
			$('.verif_mat2').hide();
			$('.idMat').val(idMat + 1); 	// incrémente l'id du matériel pour passer au matériel suivant
		});
		return false;
	});
});