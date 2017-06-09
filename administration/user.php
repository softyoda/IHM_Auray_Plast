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
		<title> Options de  <?php echo $userRow['userName']; ?> </title>
		<?php require_once 'assets/link-header.php';?>
		<style type="text/css">
		a:link {
			color: #009;
			text-decoration: none;
			background-color: transparent !important;
			}

		</style>
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
						<li><a href="home.php">Accueil</a></li>
						<li class="active"><a href="user.php"> <?php echo $userRow['userName']; ?></a></li>
						<li><a href="" data-toggle="modal" data-target="#unlog">Déconnexion</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<img src="assets/img/company.jpg" class="img-responsive">
						<?php
							if ($userRow['userIsAdmin']==1) {
								echo '<br><img src="assets/img/granule.jpg" class="img-responsive"><br><img src="assets/img/joins.jpg" class="img-responsive">';
							}
							?>
					</div>
					<div class="col-md-8">
						<h3>Bienvenue <?php echo $userRow['userName']; ?></h3>
						<h3>Informations :</h3>
						<ul class="list-group">
							<li class="list-group-item"><b>Nom : </b><?php echo $userRow['userName']; ?></li>
							<li class="list-group-item"><b>Email : </b><?php echo $userRow['userEmail']; ?></li>
							<li class="list-group-item"><b>Id : </b><?php echo $userRow['userId']; ?></li>
							<?php
							if ($userRow['userIsAdmin']==1) {
							echo '<li class="list-group-item"><b>Droits : </b>Administrateur</li>';
							}
							else {
							echo '<li class="list-group-item"><b>Droits : </b>Normal</li>';
							}
							?>
							<li class="list-group-item"><b>Mot de passe chiffré : </b><?php echo $userRow['userPass']; ?></li>
						</ul>
						<hr>


						<h3>Actions :</h3>

				<!--MODAL BOUTON DE DECONNEXION-->


						<!-- Trigger the modal with a button -->
						<button type="button" class="btn btn-lg btn-success" data-toggle="modal" data-target="#unlog">Déconnexion</button>
							<div class="modal fade" id="unlog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header modal-header-warning">
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

			<!--MODAL BOUTON DE SUPPRESION DU COMPTE-->
						<button type="button" class="btn btn-lg btn-danger" data-toggle="modal" data-target="#delet">Supprimer ce compte</button>
						<div class="modal fade" id="delet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header modal-header-danger">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
										<h1>Etes vous vraiment sur de vouloir supprimer votre compte?</h1>
									</div>
									<div class="modal-body">
									<h4>Cette action est irréversible</h4>
									</div>
									<div class="modal-footer">
										<td class="contact-delete">
										<center>
											<form action='delete.php?name="<?php echo $userRow['userName']; ?>"' method="post">
												<input type="hidden" name="name" value="<?php echo $userRow['userName']; ?>">
												<input type="submit" class="btn btn-lg btn-danger" name="submit" value="Supprimer le compte">
											</form>
										</td>
										</center>
										<button type="button" class="btn btn-lg btn-success" data-dismiss="modal">Fermer</button>
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div>
						<hr>






						<?php
							if ($userRow['userIsAdmin']==1)
							{
								$usrs=mysql_query("SELECT userId, userName, userEmail, userIsAdmin FROM users ");
								echo'<h3>Liste des utilisateurs : </h3>';
								echo '<table class="table table-bordered">';
								echo '<thead class="thead-inverse">
												<tr>
													<th><center>ID</center></th>
													<th><center>Nom</center></th>
													<th><center>Email</center></th>
													<th><center>Droits (normal=0 admin=1)</center></th>
												</tr>
											</thead>';

								while ($row = mysql_fetch_assoc($usrs))
								{
									 echo '<tr>';
									 foreach ($row as $field)
									 {

										   echo '<td><center>' . $field . '</center></td>';
									 }
									echo '</tr>';
								}
								echo '</table>
								<hr>';


						echo '<h3>Modifier les droits :</h3>
									<form enctype="multipart/form-data" action="#" method="post">

										  <nav class="navbar navbar-default" role="navigation">
											<div class="container-fluid">
											  <div class="navbar-header">
												<a class="navbar-brand" href="#">Modifier : </a>
											  </div>
												<div class="form-group">
												  <select name ="user" class="selectpicker" data-live-search="true" >
														<option style="display:none">Utilisateur</option>

												  ';
														$usrs=mysql_query("SELECT userName FROM users ");
																						while ($row = mysql_fetch_assoc($usrs))
																						{
																							 foreach ($row as $field)
																							 {
																								echo "<option value=$field>$field</option>";
																							}
																						}
												echo '
												 </select>
												<select name="modif" class="selectpicker">
													<option style="display:none">Action</option>
													<option class="special" style="background: #F0AD4E; color: #fff;  value="toadmin";>Passer en administrateur</option>
													<option style="background: #5cb85c; color: #fff; value="tonormal">Passer en membre</option>
													<option style="background: #D9534F; color: #fff; value="todelete">Supprimer le compte</option>
												</select>
												<input type="submit" class="btn btn-lg btn-success" name="submit" value="Appliquer">
												</div>
										</div>
										</nav>
									</form>
									<hr>
							';
							$mailadmin=mysql_query("SELECT userEmail FROM users WHERE userIsAdmin=1 ORDER BY userId LIMIT 1");
							$mail=mysql_fetch_array($mailadmin);
							echo '
							<h3>Informations supplémentaires :</h3>
							<nav class="navbar navbar-default" role="navigation">

							<div class="container-fluid">
								<p class="navbar-brand">Email de contact administrateur : <a href="mailto:'; echo $mail['userEmail']; echo'?Subject=Mail%20de%20'; echo $userRow['userName']; echo' target="_top">'; echo $mail['userEmail']; echo '</a> </p>
							</div>

							<div class="container-fluid">
								<p class="navbar-brand">Informations PHP : <a href="#phpinfo" data-toggle="collapse"><button data-toggle="collapse" class="btn btn-lg btn-success">Afficher</button></a> </p>
							</div>

							<div class="container-fluid">
								<p class="navbar-brand">Crédit :	<a href="#credits" data-toggle="collapse"><button data-toggle="collapse" class="btn btn-lg btn-success">Afficher</button></a></p>
							</div>

							<div class="container-fluid">

								<div id="credits" class="collapse">
									<p class="navbar-brand">Ce site a été crée par <a href="https://twitter.com/softyoda" class="text-info">Yoann.S</a> en 2017 pour la société <a href="http://aurayplast.fr/" class="text-info">Aurayplast</a>.
									</br> Le Framework utilisé est <a href="http://getbootstrap.com/" class="text-info" >Bootstrap</a>. La librairie utilisé pour générer les graphiques est <a href="https://www.amcharts.com/" class="text-info">AmCharts</a>.
									La librairie pour séléctionner une heure est <a href="https://weareoutman.github.io/clockpicker/" class="text-info">ClockPicker</a>.</br> Le site est disponible sur <a href="https://github.com/softyoda/IHM_Auray_Plast" class="text-info">GitHub</a>.</p>
								</div>
							</div>

							</nav>

  						';
							}
							if ($userRow['userIsAdmin']==0)
							{
								$mailadmin=mysql_query("SELECT userEmail FROM users WHERE userIsAdmin=1 ORDER BY userId LIMIT 1");
								$mail=mysql_fetch_array($mailadmin);
								echo '
								<hr>
								<h3> Aide </h3>
								<nav class="navbar navbar-default" role="navigation">
								<div class="container-fluid">
									<div class="navbar-header">
										<p class="lead">
											Pour de plus amples informations,
											vous pouvez envoyez un mail a l\'administrateur
											 de ce site a cette addresse :
											<a href="mailto:'; echo $mail['userEmail']; echo'?Subject=Mail%20de%20'; echo $userRow['userName']; echo' target="_top">'; echo $mail['userEmail']; echo '</a>
										</p>
									</div>
								</div>
								';
							}
						?>
					</div>
					<?php
					if ($userRow['userIsAdmin']==1)
					{
						echo '<div id="phpinfo" class="collapse">
						';phpinfo(); echo'
						</div>';
					}?>
				</div>
			</div>
		</div>
<?php
if ($userRow['userIsAdmin']==1)
{
		if(isset($_POST['submit']))
		{

			$selected_val = $_POST['modif'];
			$selected_user = $_POST['user'];


			if (empty($selected_user))
			{
			echo "<script type='text/javascript'>
					$(window).load(function(){
						$('#error-user').modal('show');
					});
				</script>";
			}
			else {
							if ($selected_val=='Passer en administrateur') {
								$query = "UPDATE users SET userIsAdmin=1 WHERE userName='$selected_user'";
								mysql_query ($query);
								echo "<script type='text/javascript'>
								$(window).load(function(){
									$('#toadmin').modal('show');
								});
							</script>" ;
							}
							else if ($selected_val=='Passer en membre') {
								$query = "UPDATE users SET userIsAdmin=0 WHERE userName='$selected_user'";
								mysql_query ($query);
								echo "<script type='text/javascript'>
								$(window).load(function(){
									$('#tonormal').modal('show');
								});
							</script>" ;
							}
							else if ($selected_val=='Supprimer le compte') {
								$query = "DELETE from users WHERE userName='$selected_user'";
								mysql_query ($query);
								echo "<script type='text/javascript'>
								$(window).load(function(){
									$('#todelete').modal('show');
								});
							</script>";
							}
							else {
								echo "<script type='text/javascript'>
								$(window).load(function(){
									$('#error').modal('show');
								});
							</script>";
							}
			}
		}
}
?>

			<!--MODAL BOUTON Modification des droits : Admin-->
						<div class="modal fade" id="toadmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header modal-header-success">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
										<h1>Modifications des droits</h1>
									</div>
									<div class="modal-body">
									<h4>L'utilisateur <?php echo $selected_user; ?> est maintenant administrateur</h4>
									</div>
									<div class="modal-footer">
									<form method="POST" action="user.php">
											<a href="user.php"><button type="submit" class="btn btn-lg btn-success">Fermer</button></a>
									</form>
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div>


			<!--MODAL BOUTON Modification des droits : Normal-->
						<div class="modal fade" id="tonormal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header modal-header-success">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
										<h1>Modifications des droits</h1>
									</div>
									<div class="modal-body">
									<h4>L'utilisateur <?php echo $selected_user; ?> n'est plus administrateur</h4>
									</div>
									<div class="modal-footer">
									<form method="POST" action="user.php">
											<a href="user.php"><button type="submit" class="btn btn-lg btn-success">Fermer</button></a>									</form>
								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div>
					</div>



			<!--MODAL BOUTON Modification des droits : Détruire le compte-->
						<div class="modal fade" id="todelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header modal-header-danger">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
										<h1>Suppresion d'un compte</h1>
									</div>
									<div class="modal-body">
									<h4>Le compte <?php echo $selected_user; ?> a bien été supprimer</h4>
									</div>
									<div class="modal-footer">
									<form method="POST" action="user.php">
											<a href="user.php"><button type="submit" class="btn btn-lg btn-success">Fermer</button></a>									</form>
								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div>
					</div>


			<!--MODAL Erreur-->
						<div class="modal fade" id="error-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header modal-header-warning">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
										<h1>Une erreur c'est produite</h1>
									</div>
									<div class="modal-body">
									<h4>Vous devez sélectionner un utilisateur.</h4>
									</div>
									<div class="modal-footer">
									<form method="POST" action="user.php">
											<a href="user.php"><button type="submit" class="btn btn-lg btn-success">Fermer</button></a>									</form>
								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div>
					</div>


			<!--MODAL Erreur-->
						<div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header modal-header-danger">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
										<h1>Une erreur c'est produite</h1>
									</div>
									<div class="modal-body">
									<h4>Une erreur c'est produite, veillez réesayer plus tard.</h4>
									</div>
									<div class="modal-footer">
									<form method="POST" action="user.php">
											<a href="user.php"><button type="submit" class="btn btn-lg btn-success">Fermer</button></a>									</form>
								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div>
					</div>



		<script>
		  $(document).ready(function () {
			var mySelect = $('#first-disabled2');

			$('#special').on('click', function () {
			  mySelect.find('option:selected').prop('disabled', true);
			  mySelect.selectpicker('refresh');
			});

			$('#special2').on('click', function () {
			  mySelect.find('option:disabled').prop('disabled', false);
			  mySelect.selectpicker('refresh');
			});

			$('#basic2').selectpicker({
			  liveSearch: true,
			  maxOptions: 1
			});
		  });
		</script>
	</body>
</html>
<?php ob_end_flush(); ?>
