<?php 
include('../include/language.php');
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

<style>
body {
	background: url('../img/install_bg.png');
	font-family: Arial;
}
.installation_box {
	background-color: rgb(248, 248, 248);
	padding: 10px;
	margin: 0 auto;
	width: 950px;
	min-height: 310px;
	box-shadow: 0 1px 2px rgba(0,0,0,0.2);
}

hr {
	border: 0;
    height: 1px;
    background: #333;
    background-image: -webkit-linear-gradient(left, #ccc, #333, #ccc);
    background-image:    -moz-linear-gradient(left, #ccc, #333, #ccc);
    background-image:     -ms-linear-gradient(left, #ccc, #333, #ccc);
    background-image:      -o-linear-gradient(left, #ccc, #333, #ccc);
}

input[type='text'] {
	height: 25px;
    width: 275px;
    border: solid 1px #E5E5E5;
    outline: 0;
    font: normal 13px/100% Verdana, Tahoma, sans-serif;
    background: #FFFFFF url('bg_form.png') left top repeat-x;
    background: -webkit-gradient(linear, left top, left 25, from(#FFFFFF), color-stop(4%, #EEEEEE), to(#FFFFFF));
    background: -moz-linear-gradient(top, #FFFFFF, #EEEEEE 1px, #FFFFFF 25px);
	padding: 15px;
	margin-top: 10px;
	margin-bottom: 10px;
}

input[type='password'] {
	height: 25px;
    width: 275px;
    border: solid 1px #E5E5E5;
    outline: 0;
    font: normal 13px/100% Verdana, Tahoma, sans-serif;
    background: #FFFFFF url('bg_form.png') left top repeat-x;
    background: -webkit-gradient(linear, left top, left 25, from(#FFFFFF), color-stop(4%, #EEEEEE), to(#FFFFFF));
    background: -moz-linear-gradient(top, #FFFFFF, #EEEEEE 1px, #FFFFFF 25px);
	padding: 15px;
	margin-top: 10px;
	margin-bottom: 10px;
}

input[type='submit'] {
    border: solid 1px #E5E5E5;
    outline: 0;
    font: normal 13px/100% Verdana, Tahoma, sans-serif;
    background: #FFFFFF url('bg_form.png') left top repeat-x;
    background: -webkit-gradient(linear, left top, left 25, from(#FFFFFF), color-stop(4%, #EEEEEE), to(#FFFFFF));
    background: -moz-linear-gradient(top, #FFFFFF, #EEEEEE 1px, #FFFFFF 25px);
	padding: 15px;
	margin-top: 10px;
	margin-bottom: 10px;
	cursor: pointer;
	transition: 0.5s;
}

input[type='submit']:hover {
	cursor: pointer;
	border-radius: 5px;
}
</style>

<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8" type="text/html">
			<title><?php echo $install_secondstep; ?></title>
		</head>
		<body>
		<center>
			<br><br>
				<img src="../img/logo.png" alt="TOP20 CMS">
			<br><br>
		</center>
		<div class="installation_box">
			<center><br><div style="font-size: 20px;"><?php echo $install_install; ?></div></center>
			<?php echo $install_database; ?> <br>
			<hr>
			<?php echo $install_1; ?><br><br>
			<?php echo $install_2; ?>
			<br><br>
			<div style="color: darkred; font-weight: bold;"><?php echo $install_3; ?></div>
			<center>
			<br>
				<form method="post">
					<input type="text" name="hote" placeholder="Hote MySQL"><br>
					<input type="text" name="database" placeholder="Base de donnée MySQL"><br>
					<input type="text" name="user" placeholder="User MySQL"><br>
					<input type="password" name="password" placeholder="Mot de passe MySQL"><br>
					<input type="submit" value="Terminer">
				</form>
			</center>
		</div>
		</body>
	</html>