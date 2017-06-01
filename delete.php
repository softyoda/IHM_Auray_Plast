<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';

	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}
	// select loggedin users detail
	$res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title> Supprimer le compte>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		<script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
		<link href="assets\css\style.css" rel="stylesheet" type="text/css">
	</head>
	<body>

<?php



define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'dbtest');
$conn = mysql_connect(DBHOST,DBUSER,DBPASS);
$dbcon = mysql_select_db(DBNAME);
$nom=htmlspecialchars($_POST['name']);
$query = "DELETE from users WHERE userName='$nom';";

//sends the query to delete the entry
mysql_query ($query);
if (mysql_affected_rows() == 1) {
//if it updated
?>
<center><h1><strong>Le compte a été supprimé</strong></h1></center><br /><br />
<center><a href="logout.php?logout"><button type="submit" class="btn btn-lg btn-success">Retour a l'accueil</button></a></center>
<?php
 } else {
//if it failed
?>
<center><h1><strong>La suppression a échouée</strong></h1></center><br /><br />
<center><a href="user.php"><button type="submit" class="btn btn-lg btn-success">Retour au menu</button></a></center>
<?php
}
?>

</body>
</html>

<?php ob_end_flush(); ?>
