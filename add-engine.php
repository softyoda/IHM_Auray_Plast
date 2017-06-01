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
		<title> Rajouter une machine à injection</title>
		<?php require_once 'assets/link-header.php';?>
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-clockpicker.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/github.min.css">

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
						<li><a href="user.php"> <?php echo $userRow['userName']; ?></a></li>
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
						<br>
						<img src="assets/img/granule.jpg" class="img-responsive">
						<br>
						<img src="assets/img/joins.jpg" class="img-responsive">
					</div>




					<div class="col-md-6">

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
						$central=mysql_query("SELECT * FROM central") or die('Erreur SQL :' . mysql_error());

							echo $centrale;
							echo'<h3>Liste des centrales : </h3>';
							echo '<table class="table table-bordered">';
							echo '<thead class="thead-inverse">
											<tr>
												<th><center>ID de la centrale</center></th>
												<th><center>Addrese IP</center></th>
												<th><center>Nom </center></th>
												<th><center>Etat de fonctionnement</center></th>
												<th><center>Heur de début des mesures</center></th>
												<th><center>Heur de fin des mesures</center></th>
												<th><center>Acquisition des mesures</center></th>
											</tr>
										</thead>';

							while ($row = mysql_fetch_assoc($central))
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
							?>



					   <h3>Rajourer une centrale a injection dans la base de donnée :</h3>
						<div class = "panel panel-default">
						   <div class = "panel-heading">
							  <h3 class = "panel-title">
								 Options
							  </h3>
							</div>

						    <div class = "panel-body">
									<form enctype="multipart/form-data" action="#" method="post">

										<div class="col-md-12">
										  <div class="form-group">
											<div class="input-group">
											  <span class="input-group-addon">Id centrale :</span>
												<input name="ID" type="text" class="form-control">
											  <div class="input-group-btn">
											  </div>
											</div>
										  </div>
										</div>

									  <div class="col-md-12">
										  <div class="form-group">
											<div class="input-group">
											  <span class="input-group-addon">Addresse ip : </span>
												<input name="IP" type="text" class="form-control">
											  <div class="input-group-btn">
											  </div>
											</div>
										  </div>
										</div>

										<div class="col-md-12">
										  <div class="form-group">
											<div class="input-group">
											  <span class="input-group-addon">Nom de la centrale : </span>
												<input name="Nom" type="text" class="form-control">
											  <div class="input-group-btn">
											  </div>
											</div>
										  </div>
										</div>


										<div class="col-md-12">
											<div class="form-group">
												<div class="clearfix">
													<div class="input-group">
														<div class="input-group clockpicker pull-center" data-placement="left" data-align="top" data-autoclose="true">
														<span class="input-group-addon">Heure de début des mesures : </span>
															<input name="H_debut" type="text" class="form-control" value="08:00">
															<span class="input-group-addon">
																<span class="glyphicon glyphicon-time"></span>
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-md-12">
											<div class="form-group">
												<div class="clearfix">
													<div class="input-group">
														<div class="input-group clockpicker pull-center" data-placement="left" data-align="top" data-autoclose="true">
														<span class="input-group-addon">Heure de fin des mesures : </span>
															<input name="H_fin" type="text" class="form-control" value="18:15">
															<span class="input-group-addon">
																<span class="glyphicon glyphicon-time"></span>
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>
										<a href="#"><button type="submit" class="btn btn-md btn-success pull-right " name="submit" value="Appliquer">Rajouter une centrale</button></a>
									</form>
						   </div>
					   </div>

						<?php
					   				echo '<h3>Supprimer une centrale :</h3>
									<form enctype="multipart/form-data" action="#" method="post">

										  <nav class="navbar navbar-default" role="navigation">
											<div class="container-fluid">
											  <div class="navbar-header">
												<a class="navbar-brand" href="#">Modifier : </a>
											  </div>
												<div class="form-group">
													<div class="col-md-4">
													  <select name ="idcentral" class="form-control">

													  ';
															$usrs=mysql_query("SELECT idcentral FROM central");
																							while ($row = mysql_fetch_assoc($usrs))
																							{
																								 foreach ($row as $field)
																								 {
																									echo "<option value=$field>$field</option>";
																								}
																							}
													echo '
													 </select>
													</div>
												<input type="submit" class="btn btn-md btn-warning pull-right" name="submite" value="Supprimer">
												</div>
										</div>
									</form>
							';

						?>


					</div>
				</div>
			</div>
		</div>
<?php
if ($userRow['userIsAdmin']==1)
{
	if(isset($_POST['submit']))
		{
			$ID = trim($_POST['ID']);
			$ID = strip_tags($ID);
			$ID = htmlspecialchars($ID);

			$IP = trim($_POST['IP']);
			$IP = strip_tags($IP);
			$IP = htmlspecialchars($IP);

			$Nom = trim($_POST['Nom']);
			$Nom = strip_tags($Nom);
			$Nom = htmlspecialchars($Nom);

			$H_debut = trim($_POST['H_debut'].":00");
			$H_debut = strip_tags($H_debut);
			$H_debut = htmlspecialchars($H_debut);

			$H_fin = trim($_POST['H_fin'].":00");
			$H_fin = strip_tags($H_fin);
			$H_fin = htmlspecialchars($H_fin);



			if (empty($ID) OR empty($IP) OR empty($Nom))
			{
					echo "<script type='text/javascript'>
					$(window).load(function(){
						$('#warning').modal('show');
					});
					</script>";
			}
			else
			{

				define('DBHOST', 'localhost');
				define('DBUSER', 'root');
				define('DBPASS', 'auray');
				define('DBNAME', 'auraynodcap1');

				$conn = mysql_connect(DBHOST,DBUSER,DBPASS);
				$dbcon = mysql_select_db( 'auraynodcap1');
					if ( !$conn ) {
					die("Erreur de connexion : " . mysql_error());
				}

				if ( !$dbcon ) {
					die("Erreur de connection a la base de données : " . mysql_error());
				}

				$query = "INSERT INTO `central` (`idcentral`, `AddIP`, `NomCent`, `EtatFNC`, `DebMes`, `EndMes`, `AcqMes`) VALUES (".$ID.", '".$IP."', '".$Nom."','F', '".$H_debut."', '".$H_fin."',0)";
				$result = mysql_query ($query);

				if($result)
				{
					echo "<script type='text/javascript'>
					$(window).load(function(){
						$('#success').modal('show');
					});
					</script>";
				}
				else
				{
					echo "<script type='text/javascript'>
					$(window).load(function(){
						$('#error').modal('show');
					});
					</script>";
				}
			}

		}
}
else
{
	echo "<script type='text/javascript'>
	$(window).load(function(){
		$('#noadmin').modal('show');
	});
	</script>";
}

if ($userRow['userIsAdmin']==1)
{
	if(isset($_POST['submite']))
		{
			$id_central= $_POST['idcentral'];
			$query = "DELETE from central WHERE idcentral='$id_central';";
			mysql_query ($query);
			if (mysql_affected_rows() == 1)
				{
					echo "<script type='text/javascript'>
					$(window).load(function(){
						$('#delete').modal('show');
					});
					</script>";

				}
			else
				{
					echo "<script type='text/javascript'>
					$(window).load(function(){
						$('#error').modal('show');
					});
					</script>";
				}
		}
}
else
{
	echo "<script type='text/javascript'>
	$(window).load(function(){
		$('#noadmin').modal('show');
	});
	</script>";
}


?>


	<div class="modal fade" id="noadmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header modal-header-danger">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h1>Erreur, vous n'avez pas la permission d'effectuer cela</h1>
				</div>
				<div class="modal-body">
					<h3>Vous devez avoir les droits d'administrateur pour ajouter une nouvelle machine a injection.</h3>
				</div>
				<div class="modal-footer">
					<a href="add-engine.php"><button type="submit" class="btn btn-lg btn-success">Fermer</button></a>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>

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

	<div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header modal-header-success">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h1>Succès</h1>
				</div>
				<div class="modal-body">
					<h3>La centrale  <?php echo $Nom; ?> numéro  <?php echo $ID; ?> a été rajouté a la base de donnée !</h3>
				</div>
				<div class="modal-footer">
					<a href="add-engine.php"><button type="submit" class="btn btn-lg btn-success">Fermer</button></a>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>

	<div class="modal fade" id="warning" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header modal-header-warning">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h1>Erreur</h1>
				</div>
				<div class="modal-body">
					<h3>Vous devez d'abord entrer tous les champs.</h3>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-lg btn" data-dismiss="modal">Fermer</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>


	<div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header modal-header-danger">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h1>Erreur</h1>
				</div>
				<div class="modal-body">
					<h3>Une erreur c'est produite.</h3>
				</div>
				<div class="modal-footer">
					<a href="add-engine.php"><button type="submit" class="btn btn-lg btn-success">Fermer</button></a>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>

	<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header modal-header-warning">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h1>Suppression effectuée</h1>
				</div>
				<div class="modal-body">
					<h3>La centrale <?php echo $_POST['idcentral'];?> a été supprimée</h3>
				</div>
				<div class="modal-footer">
					<a href="add-engine.php"><button type="submit" class="btn btn-lg btn-success">Fermer</button></a>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
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

		<script type="text/javascript" src="assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap-clockpicker.min.js"></script>
		<script type="text/javascript">
		$('.clockpicker').clockpicker()
			.find('input').change(function(){
				console.log(this.value);
			});
		var input = $('#single-input').clockpicker({
			placement: 'bottom',
			align: 'left',
			autoclose: true,
			'default': 'now'
		});

		$('.clockpicker-with-callbacks').clockpicker({
				donetext: 'Done',
				init: function() {
					console.log("colorpicker initiated");
				},
				beforeShow: function() {
					console.log("before show");
				},
				afterShow: function() {
					console.log("after show");
				},
				beforeHide: function() {
					console.log("before hide");
				},
				afterHide: function() {
					console.log("after hide");
				},
				beforeHourSelect: function() {
					console.log("before hour selected");
				},
				afterHourSelect: function() {
					console.log("after hour selected");
				},
				beforeDone: function() {
					console.log("before done");
				},
				afterDone: function() {
					console.log("after done");
				}
			})
			.find('input').change(function(){
				console.log(this.value);
			});

		// Manually toggle to the minutes view
		$('#check-minutes').click(function(e){
			// Have to stop propagation here
			e.stopPropagation();
			input.clockpicker('show')
					.clockpicker('toggleView', 'minutes');
		});
		if (/mobile/i.test(navigator.userAgent)) {
			$('input').prop('readOnly', true);
		}
		</script>


				<script>
		  $(document).ready(function () {
			var mySelect = $('#first-disabled2');

			$('#special').on('click', function () {
			  mySelect.find('option:selected').prop('disabled', true);
			  mySelect.selectpicker('refresh');
			});

			$('#special2').on('click', function () {
			  mySelect.find('option:H_debutdisabled').prop('disabled', false);
			  mySelect.selectpicker('refresh');
			});

			$('#basic2').selectpicker({
			  liveSearch: true,
			  maxOptions: 1
			});
		  });
		</script>
		<script type="text/javascript" src="assets/js/highlight.min.js"></script>
		<script type="text/javascript">
		hljs.configure({tabReplace: '    '});
		hljs.initHighlightingOnLoad();
		</script>
	</body>
</html>
<?php ob_end_flush(); ?>
