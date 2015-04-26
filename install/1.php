<?php 
if($_POST) {
	if(!empty($_POST['hote']) && !empty($_POST['database']) && !empty($_POST['user']) && !empty($_POST['password'])) {
		  $data = '<?php $database_host = "'.$_POST['hote'].'"; $database_database = "'.$_POST['database'].'"; $database_user = "'.$_POST['user'].'"; $database_password = "'.$_POST['password'].'" ?>';
		  $fp = fopen("../include/database.php","w+");
		  fwrite($fp, $data);
		  fclose($fp);
		  
		  $data = '<?php $etat = 1; ?>';
		  $fp = fopen("../include/etat.php","w+");
		  fwrite($fp, $data);
		  fclose($fp);
		  header('location: ../index.php');
	} else {
		header('location: index.php?erreur=champsvide');
	}
}
?>

Installation 1:<br>
<form method="post">
	<input type="text" name="hote" placeholder="Hote MySQL"><br>
	<input type="text" name="database" placeholder="Base de donnée MySQL"><br>
	<input type="text" name="user" placeholder="User MySQL"><br>
	<input type="text" name="password" placeholder="Mot de passe MySQL"><br>
	<input type="submit" value="Continuer">
</form>