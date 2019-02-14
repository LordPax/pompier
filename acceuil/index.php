<?php
	include('../include/bdd.php');
	session_start();
	if(isset($_GET['id']) && !empty($_GET['id']) && $_GET['id'] >= 0 && $_SESSION['id'] == $_GET['id']){
		$connect = $bdd->prepare('SELECT * FROM user WHERE idUser = ?');
		$connect->execute(array($_SESSION['id']));
		$info = $connect->fetch();
?>

<!DOCTYPE html>
<html lang = "fr">
	<head>
		<title>acceuil</title>
		<meta charset = "utf-8">
		<link rel = "stylesheet" type = "text/css" href = "include/design.css">
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