<?php 
if($_POST) {
	if(!empty($_POST['nom']) && !empty($_POST['ip']) && !empty($_POST['port'])) {
		  $data = '<?php $server_name = "'.$_POST['nom'].'"; $server_ip = "'.$_POST['ip'].'"; $server_port = "'.$_POST['port'].'"; ?>';
		  $fp = fopen("../include/info.php","w+");
		  fwrite($fp, $data);
		  fclose($fp);
		  header('location: 1.php');
	} else {
		header('location: index.php?erreur=champsvide');
	}
}
?>

Installation:<br>
<form method="post">
	<input type="text" name="nom" placeholder="Nom de votre serveur"><br>
	<input type="text" name="ip" placeholder="IP de votre serveur"><br>
	<input type="text" name="port" placeholder="Port de votre serveur"><br>
	<input type="submit" value="Continuer">
</form>