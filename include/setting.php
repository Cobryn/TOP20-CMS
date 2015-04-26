<?php 
// Auteur de ce CMS: Cobryn.
// Merci de ne rien modifier de ce fichier.
include('include/etat.php');
include('include/info.php');
if($etat == 1 ) {
	$NomServeur = $server_name;
	$IPServeur = $server_ip;
	$PORTServeur = $server_port;
} else {
	header('location: install');
}

?>