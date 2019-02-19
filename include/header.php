<header>
	<div class = "dimension">
		<h1>Pompier</h1>
		<div class = "menu">
			<?php
				$droit = $bdd->prepare('SELECT role FROM user WHERE idUser = ?'); 	// on cherche le role de la personne
				$droit->execute(array($_SESSION['id']));
				$role = $droit->fetch();

				if (explode('/', $_SERVER['REQUEST_URI'])[2] == 'accueil') // si on se trouve dans le fichier accueil
					echo '<a href = "'.$domain.'/accueil/'.$_SESSION['id'].'" class = "menu_onglet menu_use">Accueil</a>';
				else
					echo '<a href = "'.$domain.'/accueil/'.$_SESSION['id'].'" class = "menu_onglet">Accueil</a>';

				if (in_array($role['role'], [1, 2, 3, 4])) 							// s'affiche pour : chef de centre, chef de centre adjoint, admin, chef de section
					if (explode('/', $_SERVER['REQUEST_URI'])[2] == 'personnel') // si on se trouve dans le fichier personnel
						echo '<a href = "'.$domain.'/personnel/'.$_SESSION['id'].'" class = "menu_onglet menu_use">Personnel</a>';
					else
						echo '<a href = "'.$domain.'/personnel/'.$_SESSION['id'].'" class = "menu_onglet">Personnel</a>';

				if (in_array($role['role'], [1, 2, 3, 4, 8]))						// s'affiche pour : chef de centre, chef de centre adjoint, admin, chef de section, responsable sport 
					echo '<a href = "" class = "menu_onglet">Affichage</a>';

				if (in_array($role['role'], [1, 2, 3, 4, 7, 8]))						// s'affiche pour : chef de centre, chef de centre adjoint, admin, chef de section, responsable habillement, responsable sport 
					echo '<a href = "" class = "menu_onglet">Habillement</a>';

				if (in_array($role['role'], [1, 2, 3, 6]))							// s'affiche pour : chef de centre, chef de centre adjoint, admin, responsable véhicule
					echo '<a href = "" class = "menu_onglet">Véhicule</a>';

				if (in_array($role['role'], [1, 2, 3]))							// s'affiche pour : chef de centre, chef de centre adjoint, admin
					echo '<a href = "" class = "menu_onglet">Formation</a>';
			
				if (in_array($role['role'], [1, 2, 3, 4]))							// s'affiche pour : chef de centre, chef de centre adjoint, admin, chef de section
					echo '<a href = "" class = "menu_onglet">Proposition</a>';

				if (in_array($role['role'], [1, 2, 3, 4])) { // affiche un menu déroulant pour : chef de centre, chef de centre adjoint, admin, chef de section car sinon trop d'info sur la barre header
					echo '<img class = "menu_bouton" src = "../images/fleche.png">';
				}
				else {
					if (explode('/', $_SERVER['REQUEST_URI'])[2] == 'personnel')
						echo '<a href = "'.$domain.'/personnel/'.$_SESSION['id'].'" class = "menu_onglet menu_use">Vérification</a>';
					else
						echo '<a href = "'.$domain.'/personnel/'.$_SESSION['id'].'" class = "menu_onglet">Vérification</a>';
					echo '
						<a href = "" class = "menu_onglet">Stratus</a>
						<a href = "" class = "menu_onglet">Remplacement</a>
					';
				}
			?>
		</div>
	</div>
</header>
<?php
	if (in_array($role['role'], [1, 2, 3, 4])) { // menu déroulant
		echo '
			<div class = "dimension">
				<div class = "menu_deroulant">
					<a href = "'.$domain.'/verif/'.$_SESSION['id'].'" class = "menu_deroulant_onglet">Vérification</a>
					<a href = "" class = "menu_deroulant_onglet">Stratus</a>
					<a href = "" class = "menu_deroulant_onglet">Remplacement</a>
				</div>
			</div>
		';
	}
?>