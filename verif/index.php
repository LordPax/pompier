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
		<!-- utilisation d'une autre page pour afficher le titre de la page -->
		<?php include('../include/popupVerif.php');?>
		<?php include('../include/header.php');?>
		<section>
			<div class = "dimension">
				<div class = "fen">
					<div class = "fen_titre">Vérification</div>
					<div style = "padding : 10px;">
						<div class = "verif_mat"></div>
						<div class = "verif_mat2">
							<?php
								$materiel = $bdd->query('SELECT * FROM materiel WHERE idMat = 1');
								$infoMat = $materiel->fetch();

								echo '
									<div class = "verif">
										<div class = "verif_ligne verif_ligne_impair">nom <div class = "verif_ligne_info">'.$infoMat['nom'].'</div></div>
										<div class = "verif_ligne">vehicule <div class = "verif_ligne_info">'.$infoMat['vehicule'].'</div></div>
										<div class = "verif_ligne verif_ligne_impair">localisation <div class = "verif_ligne_info">'.$infoMat['localisation'].'</div></div>
										<div class = "verif_ligne">quantite <div class = "verif_ligne_info">'.$infoMat['qte'].'</div></div>
									</div>
								';
							?>
						</div>
						<input type = "hidden" class = "idUser" value = <?php echo '"'.$_SESSION['id'].'"'?>>
						<input type = "hidden" class = "idMat" value = "2">
						<button id = "verif_btn" class = "verif_btn_vert">present</button>
						<button id = "verif_btn1" class = "verif_btn_jaune">anomalie</button>
						<button id = "verif_btn2" class = "verif_btn_rouge">absent</button>
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