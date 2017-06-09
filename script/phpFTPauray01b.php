<?php
include ("INC_LAB.inc");
$NumCen=$_POST["NumCen"];
$user=$_POST["logName"];
$password=$_POST["PassW"];
if (($linkdb = DB_connx("auraynodcap1")))
{
     $result = mysql_query("SELECT * FROM central where idcentral=$NumCen");
  	 if ($result)
 	 {
        $row =  mysql_fetch_array($result);
        echo " --->  $row[0],$row[1],$row[2],$row[3],$row[4] ";
        $host = $row[1];
     }
     else echo "<BIG><BIG>Désolé PB dans BD </BIG></BIG>";
}
 else echo "<BIG><BIG>Désolé pas de BD </BIG></BIG>";

 /*
$host = "192.160.100.123";
$user = "pi";
$password = "raspberry";
*/
// connect to host
$conn = ftp_connect("$host",21);
if (!$conn)
{
  echo "Echec dans la connection au serveur FTP<br>";
  exit;
}
echo "Connection réussie sur $host.<br>";

// Se logger
 $result = ftp_login($conn, $user, $password);
if (!$result)
{
  echo "Nom ou passe inexacte $user<br>";
  ftp_quit($conn);
  exit;
}
echo "Connecté sous $user<br>";
// T�l�chargement du fichier
if(ftp_pasv($conn, true))
{
   echo "Téléchargement en cours...<br>";
   if (!$success = ftp_put($conn,"/home/pi/inv17/SCRIPT.SCR", "SCRIPT.SCR", FTP_ASCII))
   {
      echo "Téléchargement impossible";
      ftp_quit($conn);
      exit;
}
//fclose($fp);
echo "Le fichier SCRIPT.SCR a bien été téléchargée";

}
else echo "Problème  ";

// close connection to host
ftp_quit($conn);

?>
<a href="index.html"><button type="button">Retour</button></a>
</body>
</html>
