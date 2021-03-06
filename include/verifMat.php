<?php
	include('bdd.php');
	session_start();
	if (isset($_SESSION['id']) && isset($_POST['idUser']) && !empty($_SESSION['id']) && !empty($_POST['idUser']) && $_SESSION['id'] == $_POST['idUser']) { // verification de l'authenticité de l'utilisateur
		
		if (isset($_POST['idMat'])  && !empty($_POST['idMat']) && $_POST['idMat'] > 0){ // vérification des valeur envoyé
			$idMat = $_POST['idMat']; // id du matériel
			$materiel2 = $bdd->query('SELECT * FROM materiel');
			$countMat = $materiel2->rowCount(); // compte le nombre de tuple (ligne) concernant le matériel

			if ($idMat > $countMat) // pour éviter de dépasser le nombre max
				$idMat = $countMat;

			$materiel = $bdd->prepare('SELECT * FROM materiel WHERE idMat = ?');
			$materiel->execute(array($idMat));
			$infoMat = $materiel->fetch();

			echo '
				<div class = "verif">
					<div class = "verif_ligne verif_ligne_impair">nom <div class = "verif_ligne_info">'.$infoMat['nom'].'</div></div>
					<div class = "verif_ligne">vehicule <div class = "verif_ligne_info">'.$infoMat['vehicule'].'</div></div>
					<div class = "verif_ligne verif_ligne_impair">localisation <div class = "verif_ligne_info">'.$infoMat['localisation'].'</div></div>
					<div class = "verif_ligne">quantite <div class = "verif_ligne_info">'.$infoMat['qte'].'</div></div>
				</div>
			';
		}
	}

?>