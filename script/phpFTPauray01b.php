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
     else echo "<BIG><BIG>D�sol� PB dans BD </BIG></BIG>";
}
 else echo "<BIG><BIG>D�sol� pas de BD </BIG></BIG>";

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
echo "Connection r�ussie sur $host.<br>";

// Se logger 
 $result = ftp_login($conn, $user, $password);
if (!$result)
{
  echo "Nom ou passe inexacte $user<br>";
  ftp_quit($conn);
  exit;
}
echo "Connect� sous $user<br>";
// T�l�chargement du fichier
if(ftp_pasv($conn, true))
{
   echo "T�l�chargement en cours...<br>";
   if (!$success = ftp_put($conn,"/home/pi/SCRIPT.SCR", "SCRIPT.SCR", FTP_ASCII))
   {
      echo "T�l�chargement impossible";
      ftp_quit($conn);
      exit;
}
//fclose($fp);
echo "Le fichier SCRIPT.SCR a bien �t� t�l�charg�e";

}
else echo "Problemme  ";

// close connection to host
ftp_quit($conn);

?>

</body>
</html>
