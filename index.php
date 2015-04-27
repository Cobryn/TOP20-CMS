<?php 
include('include/setting.php');
include('include/language.php');

header( 'content-type: text/html; charset=utf-8' );
try {
$connexion = new PDO('mysql:host='.$Hote.';dbname='.$Database.'; charset=utf8', $User, $Password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
} catch (PDOException $e) {
	echo '<center>Erreur lors de la connexion à la base de données</center>';
	die;
}

include 'inc/SourceQuery/SourceQuery.class.php'; 

define( 'SQ_SERVER_ADDR', ''.$IPServeur.'' );
define( 'SQ_SERVER_PORT', ''.$PORTServeur.'' );
define( 'SQ_TIMEOUT',     1 );
define( 'SQ_ENGINE',      SourceQuery :: SOURCE );

$Timer = MicroTime( true );

$Query = new SourceQuery( );

$Info    = Array( );
$Rules   = Array( );
$Players = Array( );

try
{
	$Query->Connect( SQ_SERVER_ADDR, SQ_SERVER_PORT, SQ_TIMEOUT, SQ_ENGINE );
	
	$Info    = $Query->GetInfo( );
	$Players = $Query->GetPlayers( );
	$Rules   = $Query->GetRules( );
}
catch( Exception $e )
{
	$Exception = $e;
}

$Query->Disconnect( );

$Timer = Number_Format( MicroTime( true ) - $Timer, 4, '.', '' );

define('DS', DIRECTORY_SEPARATOR);
define('BASE_PATH', dirname(__FILE__).DS);
define('BASE_URL', 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'/');
?>

<DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8" type="text/html">
			<title>TOP20 - <?php echo $NomServeur; ?></title>
			<script>
				function refresh() {
				$.ajax({
				    url: "index.php", // Ton fichier ou se trouve ton chat
				    success:
				        function(retour){
				        $('#refresh').html(retour); // rafraichi toute ta DIV "bien sur il lui faut un id "
				    }
				});
				 
				}
				 
				setInterval(refresh(), 10000) // Répète la fonction toutes les 10 sec
			</script>
			<style>
			body {
				margin: 0 auto;
				background: url('http://gloria.puzl.com/puzl/images/74000/74183/gallery/5335f255ca2fe.jpg') no-repeat fixed;
				background-size: cover;
			}
			th {
				font-size: 13px;
				font-weight: normal;
				padding: 15px;
				background: rgba(19, 20, 22, .90) url('img/nav.png') repeat-x;
				border-top: 2px solid grey;
				border-bottom: 1px solid #fff;
				color: white;
			}
			td {
				padding: 15px;
				border-bottom: 1px solid grey;
				color: white;
				border-top: 1px solid grey;
				background: rgba(0, 0, 0, 0.36);
			}
			tfoot tr td {
				background: #e8edff;
				font-size: 16px;
				color: #99c;
				text-align:center;
			}
			tbody tr:hover td {
				background: rgba(0, 0, 0, 0.39);
				color: white;
			}
			a:hover {
				text-decoration:underline;
			}
			table {
				border-spacing: 0px;
				text-align: center;
				font-family: Arial;
				width: 50%;
			}
			</style>
		</head>
		<body>
			<center>
			<br><br>
				<table>
					<tr>
						<th><?php echo '<b>'.$Info['Players'].'</b> joueurs sont connectés sur un total de <b>'.$Info['MaxPlayers'].'</b><br><b>'.$Timer.'ms</b>';?></th>
					</tr>
				</table>
				<br>
				<table>
					<tr>
						<th><?php echo $top_classement; ?></th>
						<th><?php echo $top_playername; ?></th>
						<th><?php echo $top_moneyout; ?></th>
						<th><?php echo $top_moneybank; ?></th>
						<th><?php echo $top_type; ?></th>
					</tr>
				</table>
				<table>
				<tbody>
				<?php 
				$compteur = 0;
				?>
					<?php 
					$req_selectAllPlayers = $connexion->query('SELECT * FROM players ORDER BY bankacc DESC LIMIT 0,20');
					$nbr_selectAllPlayers = $req_selectAllPlayers->rowCount();
						if($nbr_selectAllPlayers > 1 ) {
							while($selectAllPlayers = $req_selectAllPlayers->fetch()) {
								$compteur++;
					?>
					<tr>
						<td><?php echo '<b>#</b>'.$compteur.''; ?></td>
						<td><?php echo $selectAllPlayers['name']; ?><td>
						<td><?php echo ''.number_format($selectAllPlayers['cash']).'$'; ?><td>
						<td><?php echo ''.number_format($selectAllPlayers['bankacc']).'$'; ?><td>
						<td><?php if($selectAllPlayers['adminlevel'] > 1) {echo '<div style="color: rgb(223, 0, 0); font-weight: bold;">Admin</div>'; } else {echo '<div style="color: lime; font-weight: bold;">Joueur</div>';} ?><td>
					</tr>
					<?php 
							}
						}
					?>
				</tbody>
			</table>
			<table>
				<tr>
					<th>Développer par Cobryn/TehZaa</th>
				</tr>
			</table>
			</center>
		</body>
	</html>