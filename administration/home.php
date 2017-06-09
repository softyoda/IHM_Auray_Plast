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
			<title>Accueil</title>
			<?php require_once 'assets/link-header.php';?>
	</head>
	<body>
		<div class="navbar navbar-default navbar-inverse navbar-static-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="home.php" class="navbar-brand"><img height="20" alt="Brand" src="assets/img/aurayplast.png"></a>
				</div>
				<div class="collapse navbar-collapse" id="navbar-ex-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="home.php">Accueil</a></li>
						<li><a href="user.php"> <?php echo $userRow['userName']; ?></a></li>
						<li><a href="" data-toggle="modal" data-target="#unlog">Déconnexion</a></li>
					</ul>
				</div>
			</div>
		</div>


		<div class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1 class="text-center">Machines a injection</h1>
					</div>
				</div>
				<div class="row">

					<?php
					define('DBHOST', 'localhost');
					define('DBUSER', 'root');
					define('DBPASS', '');
					define('DBNAME', 'auraynodcap1');

					$conn = mysql_connect(DBHOST,DBUSER,DBPASS);
					$dbcon = mysql_select_db( 'auraynodcap1');
						if ( !$conn ) {
						die("Erreur de connexion : " . mysql_error());
					}

					if ( !$dbcon ) {
						die("Erreur de connection a la base de données : " . mysql_error());
					}
					$eng=mysql_query("SELECT * FROM central") or die('Erreur SQL :' . mysql_error());


					while ($data = mysql_fetch_array($eng)) {

						echo '
						<div class="col-md-4">
							<a href="pannel.php?id='.$data['idcentral'].'"><img src="assets/img/engine.png" class="img-responsive"></a>
							<h3>Machine '.$data['idcentral'].'  </h3>
							<p>
								<a href="pannel.php?id='.$data['idcentral'].'">Entrer dans la Machine '.$data['NomCent'].'  -></a>
							</p>
						</div>
						';
					}

					?>


				<div class="row">

					<?php
					if ($userRow['userIsAdmin']==1)
					{ echo '
					<div class="col-md-4">
						<a href="add-engine.php"><img src="assets/img/add-engine.png" class="img-responsive"></a>
						<h2>Nouvelle machine</h2>
						<p>
							<a href="#">Créer une nouvelle machine</a>
						</p>
					</div>
					';} ?>

				</div>
			</div>
		</div>
	</body>
	<div class="modal fade" id="unlog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header modal-header-danger">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h1>Etes vous vraiment sur de vouloir vous déconnecter?</h1>
			</div>
			<div class="modal-body">
			</div>
			<div class="modal-footer">
				<a href="logout.php?logout"><button type="submit" class="btn btn-lg btn-warning">Déconnexion</button></a>
				<button type="button" class="btn btn-lg btn-success" data-dismiss="modal">Fermer</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
</html>

<?php ob_end_flush(); ?>
