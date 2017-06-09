<?php
// Ecrire dans le fichier SCR : Ecriture de l'entête du fichier
include ("INC_LAB.inc");
$NumCen=$_POST["NumCen"];
if (($linkdb = DB_connx("auraynodcap1")))
	{
     $monfichier = fopen('SCRIPT.SCR','w');
     $result = mysql_query("SELECT * FROM central where idcentral=$NumCen");
  	 if ($result)
 	 {
        $row =  mysql_fetch_array($result);
        echo " --->  $row[0],$row[1],$row[2],$row[3],$row[4] ";

        $Ligne ="IPSER ".$row[1]."\r\n";
        fwrite($monfichier, $Ligne);
        $Ligne ="ICMES ".$row[0]."\r\n";
        fwrite($monfichier, $Ligne);
        $Ligne ="ETATS ".$row[3]."\r\n";
        fwrite($monfichier, $Ligne);
        $Ligne ="TACQU ".$row[6]."\r\n";
        fwrite($monfichier, $Ligne);
        $Ligne ="HEDEB ".$row[4]."\r\n";
        fwrite($monfichier, $Ligne);
        $Ligne ="HEFIN ".$row[5]."\r\n";
        fwrite($monfichier, $Ligne);
        echo "Fermeture FIle";
      }
     $result = mysql_query("SELECT * FROM senarline where central_idcentral=110");
  	 if ($result)
 	 {
        while ($row =  mysql_fetch_array($result))
        {
              print("$row[2] $row[3]:$row[4]<br>");
           if($row[3]=="None")
           {
             $Ligne =$row[2]."\r\n";
           }
           else
           {
              $Ligne =$row[2]." ".$row[3].":".$row[4]."\r\n";
           }
           fwrite($monfichier, $Ligne);

           echo "$Ligne <br>";
        }

     }
        fclose($monfichier);
  }

?>

