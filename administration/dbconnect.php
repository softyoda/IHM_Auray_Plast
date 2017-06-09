<?php

	// this will avoid mysql_connect() deprecation error.
	error_reporting( ~E_DEPRECATED & ~E_NOTICE );
	// but I strongly suggest you to use PDO or MySQLi.
	
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', 'auray');
	define('DBNAME', 'dbtest');
	
	$conn = mysql_connect(DBHOST,DBUSER,DBPASS);
	$dbcon = mysql_select_db(DBNAME);
	
	if ( !$conn ) {
		die("Erreur de connexion : " . mysql_error());
		echo 'Connecté !!! :) ';
	}
	
	if ( !$dbcon ) {
		die("Erreur de connection a la base de données : " . mysql_error());
		echo ('pas de co a la bd :( ');
	}
