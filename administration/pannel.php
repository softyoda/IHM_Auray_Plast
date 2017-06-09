<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';

	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}
	// loggedin users detail
	$res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);
	$id_central= $_GET['id'];
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Machine a injection <?php echo $id_central; ?> </title>

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
					<a href=".." class="navbar-brand"><img height="20" alt="Brand" src="assets/img/aurayplast.png"></a>
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
	  <ul class="nav nav-tabs">
	  <li class="active"><a data-toggle="tab" href="#home">Accueil</a></li>
	<?php
;
		$dbcon = mysql_select_db( 'auraynodcap1');
		if ( !$dbcon ) {
			die("Erreur de connection a la base de données : " . mysql_error());
		}
		$eng=mysql_query("SELECT * FROM NodCap WHERE central_idcentral = ".$id_central." ") or die('Erreur SQL :' . mysql_error());
		while ($data = mysql_fetch_array($eng))
			{


				echo '<li><a href="#'.$data['idNodCap'].'"  data-toggle="tab" >Capteur '.$data['idNodCap'].' de type '.$data['TypeCap'].' </a></li>';

			}
	?>
	<?php
	if ($userRow['userIsAdmin']==1)
	{
		echo '<li><a data-toggle="tab" href="#add">Rajouter un capteur</a></li>';
	}
    ?>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>Centre d'administration de la machine a injection <?php echo $id_central; ?> </h3>
      		<div class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<ul class="list-group">
							<li class="list-group-item  active">Liste des capteurs</li>
							<?php

							$eng=mysql_query("SELECT * FROM NodCap WHERE central_idcentral = ".$id_central." ") or die('Erreur SQL :' . mysql_error());




															while ($data = mysql_fetch_array($eng))
															{


																echo '<li class="list-group-item"> <a href="#'.$data['idNodCap'].'"  data-toggle="tab"> Capteur numéro '.$data['idNodCap'].' de type ' .$data['TypeCap']. '</a></li>';


															}

							?>

						</ul>
					</div>
					<div class="col-md-6">

					</div>
				</div>
			</div>
		</div>
    </div>

	<div id="add" class="tab-pane fade">
		<div class="col-md-6">
			<div class = "panel-body">

				<form enctype="multipart/form-data" action="#" method="post">
					<h2> <a href="javascript:reload();void 0;"> <img src="assets/img/refresh.svg" alt="Actualiser" height="25px" width="25px" /></a>  Rajouter un capteur a la centrale <?php echo $id_central; ?></h2>
					</br>
					<div class = "panel panel-default">
						<div class = "panel-heading">
							<h3 class = "panel-title">
							Options
							</h3>
						</div>

						<div class = "panel-body">

							<div class="col-md-12">
							  <div class="form-group">
								<div class="input-group">
								  <span class="input-group-addon">idNodCap :</span>
									<input name="idNodCap" type="text" class="form-control">
								  <div class="input-group-btn">
								  </div>
								</div>
							  </div>
							</div>


							<div class="col-md-12">
								<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon">Add Node :</span>
									<input name="AddNode" type="text" class="form-control">
									<div class="input-group-btn">
									</div>
								</div>
								</div>
							</div>


							<div class="col-md-12">
								<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon">Add Cap :</span>
									<input name="AddCap" type="text" class="form-control">
									<div class="input-group-btn">
									</div>
								</div>
								</div>
							</div>

							<div class="col-md-12">
							  <div class="form-group">
									<div class="input-group">
									  <span class="input-group-addon">Type de capteur :</span>
											<select name ="TypeCap" class="selectpicker">
												<option value="TORI">TORI</option>
												<option value="RELY">RELY</option>
												<option value="TEMP">TEMP</option>
												<option value="PRES">PRES</option>
												<option value="HUMI">HUMI</option>
												<option value="ENSO">ENSO</option>
											</select>
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon">NomCap :</span>
									<input name="NomCap" type="text" class="form-control">
									<div class="input-group-btn">
									</div>
								</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon">Coefficient du capteur :</span>
											<select name ="CoeffCap" class="selectpicker">
												<option value="0">0</option>
												<option value="0.1">0.1</option>
												<option value="0.01">0.01</option>
												<option value="0.001">0.001</option>
												<option value="0.0001">0.0001</option>
												<option value="0.00001">0.00001</option>
											</select>
									</div>
								</div>
							</div>
							<a href="#"><button type="submit" class="btn btn-md btn-success pull-right " name="submit" value="Appliquer">Rajouter un capteur</button></a>
						</form>

					</div>
				</div>
    	</div>
		</div>
		<div class="col-md-6">
			<?php

			$central=mysql_query("SELECT * FROM NodCap WHERE central_idcentral = ".$id_central." ") or die('Erreur SQL :' . mysql_error());

				echo'<h3>Liste des capteurs : </h3>';
				echo '<table class="table table-bordered">';
				echo '<thead class="thead-inverse">
								<tr>
									<th><center>idNodCap</center></th>
									<th><center>AddNode</center></th>
									<th><center>AddCap</center></th>
									<th><center>TypeCap</center></th>
									<th><center>NomCap</center></th>
									<th><center>CoeffCap</center></th>
									<th><center>ID Centrale</center></th>
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
				echo '
					<h3> Supprimer un capteur</h3>

					<form enctype="multipart/form-data" action="#" method="post">

							<nav class="navbar navbar-default" role="navigation">
							<div class="container-fluid">
								<div class="navbar-header">
								<a class="navbar-brand" href="#">Capteur : </a>
								</div>
								<div class="form-group">
									<div class="col-md-4">
										<select name ="idnodcap" class="selectpicker">
												<option style="display:none">ID Capteur</option>

										';
										$idnodcap=mysql_query("SELECT idNodCap FROM NodCap WHERE central_idcentral = ".$id_central." ") or die('Erreur SQL :' . mysql_error());
																		while ($row = mysql_fetch_assoc($idnodcap))
																		{
																			foreach ($row as $field)
																			{
																				echo "<option value=$field>$field</option>";
																			}
																		}
									echo '
									</select>
									</div>
									<a href="#"><button type="submites" class="btn btn-md btn-warning pull-right " name="submites" value="Appliquer">Supprimer un capteur</button></a>
									</form>
								</div>
						</div>

					';


				?>
		</div>
	</div>

	<?php

	$eng=mysql_query("SELECT * FROM NodCap WHERE central_idcentral = ".$id_central." ") or die('Erreur SQL :' . mysql_error());
	while ($data = mysql_fetch_array($eng))
	{

		$type_capteur=$data['idNodCap'];//L'ID
		$le_capteur=$data['TypeCap'];//Le nom usuel

		 echo '<div id="'.$type_capteur.'" class="tab-pane fade">';
		 echo'<div class="row">
					<div class="col-md-6">

					<h2> <a href="javascript:reload();void 0;"> <img src="assets/img/refresh.svg" alt="Actualiser" height="25px" width="25px" /></a>  Graphique de '.$le_capteur.' :</h2>
					<script>

					</script>

					<div id= "char'.$type_capteur.'" style="width: 100%; height: 500px;"></div>

					<script>
						var chartData = [ {
							';
							// we need this so that PHP does not complain about deprectaed functions
							error_reporting( 0 );
							$query = "SELECT Mesure, DateTimMes FROM Mesures  WHERE central_idcentral = ".$id_central." AND NodCap_idNodCap=".$type_capteur." ORDER BY DateTimMes";
							$result = mysql_query( $query );
							// All good?
							if ( !$result ) {
							  // Nope
							  $message  = 'Invalid query: ' . mysql_error() . "\n";
							  $message .= 'Whole query: ' . $query;
							  die( $message );
							}
							$numResults = mysql_num_rows($result);
							$counter = 0;
							while ( $row = mysql_fetch_assoc( $result ) )
							{
								if (++$counter == $numResults) //Si c'est la dernière ligne, ne pas inclure de séparateur.
								{
								echo '  "date": "' . $row['DateTimMes'] . ' ",' . "\n";
							    echo '  "value": ' . $row['Mesure'] .  "\n";
								}
								else
								{
								echo '  "date": "' . $row['DateTimMes'] . ' ",' . "\n";
							    echo '  "value": ' . $row['Mesure'] .  "\n";
							    echo '}, {';
								}

							}
					echo '
					} ];
					AmCharts.makeChart( "char'.$type_capteur.'", {
					  "type": "serial",
					  "dataProvider": chartData,
					  "categoryField": "date",
					  "dataDateFormat": "YYYY-MM-DD hh:mm:ss",
					  "categoryAxis":{
					  "labelRotation": 90
					  },
					  "graphs": [ {
					   "valueField": "value",
					  "type": "line",
					  "bullet": "round",
					  "lineColor": "#0065BD",
						"lineAlpha": 0.5

					  } ]
					} );

					</script>
					</div>
					<div class="col-md-6">
					';


					$result = mysql_query( $mesure);
					$requete=mysql_query("SELECT Mesure, DateTimMes FROM Mesures WHERE central_idcentral = ".$id_central."  AND NodCap_idNodCap=  ".$type_capteur." ORDER BY DateTimMes ");
					if( mysql_num_rows($requete)== '0')
					{
						echo '<center><h2>Erreur</center></h2>';
						echo"<center>Aucunes valeures n'a été enregistré pour ce capteur";
					}
					else
					{
						echo'<h2>Valeurs capteur '.$le_capteur.' : </h2>';
						echo '<table class="hidden-xs table table-bordered table-striped">';
						echo '<thead class="thead-inverse">
										<tr>
											<th class="success"><center>DateValeur</center></th>
											<th class="success"><center>Date</center></th>
										</tr>
									</thead>';

						while ($row = mysql_fetch_assoc($requete))
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

						if ($userRow['userIsAdmin']==1)
						{
							echo' <h2>Supprimer des valeurs</h2>';

							echo '
							<div class = "panel panel-default">
								<div class = "panel-heading">
									<h3 class = "panel-title">
									Options
									</h3>
								</div>
							<div class = "panel-body">
							<p>Il est obligatoire d`utiliser le format "YYYY-MM-DD hh:mm:ss"<br>Exemple :';$today = date("Y-m-d H:i:s"); print_r($today); echo ' </p>
							<form enctype="multipart/form-data" action="#" method="post">
								<div class="col-md-12">
									<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon">Heure de début : </span>
										<input name="H_debut" type="text" class="form-control" placeholder="YYYY-MM-DD hh:mm:ss" >
										<div class="input-group-btn">
										</div>
									</div>
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon">Heure de fin : </span>
										<input name="H_fin" type="text" class="form-control" placeholder="YYYY-MM-DD hh:mm:ss" >
										<div class="input-group-btn">
										</div>
									</div>
									</div>
								</div>
								<a href="#"><button type="submit" class="btn btn-md btn-success pull-right " name="submite" value="Appliquer">Supprimer les mesures</button></a>
							</form>
							</div>
							</div>
									';

							if(isset($_POST['submite']))
							{
								$H_debut = trim($_POST['H_debut']);
								$H_debut = strip_tags($H_debut);
								$H_debut = htmlspecialchars($H_debut);

								$H_fin = trim($_POST['H_fin']);
								$H_fin = strip_tags($H_fin);
								$H_fin = htmlspecialchars($H_fin);


								/*$querry = "DELETE FROM Mesures WHERE central_idcentral = ".$id_central."  AND NodCap_idNodCap=  ".$type_capteur." AND WHERE DateTimMes BETWEEN  '".$H_debut."', AND '".$H_fin."'  ORDER by DateTimMes"; */
								$querry = "DELETE FROM Mesures WHERE central_idcentral = ".$id_central."  AND NodCap_idNodCap=  ".$type_capteur." AND DateTimMes BETWEEN '".$H_debut."' AND '".$H_fin."' ORDER by DateTimMes";

								echo $querry;
								$resultat = mysql_query ($querry);

								if($resultat)
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

		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
	?>


  </div>

	<?php
	if(isset($_POST['submit']))
	{
		if ($userRow['userIsAdmin']==1)
			{

				$idNodCap = trim($_POST['idNodCap']);
				$idNodCap = strip_tags($idNodCap);
				$idNodCap = htmlspecialchars($idNodCap);

				$AddNode = trim($_POST['AddNode']);
				$AddNode = strip_tags($AddNode);
				$AddNode = htmlspecialchars($AddNode);

				$AddCap = trim($_POST['AddCap']);
				$AddCap = strip_tags($AddCap);
				$AddCap = htmlspecialchars($AddCap);

				$TypeCap = trim($_POST['TypeCap']);
				$TypeCap = strip_tags($TypeCap);
				$TypeCap = htmlspecialchars($TypeCap);

				$NomCap = trim($_POST['NomCap']);
				$NomCap = strip_tags($NomCap);
				$NomCap = htmlspecialchars($NomCap);

				$CoeffCap = trim($_POST['CoeffCap']);
				$CoeffCap = strip_tags($CoeffCap);
				$CoeffCap = htmlspecialchars($CoeffCap);

				$central_idcentral = $id_central;
				$query = "INSERT INTO NodCap VALUES (".$idNodCap.", ".$AddNode.", ".$AddCap.", '".$TypeCap."', '".$NomCap."', '".$CoeffCap."', ".$central_idcentral.")";
				$result = mysql_query ($query);

				if($result)
				{
					echo "<script type='text/javascript'>
					$(window).load(function(){
						$('#success').modal('show')({'backdrop': 'static'});
					});
					</script>";
				}
				else
				{
					echo "<script type='text/javascript'>
					$(window).load(function(){
						$('#error').modal('show')({'backdrop': 'static'});
					});
					</script>";
				}
			}
	}

	if(isset($_POST['submites']))
	{
		if  ($userRow['userIsAdmin']==1)
		{
			$id_capt=$_POST['idnodcap'];
			$query="DELETE from NodCap WHERE idNodCap='$id_capt';";
			$result = mysql_query ($query);

			if($result)
			{
				echo "<script type='text/javascript'>
				$(window).load(function(){
					$('#success').modal('show')({'backdrop': 'static'});
				});
				</script>";
			}
			else
			{
				echo "<script type='text/javascript'>
				$(window).load(function(){
					$('#error').modal('show')({'backdrop': 'static'});
				});
				</script>";
			}
		}
	}

	?>


<script>
window.onload = function(){

    var url = document.location.toString();
    if (url.match('#')) {
        $('.nav-tabs a[href=#' + url.split('#')[1] + ']').tab('show');
    }

    //Change hash for page-reload
    $('.nav-tabs a[href=#' + url.split('#')[1] + ']').on('shown', function (e) {
        window.location.hash = e.target.hash;
    });
}
$(function(){
  var hash = window.location.hash;
  hash && $('ul.nav a[href="' + hash + '"]').tab('show');

  $('.nav-tabs a').click(function (e) {
    $(this).tab('show');
    var scrollmem = $('body').scrollTop() || $('html').scrollTop();
    window.location.hash = this.hash;
    $('html,body').scrollTop(scrollmem);
  });
});


$(document).ready(function() {
    if (location.hash) {
        $("a[href='" + location.hash + "']").tab("show");
    }
    $(document.body).on("click", "a[data-toggle]", function(event) {
        location.hash = this.getAttribute("href");
    });
});
$(window).on("popstate", function() {
    var anchor = location.hash || $("a[data-toggle='tab']").first().attr("href");
    $("a[href='" + anchor + "']").tab("show");
});

var reload = function () {
    var regex = new RegExp("([?;&])reload[^&;]*[;&]?");
    var query = window.location.href.split('#')[0].replace(regex, "$1").replace(/&$/, '');
    window.location.href =
        (window.location.href.indexOf('?') < 0 ? "?" : query + (query.slice(-1) != "?" ? "&" : ""))
        + "reload=" + new Date().getTime() + window.location.hash;
};
</script>


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
					<h1>Succès</h1>
				</div>
				<div class="modal-body">
				</div>
				<div class="modal-footer">
					<a href="#add"  data-toggle="tab"><button type="button" class="btn btn-lg btn-success" data-dismiss="modal">Fermer</button></a>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>

	<div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header modal-header-danger">
					<h1>Une erreur c'est produite, veuillez réessayer plus tard.</h1>
				</div>
				<div class="modal-body">
				</div>
				<div class="modal-footer">
					<a href="#add"  data-toggle="tab"><button type="button" class="btn btn-lg btn-danger" data-dismiss="modal">Fermer</button></a>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>


</body>
</html>
<?php ob_end_flush(); ?>
