<?php 
include('../include/language.php');
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
			<title><?php echo $install_firststep;?></title>
		</head>
		<body>
		<center>
			<br><br>
				<img src="../img/logo.png" alt="TOP20 CMS">
			<br><br>
		</center>
		<div class="installation_box">
			<center><br><div style="font-size: 20px;"><?php echo $install_install; ?></div></center>
			<?php echo $install_information; ?> <br>
			<hr>
			<center>
				<form method="post">
					<?php echo $install_servername; ?>:<br>
					<input type="text" name="nom" placeholder="Ex: TimeOfGaming"><br>
					<?php echo $install_ip; ?>:<br>
					<input type="text" name="ip" placeholder="Ex: altislife.timeofgaming.fr"><br>
					<?php echo $install_port; ?>:<br>
					<input type="text" name="port" placeholder="Ex: 2302"><br>
					<input type="submit" value="Continuer">
				</form>
			</center>
		</div>
		</body>
	</html>