<?php
	include('include/bdd.php');
	//echo hash('sha512', 'azerty');
	if (isset($_POST['valide'])) {
		if (!empty($_POST['email']) && !empty($_POST['mdp'])){ 							// on vérifie que les champs ne soie pas vide
			$email = htmlspecialchars($_POST['email']); 								// on retire toute les possibles balises html pour éviter les injection de code
			$mdp = htmlspecialchars($_POST['mdp']); 									// idem
			$taille = 100; 																// 100 caractères max
			$emailTaille = strlen($email);
			$mdpTaille = strlen($mdp);
			if ($emailTaille <= $taille && $mdpTaille <= $taille) { 					// on verifie que la longueur de l'email et du mdp
				$mdpHash = hash('sha512', $mdp); 										// hashage du mot de passe
				$co = $bdd->prepare('SELECT * FROM user WHERE email = ? AND mdp = ?'); 	// cherche les infos dans la bdd
				$co->execute(array($email, $mdpHash)); 									// grâce a ces données
				$nb = $co->rowCount(); 													// compte les résultats
				if ($nb == 1) { 														// verifie l'éxistance du compte demandé
					$coInfo = $co->fetch();
					session_start();
					$_SESSION['id'] = $coInfo['idUser'];
					header('location:'.$domain.'/accueil/'.$_SESSION['id']); 			// redirection vers accueil
					//$msgOk = 'msg test : cool t\'es connecter';
				}
				else {
					$msgErr = 'L\'email ou le mot de passe sont incorrecte';
				}
			}
			else {
				$msgErr = 'L\'email et le mot de passe ne doivent pas dépasser '.$taille.' caractères';
			}
		}
		else {
			$msgErr = 'Veuillez remplir tout les champs';
		}
	}
?>

<!DOCTYPE html>
<html lang = "fr">
	<head>
		<title>connexion</title>
		<meta charset = "utf-8">
		<link rel = "stylesheet" type = "text/css" href = "include/design.css">
		<meta name = "viewport" content = "width=divice-width, initial-scale=1.0">
	</head>
	<body>
		<div class = "connexion">
			<form method = "post" action = "">
				<input type="text" class = "champ" name="email" placeholder = "entrez votre email"><br/>
				<input type="password" class = "champ" name="mdp" placeholder = "entrez votre mot de passe"><br/>
				<input type="submit" class = "bouton" name="valide" value = "connexion">
			</form>
			<?php
				if (isset($msgErr)) {
					echo '
						<div class = "msgErr">
							'.$msgErr.'
						</div>
					';
				}
				if (isset($msgOk)) {
					echo '
						<div class = "msgOk">
							'.$msgOk.'
						</div>
					';
				}
			?>
		</div>
	</body>
</html>