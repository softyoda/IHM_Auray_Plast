<?php
	ob_start();
	session_start();
	if( isset($_SESSION['user'])!="" ){
		header("Location: home.php");
	}
	include_once 'dbconnect.php';

	$error = false;

	if ( isset($_POST['btn-signup']) ) {
		
		// Filtrer ce que l'utilisateur met pour éviter les injections SQL
		$name = trim($_POST['name']);
		$name = strip_tags($name);
		$name = htmlspecialchars($name);
		
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		
		// Vérification basique du nom
		if (empty($name)) {
			$error = true;
			$nameError = "Entrer votre nom.";
		} else if (strlen($name) < 3) {
			$error = true;
			$nameError = "Le nom doit au moins avoir 3 characteres.";
		} else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
			$error = true;
			$nameError = "Le nom doit pas contenir des charactères spéciaux ou d'espace.";
		}
		
		//Vérification du mail
		if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Utilisez une addresse email valide.";
		} else {
			// Vérifier qu'il n'existe pas déja
			$query = "SELECT userEmail FROM users WHERE userEmail='$email'";
			$result = mysql_query($query);
			$count = mysql_num_rows($result);
			if($count!=0){
				$error = true;
				$emailError = "Email déjà utiliser.";
			}
		}
		//Vérification du mot de passe
		if (empty($pass)){
			$error = true;
			$passError = "Entrer un mot de passe.";
		} else if(strlen($pass) < 6) {
			$error = true;
			$passError = "Le mot de passe doit avoir au moins 6 characteres.";
		}
		
		// Chiffrer le mot de passe via SHA256();
		$password = hash('sha256', $pass);
		
		

		//Mettre le premier utilisateur en admin
		$query = "SELECT userIsAdmin FROM users";
		$resultat = mysql_query($query);
		$count = mysql_num_rows($resultat);
				// si il y a déja des utilisateurs, il ne sera pas admin
				if($count!=0){
				  $isadmin = 0;
				}
				//si c'est le premier, il sera automatiquement admin
				else {
				  $isadmin = 1;
				}
		
		
		// Si il n'y a aucune erreures, continuer l'enregistrement en envoyans les données dans la base de donnée
		if( !$error ) {
			
			$query = "INSERT INTO users(userName,userEmail,userPass,userIsAdmin) VALUES('$name','$email','$password','$isadmin')";
			$res = mysql_query($query);
				
			if ($res) {
				$errTyp = "success";
				$errMSG = "Enregistrement réussi, vous pouvez vous connecter.";
				unset($name);
				unset($email);
				unset($pass);
				header("Location: index.php");
			} else {
				$errTyp = "danger";
				$errMSG = "Erreur, veillez réessayer plus tard... :" . mysql_error();	
			}	
				
		}
		
		
	}//partie HTML du site
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Enregistrement</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<div class="container">

	<div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
    	<div class="col-md-12">
        
        	<div class="form-group">
            	<h2 class="">S'enregistrer.</h2>
            </div>
        
        	<div class="form-group">
            	<hr />
            </div>
            
            <?php
			if ( isset($errMSG) ) {
				
				?>
				<div class="form-group">
            	<div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
            	</div>
                <?php
			}
			?>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            	<input type="text" name="name" class="form-control" placeholder="Nom" maxlength="50" value="<?php echo $name ?>" />
                </div>
                <span class="text-danger"><?php echo $nameError; ?></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="email" name="email" class="form-control" placeholder="Email" maxlength="40" value="<?php echo $email ?>" />
                </div>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" name="pass" class="form-control" placeholder="Mot de passe" maxlength="15" />
                </div>
                <span class="text-danger"><?php echo $passError; ?></span>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-signup">S'enregistrer</button>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<a href="index.php">Connexion...</a>
            </div>
        
        </div>
   
    </form>
    </div>	

</div>

</body>
</html>
<?php ob_end_flush(); ?>
