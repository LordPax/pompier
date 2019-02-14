<?php
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=pompier','root',''); // connxion a la bdd
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(Exception $e){
		die('Erreur : '.$e->getMessage());
	}
	
	$domain = 'http://192.168.1.24/pompier'; // nom de domaine
	
	
	//ini_set("display_errors",0);error_reporting(0);
?>
