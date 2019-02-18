<?php
	include('../include/bdd.php');
	session_start();
	if(isset($_GET['id']) && !empty($_GET['id']) && $_GET['id'] >= 0 && $_SESSION['id'] == $_GET['id']){ // vérification de l'id envoyé
		$connect = $bdd->prepare('SELECT * FROM user WHERE idUser = ?');
		$connect->execute(array($_SESSION['id']));
		$info = $connect->fetch();
?>

<!DOCTYPE html>
<html lang = "fr">
	<head>
		<!-- définit le titre de la page -->
		<title>personnel</title>
		<!-- permet l'utilisation des accents dans la page -->
		<meta charset = "utf-8">
		<!-- permet d'avoir des accents dans la page -->
		<link rel = "stylesheet" type = "text/css" href = "../include/design.css">
		<meta name = "viewport" content = "width=divice-width, initial-scale=1.0">
		<script type = "text/javascript" src = "https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script type = "text/javascript" src = "../include/code.js"></script>
	</head>
	<body>
		<?php include('../include/popupPers.php');?>
		<!-- utilisation d'une autre page pour afficher le titre de la page -->
		<?php include('../include/header.php');?>
		<section>
			<div class = "dimension">
				<div class = "fen">
					<div class = "fen_titre">Personnel</div>
					<div style = "padding : 10px;">
						<button class = "bouton2 ajout">Ajouter</button>
						<table class = "tab_info">
							<tr>
								<th class = "ligne_tab_info couleur_tab_ligne">Nom</th>
								<th class = "ligne_tab_info couleur_tab_ligne">Prénom</th>
								<th class = "ligne_tab_info couleur_tab_ligne">Matricule</th>
								<th class = "ligne_tab_info couleur_tab_ligne">Poste</th>
								<th class = "ligne_tab_info couleur_tab_ligne">section</th>
								<th class = "ligne_tab_info couleur_tab_ligne">Modifier</th>
							</tr>
								<?php
									$pers = $bdd->query('SELECT * FROM user'); 								// recherche tout les tuples (lignes) dans user
									while ($infoPers = $pers->fetch()) { 											// enregistre dans un tableau les tuples recherché
										echo '
											<tr>
												<td class = "ligne_tab_info">'.$infoPers['nom'].'</td>
												<td class = "ligne_tab_info">'.$infoPers['prenom'].'</td>
												<td class = "ligne_tab_info">'.$infoPers['matricule'].'</td>
												<td class = "ligne_tab_info">'.$infoPers['role'].'</td>
												<td class = "ligne_tab_info">'.$infoPers['section'].'</td>
												<td class = "ligne_tab_info"><button class = "bouton2 modif">Modifier</button></td>
											</tr>
										'; 																			// affiche les attributs (colonnes) de chaque tuples dans des balises html
									}
								?>
						</table>
					</div>
				</div>
			</div>
		</section>
	</body>
</html>
<?php
	}
	else{
		header('location:'.$domain); // si la condition n'est pas validé on ce redirige vers la page de connexion
	}
?>