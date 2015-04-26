<?php 
// Auteur de ce CMS: Cobryn.
// Merci de ne rien modifier de ce fichier.
include('include/etat.php');
if($etat == 1 ) {
	include('include/info.php');
	include('include/database.php');
	
	$NomServeur = $server_name;
	$IPServeur = $server_ip;
	$PORTServeur = $server_port;
	
	$Hote = $database_host;
	$Database = $database_database;
	$User = $database_user;
	$Password = $database_password; 
} else {
	header('location: install');
}

?>