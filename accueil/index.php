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
		<title>accueil</title>
		<meta charset = "utf-8">
		<link rel = "stylesheet" type = "text/css" href = "../include/design.css">
		<meta name = "viewport" content = "width=divice-width, initial-scale=1.0">
	</head>
	<body>
		<?php include('../include/header.php');?>
		<section>
			<div class = "dimension">
				<!--<div class = "actu">
					lol
				</div>-->
				<div class = "flex">
					<div class = "princip">
						<div class = "flex">
							<div class = "fen spe">
								<div class = "fen_titre">remplacement</div>
								<div style = "padding : 10px;">
									<table class = "tab_info">
										<tr>
											<th class = "ligne_tab_info couleur_tab_ligne">de</th>
											<th class = "ligne_tab_info couleur_tab_ligne">a</th>
											<th class = "ligne_tab_info couleur_tab_ligne">dispo</th>
										</tr>
											<?php
												$remp = $bdd->query('SELECT * FROM remplacement'); 								// recherche tout les tuples (lignes) remplacements
												while ($infoRemp = $remp->fetch()) { 											// enregistre dans un tableau les tuples recherché
													echo '
														<tr>
															<td class = "ligne_tab_info">'.substr($infoRemp['de'], 5, 11).'</td> 
															<td class = "ligne_tab_info">'.substr($infoRemp['a'], 5, 11).'</td>
															<td class = "ligne_tab_info">'.$infoRemp['dispo'].'</td>
														</tr>
													'; 																			// affiche les attributs (colonnes) de chaque tuples dans des balises html
												}
											?>
									</table>
								</div>
							</div>
							<div class = "fen spe">
								<div class = "fen_titre">intervention</div>
								<div style = "padding : 10px;">
									<table class = "tab_info">
										<tr>
											<th class = "ligne_tab_info couleur_tab_ligne">de</th>
											<th class = "ligne_tab_info couleur_tab_ligne">motif</th>
											<th class = "ligne_tab_info couleur_tab_ligne">dispo</th>
										</tr>
										<tr>
											<?php
												$inter = $bdd->query('SELECT * FROM intervention');
												while ($infoInter = $inter->fetch()) {
													echo '
														<td class = "ligne_tab_info">'.substr($infoInter['quand'], 5, 11).'</td>
														<td class = "ligne_tab_info">'.$infoInter['motif'].'</td>
														<td class = "ligne_tab_info">'.$infoInter['dispo'].'</td>
													';
												}
											?>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class = "second">
						<div class = "fen">
							<div class = "fen_titre">test</div>
							<div style = "padding : 10px;">
								lolollolollolollolollolollolollolollolollolollolollolol
							</div>
						</div>
						<div class = "fen">
							<div class = "fen_titre">test</div>
							<div style = "padding : 10px;">
								lolollolollolollolollolollolollolollolollolollolollolol
							</div>
						</div>
						<div class = "fen">
							<div class = "fen_titre">test</div>
							<div style = "padding : 10px;">
								lolollolollolollolollolollolollolollolollolollolollolol
							</div>
						</div>
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