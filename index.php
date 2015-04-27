<?php 
include('include/setting.php');

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


<?php echo '<b>'.$Info['Players'].'</b> joueurs sont connecté sur un total de <b>'.$Info['MaxPlayers'].'</b><br><b>'.$Timer.'ms</b>';?>