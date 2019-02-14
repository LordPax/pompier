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
		<link rel = "stylesheet" type = "text/css" href = "include/design.css">
		<meta name = "viewport" content = "width=divice-width, initial-scale=1.0">
	</head>
	<body>
		<?php
			echo 'test : '.$info['idUser'].' '.$info['nom'].' '.$info['prenom'];
		?>
	</body>
</html>
<?php
	}
?>