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
		<title>accueil</title>
		<!-- permet l'utilisation des accents dans la page -->
		<meta charset = "utf-8">
		<!-- permet d'avoir des accents dans la page -->
		<link rel = "stylesheet" type = "text/css" href = "../include/design.css">
		<meta name = "viewport" content = "width=divice-width, initial-scale=1.0">
	</head>
	<body>
		<!-- utilisation d'une autre page pour afficher le titre de la page -->
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
								<table class = "tab_info">
									<tr>
										<th class = "ligne_tab_info">de</th>
										<th class = "ligne_tab_info">a</th>
										<th class = "ligne_tab_info">Disponible ? </th>
									</tr>
									<tr>
										<?php
											$remp = $bdd->query('SELECT * FROM remplacement'); 								// recherche tout les tuples (lignes) remplacements
											while ($infoRemp = $remp->fetch()) { 											// enregistre dans un tableau les tuples recherché
												echo '
													<td class = "ligne_tab_info">'.substr($infoRemp['de'], 5, 11).'</td> 
													<td class = "ligne_tab_info">'.substr($infoRemp['a'], 5, 11).'</td>
													<td class = "ligne_tab_info">'.$infoRemp['dispo'].'</td>
												'; 																			// affiche les attributs (colonnes) de chaque tuples dans des balises html
											}
										?>
									</tr>
								</table>
							</div>
							<div class = "fen spe">
								<table class = "tab_info">
									<tr>
										<th class = "ligne_tab_info">de</th>
										<th class = "ligne_tab_info">à</th>
										<th class = "ligne_tab_info">Disponible ? </th>
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
					<div class = "second">
						<center> <b>Communication :</b> </center>
						<div class = "fen">
							<b>Chef de centre: </b><br>
							<p class="incline">information à récupérer depuis la base de donnée</p>
							
						</div>
						<div class = "fen">
							<b>Chef de section 1: </b><br>
							<p class="incline">information à récupérer depuis la base de donnée</p>
						</div>
						<div class = "fen">
							<b>Chef de section 2: </b><br>
							<p class="incline">information à récupérer depuis la base de donnée</p>
						</div>
						<div class = "fen">
							<b>Chef de section 3: </b><br>
							<p class="incline">information à récupérer depuis la base de donnée</p>
						</div>
						<div class = "fen">
							<b>Chef de section 4: </b><br>
							<p class="incline">information à récupérer depuis la base de donnée</p>
						</div>
						<div class = "fen">
							<b>Section sportive : </b><br>
							<p class="incline">information à récupérer depuis la base de donnée</p>
							
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