<html><head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript" src="/administration/assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="/administration/assets/js/bootstrap.min.js"></script>
  <link href="/administration/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="/administration/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="/administration/assets/css/style.css" rel="stylesheet" type="text/css">
  <link rel="icon" type="image/png" href="/administration/assets/img/ico.png" />
  <title> Accueil </title>
    </head>
	<style>
	#footer {
		background-color: #303030 !important

	}
	</style>
	<body>

<div class="navbar navbar-default navbar-inverse navbar-static-top">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
<span class="sr-only">Toggle navigation</span><span class="icon-bar">
</span>
<span class="icon-bar">
</span><span class="icon-bar">
</span></button>
<a href="#" class="navbar-brand"><img height="20" alt="Aurayplast" src="administration/assets/img/aurayplast.png"></a>
</div>
<div class="collapse navbar-collapse" id="navbar-ex-collapse">
    <ul class="nav navbar-nav navbar-right">
        <li>
            <a href="/administration/index.php">Connexion</a>
        </li>
        <li>
			<a href="/administration/register.php">S'enregistrer</a>
        </li>
    </ul>
</div>
</div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Aurayplast</h1>
                <h3>Présentation</h3>
                <p>
					Spécialisée depuis 1974 dans la production de joints d'étanchéité en POLYURETHANE
					et de pièces techniques en matières plastiques injecté, AURAY PLAST vous apporte son
					expérience et un service complet dans l'étude, la conception et la réalisation de vos
					composants mécaniques plastiques.
				</p>
        <p>
          Dans le souci d’augmenter son « EMS » (Environmental Management System), cette société souhaite équiper ces machines à injections de différents capteurs permettant d'effectuer des mesures.        </p>

				<p>
					Le but de notre projet et de metre en place différents capteurs et actionneurs autour de la machine a injection.
					Les données de ces capteurs sont stocker dans une base de donnée pour etre visualiser a distance via ce site.
					Les capteurs servent a mesurer différentes données tels que la température, la pression, le taux d'humidité.
				</p>

				<p>
					Pour cela nous nous sommes séparer les tachaches. Nous sommes 5 étudiants spécialisé en éléctronique ou en informatique.
          Cette interface peut être téléchargé sur <a href="https://github.com/softyoda/IHM_Auray_Plast"> GitHub</a>.
				</p>
            </div>
            <div class="col-md-6"> <a href="http://aurayplast.fr/"><img src="administration/assets/img/affiche.jpg" class="img-responsive"> </div></a>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-4"><a href="/administration/home.php"> <img src="administration/assets/img/ihm.jpg" class="img-responsive"></a>
                <center><h2>Panneau d'administration des machines a injections</h2></center>
                <p>
				<p>
					Plan du site : </br>
          <a href="/administration/home.php">- Acceuil</a></br>
					<a href="/administration/index.php">- Connexion</a></br>
					<a href="/administration/register.php">- S'enregistrer</a></br>
					<a href="/administration/add-engine.php">- Ajouter une machine a injection</a></br>
					<a href="/administration/user.php">- Panneau d'administration de l'utilisateur</a></br>
					<a href="/administration/assets">- Dossier comportant les assets</a></br>
				</p>
				<p>
            Interprète les données MySQL des valeur de chaques mesures pour crée un graphique et un tableau.
             Comporte un système d'authentification avec gestion des droits d'administration.
            Site crée par Yoann.S
				</p>
            </div>
            <div class="col-md-4"> <a href="/script/index.html"><img src="administration/assets/img/script.jpg" class="img-responsive"></a>
                <center><h2>Pages de génération du fichier script</h2></center>
				<p>
					Plan du site : </br>
          <a href="/script/index.html">- Accueil</a></br>
					<a href="/script/phpBDauray01a.php">- Configuration centrale</a></br>
					<a href="/script/phpBDauray02a.php">- Generation script</a></br>
					<a href="/script/phpBDauray03a.php">- Ecriture script</a></br>
					<a href="/script/phpFTPauray01a.php">- Transmission script</a></br>

				</p>
                <p>
					Constitue un fichier Script listant les diverses mesures à effectuer,
					les divers actions à effectuer et les mesures à transmettre à la Base de Donnée vers le Serveur de Mesures</br>
          Site crée par Loïc.S
				</p>
            </div>
            <div class="col-md-4"> <a href="/administration/assets/img/Affiche-presentation.png"><img src="administration/assets/img/presentation.jpg" class="img-responsive"></a>
                <center><h2>Autres documents</h2></center>
                <p>
					</br>
          <p>Liste des autres documents:</p>
					<a href="/administration/assets/img/Affiche-presentation.png" target="_blank">- Affiche de présentation</a></br>
          <p>
            Affiche crée sous photoshop pour présenter le projet aux portes ouvertes.
          </p>
					<a href="/administration/assets/pdf/projet.pdf" target="_blank">- Dossier technique</a></br>
					Dossier technique du projet.
				</p>
            </div>
        </div>
    </div>
</div>
<footer class="hidden-xs section section-primary" id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>Contact</h1>
                <p>&nbsp;<b>Adresse :</b> 5 rue Yves Kerguelen BP 40212 - 56402 Auray&nbsp;
                    <br>
                    <br><b>Téléphone : </b>33 (0) 2 97 24 21 63
                    <br>
                    <br>&nbsp;<b>Email : </b>contact@aurayplast.fr&nbsp;</p>
            </div>
            <div class="col-sm-6">
                <p class="text-info text-right">
                    <br>
                    <br>
                </p>
                <div class="row">
                    <div class="col-md-12 text-left">
                          <a href="http://www.lacroixrouge-brest.fr/"><img src="/administration/assets/img/croix-rouge.png" height="150"></a>
					          </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>

</html>
